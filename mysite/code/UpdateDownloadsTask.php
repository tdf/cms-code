<?php
/**
 * Task to update the List of available downloads
 */
class UpdateDownloadsTask extends DailyTask {
	function process() {
		self::parseDownloads();
	}
	private static function parseDownloads() {
		exec("rsync -r --exclude \*.asc rsync://rsync.documentfoundation.org/tdf-pub/ > ".TEMP_FOLDER."/rsynclist.lst");
		$array = file(TEMP_FOLDER."/rsynclist.lst",FILE_IGNORE_NEW_LINES);
		if (!$array) { Debug::message("Failed to read rsynclist!"); return False; }
		$dbtemp = new DataObjectSet();
		foreach ($array as $line) {
			if ($line[0]=="d") continue; // ignore directories
			//-rw-r--r--    12063639 2010/11/11 13:31:05 libreoffice/src/libreoffice-build-3.2.99.3.tar.gz
			$columns = preg_split("/ +/", $line);
			$size = $columns[1];
			$pathcomponents = explode("/", $columns[4]);

			if ($pathcomponents[1] == "box") {
				//-rw-r--r--  2830882816 2011/02/10 14:17:09 libreoffice/box/3.3.0/LibO-3.3.0-1_DVD_allplatforms_de.iso
				$dbtemp->push(new Download(array(
					'Type'     => 'box',
					'Platform' => "multi",
					'Arch'     => "multi",
					'Version'  => $pathcomponents[2],
					'Size'     => $columns[1],
					'Fullpath' => $columns[4],
					'Filename' => $pathcomponents[3])));
				continue;
			} elseif ($pathcomponents[1] == "portable") {
				//-rw-r--r--   123947264 2011/01/27 11:14:23 libreoffice/portable/3.3.0/LibreOfficePortable_3.3.0.paf.exe
				$dbtemp->push(new Download(array(
					'Type'     => 'portable',
					'Platform' => "win",
					'Arch'     => "x86",
					'Version'  => $pathcomponents[2],
					'Size'     => $columns[1],
					'Fullpath' => $columns[4],
					'Filename' => $pathcomponents[3])));
				continue;
			} elseif ($pathcomponents[1] == "src" && strrpos($pathcomponents[3], "tar.bz2") === strlen($pathcomponents[3])-strlen("tar.bz2")) {
				//-rw-r--r--    35706005 2011/01/18 18:16:37 libreoffice/src/3.3.0.4/libreoffice-libs-extern-sys-3.3.0.4.tar.bz2
				//only accept real src tarballs, no .log/.txt stuff anymore
				$version = $pathcomponents[2];
				$dbtemp->push(new Download(array(
					'Type'     => 'src',
					'Platform' => "multi",
					'Arch'     => "multi",
					'Version'  => $version,
					'Size'     => $columns[1],
					'Fullpath' => $columns[4],
					'Filename' => $pathcomponents[3])));
				continue;
			} elseif ($pathcomponents[1] == "stable" || $pathcomponents[1] == "testing") {
				//-rw-r--r--     8675353 2011/02/16 14:59:45 libreoffice/stable/3.3.1/deb/x86/LibO-SDK_3.3_Linux_x86_install-deb_en-US.tar.gz
				//-rw-r--r--     9085513 2011/02/16 15:01:55 libreoffice/stable/3.3.1/deb/x86/LibO_3.3.1_Linux_x86_helppack-deb_af.tar.gz
				//-rw-r--r--   152944835 2011/02/16 15:59:47 libreoffice/stable/3.3.1/deb/x86/LibO_3.3.1_Linux_x86_install-deb_en-US.tar.gz
				//-rw-r--r--     8377809 2011/02/16 16:53:09 libreoffice/stable/3.3.1/deb/x86/LibO_3.3.1_Linux_x86_langpack-deb_sw-TZ.tar.gz
				//-rw-r--r--   260409206 2011/02/16 22:03:46 libreoffice/stable/3.3.1/win/x86/LibO_3.3.1_Win_x86_install_all_lang.exe
				//-rw-r--r--   223750368 2011/02/16 23:31:06 libreoffice/stable/3.3.1/win/x86/LibO_3.3.1_Win_x86_install_multi.exe
				if(substr($pathcomponents[5],0,8) == "LibO-SDK" || substr($pathcomponents[5],0,12) == "BrOffice-SDK") {
					$installtype = 'SDK';
					$lang = 'en-US';
				} else {
					$temp = explode("_", $pathcomponents[5]);
					switch (substr($temp[4],0,8)) {
						case "helppack": $installtype='Helppack'; break;
						case "langpack": $installtype='Languagepack'; break;
						case "install" : $installtype='Full'; /* windows */
						case "install-": $installtype='Full'; break;
						default: Debug::message("Unknown install-type: ".substr($temp[4],0,8)); continue 2; //break out of switch & continue with next loop-item Send log about unknown installtype
					}
					$temp = explode(".", $temp[5]);
					$lang = (substr($pathcomponents[5],0,8) == "BrOffice") ? 'pt-BR' : $temp[0];
				}
                                $dbtemp->push(new Download(array(
					'Type'     => $pathcomponents[1],
					'Platform' => $pathcomponents[3],
					'Arch'     => $pathcomponents[4],
					'Version'  => $pathcomponents[2],
					'Size'     => $columns[1],
					'Fullpath' => $columns[4],
					'Filename' => $pathcomponents[5],
					'InstallType' => $installtype,
					'Lang'        => $lang)));
                                continue;
			} else {
				Debug::message("Unknown install-type: ".$pathcomponents[1]);
			}
		}
		print "got ".$dbtemp->Count()." files…";
		print " flushing table…";
		DB::query('TRUNCATE TABLE Download');
		print " writing records…\n";
		$i=0;
		foreach ($dbtemp as $record) {
			if (++$i % 10 == 0) print "#";
			$record->write();
		}
		/* invalidate the cache, as it's skipped when saving the individual Downloads */
		Aggregate::flushCache('Download');
		print "\nFinished :-)\n";
	}
}
