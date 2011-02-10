<?php

/**
 * Slovenian (Slovenia) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('sl_SI', $lang) && is_array($lang['sl_SI'])) {
	$lang['sl_SI'] = array_merge($lang['en_US'], $lang['sl_SI']);
} else {
	$lang['sl_SI'] = $lang['en_US'];
}

$lang['sl_SI']['']['CHOOSEPAGE'] = 'Izberite element na levi.';
$lang['sl_SI']['AssetAdmin']['CHOOSEFILE'] = 'Izberite datoteko';
$lang['sl_SI']['AssetAdmin']['DELETEDX'] = 'Izbrisano %s datotek. %s';
$lang['sl_SI']['AssetAdmin']['FILESREADY'] = 'Datoteke, pripravljene za nalaganje:';
$lang['sl_SI']['AssetAdmin']['FOLDERDELETED'] = 'mapa izbrisana.';
$lang['sl_SI']['AssetAdmin']['FOLDERSDELETED'] = 'mape izbrisane.';
$lang['sl_SI']['AssetAdmin']['MENUTITLE'] = array(
	'Datoteke in slike',
	100,
	'Naslov menija'
);
$lang['sl_SI']['AssetAdmin']['MOVEDX'] = 'Premaknjenih %s datotek';
$lang['sl_SI']['AssetAdmin']['NEWFOLDER'] = 'Nova-mapa';
$lang['sl_SI']['AssetAdmin']['NOTEMP'] = 'Začasna mapa za nalaganje ni nastavljena. Prosimo, nastavite upload_tmp_dir v php.ini.';
$lang['sl_SI']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Ničesar ni za nalaganje';
$lang['sl_SI']['AssetAdmin']['NOWBROKEN'] = 'Te strani imajo trenutno nedelujoče povezave:';
$lang['sl_SI']['AssetAdmin']['SAVEDFILE'] = 'Shranjena datoteka %s';
$lang['sl_SI']['AssetAdmin']['SAVEFOLDERNAME'] = 'Shrani ime mape';
$lang['sl_SI']['AssetAdmin']['THUMBSDELETED'] = '%s neuporabljenih predoglednih sličic je bilo izbrisanih';
$lang['sl_SI']['AssetAdmin']['UPLOAD'] = 'Naloži spodaj navedene datoteke';
$lang['sl_SI']['AssetAdmin']['UPLOADEDX'] = 'Naloženih %s datotek';
$lang['sl_SI']['AssetAdmin_left.ss']['CREATE'] = 'Ustvari';
$lang['sl_SI']['AssetAdmin_left.ss']['DELETE'] = 'Izbriši';
$lang['sl_SI']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Izbriši izbrane mape';
$lang['sl_SI']['AssetAdmin_left.ss']['ENABLEDRAGGING'] = array(
	'Dovoli preurejanje povleci-in-spusti',
	PR_HIGH
);
$lang['sl_SI']['AssetAdmin_left.ss']['FILESYSTEMSYNC'] = 'Poišči nove datoteke';
$lang['sl_SI']['AssetAdmin_left.ss']['FILESYSTEMSYNC_DESC'] = 'SilverStripe ohranja lastno zbirko podatkov o datotekah in slikah, shranjenih v vaši mapi assets/. Kliknite ta gumb, da to zbirko posodobite, če ste v mapo assets/ dodali datoteke mimo programa SilverStripe, npr. če ste datoteke naložili prek FTP.';
$lang['sl_SI']['AssetAdmin_left.ss']['FOLDERS'] = 'Mape';
$lang['sl_SI']['AssetAdmin_left.ss']['GO'] = 'Pojdi';
$lang['sl_SI']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Izberite mape, ki jih želite izbrisati, ter kliknite gumb spodaj';
$lang['sl_SI']['AssetAdmin_left.ss']['TOREORG'] = 'Če želite preurediti mape, jih povlecite okoli tako, kot želite.';
$lang['sl_SI']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Prosimo, izberite stran na levi.';
$lang['sl_SI']['AssetAdmin_right.ss']['WELCOME'] = 'Pozdravljeni v';
$lang['sl_SI']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Nimate pravic za nalaganje datotek v to mapo.';
$lang['sl_SI']['AssetAdmin_uploadiframe.ss']['TITLE'] = 'Iframe za nalaganje slike';
$lang['sl_SI']['AssetTableField']['CREATED'] = 'Najprej naloženo';
$lang['sl_SI']['AssetTableField']['DIM'] = 'Dimenzije';
$lang['sl_SI']['AssetTableField']['FILENAME'] = 'Ime datoteke';
$lang['sl_SI']['AssetTableField']['IMAGE'] = 'Slika';
$lang['sl_SI']['AssetTableField']['LASTEDIT'] = 'Nazadnje spremenjeno';
$lang['sl_SI']['AssetTableField']['MAIN'] = 'Glavno';
$lang['sl_SI']['AssetTableField']['NODATAFOUND'] = '%s ni mogoče najti.';
$lang['sl_SI']['AssetTableField']['NOLINKS'] = 'Nobena stran nima povezave na to datoteko.';
$lang['sl_SI']['AssetTableField']['OWNER'] = 'Lastnik';
$lang['sl_SI']['AssetTableField']['PAGESLINKING'] = 'Naslednje strani imajo povezavo do te datoteke:';
$lang['sl_SI']['AssetTableField']['SIZE'] = 'Velikost';
$lang['sl_SI']['AssetTableField']['TITLE'] = 'Naslov';
$lang['sl_SI']['AssetTableField']['TYPE'] = 'Vrsta';
$lang['sl_SI']['AssetTableField']['URL'] = 'URL';
$lang['sl_SI']['AssetTableField.ss']['DELFILE'] = 'Izbriši to datoteko';
$lang['sl_SI']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Povlecite v mapo na levi za premik datoteke';
$lang['sl_SI']['AssetTableField.ss']['EDIT'] = 'Uredi lastnino';
$lang['sl_SI']['AssetTableField.ss']['SHOW'] = 'Pokaži lastnino';
$lang['sl_SI']['BrokenLinksReport']['Any'] = 'Vse';
$lang['sl_SI']['BrokenLinksReport']['BROKENLINKS'] = 'Poročilo o nedelujočih povezavah';
$lang['sl_SI']['BrokenLinksReport']['CheckSite'] = 'Preveri spletišče';
$lang['sl_SI']['BrokenLinksReport']['CheckSiteDropdownDraft'] = 'Poskusno spletišče';
$lang['sl_SI']['BrokenLinksReport']['CheckSiteDropdownPublished'] = 'Objavljeno spletišče';
$lang['sl_SI']['BrokenLinksReport']['ColumnDateLastModified'] = 'Datum zadnje spremembe';
$lang['sl_SI']['BrokenLinksReport']['ColumnDateLastPublished'] = 'Datum zadnje objave';
$lang['sl_SI']['BrokenLinksReport']['ColumnProblemType'] = 'Vrsta težave';
$lang['sl_SI']['BrokenLinksReport']['ColumnURL'] = 'URL';
$lang['sl_SI']['BrokenLinksReport']['HasBrokenFile'] = 'ima okvarjeno datoteko';
$lang['sl_SI']['BrokenLinksReport']['HasBrokenLink'] = 'ima nedelujočo povezavo';
$lang['sl_SI']['BrokenLinksReport']['HasBrokenLinkAndFile'] = 'ima nedelujočo povezavo in okvarjeno datoteko';
$lang['sl_SI']['BrokenLinksReport']['HoverTitleEditPage'] = 'Uredi stran';
$lang['sl_SI']['BrokenLinksReport']['PageName'] = 'Ime strani';
$lang['sl_SI']['BrokenLinksReport']['ReasonDropdown'] = 'Preveri težavo';
$lang['sl_SI']['BrokenLinksReport']['ReasonDropdownBROKENFILE'] = 'Okvarjena datoteka';
$lang['sl_SI']['BrokenLinksReport']['ReasonDropdownBROKENLINK'] = 'Nedelujoča povezava';
$lang['sl_SI']['BrokenLinksReport']['ReasonDropdownRPBROKENLINK'] = 'Preusmeritvena stran kaže na neobstoječo stran';
$lang['sl_SI']['BrokenLinksReport']['ReasonDropdownVPBROKENLINK'] = 'Navidezna stran kaže na neobstoječo stran';
$lang['sl_SI']['BrokenLinksReport']['RedirectorNonExistent'] = 'preusmeritvena stran kaže na neobstoječo stran';
$lang['sl_SI']['BrokenLinksReport']['VirtualPageNonExistent'] = 'navidezna stran kaže na neobstoječo stran';
$lang['sl_SI']['CMSBatchActions']['DELETED_DRAFT_PAGES'] = 'Izbrisanih %d strani s poskusnega spletišča, %d neuspešnih';
$lang['sl_SI']['CMSBatchActions']['DELETED_PAGES'] = 'Izbrisanih %d strani z objavljenega spletišča, %d neuspešnih';
$lang['sl_SI']['CMSBatchActions']['DELETE_DRAFT_PAGES'] = 'Izbriši s preskusnega spletišča';
$lang['sl_SI']['CMSBatchActions']['DELETE_PAGES'] = 'Izbriši z objavljenega spletišča';
$lang['sl_SI']['CMSBatchActions']['DELETING_DRAFT_PAGES'] = 'Brisanje izbranih strani s poskusnega spletišča';
$lang['sl_SI']['CMSBatchActions']['DELETING_PAGES'] = 'Brisanje izbranih strani z objavljenega spletišča';
$lang['sl_SI']['CMSBatchActions']['PUBLISHED_PAGES'] = 'Objavljenih %d strani, %d neuspešnih';
$lang['sl_SI']['CMSBatchActions']['PUBLISHING_PAGES'] = 'Objavljanje strani';
$lang['sl_SI']['CMSBatchActions']['PUBLISH_PAGES'] = 'Objavi';
$lang['sl_SI']['CMSMain']['ACCESS'] = array(
	'Dostop do odseka \'%s\'',
	PR_MEDIUM,
	'Element v izboru pravic, ki identificira upraviteljski odsek. Primer: dostop do \'Datoteke in slike\''
);
$lang['sl_SI']['CMSMain']['ACCESSALLINTERFACES'] = 'Dostop do vseh odsekov CMS';
$lang['sl_SI']['CMSMain']['ACCESSALLINTERFACESHELP'] = 'Preglasi bolj določne nastavitve dostopa.';
$lang['sl_SI']['CMSMain']['ACCESS_HELP'] = 'Dovoli ogledovanje odseka, ki vsebuje drevo strani in vsebin. Dovoljenja za ogled in urejanje lahko upravljate prek za strani določenih spustnih menijev, kot tudi prek ločenih "Dovoljenj vsebin".';
$lang['sl_SI']['CMSMain']['CANCEL'] = 'Prekliči';
$lang['sl_SI']['CMSMain']['CHOOSEREPORT'] = '(izberite poročilo)';
$lang['sl_SI']['CMSMain']['COMPARINGV'] = 'Primerjate različici %s in %s';
$lang['sl_SI']['CMSMain']['COPYPUBTOSTAGE'] = 'Ali res želite kopirati objavljene vsebine na objavljeno stran?';
$lang['sl_SI']['CMSMain']['DESCREMOVED'] = 'in %s potomcev';
$lang['sl_SI']['CMSMain']['EMAIL'] = 'E-pošta';
$lang['sl_SI']['CMSMain']['GO'] = 'Pojdi';
$lang['sl_SI']['CMSMain']['MENUTITLE'] = array(
	'Strani',
	100,
	'Naslov v meniju'
);
$lang['sl_SI']['CMSMain']['MENUTITLEOPT'] = 'Oznaka za krmarjenje';
$lang['sl_SI']['CMSMain']['METADESCOPT'] = 'Opis';
$lang['sl_SI']['CMSMain']['METAKEYWORDSOPT'] = 'Ključne besede';
$lang['sl_SI']['CMSMain']['NEW'] = array(
	'Nova ',
	PR_MEDIUM,
	'"Nova " sledi imeRazreda (className)'
);
$lang['sl_SI']['CMSMain']['NOCONTENT'] = 'ni vsebine';
$lang['sl_SI']['CMSMain']['OK'] = 'V redu';
$lang['sl_SI']['CMSMain']['PAGENOTEXISTS'] = 'Ta stran ne obstaja';
$lang['sl_SI']['CMSMain']['PUBALLCONFIRM'] = array(
	'Prosimo, objavite vse strani na spletnem mestu s kopiranjem glavne vsebine v živo in dostopno',
	PR_LOW,
	'Potrditveni gumb'
);
$lang['sl_SI']['CMSMain']['PUBALLFUN'] = 'Funkcija "Objavi vse"';
$lang['sl_SI']['CMSMain']['PUBALLFUN2'] = 'Rezultat klika tega gumba bo enak, kot če bi kliknili "Objavi" na vsaki strani. Namenjen je uporabi po velikih spremembah vsebine, na primer ob izgradnji spletišča.';
$lang['sl_SI']['CMSMain']['PUBPAGES'] = 'Opravljeno: %d objavljenih strani';
$lang['sl_SI']['CMSMain']['REMOVED'] = 'Izbrisano \'%s\'%s z živega spletišča';
$lang['sl_SI']['CMSMain']['REMOVEDFD'] = 'Odstranjeno z neobjavljene strani';
$lang['sl_SI']['CMSMain']['REMOVEDPAGE'] = '\'%s\' odstranjeno z objavljene strani';
$lang['sl_SI']['CMSMain']['REMOVEDPAGEFROMDRAFT'] = 'Odstranjeno \'%s\' s poskusnega spletišča';
$lang['sl_SI']['CMSMain']['REPORT'] = 'Poročilo';
$lang['sl_SI']['CMSMain']['RESTORED'] = array(
	'\'%s\' je uspešno obnovljeno.',
	PR_MEDIUM,
	'Parameter %s je naslov'
);
$lang['sl_SI']['CMSMain']['ROLLBACK'] = 'Nazaj na to različico';
$lang['sl_SI']['CMSMain']['ROLLEDBACKPUB'] = 'Preklopljeno na objavljeno različico. Številka nove različice je #%d';
$lang['sl_SI']['CMSMain']['ROLLEDBACKVERSION'] = 'Preklopljeno na različico #%d. Številka nove različice je #%d';
$lang['sl_SI']['CMSMain']['STATUSOPT'] = 'Stanje';
$lang['sl_SI']['CMSMain']['TITLEOPT'] = 'Naslov';
$lang['sl_SI']['CMSMain']['TOTALPAGES'] = 'Vseh strani:';
$lang['sl_SI']['CMSMain']['VERSIONSNOPAGE'] = array(
	'Strani #%d ni mogoče najti',
	PR_LOW
);
$lang['sl_SI']['CMSMain']['VIEWING'] = array(
	'Pregledujete različico #%s, ki jo je %s ustvaril %s',
	PR_MEDIUM,
	'Številka različice je povezan niz, ki ga je v relativnem času (npr. pred 2 dnevi) ustvaril določen avtor'
);
$lang['sl_SI']['CMSMain_dialog.ss']['BUTTONNOTFOUND'] = 'Imena gumba ni mogoče najti';
$lang['sl_SI']['CMSMain_dialog.ss']['NOLINKED'] = 'Ni mogoče najti window.linkedObject, da bi poslali klik gumba nazaj glavnemu oknu';
$lang['sl_SI']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Dodano med neobjavljene strani in še ni bilo objavljeno';
$lang['sl_SI']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Dodaj kriterij ...';
$lang['sl_SI']['CMSMain_left.ss']['BATCHACTIONS'] = array(
	'Niz paketnih akcij',
	PR_HIGH
);
$lang['sl_SI']['CMSMain_left.ss']['CHANGED'] = 'spremenjeno';
$lang['sl_SI']['CMSMain_left.ss']['CLEAR'] = 'Počisti';
$lang['sl_SI']['CMSMain_left.ss']['CLEARTITLE'] = 'Počisti najdeno in pokaži vse elemente';
$lang['sl_SI']['CMSMain_left.ss']['CLOSEBOX'] = 'kliknite, če želite zapreti ta okvir';
$lang['sl_SI']['CMSMain_left.ss']['COMPAREMODE'] = 'Primerjalni način (kliknite dve spodaj)';
$lang['sl_SI']['CMSMain_left.ss']['CREATE'] = array(
	'Ustvari',
	PR_HIGH
);
$lang['sl_SI']['CMSMain_left.ss']['DEL'] = 'izbrisano';
$lang['sl_SI']['CMSMain_left.ss']['DELETECONFIRM'] = 'Izbriši izbrane strani';
$lang['sl_SI']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Izbrisano z neobjavljenih strani, vendar še vedno na objavljeni strani';
$lang['sl_SI']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Spremenjeno na neobjavljeni strani, vendar še ni objavljeno';
$lang['sl_SI']['CMSMain_left.ss']['EDITEDSINCE'] = 'Urejano od';
$lang['sl_SI']['CMSMain_left.ss']['ENABLEDRAGGING'] = array(
	'Dovoli preurejanje vleci-in-spusti',
	PR_HIGH
);
$lang['sl_SI']['CMSMain_left.ss']['FILTERLABELPAGETYPE'] = 'Vrsta strani';
$lang['sl_SI']['CMSMain_left.ss']['FILTERLABELTEXT'] = 'Besedilo';
$lang['sl_SI']['CMSMain_left.ss']['GO'] = 'Pojdi';
$lang['sl_SI']['CMSMain_left.ss']['HIDDEN'] = 'skrito';
$lang['sl_SI']['CMSMain_left.ss']['KEY'] = 'Ključ:';
$lang['sl_SI']['CMSMain_left.ss']['NEW'] = 'novo';
$lang['sl_SI']['CMSMain_left.ss']['NOTINMENU'] = 'Izključeno iz menijev krmarjenja';
$lang['sl_SI']['CMSMain_left.ss']['OPENBOX'] = 'kliknite, če želite odpreti ta okvir';
$lang['sl_SI']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Zgodovina različic strani';
$lang['sl_SI']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Objavi izbrane strani';
$lang['sl_SI']['CMSMain_left.ss']['SEARCH'] = 'Iskanje';
$lang['sl_SI']['CMSMain_left.ss']['SEARCHTITLE'] = 'Išči po URL-ju, naslovu, naslovu v meniju in vsebini';
$lang['sl_SI']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Izberite strani, ki jih želite spremeniti in nato kliknite ukaz:';
$lang['sl_SI']['CMSMain_left.ss']['SHOWITEMS'] = 'Pokaži:';
$lang['sl_SI']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Pokaži samo spremenjene strani';
$lang['sl_SI']['CMSMain_left.ss']['SHOWUNPUB'] = 'Pokaži neobjavljene različice';
$lang['sl_SI']['CMSMain_left.ss']['SITECONTENT TITLE'] = array(
	'Drevo strani',
	PR_HIGH
);
$lang['sl_SI']['CMSMain_left.ss']['SITEREPORTS'] = 'Poročila spletišča';
$lang['sl_SI']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Prosimo, izberite stran na levi strani';
$lang['sl_SI']['CMSMain_right.ss']['WELCOMETO'] = 'Pozdravljeni na';
$lang['sl_SI']['CMSMain_versions.ss']['AUTHOR'] = 'Avtor';
$lang['sl_SI']['CMSMain_versions.ss']['NOTPUB'] = 'Ni objavljeno';
$lang['sl_SI']['CMSMain_versions.ss']['PUBR'] = 'Izdajatelj';
$lang['sl_SI']['CMSMain_versions.ss']['UNKNOWN'] = 'Neznano';
$lang['sl_SI']['CMSMain_versions.ss']['WHEN'] = 'Kdaj';
$lang['sl_SI']['CMSSiteTreeFilter']['ALL'] = 'Vsi elementi';
$lang['sl_SI']['CMSSiteTreeFilter']['CHANGEDPAGES'] = 'Spremenjene strani';
$lang['sl_SI']['CMSSiteTreeFilter']['DELETEDPAGES'] = 'Vse strani, vključno z izbrisanimi';
$lang['sl_SI']['CMSSiteTreeFilter']['SEARCH'] = 'Najdi';
$lang['sl_SI']['CommentAdmin']['ACCEPT'] = 'Sprejmi';
$lang['sl_SI']['CommentAdmin']['APPROVED'] = 'Sprejetih %s komentarjev.';
$lang['sl_SI']['CommentAdmin']['APPROVEDCOMMENTS'] = 'Odobreni komentarji';
$lang['sl_SI']['CommentAdmin']['AUTHOR'] = 'Avtor';
$lang['sl_SI']['CommentAdmin']['COMMENT'] = 'Komentar';
$lang['sl_SI']['CommentAdmin']['COMMENTERURL'] = 'URL';
$lang['sl_SI']['CommentAdmin']['COMMENTSAWAITINGMODERATION'] = 'Komentarji, ki čakajo na moderiranje';
$lang['sl_SI']['CommentAdmin']['DATEPOSTED'] = 'Datum objave';
$lang['sl_SI']['CommentAdmin']['DELETE'] = 'Izbriši';
$lang['sl_SI']['CommentAdmin']['DELETEALL'] = 'Izbriši vse';
$lang['sl_SI']['CommentAdmin']['DELETED'] = 'Izbrisanih %s komentarjev';
$lang['sl_SI']['CommentAdmin']['MARKASNOTSPAM'] = 'Označi kot želeno';
$lang['sl_SI']['CommentAdmin']['MARKEDNOTSPAM'] = 'Označeni %s komentarji kot želeni';
$lang['sl_SI']['CommentAdmin']['MARKEDSPAM'] = 'Označeni %s komentarji kot neželeni';
$lang['sl_SI']['CommentAdmin']['MENUTITLE'] = array(
	'Komentarji',
	100,
	'Naslov v meniju'
);
$lang['sl_SI']['CommentAdmin']['NAME'] = 'Ime';
$lang['sl_SI']['CommentAdmin']['PAGE'] = 'Stran';
$lang['sl_SI']['CommentAdmin']['SPAM'] = 'Neželeno';
$lang['sl_SI']['CommentAdmin']['SPAMMARKED'] = 'Označi kot neželeno';
$lang['sl_SI']['CommentAdmin_SiteTree.ss']['APPROVED'] = 'Odobreno';
$lang['sl_SI']['CommentAdmin_SiteTree.ss']['AWAITMODERATION'] = 'Čakajoč na moderiranje';
$lang['sl_SI']['CommentAdmin_SiteTree.ss']['COMMENTS'] = 'Komentarji';
$lang['sl_SI']['CommentAdmin_SiteTree.ss']['SPAM'] = 'Neželeno';
$lang['sl_SI']['CommentAdmin_left.ss']['COMMENTS'] = 'Komentarji';
$lang['sl_SI']['CommentAdmin_right.ss']['WELCOME1'] = 'Dobrodošli v upravljanje komentarjev';
$lang['sl_SI']['CommentAdmin_right.ss']['WELCOME2'] = '. Izberite mapo v drevesu na levi.';
$lang['sl_SI']['CommentTableField']['FILTER'] = 'Filter';
$lang['sl_SI']['CommentTableField']['SEARCH'] = 'Iskanje';
$lang['sl_SI']['CommentTableField']['SELECTALL'] = 'Vse';
$lang['sl_SI']['CommentTableField']['SELECTNONE'] = 'Nič';
$lang['sl_SI']['CommentTableField.ss']['APPROVE'] = 'odobri';
$lang['sl_SI']['CommentTableField.ss']['APPROVECOMMENT'] = 'Odobri ta komentar';
$lang['sl_SI']['CommentTableField.ss']['DELETE'] = 'izbriši';
$lang['sl_SI']['CommentTableField.ss']['DELETEROW'] = 'Izbriši to vrstico';
$lang['sl_SI']['CommentTableField.ss']['EDIT'] = 'uredi';
$lang['sl_SI']['CommentTableField.ss']['HAM'] = 'šunka';
$lang['sl_SI']['CommentTableField.ss']['MARKASSPAM'] = 'Označi ta komentar kot neželeno vsebino';
$lang['sl_SI']['CommentTableField.ss']['MARKNOSPAM'] = 'Označi ta komentar kot želeno vsebino';
$lang['sl_SI']['CommentTableField.ss']['NOITEMSFOUND'] = 'Ni najdenih zadetkov';
$lang['sl_SI']['CommentTableField.ss']['SPAM'] = 'neželeno';
$lang['sl_SI']['ComplexTableField']['CLOSEPOPUP'] = 'Zapri pojavno okno';
$lang['sl_SI']['ComplexTableField']['SUCCESSADD'] = 'Dodano %s %s %s';
$lang['sl_SI']['Group']['IMPORTTABTITLE'] = 'Uvozi';
$lang['sl_SI']['Group']['RolesAddEditLink'] = 'Dodaj/uredi vloge';
$lang['sl_SI']['GroupImportForm']['Help1'] = '<p>Uvozite eno ali več skupin v zapisu <em>CSV</em> (z vejico ločene vrednosti). <small><a href="#" class="toggle-advanced">Pokaži napredno rabo</a></small></p>';
$lang['sl_SI']['GroupImportForm']['Help2'] = '<div class="advanced">
	<h4>Napredna raba</h4>
	<ul>
	<li>Dovoljeni stolpci: <em>%s</em></li>
	<li>Obstoječe skupine se ujemajo z lastno vrednostjo <em>Code</em> in se posodobijo z vsako novo vrednostjo iz uvožene datoteke</li>
	<li>Skupinske hierarhije lahko ustvarite z uporabo stolpca <em>ParentCode</em>.</li>
	<li>Kode pravic lahko dodelite v stolpcu <em>PermissionCode</em>. Obstoječe kode pravic niso počiščene.</li>
	</ul>
</div>';
$lang['sl_SI']['GroupImportForm']['ResultCreated'] = 'Ustvarjenih %d skupin';
$lang['sl_SI']['GroupImportForm']['ResultDeleted'] = 'Izbrisanih %d skupin';
$lang['sl_SI']['GroupImportForm']['ResultUpdated'] = 'Posodobljenih %d skupin';
$lang['sl_SI']['LeftAndMain']['CHANGEDURL'] = 'URL spremenjen v \'%s\'';
$lang['sl_SI']['LeftAndMain']['HELP'] = array(
	'Pomoč',
	PR_HIGH,
	'Naslov v meniju'
);
$lang['sl_SI']['LeftAndMain']['PAGETYPE'] = 'Vrsta strani:';
$lang['sl_SI']['LeftAndMain']['PERMAGAIN'] = 'Odjavili ste se s CMS-ja. Če se želite ponovno prijaviti, vpišite uporabniško ime in geslo spodaj.';
$lang['sl_SI']['LeftAndMain']['PERMALREADY'] = 'Žal nimate dostopa do tega dela CMS-ja. Če se želite vpisati z drugim uporabniškim imenom, naredite to spodaj';
$lang['sl_SI']['LeftAndMain']['PERMDEFAULT'] = 'Prosimo, izberite vpisno metodo in vpišite svoje dostopne podatke za vpis v CMS.';
$lang['sl_SI']['LeftAndMain']['PLEASESAVE'] = 'Prosimo, shranite stran: te strani ne morete posodobiti, ker še ni bila shranjena.';
$lang['sl_SI']['LeftAndMain']['REQUESTERROR'] = 'Napaka v obdelavi';
$lang['sl_SI']['LeftAndMain']['SAVED'] = 'shranjeno';
$lang['sl_SI']['LeftAndMain']['SAVEDUP'] = 'Shranjeno';
$lang['sl_SI']['LeftAndMain']['STATUSPUBLISHEDSUCCESS'] = array(
	'\'%s\' uspešno objavljen',
	PR_MEDIUM,
	'Sporočilo stanja po objavljanju strani, prikazovanje naslova strani'
);
$lang['sl_SI']['LeftAndMain']['STATUSTO'] = '  Stanje spremenjeno v \'%s\'';
$lang['sl_SI']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'To je različica';
$lang['sl_SI']['LeftAndMain.ss']['APPVERSIONTEXT2'] = ', ki se trenutno izvaja, tehnično je CVS panoga';
$lang['sl_SI']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['sl_SI']['LeftAndMain.ss']['LOADING'] = array(
	'Nalaganje ...',
	PR_HIGH
);
$lang['sl_SI']['LeftAndMain.ss']['LOGGEDINAS'] = 'Prijavljeni kot';
$lang['sl_SI']['LeftAndMain.ss']['LOGOUT'] = 'odjavi';
$lang['sl_SI']['LeftAndMain.ss']['REQUIREJS'] = array(
	'Za uporabo CMS morate imeti vključen JavaScript.',
	PR_HIGH
);
$lang['sl_SI']['LeftAndMain.ss']['SSWEB'] = 'Spletna stran Silverstripe';
$lang['sl_SI']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Stran:';
$lang['sl_SI']['LeftAndMain_right.ss']['WELCOMETO'] = 'Dobrodošli v';
$lang['sl_SI']['MathSpamProtection']['EIGHT'] = 'osem';
$lang['sl_SI']['MathSpamProtection']['EIGHTEEN'] = 'osemnajst';
$lang['sl_SI']['MathSpamProtection']['ELEVEN'] = 'enajst';
$lang['sl_SI']['MathSpamProtection']['FIFTEEN'] = 'petnajst';
$lang['sl_SI']['MathSpamProtection']['FIVE'] = 'pet';
$lang['sl_SI']['MathSpamProtection']['FOUR'] = 'štiri';
$lang['sl_SI']['MathSpamProtection']['FOURTEEN'] = 'štirinajst';
$lang['sl_SI']['MathSpamProtection']['NINE'] = 'devet';
$lang['sl_SI']['MathSpamProtection']['ONE'] = 'en';
$lang['sl_SI']['MathSpamProtection']['SEVEN'] = 'sedem';
$lang['sl_SI']['MathSpamProtection']['SEVENTEEN'] = 'sedemnajst';
$lang['sl_SI']['MathSpamProtection']['SIX'] = 'šest';
$lang['sl_SI']['MathSpamProtection']['SIXTEEN'] = 'šestnajst';
$lang['sl_SI']['MathSpamProtection']['TEN'] = 'deset';
$lang['sl_SI']['MathSpamProtection']['THIRTEEN'] = 'trinajst';
$lang['sl_SI']['MathSpamProtection']['THREE'] = 'tri';
$lang['sl_SI']['MathSpamProtection']['TWELVE'] = 'dvanajst';
$lang['sl_SI']['MathSpamProtection']['TWO'] = 'dva';
$lang['sl_SI']['MathSpamProtection']['WHATIS'] = 'Koliko je %s plus %s?';
$lang['sl_SI']['MathSpamProtection']['ZERO'] = 'nič';
$lang['sl_SI']['MemberImportForm']['Help1'] = '<p>Uvozi člane v <em>zapisu CSV</em> (z vejico ločene vrednosti). <small><a href="#" class="toggle-advanced">Pokaži napredno rabo</a></small></p>';
$lang['sl_SI']['MemberImportForm']['Help2'] = '<div class="advanced">
	<h4>Napredna raba</h4>
	<ul>
	<li>Dovoljeni stolpci: <em>%s</em></li>
	<li>Obstoječi člani se ujemajo z lastno vrednostjo <em>Code</em> in se posodobijo z vsako novo vrednostjo iz uvožene datoteke.</li>
	<li>Skupine lahko dodelite z uporabo stolpca <em>Groups</em>. Skupine identificira njihova lastnost <em>Code</em>, več skupin je lahko ločenih z vejico. Obstoječa članstva v skupinah niso počiščena.</li>
	</ul>
</div>';
$lang['sl_SI']['MemberImportForm']['ResultCreated'] = 'Ustvarjenih %d članov';
$lang['sl_SI']['MemberImportForm']['ResultDeleted'] = 'Izbrisanih %d članov';
$lang['sl_SI']['MemberImportForm']['ResultNone'] = 'Ni sprememb';
$lang['sl_SI']['MemberImportForm']['ResultUpdated'] = 'Posodobljenih %d članov';
$lang['sl_SI']['MemberList.ss']['FILTER'] = array(
	'Filtriraj',
	50,
	'Filtriraj kot glagol'
);
$lang['sl_SI']['MemberList_PageControls.ss']['DISPLAYING'] = 'Prikazovanje';
$lang['sl_SI']['MemberList_PageControls.ss']['FIRSTMEMBERS'] = 'članov';
$lang['sl_SI']['MemberList_PageControls.ss']['LASTMEMBERS'] = 'članov';
$lang['sl_SI']['MemberList_PageControls.ss']['NEXTMEMBERS'] = 'članov';
$lang['sl_SI']['MemberList_PageControls.ss']['OF'] = 'od';
$lang['sl_SI']['MemberList_PageControls.ss']['PREVIOUSMEMBERS'] = 'članov';
$lang['sl_SI']['MemberList_PageControls.ss']['TO'] = 'do';
$lang['sl_SI']['MemberList_PageControls.ss']['VIEWFIRST'] = 'Pokaži prvega';
$lang['sl_SI']['MemberList_PageControls.ss']['VIEWLAST'] = 'Pokaži zadnjega';
$lang['sl_SI']['MemberList_PageControls.ss']['VIEWNEXT'] = 'Pokaži naslednjega';
$lang['sl_SI']['MemberList_PageControls.ss']['VIEWPREVIOUS'] = 'Pokaži prejšnjega';
$lang['sl_SI']['MemberList_Table.ss']['EMAIL'] = 'E-poštni naslov';
$lang['sl_SI']['MemberList_Table.ss']['FN'] = 'Ime';
$lang['sl_SI']['MemberList_Table.ss']['PASSWD'] = 'Geslo';
$lang['sl_SI']['MemberList_Table.ss']['SN'] = 'Priimek';
$lang['sl_SI']['MemberTableField']['ADD'] = 'Dodaj';
$lang['sl_SI']['MemberTableField']['ADDEDTOGROUP'] = 'Član dodan v skupino';
$lang['sl_SI']['MemberTableField']['ADDINGFIELD'] = 'Dodajanje neuspešno';
$lang['sl_SI']['MemberTableField']['DeleteTitleText'] = array(
	'Izbriši iz te skupine',
	PR_MEDIUM,
	'Lebdeče besedilo gumba Izbriši'
);
$lang['sl_SI']['MemberTableField']['DeleteTitleTextDatabase'] = array(
	'Izbriši iz zbirke podatkov in vseh skupin',
	PR_MEDIUM,
	'Lebdeče besedilo gumba Izbriši'
);
$lang['sl_SI']['MemberTableField']['ERRORADDINGUSER'] = 'Pri dodajanju uporabnika v skupino je prišlo do napake: %s';
$lang['sl_SI']['MemberTableField']['FILTER'] = 'Filter';
$lang['sl_SI']['MemberTableField']['SEARCH'] = 'Najdi';
$lang['sl_SI']['MemberTableField.ss']['ADDNEW'] = array(
	'Dodaj novega',
	50,
	'Sledi vrsta člana'
);
$lang['sl_SI']['MemberTableField.ss']['NOITEMSFOUND'] = 'Ni zadetkov';
$lang['sl_SI']['ModelAdmin']['ADDBUTTON'] = 'Dodaj';
$lang['sl_SI']['ModelAdmin']['ADDFORM'] = 'Izpolnite ta obrazec, če želite dodati %s zbirki podatkov.';
$lang['sl_SI']['ModelAdmin']['CHOOSE_COLUMNS'] = 'Izberite stolpce rezultatov ...';
$lang['sl_SI']['ModelAdmin']['CLEAR_SEARCH'] = 'Počisti iskanje';
$lang['sl_SI']['ModelAdmin']['CREATEBUTTON'] = array(
	'Izdelaj \'%s\'',
	PR_MEDIUM,
	'Izdelaj novo pojavitev iz razrednega modela'
);
$lang['sl_SI']['ModelAdmin']['DELETE'] = 'Izbriši';
$lang['sl_SI']['ModelAdmin']['DELETEDRECORDS'] = 'Izbrisanih %s zapisov.';
$lang['sl_SI']['ModelAdmin']['FOUNDRESULTS'] = 'Vaše iskanje je vrnilo %s zadetkov';
$lang['sl_SI']['ModelAdmin']['GOBACK'] = 'Nazaj';
$lang['sl_SI']['ModelAdmin']['GOFORWARD'] = 'Naprej';
$lang['sl_SI']['ModelAdmin']['IMPORT'] = 'Uvozi iz CSV';
$lang['sl_SI']['ModelAdmin']['IMPORTEDRECORDS'] = 'Uvoženih %s zapisov.';
$lang['sl_SI']['ModelAdmin']['ITEMNOTFOUND'] = 'Tega elementa ni mogoče najti';
$lang['sl_SI']['ModelAdmin']['LOADEDFOREDITING'] = 'Naloženo \'%s\' za urejanje.';
$lang['sl_SI']['ModelAdmin']['NOCSVFILE'] = 'Poiščite datoteko CSV, ki jo želite uvoziti';
$lang['sl_SI']['ModelAdmin']['NOIMPORT'] = 'Nič ni primerno za uvoz';
$lang['sl_SI']['ModelAdmin']['NORESULTS'] = 'Ni rezultatov';
$lang['sl_SI']['ModelAdmin']['SAVE'] = 'Shrani';
$lang['sl_SI']['ModelAdmin']['SEARCHFOR'] = 'Išči:';
$lang['sl_SI']['ModelAdmin']['SEARCHRESULTS'] = 'Rezultati iskanja';
$lang['sl_SI']['ModelAdmin']['SELECTALL'] = 'izberi vse';
$lang['sl_SI']['ModelAdmin']['SELECTNONE'] = 'ne izberi ničesar';
$lang['sl_SI']['ModelAdmin']['UPDATEDRECORDS'] = 'Posodobljenih %s zapisov.';
$lang['sl_SI']['ModelAdmin_ImportSpec.ss']['IMPORTSPECFIELDS'] = 'Stolpci zbirke podatkov';
$lang['sl_SI']['ModelAdmin_ImportSpec.ss']['IMPORTSPECLINK'] = 'Pokaži specifikacijo za %s';
$lang['sl_SI']['ModelAdmin_ImportSpec.ss']['IMPORTSPECRELATIONS'] = 'Odnosi';
$lang['sl_SI']['ModelAdmin_ImportSpec.ss']['IMPORTSPECTITLE'] = 'Specifikacija za %s';
$lang['sl_SI']['ModelAdmin_right.ss']['WELCOME1'] = 'Dobrodošli v %s. Izberite enega od vnosov v levem podoknu.';
$lang['sl_SI']['ModelSidebar.ss']['ADDLISTING'] = 'Dodaj';
$lang['sl_SI']['ModelSidebar.ss']['IMPORT_TAB_HEADER'] = 'Uvozi';
$lang['sl_SI']['ModelSidebar.ss']['SEARCHLISTINGS'] = 'Najdi';
$lang['sl_SI']['PageComment']['COMMENTBY'] = array(
	'Komentiral \'%s\' dne %s',
	PR_MEDIUM,
	'Ime, Naslov strani'
);
$lang['sl_SI']['PageComment']['Comment'] = 'Komentar';
$lang['sl_SI']['PageComment']['IsSpam'] = 'Neželeno?';
$lang['sl_SI']['PageComment']['Name'] = 'Ime avtorja';
$lang['sl_SI']['PageComment']['NeedsModeration'] = 'Je potrebno moderiranje?';
$lang['sl_SI']['PageComment']['PLURALNAME'] = array(
	'Komentarji strani',
	50,
	'Množinsko ime predmeta, uporabljeno v seznamskih poljih in za splošno identifikacijo nabora tega predmeta v vmesniku'
);
$lang['sl_SI']['PageComment']['SINGULARNAME'] = array(
	'Komentar strani',
	50,
	'Edninsko ime predmeta, uporabljeno v seznamskih poljih in za posamezno identifikacijo tega predmeta v vmesniku'
);
$lang['sl_SI']['PageCommentInterface']['COMMENTERURL'] = 'URL vašega spletišča';
$lang['sl_SI']['PageCommentInterface']['DELETEALLCOMMENTS'] = 'Izbriši vse komentarje na tej strani';
$lang['sl_SI']['PageCommentInterface']['POST'] = 'Objavi';
$lang['sl_SI']['PageCommentInterface']['SPAMQUESTION'] = 'Vprašanje zaščite pred neželenimi objavami: %s';
$lang['sl_SI']['PageCommentInterface']['YOURCOMMENT'] = 'Komentarji';
$lang['sl_SI']['PageCommentInterface']['YOURNAME'] = 'Vaše ime';
$lang['sl_SI']['PageCommentInterface.ss']['COMMENTLOGINERROR'] = 'Komentarjev ne morete objavljati, dokler niste prijavljeni';
$lang['sl_SI']['PageCommentInterface.ss']['COMMENTPERMISSIONERROR'] = 'in imate ustrezne ravni pravic';
$lang['sl_SI']['PageCommentInterface.ss']['COMMENTPOSTLOGIN'] = 'Prijavite se tukaj';
$lang['sl_SI']['PageCommentInterface.ss']['COMMENTS'] = 'Komentarji';
$lang['sl_SI']['PageCommentInterface.ss']['COMMENTSDISABLED'] = 'Objavljanje komentarjev je bilo onemogočeno';
$lang['sl_SI']['PageCommentInterface.ss']['NEXT'] = 'naprej';
$lang['sl_SI']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Na tej strani ni še nihče pustil komentarja.';
$lang['sl_SI']['PageCommentInterface.ss']['POSTCOM'] = 'Pošlji svoj komentar';
$lang['sl_SI']['PageCommentInterface.ss']['PREV'] = 'nazaj';
$lang['sl_SI']['PageCommentInterface.ss']['RSSFEEDALLCOMMENTS'] = 'Vir RSS za vse komentarje';
$lang['sl_SI']['PageCommentInterface.ss']['RSSFEEDCOMMENTS'] = 'Vir RSS za komentarje na to stran';
$lang['sl_SI']['PageCommentInterface.ss']['RSSVIEWALLCOMMENTS'] = 'Pokaži vse komentarje';
$lang['sl_SI']['PageCommentInterface_Controller']['SPAMQUESTION'] = 'Vprašanje zaščite pred neželeno vsebino: %s';
$lang['sl_SI']['PageCommentInterface_Form']['AWAITINGMODERATION'] = 'Vaš komentar je bil oddan in zdaj čaka na moderiranje.';
$lang['sl_SI']['PageCommentInterface_Form']['MSGYOUPOSTED'] = 'Sporočilo, ki ste ga objavili:';
$lang['sl_SI']['PageCommentInterface_Form']['SPAMDETECTED'] = 'Zaznana neželena vsebina!!';
$lang['sl_SI']['PageCommentInterface_singlecomment.ss']['APPROVE'] = 'odobri ta komentar';
$lang['sl_SI']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'ta komentar ni neželen';
$lang['sl_SI']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'ta komentar je neželen';
$lang['sl_SI']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Objavil';
$lang['sl_SI']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'odstrani ta komentar';
$lang['sl_SI']['Permission']['CMS_ACCESS_CATEGORY'] = 'Dostop do sistema CMS';
$lang['sl_SI']['Permissions']['PERMISSIONS_CATEGORY'] = 'Vloge in pravice dostopa';
$lang['sl_SI']['ReportAdmin']['MENUTITLE'] = array(
	'Poročila',
	100,
	'Naslov v meniju'
);
$lang['sl_SI']['ReportAdminForm']['FILTERBY'] = 'Filtriraj glede na';
$lang['sl_SI']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Poročila';
$lang['sl_SI']['ReportAdmin_left.ss']['REPORTS'] = 'Poročila';
$lang['sl_SI']['ReportAdmin_right.ss']['WELCOME1'] = array(
	'Dobrodošli v odseku poročil',
	50,
	'Sledi ime programa'
);
$lang['sl_SI']['ReportAdmin_right.ss']['WELCOME2'] = array(
	'. Prosimo, izberite specifično poročilo na levi strani.',
	50
);
$lang['sl_SI']['SecurityAdmin']['ACCESS_HELP'] = 'Omogoči ogledovanje, dodajanje in urejanje uporabnikov, kot tudi dodeljevanje pravic in vlog.';
$lang['sl_SI']['SecurityAdmin']['ADDMEMBER'] = 'Dodaj člana';
$lang['sl_SI']['SecurityAdmin']['APPLY_ROLES'] = 'Uporabi vloge na skupinah';
$lang['sl_SI']['SecurityAdmin']['APPLY_ROLES_HELP'] = 'Možnost urejanja vlog, dodeljenih skupini. Zahteva pravico "Dostop do odseka \'Varnost\'".';
$lang['sl_SI']['SecurityAdmin']['EDITPERMISSIONS'] = 'Upravljaj s pravicami skupin';
$lang['sl_SI']['SecurityAdmin']['EDITPERMISSIONS_HELP'] = 'Možnost urejanja pravic in naslovov IP za skupino. Zahteva pravico "Dostop do odseka \'Varnost\'".';
$lang['sl_SI']['SecurityAdmin']['MENUTITLE'] = array(
	'Varnost',
	100,
	'Naslov v meniju'
);
$lang['sl_SI']['SecurityAdmin']['MemberListCaution'] = 'Pozor: Odstranitev članov s tega seznama jih bo odstranila iz vseh skupin in zbirke podatkov';
$lang['sl_SI']['SecurityAdmin']['NEWGROUP'] = 'Nova skupina';
$lang['sl_SI']['SecurityAdmin']['SAVE'] = 'Shrani';
$lang['sl_SI']['SecurityAdmin']['SGROUPS'] = 'Varnostne skupine';
$lang['sl_SI']['SecurityAdmin']['TABIMPORT'] = 'Uvozi';
$lang['sl_SI']['SecurityAdmin']['TABROLES'] = 'Vloge';
$lang['sl_SI']['SecurityAdmin_MemberImportForm']['BtnImport'] = 'Uvozi';
$lang['sl_SI']['SecurityAdmin_MemberImportForm']['FileFieldLabel'] = 'Datoteka CSV <small>(dovoljene končnice: *.csv)</small>';
$lang['sl_SI']['SecurityAdmin_left.ss']['CREATE'] = 'Ustvari';
$lang['sl_SI']['SecurityAdmin_left.ss']['DEL'] = 'Izbriši';
$lang['sl_SI']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Izbriši izbrane skupine';
$lang['sl_SI']['SecurityAdmin_left.ss']['ENABLEDRAGGING'] = array(
	'Dovoli preurejanje povleci-in-spusti',
	PR_HIGH
);
$lang['sl_SI']['SecurityAdmin_left.ss']['GO'] = 'Pojdi';
$lang['sl_SI']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Varnostne skupine';
$lang['sl_SI']['SecurityAdmin_left.ss']['SELECT'] = 'Izberite strani, ki jih želite izbrisati, ter kliknite gumb spodaj';
$lang['sl_SI']['SecurityAdmin_left.ss']['TOREORG'] = 'Za reorganizacijo spletnega mesta povlecite strani naokrog po želji';
$lang['sl_SI']['SecurityAdmin_right.ss']['WELCOME1'] = array(
	'Dobrodošli v odseku varnostnega upravljanja',
	50,
	'Sledi ime programa'
);
$lang['sl_SI']['SecurityAdmin_right.ss']['WELCOME2'] = array(
	'. Prosimo, izberite skupino na levi strani.',
	50
);
$lang['sl_SI']['SideReport']['BROKENFILES'] = 'Strani z okvarjenimi datotekami';
$lang['sl_SI']['SideReport']['BROKENLINKS'] = 'Strani z nedelujočimi povezavami';
$lang['sl_SI']['SideReport']['BROKENREDIRECTORPAGES'] = 'Preusmeritvene strani, ki kažejo na izbrisane strani';
$lang['sl_SI']['SideReport']['BROKENVIRTUALPAGES'] = 'Navidezne strani, ki kažejo na izbrisane strani';
$lang['sl_SI']['SideReport']['BrokenLinksGroupTitle'] = 'Poročila o nedelujočih povezavah';
$lang['sl_SI']['SideReport']['ContentGroupTitle'] = 'Vsebinska poročila';
$lang['sl_SI']['SideReport']['EMPTYPAGES'] = 'Prazne strani';
$lang['sl_SI']['SideReport']['LAST2WEEKS'] = 'Strani spremenjene v zadnjih dveh tednih';
$lang['sl_SI']['SideReport']['OtherGroupTitle'] = 'Drugo';
$lang['sl_SI']['SideReport']['ParameterLiveCheckbox'] = 'Preveri živo spletišče';
$lang['sl_SI']['SideReport']['REPEMPTY'] = array(
	'Poročilo %s je prazno.',
	PR_MEDIUM,
	'%s je naslov poročila'
);
$lang['sl_SI']['SideReport']['TODO'] = 'Strani z opravki';
$lang['sl_SI']['StaticExporter']['BASEURL'] = 'Osnovni URL';
$lang['sl_SI']['StaticExporter']['EXPORTTO'] = 'Izvozi v to mapo';
$lang['sl_SI']['StaticExporter']['FOLDEREXPORT'] = 'Mapa za izvoz';
$lang['sl_SI']['StaticExporter']['NAME'] = 'Statični izvoznik';
$lang['sl_SI']['TableListField']['SELECT'] = 'Izberite:';
$lang['sl_SI']['TableListField.ss']['NOITEMSFOUND'] = 'Ni zadetkov';
$lang['sl_SI']['TableListField.ss']['SORTASC'] = 'Razvrsti naraščajoče';
$lang['sl_SI']['TableListField.ss']['SORTDESC'] = 'Razvrsti padajoče';
$lang['sl_SI']['TableListField_PageControls.ss']['DISPLAYING'] = 'Prikazovanje';
$lang['sl_SI']['TableListField_PageControls.ss']['OF'] = 'od';
$lang['sl_SI']['TableListField_PageControls.ss']['TO'] = 'za';
$lang['sl_SI']['TableListField_PageControls.ss']['VIEWFIRST'] = 'Pokaži prve';
$lang['sl_SI']['TableListField_PageControls.ss']['VIEWLAST'] = 'Pokaži zadnje';
$lang['sl_SI']['TableListField_PageControls.ss']['VIEWNEXT'] = 'Pokaži naslednje';
$lang['sl_SI']['TableListField_PageControls.ss']['VIEWPREVIOUS'] = 'Pokaži prejšnje';
$lang['sl_SI']['ThumbnailStripField']['NOFLASHFOUND'] = 'Ni najdenih datotek flash';
$lang['sl_SI']['ThumbnailStripField']['NOFOLDERFLASHFOUND'] = 'Ni najdenih datotek flash v';
$lang['sl_SI']['ThumbnailStripField']['NOFOLDERIMAGESFOUND'] = 'Ni najdenih slik v';
$lang['sl_SI']['ThumbnailStripField']['NOIMAGESFOUND'] = 'Ni najdenih slik';
$lang['sl_SI']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(izberite mapo zgoraj)';
$lang['sl_SI']['ViewArchivedEmail.ss']['CANACCESS'] = 'Do arhviranega spletišča lahko dostopate na povezavi:';
$lang['sl_SI']['ViewArchivedEmail.ss']['HAVEASKED'] = array(
	'Prosili ste za vpogled v vsebino našega spletišča dne',
	30,
	'Sledi datum'
);
$lang['sl_SI']['WidgetAreaEditor.ss']['AVAILABLE'] = 'Gradniki na voljo';
$lang['sl_SI']['WidgetAreaEditor.ss']['AVAILWIDGETS'] = 'Kliknite naslov gradnika spodaj, da ga uporabite na tej strani.';
$lang['sl_SI']['WidgetAreaEditor.ss']['INUSE'] = 'Trenutno uporabljeni gradniki';
$lang['sl_SI']['WidgetAreaEditor.ss']['NOAVAIL'] = 'Trenutno ni na voljo noben gradnik.';
$lang['sl_SI']['WidgetAreaEditor.ss']['TOSORT'] = 'Če želite razvrstiti trenutno uporabljene gradnike na tej strani, jih povlecite gor in dol.';
$lang['sl_SI']['WidgetDescription.ss']['CLICKTOADDWIDGET'] = 'Kliknite za dodajanje tega gradnika';
$lang['sl_SI']['WidgetEditor.ss']['DELETE'] = 'Izbriši';

?>