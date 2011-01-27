<?php
/**
 * Defines the DownloadPage type
 * adds a nested ul of downloadlinks that are expanded/collapsed with jquery
 * (reads available files from rsync output)
 */
class DownloadPage extends Page {
}

class DownloadPage_Controller extends Page_Controller {
	private static $platformnames= array (
		"win/x86"    => array("Nice" => "Windows",          "fortemplate" => "winx86"),
		"deb/x86"    => array("Nice" => "Linux x86 (deb)",  "fortemplate" => "debx86"),
		"deb/x86_64" => array("Nice" => "Linux x64 (deb)",  "fortemplate" => "debx86_64"),
		"rpm/x86"    => array("Nice" => "Linux x86 (rpm)",  "fortemplate" => "rpmx86"),
		"rpm/x86_64" => array("Nice" => "Linux x64 (rpm)",  "fortemplate" => "rpmx86_64"),
		"mac/ppc"    => array("Nice" => "Mac OS X (PPC)",   "fortemplate" => "macppc"),
		"mac/x86"    => array("Nice" => "Mac OS X (Intel)", "fortemplate" => "macintel")
		);

	const MINAGE = 1800; // 30 Minutes minimum interval between rereading the downloads

	private static $parsedresult = NULL;

	public static function RsyncRefresh() {
		return (int)(time() / self::MINAGE); // Returns a new number every MINAGE seconds
	}

	private static function parseDownloads() {
		exec("rsync -r --exclude \*.asc rsync://rsync.documentfoundation.org/tdf-pub/ > ".TEMP_FOLDER."/rsynclist.lst");
		$array = file(TEMP_FOLDER."/rsynclist.lst",FILE_IGNORE_NEW_LINES);
		if (!$array) return false;
		$result = array();
		foreach ($array as $value) {
			if ($value[0]=="d") continue;
			//-rw-r--r--    12063639 2010/11/11 13:31:05 libreoffice/src/libreoffice-build-3.2.99.3.tar.gz
			$pathname = preg_split("/ +/", $value);
			$pathcomponents = explode("/", $pathname[4]);

			if ($pathcomponents[1] == "src") {
				$temp = explode("-", $pathcomponents[2]);
				$version = explode(".tar",end($temp));
				$result["src"][$version[0]][] = array("size" => $pathname[1], "file" => $pathcomponents[2]);
				continue;
			}

			if ( $pathcomponents[1] != "stable" )
				continue;

			$version = $pathcomponents[2];
			$platform = $pathcomponents[3]."/".$pathcomponents[4];

			// LibO_3.3.0rc1_Win_x86_install_all_lang.exe
			// LibO_3.3.0rc1_Linux_x86_install-rpm_en-US.tar.gz
			// LibO_3.3.0rc1_Linux_x86_langpack-rpm_ar.tar.gz
			$filenamesplit = explode("_", $pathcomponents[5]);
			$product = $filenamesplit[0];
			$type = explode("-",$filenamesplit[4]); //langpack/install

			$dummy = explode(".",$filenamesplit[5]);
			$language = $dummy[0];
			// workaround rc2 naming-bug - LibO_3.3.0rc1_Win_x86_all_lang.exe
			if ($type[0] == "all") {
				$type[0] = "install";
				$language = "all";
			}

			if($product == "LibO-SDK") {
				$result["SDK"][$platform] = array("size" => $pathname[1], "file" => $pathname[4]);
			} else {
				$result["LibreOffice"][$version][$platform][$language][$type[0]] = array("size" => $pathname[1], "file" => $pathname[4]);
			}
		}
		$result_dos = new ArrayData(array());

		/* parse the sources */
		$src  = new DataObjectSet();
		foreach($result["src"] as $version => $linkarray) {
			$link_dos = new DataObjectSet();
			foreach($linkarray as $entry) {
				$link_dos->push(new ArrayData(array("Filename" => $entry["file"], "Filesize" => File::format_size($entry["size"]))));
			}
			$src->push(new ArrayData(array("Version" => $version, "Files" => $link_dos)));
		}
		$src->sort("Version","DESC");
		$result_dos->Sources = $src;

		/* parse the SDK */
		$sdk  = new DataObjectSet();
		foreach($result["SDK"] as $platform => $entry) {
			$sdk->push(new ArrayData(array("Platform" => $platform, "PlatformNice" => self::$platformnames[$platform]["Nice"], "File" => $entry["file"], "Filename" => end(explode("/",$entry["file"])), "Filesize" => File::format_size($entry["size"]))));
		}
		$result_dos->SDK = $sdk;

		/* the office files */
		$libo = new DataObjectSet();
		$langarray = array();
		foreach($result["LibreOffice"] as $version => $platformarray) {
			$platform_dos = new DataObjectSet();
			foreach($platformarray as $platform => $languagearray) {
				/* Windows is special, has multi-installer, no languagepacks */
				if ($platform == "win/x86") {
					$win_dos= new DataObjectSet();
					$win_dos->push(new ArrayData(array("Type" => "multi", "File" => $languagearray["multi"]["install"]["file"], "Filename" => end(explode("/",$languagearray["multi"]["install"]["file"])), "Filesize" => File::format_size($languagearray["multi"]["install"]["size"]))));
					$win_dos->push(new ArrayData(array("Type" => "all",   "File" => $languagearray["all"]["install"]["file"],   "Filename" => end(explode("/",$languagearray["all"]["install"]["file"])),   "Filesize" => File::format_size($languagearray["all"]["install"]["size"]))));

					// helppacks
					unset($languagearray["all"]);
					unset($languagearray["multi"]);
					$helppacks_dos = new DataObjectSet();
					foreach($languagearray as $language => $helppackarray) {
						if(array_key_exists("helppack", $helppackarray)) {
							$helppack = $helppackarray["helppack"];
							$helppacks_dos->push(new ArrayData(array(
								"Language"         => $language,
								"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)),
								"Helppack"         => $helppack["file"],
								"Filesize"         => File::format_size($helppack["size"]),
								"FilenameHelppack" => end(explode("/",$helppack["file"])))));
							// see note below
							$langarray[] =array(
								"Language"         => $language,
								"LanguageNiceUS"   => i18n::get_language_name($language),
								"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)));
						}
					}

					$platform_dos->push(new ArrayData(array("Platformname" => self::$platformnames[$platform]["fortemplate"], "PlatformNice" => self::$platformnames[$platform]["Nice"], "Links" => $win_dos, "Helppacks" => $helppacks_dos)));
					continue;
				}
				$langpacks_dos = new DataObjectSet();
				$helppacks_dos = new DataObjectSet();
				foreach($languagearray as $language => $filetypearray) {
					if(array_key_exists("langpack", $filetypearray)) {
						$langpack = $filetypearray["langpack"];
						$langpacks_dos->push(new ArrayData(array(
							"Language"         => $language,
							"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)),
							"Langpack"         => $langpack["file"],
							"Filesize"         => File::format_size($langpack["size"]),
							"FilenameLangpack" => end(explode("/",$langpack["file"])))));
						/* for populating the dropdown selector TODO: make use of relations, remove duplication */
						$langarray[] =array(
						        "Language"         => $language,
							"LanguageNiceUS"   => i18n::get_language_name($language),
							"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)));
					}
					if(array_key_exists("helppack", $filetypearray)) {
						$langpack = $filetypearray["helppack"];
						$helppacks_dos->push(new ArrayData(array(
							"Language"         => $language,
							"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)),
							"Helppack"         => $langpack["file"],
							"Filesize"         => File::format_size($langpack["size"]),
							"FilenameHelppack" => end(explode("/",$langpack["file"])))));
						/* for populating the dropdown selector TODO: make use of relations, remove duplication */
						$langarray[] =array(
							"Language"         => $language,
							"LanguageNiceUS"   => i18n::get_language_name($language),
							"LanguageNiceLocal"=> ucfirst(i18n::get_language_name($language, true)));
					}
				}
				$fullinstall=$languagearray["en-US"]["install"];
				$platform_dos->push(new ArrayData(array("Platformname" => self::$platformnames[$platform]["fortemplate"], "Fullinstall" => $fullinstall["file"], "FilenameFull" => end(explode("/", $fullinstall["file"])), "Filesize" => File::format_size($fullinstall["size"]), "PlatformNice" => self::$platformnames[$platform]["Nice"], "Langpacks" => $langpacks_dos, "Helppacks" => $helppacks_dos)));
			}
			$platform_dos->sort("PlatformNice", "DESC");
			$libo->push(new ArrayData(array("Version" => $version, "Data" => $platform_dos)));
		}
		$result_dos->LibreOffice = $libo;

		$result_dos->Languages = new DataObjectSet($langarray);
		$result_dos->Languages->removeDuplicates("Language");
		$result_dos->Languages->sort("Language", "ASC");

		$platforms = new DataObjectSet();
		foreach(self::$platformnames as $platform) {
			$platforms->push(new ArrayData(array("PlatformTemplate"=>$platform["fortemplate"], "PlatformNice"=>$platform["Nice"])));
		}
		$platforms->sort("PlatformNice", "DESC");
		$result_dos->Platforms=$platforms;

		$result_dos->Timestamp=time();
		self::$parsedresult = $result_dos;
	}

	public function GetDownloads() {
		if (self::$parsedresult === NULL) {
			self::parseDownloads();
		}
		return self::$parsedresult;
	}
}

?>
