<?php

/**
 * Slovenian (Slovenia) language pack
 * @package sapphire
 * @subpackage i18n
 */

i18n::include_locale_file('sapphire', 'en_US');

global $lang;

if(array_key_exists('sl_SI', $lang) && is_array($lang['sl_SI'])) {
	$lang['sl_SI'] = array_merge($lang['en_US'], $lang['sl_SI']);
} else {
	$lang['sl_SI'] = $lang['en_US'];
}

$lang['sl_SI']['Page']['PLURALNAME'] = array(
	'Str',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Page']['SINGULARNAME'] = array(
	'Stran',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['AdvancedSearchForm']['ALLWORDS'] = 'Vse besede';
$lang['sl_SI']['AdvancedSearchForm']['ATLEAST'] = 'Najmanj eno izmed besed';
$lang['sl_SI']['AdvancedSearchForm']['EXACT'] = 'Natančen izraz';
$lang['sl_SI']['AdvancedSearchForm']['FROM'] = 'Od';
$lang['sl_SI']['AdvancedSearchForm']['GO'] = 'Pojdi';
$lang['sl_SI']['AdvancedSearchForm']['LASTUPDATED'] = 'Nazadnje posodobljeno';
$lang['sl_SI']['AdvancedSearchForm']['LASTUPDATEDHEADER'] = 'NAZADNJE POSODOBLJENO';
$lang['sl_SI']['AdvancedSearchForm']['PAGETITLE'] = 'Naslov strani';
$lang['sl_SI']['AdvancedSearchForm']['RELEVANCE'] = 'Pomembnost';
$lang['sl_SI']['AdvancedSearchForm']['SEARCHBY'] = 'IŠČI PO';
$lang['sl_SI']['AdvancedSearchForm']['SORTBY'] = 'REZULTATE RAZVRSTI GLEDE NA';
$lang['sl_SI']['AdvancedSearchForm']['TO'] = 'Do';
$lang['sl_SI']['AdvancedSearchForm']['WITHOUT'] = 'Brez besed';
$lang['sl_SI']['AssetAdmin']['CHOOSEFILE'] = 'Izberite datoteko: ';
$lang['sl_SI']['BBCodeParser']['ALIGNEMENT'] = 'Poravnava';
$lang['sl_SI']['BBCodeParser']['ALIGNEMENTEXAMPLE'] = 'desno poravnano';
$lang['sl_SI']['BBCodeParser']['BOLD'] = 'Krepko besedilo';
$lang['sl_SI']['BBCodeParser']['BOLDEXAMPLE'] = 'Krepko';
$lang['sl_SI']['BBCodeParser']['CODE'] = 'Blok kode';
$lang['sl_SI']['BBCodeParser']['CODEDESCRIPTION'] = 'Neoblikovan blok kode';
$lang['sl_SI']['BBCodeParser']['CODEEXAMPLE'] = 'Blok kode';
$lang['sl_SI']['BBCodeParser']['COLORED'] = 'Obarvano besedilo';
$lang['sl_SI']['BBCodeParser']['COLOREDEXAMPLE'] = 'modro besedilo';
$lang['sl_SI']['BBCodeParser']['EMAILLINK'] = 'E-poštna povezava';
$lang['sl_SI']['BBCodeParser']['EMAILLINKDESCRIPTION'] = 'Ustvari povezavo na e-poštni naslov';
$lang['sl_SI']['BBCodeParser']['IMAGE'] = 'Slika';
$lang['sl_SI']['BBCodeParser']['IMAGEDESCRIPTION'] = 'Pokaži sliko v moji objavi';
$lang['sl_SI']['BBCodeParser']['ITALIC'] = 'Ležeče besedilo';
$lang['sl_SI']['BBCodeParser']['ITALICEXAMPLE'] = 'Ležeče';
$lang['sl_SI']['BBCodeParser']['LINK'] = 'Spletna povezava';
$lang['sl_SI']['BBCodeParser']['LINKDESCRIPTION'] = 'Povezava na drugo spletišče ali URL';
$lang['sl_SI']['BBCodeParser']['STRUCK'] = 'Prečrtano besedilo';
$lang['sl_SI']['BBCodeParser']['STRUCKEXAMPLE'] = 'Prečrtano';
$lang['sl_SI']['BBCodeParser']['UNDERLINE'] = 'Podčrtano besedilo';
$lang['sl_SI']['BBCodeParser']['UNDERLINEEXAMPLE'] = 'Podčrtano';
$lang['sl_SI']['BBCodeParser']['UNORDERED'] = 'Neoštevilčen seznam';
$lang['sl_SI']['BBCodeParser']['UNORDEREDDESCRIPTION'] = 'Neoštevilčen seznam';
$lang['sl_SI']['BBCodeParser']['UNORDEREDEXAMPLE1'] = 'neoštevilčen element 1';
$lang['sl_SI']['BasicAuth']['ENTERINFO'] = 'Vnesite uporabniško ime in geslo.';
$lang['sl_SI']['BasicAuth']['ERRORNOTADMIN'] = 'Ta uporabnik ni skrbnik.';
$lang['sl_SI']['BasicAuth']['ERRORNOTREC'] = 'To uporabniško ime / geslo ni prepoznano.';
$lang['sl_SI']['Boolean']['ANY'] = 'karkoli';
$lang['sl_SI']['Boolean']['NO'] = 'Ne';
$lang['sl_SI']['Boolean']['YES'] = 'Da';
$lang['sl_SI']['CMSMain']['DELETE'] = 'Izbriši s poskusnega spletišča';
$lang['sl_SI']['CMSMain']['DELETEFP'] = 'Izbriši z objavljenega spletišča';
$lang['sl_SI']['CMSMain']['RESTORE'] = 'Obnovi';
$lang['sl_SI']['CMSMain']['SAVE'] = 'Shrani';
$lang['sl_SI']['ChangePasswordEmail.ss']['CHANGEPASSWORDTEXT1'] = array(
	'Spremenili ste svoje geslo za',
	PR_MEDIUM,
	'za url'
);
$lang['sl_SI']['ChangePasswordEmail.ss']['CHANGEPASSWORDTEXT2'] = 'Zdaj lahko uporabite naslednje podatke za prijavo:';
$lang['sl_SI']['ChangePasswordEmail.ss']['EMAIL'] = 'E-poštni naslov';
$lang['sl_SI']['ChangePasswordEmail.ss']['HELLO'] = 'Pozdravljeni';
$lang['sl_SI']['ChangePasswordEmail.ss']['PASSWORD'] = 'Geslo';
$lang['sl_SI']['CheckboxField']['NO'] = 'Ne';
$lang['sl_SI']['CheckboxField']['YES'] = 'Da';
$lang['sl_SI']['ComplexTableField']['CLOSEPOPUP'] = 'Zapri pojavno okno';
$lang['sl_SI']['ComplexTableField']['SUCCESSADD'] = 'Dodano %s %s %s';
$lang['sl_SI']['ComplexTableField']['SUCCESSEDIT'] = 'Shranjeno %s %s %s';
$lang['sl_SI']['ComplexTableField.ss']['ADDITEM'] = array(
	'Dodaj - %s',
	PR_MEDIUM,
	'Dodaj [ime]'
);
$lang['sl_SI']['ComplexTableField.ss']['CSVEXPORT'] = 'Izvozi v CSV';
$lang['sl_SI']['ComplexTableField.ss']['NOITEMSFOUND'] = 'Ni zadetkov';
$lang['sl_SI']['ComplexTableField.ss']['SORTASC'] = 'Razvrsti naraščajoče';
$lang['sl_SI']['ComplexTableField.ss']['SORTDESC'] = 'Razvrsti padajoče';
$lang['sl_SI']['ComplexTableField_popup.ss']['NEXT'] = 'Naslednji';
$lang['sl_SI']['ComplexTableField_popup.ss']['PREVIOUS'] = 'Prejšnji';
$lang['sl_SI']['ConfirmedPasswordField']['ATLEAST'] = 'Geslo mora biti dolgo najmanj %s znakov.';
$lang['sl_SI']['ConfirmedPasswordField']['BETWEEN'] = 'Gesla morajo biti dolga med %s in %s znakov.';
$lang['sl_SI']['ConfirmedPasswordField']['HAVETOMATCH'] = 'Gesli se morata ujemati.';
$lang['sl_SI']['ConfirmedPasswordField']['LEASTONE'] = 'Gesla morajo vsebovati najmanj eno števko in en alfanumerični znak.';
$lang['sl_SI']['ConfirmedPasswordField']['MAXIMUM'] = 'Gesla lahko merijo največ %s znakov.';
$lang['sl_SI']['ConfirmedPasswordField']['NOEMPTY'] = 'Gesla ne smejo biti prazna.';
$lang['sl_SI']['ConfirmedPasswordField']['SHOWONCLICKTITLE'] = array(
	'Spremeni geslo',
	PR_MEDIUM,
	'Label of the link which triggers display of the "change password" formfields'
);
$lang['sl_SI']['ContentControl']['NOTEWONTBESHOWN'] = 'Opomba: to sproočilo ne bo vidno vašim obiskovalcem.';
$lang['sl_SI']['ContentController']['ARCHIVEDSITE'] = 'Arhivirano spletišče';
$lang['sl_SI']['ContentController']['ARCHIVEDSITEFROM'] = 'Arhivirano spletišče z';
$lang['sl_SI']['ContentController']['CMS'] = 'CMS';
$lang['sl_SI']['ContentController']['DRAFTSITE'] = 'Poskusno spletišče';
$lang['en_US']['ContentController']['DRAFT_SITE_ACCESS_RESTRICTION'] = 'You must log in with your CMS password in order to view the draft or archived content.  <a href="%s">Click here to go back to the published site.</a>';
$lang['sl_SI']['ContentController']['LOGGEDINAS'] = 'Prijavljeni kot';
$lang['sl_SI']['ContentController']['LOGIN'] = 'Prijavi';
$lang['sl_SI']['ContentController']['LOGOUT'] = 'Odjavi';
$lang['sl_SI']['ContentController']['NOTLOGGEDIN'] = 'Niste prijavljeni';
$lang['sl_SI']['ContentController']['PUBLISHEDSITE'] = 'Objavljeno spletišče';
$lang['sl_SI']['ContentController']['VIEWPAGEIN'] = 'Pokaži stran v:';
$lang['sl_SI']['CreditCardField']['FIRST'] = 'prvo';
$lang['sl_SI']['CreditCardField']['FOURTH'] = 'četrto';
$lang['sl_SI']['CreditCardField']['SECOND'] = 'drugo';
$lang['sl_SI']['CreditCardField']['THIRD'] = 'tretjo';
$lang['sl_SI']['CreditCardField']['VALIDATIONJS1'] = 'Zagotovite, da ste pravilno vnesli';
$lang['sl_SI']['CreditCardField']['VALIDATIONJS2'] = 'številko kreditne kartice.';
$lang['sl_SI']['CurrencyField']['CURRENCYSYMBOL'] = '€';
$lang['sl_SI']['CurrencyField']['VALIDATIONJS'] = 'Vnesite veljavno geslo.';
$lang['sl_SI']['DataObject']['PLURALNAME'] = array(
	'Podatkovni predmeti',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['DataObject']['SINGULARNAME'] = array(
	'Podatkovni predmet',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['Date']['DAY'] = ' dan';
$lang['sl_SI']['Date']['DAYS'] = ' dni';
$lang['sl_SI']['Date']['HOUR'] = ' ura';
$lang['sl_SI']['Date']['HOURS'] = ' ur';
$lang['sl_SI']['Date']['MIN'] = ' min';
$lang['sl_SI']['Date']['MINS'] = ' minut';
$lang['sl_SI']['Date']['MONTH'] = ' mesec';
$lang['sl_SI']['Date']['MONTHS'] = ' mesecev';
$lang['sl_SI']['Date']['SEC'] = ' s';
$lang['sl_SI']['Date']['SECS'] = ' s';
$lang['sl_SI']['Date']['TIMEDIFFAGO'] = array(
	'pred %s',
	PR_MEDIUM,
	'Natural language time difference, e.g. 2 hours ago'
);
$lang['sl_SI']['Date']['TIMEDIFFAWAY'] = array(
	'%s narazen',
	PR_MEDIUM,
	'Natural language time difference, e.g. 2 hours away'
);
$lang['sl_SI']['Date']['YEAR'] = ' leto';
$lang['sl_SI']['Date']['YEARS'] = ' let';
$lang['sl_SI']['DateField']['NOTSET'] = 'ni določeno';
$lang['sl_SI']['DateField']['TODAY'] = 'danes';
$lang['sl_SI']['DateField']['VALIDATIONJS'] = 'Vnesite datum v veljavni obliki.';
$lang['sl_SI']['DateField']['VALIDDATEFORMAT2'] = 'Vnesite datum v veljavni obliki (%s).';
$lang['en_US']['DateField']['VALIDDATEMAXDATE'] = 'Your date has to be older or matching the maximum allowed date (%s)';
$lang['en_US']['DateField']['VALIDDATEMINDATE'] = 'Your date has to be newer or matching the minimum allowed date (%s)';
$lang['sl_SI']['DropdownField']['CHOOSE'] = array(
	'(izberite)',
	PR_MEDIUM,
	'start value of a dropdown'
);
$lang['sl_SI']['EmailField']['VALIDATION'] = 'Vnesite e-poštni naslov.';
$lang['sl_SI']['EmailField']['VALIDATIONJS'] = 'Vnesite e-poštni naslov.';
$lang['en_US']['Email_BounceRecord']['PLURALNAME'] = array(
	'Email Bounce Records',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['Email_BounceRecord']['SINGULARNAME'] = array(
	'Email Bounce Record',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['Enum']['ANY'] = 'Vse';
$lang['sl_SI']['ErrorPage']['400'] = '400 - Slaba zahteva';
$lang['en_US']['ErrorPage']['401'] = '401 - Unauthorized';
$lang['sl_SI']['ErrorPage']['403'] = '403 - Prepovedno';
$lang['sl_SI']['ErrorPage']['404'] = '404 - Ni mogoče najti';
$lang['sl_SI']['ErrorPage']['405'] = '405 - Metoda ni dovoljena';
$lang['sl_SI']['ErrorPage']['406'] = '406 - Ni sprejemljivo';
$lang['en_US']['ErrorPage']['407'] = '407 - Proxy Authentication Required';
$lang['en_US']['ErrorPage']['408'] = '408 - Request Timeout';
$lang['sl_SI']['ErrorPage']['409'] = '409 - Spor';
$lang['en_US']['ErrorPage']['410'] = '410 - Gone';
$lang['en_US']['ErrorPage']['411'] = '411 - Length Required';
$lang['en_US']['ErrorPage']['412'] = '412 - Precondition Failed';
$lang['en_US']['ErrorPage']['413'] = '413 - Request Entity Too Large';
$lang['en_US']['ErrorPage']['414'] = '414 - Request-URI Too Long';
$lang['en_US']['ErrorPage']['415'] = '415 - Unsupported Media Type';
$lang['en_US']['ErrorPage']['416'] = '416 - Request Range Not Satisfiable';
$lang['en_US']['ErrorPage']['417'] = '417 - Expectation Failed';
$lang['en_US']['ErrorPage']['500'] = '500 - Internal Server Error';
$lang['en_US']['ErrorPage']['501'] = '501 - Not Implemented';
$lang['en_US']['ErrorPage']['502'] = '502 - Bad Gateway';
$lang['en_US']['ErrorPage']['503'] = '503 - Service Unavailable';
$lang['en_US']['ErrorPage']['504'] = '504 - Gateway Timeout';
$lang['en_US']['ErrorPage']['505'] = '505 - HTTP Version Not Supported';
$lang['sl_SI']['ErrorPage']['CODE'] = 'Koda napake';
$lang['en_US']['ErrorPage']['DEFAULTERRORPAGECONTENT'] = '<p>Sorry, it seems you were trying to access a page that doesn\'t exist.</p><p>Please check the spelling of the URL you were trying to access and try again.</p>';
$lang['sl_SI']['ErrorPage']['DEFAULTERRORPAGETITLE'] = 'Strani ni mogoče najti';
$lang['en_US']['ErrorPage']['DEFAULTSERVERERRORPAGECONTENT'] = '<p>Sorry, there was a problem with handling your request.</p>';
$lang['sl_SI']['ErrorPage']['DEFAULTSERVERERRORPAGETITLE'] = 'Napaka strežnika';
$lang['en_US']['ErrorPage']['ERRORFILEPROBLEM'] = 'Error opening file "%s" for writing. Please check file permissions.';
$lang['sl_SI']['ErrorPage']['PLURALNAME'] = array(
	'Strani napake',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['ErrorPage']['SINGULARNAME'] = array(
	'Stran napake',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['File']['Content'] = 'Vsebina';
$lang['sl_SI']['File']['Filename'] = 'Ime datoteke';
$lang['en_US']['File']['INVALIDEXTENSION'] = array(
	'Extension is not allowed (valid: %s)',
	PR_MEDIUM,
	'Argument 1: Comma-separated list of valid extensions'
);
$lang['sl_SI']['File']['NOFILESIZE'] = 'Velikost datoteke je nič bajtov.';
$lang['sl_SI']['File']['NOVALIDUPLOAD'] = 'Datoteka ni veljaven prenos na strežnik.';
$lang['sl_SI']['File']['Name'] = 'Ime';
$lang['sl_SI']['File']['PLURALNAME'] = array(
	'Datoteke',
	50,
	'Množinsko ime predmeta, uporabljeno v seznamskih poljih in za splošno poimenovanje nabora tovrstnih predmetov v uporabniškem vmesniku.'
);
$lang['sl_SI']['File']['SINGULARNAME'] = array(
	'Datoteka',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['File']['Sort'] = 'Sort Order';
$lang['sl_SI']['File']['TOOLARGE'] = array(
	'Datoteka je prevelika, največja velikost je %s.',
	PR_MEDIUM,
	'Argument 1: Filesize (e.g. 1MB)'
);
$lang['sl_SI']['File']['Title'] = 'Naslov';
$lang['sl_SI']['FileIFrameField']['ATTACH'] = 'Pripni %s';
$lang['en_US']['FileIFrameField']['ATTACHONCESAVED'] = '%ss can be attached once you have saved the record for the first time.';
$lang['sl_SI']['FileIFrameField']['DELETE'] = 'Izbriši %s';
$lang['sl_SI']['FileIFrameField']['FILE'] = 'Datoteka';
$lang['sl_SI']['FileIFrameField']['FROMCOMPUTER'] = 'Z vašega računalnika';
$lang['en_US']['FileIFrameField']['FROMFILESTORE'] = 'From the File Store';
$lang['en_US']['FileIFrameField']['NOSOURCE'] = 'Please select a source file to attach';
$lang['sl_SI']['FileIFrameField']['REPLACE'] = 'Zamenjaj %s';
$lang['en_US']['FileIFrameField.ss']['TITLE'] = 'Image Uploading Iframe';
$lang['en_US']['Folder']['CREATED'] = 'First Uploaded';
$lang['sl_SI']['Folder']['DELETEUNUSEDTHUMBNAILS'] = 'Izbriši neuporabljene sličice za predogled';
$lang['sl_SI']['Folder']['DELSELECTED'] = 'Izbriši izbrane datoteke';
$lang['sl_SI']['Folder']['DETAILSTAB'] = 'Podrobnosti';
$lang['sl_SI']['Folder']['FILENAME'] = 'Ime datoteke';
$lang['sl_SI']['Folder']['FILESTAB'] = 'Datoteke';
$lang['sl_SI']['Folder']['LASTEDITED'] = 'Nazadnje posodobljeno';
$lang['sl_SI']['Folder']['PLURALNAME'] = array(
	'Datoteke',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Folder']['SINGULARNAME'] = array(
	'Datoteka',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['Folder']['TITLE'] = 'Naslov';
$lang['sl_SI']['Folder']['TYPE'] = 'Vrsta';
$lang['sl_SI']['Folder']['UNUSEDFILESTAB'] = 'Neuporabljene datoteke';
$lang['sl_SI']['Folder']['UNUSEDFILESTITLE'] = 'Neuporabljene datoteke';
$lang['sl_SI']['Folder']['UNUSEDTHUMBNAILSTITLE'] = 'Neuporabljene sličice za predogled';
$lang['sl_SI']['Folder']['UPLOADTAB'] = 'Prenesi na strežnik';
$lang['sl_SI']['Folder']['URL'] = 'URL';
$lang['en_US']['Folder']['VIEWASSET'] = 'View Asset';
$lang['en_US']['Folder']['VIEWEDITASSET'] = 'View/Edit Asset';
$lang['sl_SI']['ForgotPasswordEmail.ss']['HELLO'] = 'Pozdravljeni';
$lang['sl_SI']['ForgotPasswordEmail.ss']['TEXT1'] = 'Tukaj je vaša';
$lang['sl_SI']['ForgotPasswordEmail.ss']['TEXT2'] = 'povezava za ponastavitev gesla';
$lang['sl_SI']['ForgotPasswordEmail.ss']['TEXT3'] = 'za';
$lang['sl_SI']['Form']['FIELDISREQUIRED'] = '%s je obvezen';
$lang['sl_SI']['Form']['LANGAOTHER'] = 'Drugi jeziki';
$lang['sl_SI']['Form']['LANGAVAIL'] = 'Jeziki na voljo';
$lang['en_US']['Form']['VALIDATIONCREDITNUMBER'] = 'Please ensure you have entered the %s credit card number correctly.';
$lang['en_US']['Form']['VALIDATIONFAILED'] = 'Validation failed';
$lang['sl_SI']['Form']['VALIDATIONNOTUNIQUE'] = 'Vnesena vrednost ni enkratna';
$lang['sl_SI']['Form']['VALIDATIONPASSWORDSDONTMATCH'] = 'Gesli se ne ujemata';
$lang['sl_SI']['Form']['VALIDATIONPASSWORDSNOTEMPTY'] = 'Geslo ne sme biti prazno';
$lang['sl_SI']['Form']['VALIDATIONSTRONGPASSWORD'] = 'Gesla morajo vsebovati vsaj eno števko in en alfanumerični znak.';
$lang['en_US']['Form']['VALIDATOR'] = 'Validator';
$lang['sl_SI']['Form']['VALIDCURRENCY'] = 'Vnesite veljavno valuto.';
$lang['sl_SI']['FormField']['NONE'] = 'noben';
$lang['sl_SI']['Group']['Code'] = array(
	'Koda skupine',
	PR_MEDIUM,
	'Programska koda, ki določa skupino'
);
$lang['sl_SI']['Group']['DefaultGroupTitleAdministrators'] = 'Skrbniki';
$lang['sl_SI']['Group']['DefaultGroupTitleContentAuthors'] = 'Avtorji vsebine';
$lang['sl_SI']['Group']['Description'] = 'Opis';
$lang['sl_SI']['Group']['IPRestrictions'] = 'Omejitve naslova IP';
$lang['en_US']['Group']['Locked'] = array(
	'Locked?',
	PR_MEDIUM,
	'Group is locked in the security administration area'
);
$lang['sl_SI']['Group']['PLURALNAME'] = array(
	'Skupine',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Group']['Parent'] = array(
	'Starševska skupina',
	PR_MEDIUM,
	'One group has one parent group'
);
$lang['sl_SI']['Group']['SINGULARNAME'] = array(
	'Skupina',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['Group']['Sort'] = 'Sort Order';
$lang['sl_SI']['Group']['has_many_Permissions'] = array(
	'Pravice',
	PR_MEDIUM,
	'Ena skupina ima več pravic'
);
$lang['sl_SI']['Group']['many_many_Members'] = array(
	'Člani',
	PR_MEDIUM,
	'Ona skupina ima več članov'
);
$lang['sl_SI']['HtmlEditorField']['ANCHORVALUE'] = 'Sidro';
$lang['sl_SI']['HtmlEditorField']['BUTTONINSERTFLASH'] = 'Vstavi Flash';
$lang['sl_SI']['HtmlEditorField']['BUTTONINSERTIMAGE'] = 'Vstavi sliko';
$lang['sl_SI']['HtmlEditorField']['BUTTONINSERTLINK'] = 'Vstavi povezavo';
$lang['sl_SI']['HtmlEditorField']['BUTTONREMOVELINK'] = 'Odstrani povezavo';
$lang['sl_SI']['HtmlEditorField']['CAPTIONTEXT'] = 'Besedilo napisa';
$lang['sl_SI']['HtmlEditorField']['CLOSE'] = 'zapri';
$lang['sl_SI']['HtmlEditorField']['CSSCLASS'] = 'Poravnava / slog';
$lang['sl_SI']['HtmlEditorField']['CSSCLASSCENTER'] = 'Sredinsko, samo zase.';
$lang['sl_SI']['HtmlEditorField']['CSSCLASSLEFT'] = 'Na levi, z besedilom ovitim okoli.';
$lang['sl_SI']['HtmlEditorField']['CSSCLASSLEFTALONE'] = 'Na levi, samo zase.';
$lang['sl_SI']['HtmlEditorField']['CSSCLASSRIGHT'] = 'Na desni, z besedilom ovitim okoli.';
$lang['sl_SI']['HtmlEditorField']['EMAIL'] = 'E-poštni naslov';
$lang['sl_SI']['HtmlEditorField']['FILE'] = 'Datoteka';
$lang['sl_SI']['HtmlEditorField']['FLASH'] = 'Flash';
$lang['sl_SI']['HtmlEditorField']['FOLDER'] = 'Mapa';
$lang['sl_SI']['HtmlEditorField']['IMAGE'] = 'Slika';
$lang['sl_SI']['HtmlEditorField']['IMAGEALTTEXT'] = 'Nadomestno besedilo (alt) - izpiše se, če slike ni prikazana';
$lang['sl_SI']['HtmlEditorField']['IMAGEDIMENSIONS'] = 'Mere';
$lang['sl_SI']['HtmlEditorField']['IMAGEHEIGHTPX'] = 'Višina';
$lang['sl_SI']['HtmlEditorField']['IMAGETITLE'] = 'Besedilo napisa (namiga) - dodatne informacije o sliki';
$lang['sl_SI']['HtmlEditorField']['IMAGEWIDTHPX'] = 'Širina';
$lang['sl_SI']['HtmlEditorField']['LINK'] = 'Povezava';
$lang['sl_SI']['HtmlEditorField']['LINKANCHOR'] = 'Sidrano na to stran';
$lang['sl_SI']['HtmlEditorField']['LINKDESCR'] = 'Opis povezave';
$lang['sl_SI']['HtmlEditorField']['LINKEMAIL'] = 'E-poštni naslov';
$lang['sl_SI']['HtmlEditorField']['LINKEXTERNAL'] = 'Drugo spletišče';
$lang['sl_SI']['HtmlEditorField']['LINKFILE'] = 'Prenesi datoteko';
$lang['sl_SI']['HtmlEditorField']['LINKINTERNAL'] = 'Stran na spletišču';
$lang['sl_SI']['HtmlEditorField']['LINKOPENNEWWIN'] = 'Želite odpreti povezavo v novem oknu?';
$lang['en_US']['HtmlEditorField']['LINKTEXT'] = 'Link text';
$lang['sl_SI']['HtmlEditorField']['LINKTO'] = 'Poveži z';
$lang['sl_SI']['HtmlEditorField']['PAGE'] = 'Stran';
$lang['sl_SI']['HtmlEditorField']['SEARCHFILENAME'] = 'Išči po imenih datotek';
$lang['sl_SI']['HtmlEditorField']['SHOWUPLOADFORM'] = 'Prenesi datoteko na strežnik';
$lang['sl_SI']['HtmlEditorField']['URL'] = 'URL';
$lang['sl_SI']['Image']['PLURALNAME'] = array(
	'Datoteke',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Image']['SINGULARNAME'] = array(
	'Datoteka',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['ImageField']['IMAGE'] = 'Slika';
$lang['sl_SI']['Image_Cached']['PLURALNAME'] = array(
	'Datoteke',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Image_Cached']['SINGULARNAME'] = array(
	'Datoteka',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['Image_iframe.ss']['TITLE'] = 'Image Uploading Iframe';
$lang['sl_SI']['LoginAttempt']['Email'] = 'E-poštni naslov';
$lang['sl_SI']['LoginAttempt']['IP'] = 'IP-naslov';
$lang['sl_SI']['LoginAttempt']['PLURALNAME'] = array(
	'Poskusi prijave',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['LoginAttempt']['SINGULARNAME'] = array(
	'Poskus prijave',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['LoginAttempt']['Status'] = 'Stanje';
$lang['sl_SI']['Member']['ADDRESS'] = 'Naslov';
$lang['sl_SI']['Member']['BUTTONCHANGEPASSWORD'] = 'Spremeni geslo';
$lang['sl_SI']['Member']['BUTTONLOGIN'] = 'Prijavi';
$lang['sl_SI']['Member']['BUTTONLOGINOTHER'] = 'Prijavite se z drugim imenom';
$lang['sl_SI']['Member']['BUTTONLOSTPASSWORD'] = 'Pozabil(a) sem svoje geslo';
$lang['sl_SI']['Member']['CONFIRMNEWPASSWORD'] = 'Potrdite novo geslo';
$lang['sl_SI']['Member']['CONFIRMPASSWORD'] = 'Potrdite geslo';
$lang['sl_SI']['Member']['CONTACTINFO'] = 'Podatki o stiku';
$lang['en_US']['Member']['DefaultAdminFirstname'] = 'Default Admin';
$lang['sl_SI']['Member']['DefaultDateTime'] = 'privzeto';
$lang['sl_SI']['Member']['EMAIL'] = 'E-poštni naslov';
$lang['en_US']['Member']['EMAILSIGNUPINTRO1'] = 'Thanks for signing up to become a new member, your details are listed below for future reference.';
$lang['en_US']['Member']['EMAILSIGNUPINTRO2'] = 'You can login to the website using the credentials listed below';
$lang['sl_SI']['Member']['EMAILSIGNUPSUBJECT'] = 'Hvala za prijavo';
$lang['sl_SI']['Member']['EMPTYNEWPASSWORD'] = 'Novo geslo ne sme biti prazno, poskusite znova.';
$lang['en_US']['Member']['ENTEREMAIL'] = 'Please enter an email address to get a password reset link.';
$lang['en_US']['Member']['ERRORLOCKEDOUT'] = 'Your account has been temporarily disabled because of too many failed attempts at logging in. Please try again in 20 minutes.';
$lang['en_US']['Member']['ERRORNEWPASSWORD'] = 'You have entered your new password differently, try again';
$lang['en_US']['Member']['ERRORPASSWORDNOTMATCH'] = 'Your current password does not match, please try again';
$lang['en_US']['Member']['ERRORWRONGCRED'] = 'That doesn\'t seem to be the right e-mail address or password. Please try again.';
$lang['sl_SI']['Member']['FIRSTNAME'] = 'Ime';
$lang['sl_SI']['Member']['GREETING'] = 'Dobrodošli';
$lang['sl_SI']['Member']['INTERFACELANG'] = array(
	'Jezik vmesnika',
	PR_MEDIUM,
	'Jezik CMS'
);
$lang['sl_SI']['Member']['INVALIDNEWPASSWORD'] = 'Tega gesla ne moremo sprejeti: %s';
$lang['sl_SI']['Member']['LOGGEDINAS'] = 'Prijavljeni ste kot %s.';
$lang['sl_SI']['Member']['MOBILE'] = 'Mobilna št.';
$lang['sl_SI']['Member']['NAME'] = 'Ime';
$lang['sl_SI']['Member']['NEWPASSWORD'] = 'Novo geslo';
$lang['sl_SI']['Member']['PASSWORD'] = 'Geslo';
$lang['sl_SI']['Member']['PASSWORDCHANGED'] = 'Vaše geslo je bilo spremenjeno, kopijo boste prejeli po e-pošti.';
$lang['sl_SI']['Member']['PERSONALDETAILS'] = array(
	'Osebni podatki',
	PR_MEDIUM,
	'Headline for formfields'
);
$lang['sl_SI']['Member']['PHONE'] = 'Telefon';
$lang['sl_SI']['Member']['PLURALNAME'] = array(
	'Člani',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Member']['PROFILESAVESUCCESS'] = 'Uspešno shranjeno.';
$lang['en_US']['Member']['REMEMBERME'] = 'Remember me next time?';
$lang['sl_SI']['Member']['SINGULARNAME'] = array(
	'Član',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['Member']['SUBJECTPASSWORDCHANGED'] = array(
	'Vaše geslo je bilo spremenjeno',
	PR_MEDIUM,
	'Email subject'
);
$lang['sl_SI']['Member']['SUBJECTPASSWORDRESET'] = array(
	'Povezava za ponastavitev vašega gesla',
	PR_MEDIUM,
	'Email subject'
);
$lang['sl_SI']['Member']['SURNAME'] = 'Priimek';
$lang['sl_SI']['Member']['USERDETAILS'] = array(
	'Podrobnosti o uporabniku',
	PR_MEDIUM,
	'Headline for formfields'
);
$lang['sl_SI']['Member']['VALIDATIONMEMBEREXISTS'] = 'Član z enakim %s že obstaja';
$lang['en_US']['Member']['ValidationIdentifierFailed'] = array(
	'Can\'t overwrite existing member #%d with identical identifier (%s = %s))',
	PR_MEDIUM,
	'The values in brackets show a fieldname mapped to a value, usually denoting an existing email address'
);
$lang['sl_SI']['Member']['WELCOMEBACK'] = 'Dobrodošli nazaj, %s';
$lang['sl_SI']['Member']['YOUROLDPASSWORD'] = 'Vaše staro geslo';
$lang['sl_SI']['Member']['belongs_many_many_Groups'] = array(
	'Skupine',
	PR_MEDIUM,
	'Security Groups this member belongs to'
);
$lang['sl_SI']['Member']['db_LastVisited'] = 'Datum zadnjega obiska';
$lang['sl_SI']['Member']['db_Locale'] = 'Krajevna nastavitev vmesnika';
$lang['en_US']['Member']['db_LockedOutUntil'] = array(
	'Locked out until',
	PR_MEDIUM,
	'Security related date'
);
$lang['sl_SI']['Member']['db_NumVisit'] = 'Število obiskov';
$lang['sl_SI']['Member']['db_Password'] = 'Geslo';
$lang['sl_SI']['Member']['db_PasswordExpiry'] = array(
	'Datum poteka veljavnosti gesla',
	PR_MEDIUM,
	'Password expiry date'
);
$lang['sl_SI']['MemberAuthenticator']['TITLE'] = 'E-pošta in geslo';
$lang['sl_SI']['MemberDatetimeOptionsetField']['AMORPM'] = array(
	'AM (Ante meridiem) ali PM (Post meridiem)',
	40,
	'Help text describing what "a" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['Custom'] = 'Po meri';
$lang['sl_SI']['MemberDatetimeOptionsetField']['DATEFORMATBAD'] = 'Oblika datuma ni veljavna';
$lang['sl_SI']['MemberDatetimeOptionsetField']['DAYNOLEADING'] = array(
	'Dan v mesecu brez vodilne ničle',
	40,
	'Help text describing what "d" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['DIGITSDECFRACTIONSECOND'] = array(
	'One or more digits representing a decimal fraction of a second',
	40,
	'Help text describing what "s" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['FOURDIGITYEAR'] = array(
	'Štirištevilčno leto',
	40,
	'Help text describing what "YYYY" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['FULLNAMEMONTH'] = array(
	'Polno ime meseca (npr. junij)',
	40,
	'Help text describing what "MMMM" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['HOURNOLEADING'] = array(
	'Ura brez vodilne ničle',
	40,
	'Help text describing what "h" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['MINUTENOLEADING'] = array(
	'Minute brez vodilne ničle',
	40,
	'Help text describing what "m" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['MONTHNOLEADING'] = array(
	'Month digit without leading zero',
	40,
	'Help text describing what "M" means in ISO date formatting'
);
$lang['sl_SI']['MemberDatetimeOptionsetField']['Preview'] = 'Predogled';
$lang['en_US']['MemberDatetimeOptionsetField']['SHORTMONTH'] = array(
	'Short name of month (e.g. Jun)',
	40,
	'Help text letting describing what "MMM" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TOGGLEHELP'] = 'Toggle formatting help';
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITDAY'] = array(
	'Two-digit day of month',
	40,
	'Help text describing what "dd" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITHOUR'] = array(
	'Two digits of hour (00 through 23)',
	40,
	'Help text describing what "hh" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITMINUTE'] = array(
	'Two digits of minute (00 through 59)',
	40,
	'Help text describing what "mm" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITMONTH'] = array(
	'Two-digit month (01=January, etc.)',
	40,
	'Help text describing what "MM" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITSECOND'] = array(
	'Two digits of second (00 through 59)',
	40,
	'Help text describing what "ss" means in ISO date formatting'
);
$lang['en_US']['MemberDatetimeOptionsetField']['TWODIGITYEAR'] = array(
	'Two-digit year',
	40,
	'Help text describing what "YY" means in ISO date formatting'
);
$lang['sl_SI']['MemberPassword']['PLURALNAME'] = array(
	'Gesla uporabnikov',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['MemberPassword']['SINGULARNAME'] = array(
	'Geslo uporabnika',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['MoneyField']['FIELDLABELAMOUNT'] = 'Znesek';
$lang['sl_SI']['MoneyField']['FIELDLABELCURRENCY'] = 'Valuta';
$lang['en_US']['MyEntity']['MyNamespace'] = 'My default natural language value';
$lang['en_US']['MyNamespace']['MYENTITY'] = 'Counting %s things';
$lang['en_US']['NullableField']['IsNullLabel'] = array(
	'Is Null',
	PR_HIGH
);
$lang['en_US']['NumericField']['VALIDATION'] = '\'%s\' is not a number, only numbers can be accepted for this field';
$lang['en_US']['NumericField']['VALIDATIONJS'] = 'is not a number, only numbers can be accepted for this field';
$lang['sl_SI']['Permission']['AdminGroup'] = 'Skrbnik';
$lang['sl_SI']['Permission']['FULLADMINRIGHTS'] = 'Polne skrbniške pravice';
$lang['en_US']['Permission']['FULLADMINRIGHTS_HELP'] = 'Implies and overrules all other assigned permissions.';
$lang['sl_SI']['Permission']['PLURALNAME'] = array(
	'Pravice',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['Permission']['SINGULARNAME'] = array(
	'Pravica',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['PermissionCheckboxSetField']['AssignedTo'] = 'dodeljeno "%s"';
$lang['sl_SI']['PermissionCheckboxSetField']['FromGroup'] = array(
	'podedovano iz skupine "%s"',
	PR_MEDIUM,
	'A permission inherited from a certain group'
);
$lang['sl_SI']['PermissionCheckboxSetField']['FromRole'] = array(
	'podedovano iz vloge "%s"',
	PR_MEDIUM,
	'A permission inherited from a certain permission role'
);
$lang['sl_SI']['PermissionCheckboxSetField']['FromRoleOnGroup'] = array(
	'podedovano iz vloge "%s" v skupini "%s"',
	PR_MEDIUM,
	'A permission inherited from a role on a certain group'
);
$lang['sl_SI']['PermissionRole']['PLURALNAME'] = array(
	'Vloge',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['PermissionRole']['SINGULARNAME'] = array(
	'Vloga',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['PermissionRoleCode']['PLURALNAME'] = array(
	'Permission Role Cods',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['PermissionRoleCode']['SINGULARNAME'] = array(
	'Permission Role Code',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['Permissions']['CONTENT_CATEGORY'] = 'Pravice za vsebine';
$lang['sl_SI']['Permissions']['PERMISSIONS_CATEGORY'] = 'Vloge in pravice dostopa';
$lang['sl_SI']['PhoneNumberField']['VALIDATION'] = 'Vnesite veljavno telefonsko številko';
$lang['en_US']['QueuedEmail']['PLURALNAME'] = array(
	'Queued Emails',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['QueuedEmail']['SINGULARNAME'] = array(
	'Queued Email',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['RedirectorPage']['HASBEENSETUP'] = 'A redirector page has been set up without anywhere to redirect to.';
$lang['en_US']['RedirectorPage']['HEADER'] = 'This page will redirect users to another page';
$lang['en_US']['RedirectorPage']['OTHERURL'] = 'Other website URL';
$lang['en_US']['RedirectorPage']['PLURALNAME'] = array(
	'Redirector Pags',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['RedirectorPage']['REDIRECTTO'] = 'Preusmeri na';
$lang['sl_SI']['RedirectorPage']['REDIRECTTOEXTERNAL'] = 'drugo spletišče';
$lang['sl_SI']['RedirectorPage']['REDIRECTTOPAGE'] = 'stran na vašem spletišču';
$lang['sl_SI']['RedirectorPage']['SINGULARNAME'] = array(
	'Preusmeritvena stran',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['RedirectorPage']['YOURPAGE'] = 'Stran na vašem spletišču';
$lang['sl_SI']['RelationComplexTableField.ss']['ADD'] = 'Dodaj';
$lang['sl_SI']['RelationComplexTableField.ss']['CSVEXPORT'] = 'Izvozi v CSV';
$lang['sl_SI']['RelationComplexTableField.ss']['NOTFOUND'] = 'Ni zadetkov';
$lang['sl_SI']['RemoveOrphanedPagesTask']['BUTTONRUN'] = 'Zaženi';
$lang['sl_SI']['RemoveOrphanedPagesTask']['CHOOSEOPERATION'] = 'Izberite dejanje:';
$lang['sl_SI']['RemoveOrphanedPagesTask']['DELETEWARNING'] = 'Opozorilo: teh dejanj ni mogoče preklicati in povrniti. Bodite previdni.';
$lang['sl_SI']['RemoveOrphanedPagesTask']['HEADER'] = 'Odstrani vse osirotele strani - opravilo';
$lang['sl_SI']['RemoveOrphanedPagesTask']['NONEFOUND'] = 'Ni najdenih sirot';
$lang['en_US']['RemoveOrphanedPagesTask']['NONEREMOVED'] = 'None removed';
$lang['en_US']['RemoveOrphanedPagesTask']['OPERATION_REMOVE'] = 'Remove selected from all stages (WARNING: Will destroy all selected pages from both stage and live)';
$lang['sl_SI']['RemoveOrphanedPagesTask']['SELECTALL'] = 'izberi vse';
$lang['sl_SI']['RemoveOrphanedPagesTask']['UNSELECTALL'] = 'ne izberi nič';
$lang['sl_SI']['SearchForm']['GO'] = 'Išči';
$lang['sl_SI']['SearchForm']['SEARCH'] = 'Najdi';
$lang['sl_SI']['SearchForm']['SearchResults'] = 'Rezultati iskanja';
$lang['en_US']['Security']['ALREADYLOGGEDIN'] = array(
	'You don\'t have access to this page.  If you have another account that can access that page, you can log in again below.',
	PR_MEDIUM,
	'%s will be replaced with a link to log in.'
);
$lang['en_US']['Security']['BUTTONSEND'] = 'Send me the password reset link';
$lang['sl_SI']['Security']['CHANGEPASSWORDBELOW'] = 'Spodaj lahko spremenite svoje geslo.';
$lang['sl_SI']['Security']['CHANGEPASSWORDHEADER'] = 'Spremenite geslo';
$lang['sl_SI']['Security']['ENTERNEWPASSWORD'] = 'Vnesite novo geslo.';
$lang['en_US']['Security']['ERRORPASSWORDPERMISSION'] = 'You must be logged in in order to change your password!';
$lang['sl_SI']['Security']['IPADDRESSES'] = 'IP-naslovi';
$lang['en_US']['Security']['LOGGEDOUT'] = 'You have been logged out.  If you would like to log in again, enter your credentials below.';
$lang['sl_SI']['Security']['LOGIN'] = 'Prijavi se';
$lang['sl_SI']['Security']['LOSTPASSWORDHEADER'] = 'Pozabljeno geslo';
$lang['en_US']['Security']['NOTEPAGESECURED'] = 'That page is secured. Enter your credentials below and we will send you right along.';
$lang['en_US']['Security']['NOTERESETLINKINVALID'] = '<p>The password reset link is invalid or expired.</p><p>You can request a new one <a href="%s">here</a> or change your password after you <a href="%s">logged in</a>.</p>';
$lang['en_US']['Security']['NOTERESETPASSWORD'] = 'Enter your e-mail address and we will send you a link with which you can reset your password';
$lang['en_US']['Security']['PASSWORDSENTHEADER'] = 'Password reset link sent to \'%s\'';
$lang['en_US']['Security']['PASSWORDSENTTEXT'] = 'Thank you! A reset link has been sent to  \'%s\', provided an account exists for this email address.';
$lang['sl_SI']['SecurityAdmin']['GROUPNAME'] = 'Ime skupine';
$lang['en_US']['SecurityAdmin']['IPADDRESSESHELP'] = '<p>You can restrict this group to a particular 
						IP address range (one range per line). <br />Ranges can be in any of the following forms: <br />
						203.96.152.12<br />
						203.96.152/24<br />
						203.96/16<br />
						203/8<br /><br />If you enter one or more IP address ranges in this box, then members will only get
						the rights of being in this group if they log on from one of the valid IP addresses.  It won\'t prevent
						people from logging in.  This is because the same user might have to log in to access parts of the
						system without IP address restrictions.';
$lang['sl_SI']['SecurityAdmin']['MEMBERS'] = 'Člani';
$lang['sl_SI']['SecurityAdmin']['NEWGROUPPREFIX'] = 'novo-';
$lang['sl_SI']['SecurityAdmin']['PERMISSIONS'] = 'Pravice';
$lang['sl_SI']['SecurityAdmin']['ROLES'] = 'Vloge';
$lang['en_US']['SecurityAdmin']['ROLESDESCRIPTION'] = 'This section allows you to add roles to this group. Roles are logical groupings of permissions, which can be editied in the Roles tab';
$lang['sl_SI']['SecurityAdmin']['VIEWUSER'] = 'Pokaži uporabnika';
$lang['en_US']['SilverStripeNavigatorLink']['ShareInstructions'] = 'To share a this to this page, copy and paste the link below.';
$lang['en_US']['SilverStripeNavigatorLink']['ShareLink'] = 'Share link';
$lang['sl_SI']['SilverStripeNavigatorLinkl']['CloseLink'] = 'Zapri';
$lang['en_US']['SimpleImageField']['NOUPLOAD'] = 'No Image Uploaded';
$lang['sl_SI']['SiteConfig']['DEFAULTTHEME'] = '(uporabi privzeto temo)';
$lang['sl_SI']['SiteConfig']['EDITHEADER'] = 'Kdo lahko ureja strani na tem spletišču?';
$lang['en_US']['SiteConfig']['EDIT_PERMISSION'] = 'Manage site configuration';
$lang['en_US']['SiteConfig']['EDIT_PERMISSION_HELP'] = 'Ability to edit global access settings/top-level page permissions.';
$lang['en_US']['SiteConfig']['PLURALNAME'] = array(
	'Site Configs',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['SiteConfig']['SINGULARNAME'] = array(
	'Site Config',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['SiteConfig']['SITENAMEDEFAULT'] = 'Ime vašega spletišča';
$lang['sl_SI']['SiteConfig']['SITETAGLINE'] = 'Slogan spletišča';
$lang['sl_SI']['SiteConfig']['SITETITLE'] = 'Naziv spletišča';
$lang['sl_SI']['SiteConfig']['TABACCESS'] = 'Dostop';
$lang['sl_SI']['SiteConfig']['TABMAIN'] = 'Glavno';
$lang['sl_SI']['SiteConfig']['TAGLINEDEFAULT'] = 'tukaj sodi vaš slogan';
$lang['sl_SI']['SiteConfig']['THEME'] = 'Tema';
$lang['sl_SI']['SiteConfig']['TOPLEVELCREATE'] = 'Kdo sme ustvarjati strani v korenu spletišča?';
$lang['sl_SI']['SiteConfig']['VIEWHEADER'] = 'Kdo lahko vidi strani na tem spletišču?';
$lang['sl_SI']['SiteTree']['ACCESSANYONE'] = 'Vsakdo';
$lang['sl_SI']['SiteTree']['ACCESSHEADER'] = 'Kdo lahko vidi to stran?';
$lang['sl_SI']['SiteTree']['ACCESSLOGGEDIN'] = 'Prijavljeni uporabniki';
$lang['sl_SI']['SiteTree']['ACCESSONLYTHESE'] = 'Samo naslednje osebe (izberite s seznama)';
$lang['sl_SI']['SiteTree']['ADDEDTODRAFT'] = 'Dodano na poskustno spletišče';
$lang['sl_SI']['SiteTree']['ALLOWCOMMENTS'] = 'Želite dovoliti komentarje na tej strani?';
$lang['en_US']['SiteTree']['APPEARSVIRTUALPAGES'] = 'This content also appears on the virtual pages in the %s sections.';
$lang['sl_SI']['SiteTree']['BUTTONCANCELDRAFT'] = 'Prekliči spremembe poskusne strain';
$lang['en_US']['SiteTree']['BUTTONCANCELDRAFTDESC'] = 'Delete your draft and revert to the currently published page';
$lang['sl_SI']['SiteTree']['BUTTONSAVEPUBLISH'] = 'Shrani in objavi';
$lang['sl_SI']['SiteTree']['BUTTONUNPUBLISH'] = 'Prekliči objavo';
$lang['sl_SI']['SiteTree']['BUTTONUNPUBLISHDESC'] = 'Odstrani to stran z objavljenega spletišča';
$lang['sl_SI']['SiteTree']['CHANGETO'] = array(
	'Spremeni v "%s"',
	PR_MEDIUM,
	'Pagetype selection dropdown with class names'
);
$lang['sl_SI']['SiteTree']['Comments'] = 'Komentarji';
$lang['sl_SI']['SiteTree']['Content'] = array(
	'Vsebina',
	PR_MEDIUM,
	'Main HTML Content for a page'
);
$lang['en_US']['SiteTree']['DEFAULTABOUTCONTENT'] = '<p>You can fill this page out with your own content, or delete it and create your own pages.<br /></p>';
$lang['sl_SI']['SiteTree']['DEFAULTABOUTTITLE'] = 'O nas';
$lang['en_US']['SiteTree']['DEFAULTCONTACTCONTENT'] = '<p>You can fill this page out with your own content, or delete it and create your own pages.<br /></p>';
$lang['en_US']['SiteTree']['DEFAULTCONTACTTITLE'] = 'Contact Us';
$lang['en_US']['SiteTree']['DEFAULTHOMECONTENT'] = '<p>Welcome to SilverStripe! This is the default homepage. You can edit this page by opening <a href="admin/">the CMS</a>. You can now access the <a href="http://doc.silverstripe.org">developer documentation</a>, or begin <a href="http://doc.silverstripe.org/doku.php?id=tutorials">the tutorials.</a></p>';
$lang['sl_SI']['SiteTree']['DEFAULTHOMETITLE'] = 'Domov';
$lang['sl_SI']['SiteTree']['DELETEDPAGE'] = 'Izbrisana stran';
$lang['en_US']['SiteTree']['DEPENDENT_NOTE'] = 'The following pages depend on this page. This includes virtual pages, redirector pages, and pages with content links.';
$lang['sl_SI']['SiteTree']['DependtPageColumnLinkType'] = 'Vrsta povezave';
$lang['sl_SI']['SiteTree']['DependtPageColumnURL'] = 'URL';
$lang['sl_SI']['SiteTree']['EDITANYONE'] = 'Vsakdo, ki se lahko prijavi v CMS';
$lang['sl_SI']['SiteTree']['EDITHEADER'] = 'Kdo sme urejati to stran?';
$lang['sl_SI']['SiteTree']['EDITONLYTHESE'] = 'Samo naslednje osebe (izberite s seznama)';
$lang['sl_SI']['SiteTree']['EDITORGROUPS'] = 'Skupine urednikov';
$lang['en_US']['SiteTree']['EDIT_ALL_DESCRIPTION'] = 'Edit any page';
$lang['en_US']['SiteTree']['EDIT_ALL_HELP'] = 'Ability to edit any page on the site, regardless of the settings on the Access tab.  Requires the "Access to Site Content" permission';
$lang['sl_SI']['SiteTree']['Editors'] = 'Skupine urednikov';
$lang['sl_SI']['SiteTree']['HASBROKENLINKS'] = 'Ta stran ima nedelujoče povezave.';
$lang['sl_SI']['SiteTree']['HOMEPAGEFORDOMAIN'] = array(
	'Domen(e)',
	PR_MEDIUM,
	'Listing domains that should be used as homepage'
);
$lang['sl_SI']['SiteTree']['HTMLEDITORTITLE'] = array(
	'Vsebina',
	PR_MEDIUM,
	'HTML editor title'
);
$lang['sl_SI']['SiteTree']['HomepageForDomain'] = 'Domača stran za to domeno';
$lang['sl_SI']['SiteTree']['INHERIT'] = 'Deduj s starševske strani';
$lang['en_US']['SiteTree']['LINKCHANGENOTE'] = 'Changing this page\'s link will also affect the links of all child pages.';
$lang['sl_SI']['SiteTree']['MENUTITLE'] = 'Oznaka za krmarjenje';
$lang['sl_SI']['SiteTree']['METADESC'] = 'Opis';
$lang['sl_SI']['SiteTree']['METAEXTRA'] = 'Meta oznake po meri';
$lang['sl_SI']['SiteTree']['METAHEADER'] = 'Metaoznake iskalnika';
$lang['sl_SI']['SiteTree']['METAKEYWORDS'] = 'Ključne besede';
$lang['sl_SI']['SiteTree']['METATITLE'] = 'Naslov';
$lang['sl_SI']['SiteTree']['MODIFIEDONDRAFT'] = 'Spremenjeno na poskusnem spletišču';
$lang['en_US']['SiteTree']['NOTEUSEASHOMEPAGE'] = 'Use this page as the \'home page\' for the following domains: 
							(separate multiple domains with commas)';
$lang['sl_SI']['SiteTree']['PAGELOCATION'] = 'Mesto strani';
$lang['sl_SI']['SiteTree']['PAGETITLE'] = 'Ime strani';
$lang['sl_SI']['SiteTree']['PAGETYPE'] = array(
	'Vrsta strani',
	PR_MEDIUM,
	'Classname of a page object'
);
$lang['sl_SI']['SiteTree']['PARENTID'] = array(
	'Starševska stran',
	PR_MEDIUM
);
$lang['sl_SI']['SiteTree']['PARENTTYPE'] = array(
	'Lokacija strani',
	PR_MEDIUM
);
$lang['sl_SI']['SiteTree']['PARENTTYPE_ROOT'] = 'Vrhnja stran';
$lang['en_US']['SiteTree']['PARENTTYPE_SUBPAGE'] = 'Sub-page underneath a parent page (choose below)';
$lang['sl_SI']['SiteTree']['PERMISSION_GRANTACCESS_DESCRIPTION'] = 'Upravljajte s pravicami dostopa do vsebin';
$lang['en_US']['SiteTree']['PERMISSION_GRANTACCESS_HELP'] = 'Allow setting of page-specific access restrictions in the "Pages" section.';
$lang['sl_SI']['SiteTree']['PLURALNAME'] = array(
	'Drevesa spletišča',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['SiteTree']['REMOVEDFROMDRAFT'] = 'Odstranjeno s poskusnega spletišča';
$lang['en_US']['SiteTree']['REMOVE_INSTALL_WARNING'] = 'Warning: You should remove install.php from this SilverStripe install for security reasons.';
$lang['sl_SI']['SiteTree']['REORGANISE_DESCRIPTION'] = 'Spremeni strukturo spletišča';
$lang['en_US']['SiteTree']['REORGANISE_HELP'] = 'Rearrange pages in the site tree through drag&drop.';
$lang['sl_SI']['SiteTree']['SHOWINMENUS'] = 'Želite prikazano v menijih?';
$lang['sl_SI']['SiteTree']['SHOWINSEARCH'] = 'Želite prikazano v iskanju?';
$lang['sl_SI']['SiteTree']['SINGULARNAME'] = array(
	'Drevo spletišča',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['sl_SI']['SiteTree']['TABACCESS'] = 'Dostop';
$lang['sl_SI']['SiteTree']['TABBEHAVIOUR'] = 'Vedenje';
$lang['sl_SI']['SiteTree']['TABCONTENT'] = 'Vsebina';
$lang['sl_SI']['SiteTree']['TABDEPENDENT'] = 'Odvisne strani';
$lang['sl_SI']['SiteTree']['TABMAIN'] = 'Glavno';
$lang['sl_SI']['SiteTree']['TABMETA'] = 'Metapodatki';
$lang['sl_SI']['SiteTree']['TABTODO'] = 'Opravki';
$lang['en_US']['SiteTree']['TODOHELP'] = '<p>You can use this to keep track of work that needs to be done to the content of your site.  To see all your pages with to do information, open the \'Site Reports\' window on the left and select \'To Do\'</p>';
$lang['sl_SI']['SiteTree']['TOPLEVEL'] = 'Vsebina spletišča (vrhnja raven)';
$lang['en_US']['SiteTree']['TOPLEVELCREATORGROUPS'] = 'Top level creators';
$lang['sl_SI']['SiteTree']['ToDo'] = 'Zapiski opravkov';
$lang['sl_SI']['SiteTree']['URL'] = 'URL';
$lang['en_US']['SiteTree']['URLSegment'] = array(
	'URL Segment',
	PR_MEDIUM,
	'URL for this page'
);
$lang['en_US']['SiteTree']['VALIDATIONURLSEGMENT1'] = 'Another page is using that URL. URL must be unique for each page';
$lang['en_US']['SiteTree']['VALIDATIONURLSEGMENT2'] = 'URLs can only be made up of letters, digits and hyphens.';
$lang['sl_SI']['SiteTree']['VIEWERGROUPS'] = 'Skupine ogledovalcev';
$lang['en_US']['SiteTree']['VIEW_ALL_DESCRIPTION'] = 'View any page';
$lang['en_US']['SiteTree']['VIEW_ALL_HELP'] = 'Ability to view any page on the site, regardless of the settings on the Access tab.  Requires the "Access to Site Content" permission';
$lang['en_US']['SiteTree']['VIEW_DRAFT_CONTENT'] = 'View draft content';
$lang['en_US']['SiteTree']['VIEW_DRAFT_CONTENT_HELP'] = 'Applies to viewing pages outside of the CMS in draft mode. Useful for external collaborators without CMS access.';
$lang['sl_SI']['SiteTree']['Viewers'] = 'Skupine ogledovalcev';
$lang['sl_SI']['SiteTree']['has_one_Parent'] = array(
	'Starševska stran',
	PR_MEDIUM,
	'The parent page in the site hierarchy'
);
$lang['en_US']['SiteTree']['many_many_BackLinkTracking'] = 'Backlink Tracking';
$lang['sl_SI']['SiteTree']['many_many_ImageTracking'] = 'Sledenje slikam';
$lang['sl_SI']['SiteTree']['many_many_LinkTracking'] = 'Sledenje povezavam';
$lang['sl_SI']['TableField']['ISREQUIRED'] = 'V %s je \'%s\' obvezen.';
$lang['sl_SI']['TableField.ss']['ADD'] = 'Dodaj novo vrstico';
$lang['sl_SI']['TableField.ss']['ADDITEM'] = 'Dodaj %s';
$lang['sl_SI']['TableField.ss']['CSVEXPORT'] = 'Izvozi v CSV';
$lang['sl_SI']['TableListField']['CSVEXPORT'] = 'Izvozi v CSV';
$lang['sl_SI']['TableListField']['PRINT'] = 'Natisni';
$lang['sl_SI']['TableListField']['SELECT'] = 'Izberite:';
$lang['sl_SI']['TableListField.ss']['NOITEMSFOUND'] = 'Ni zadetkov';
$lang['sl_SI']['TableListField.ss']['SORTASC'] = 'Razvrsti naraščajoče';
$lang['sl_SI']['TableListField.ss']['SORTDESC'] = 'Razvrsti padajoče';
$lang['sl_SI']['TableListField_PageControls.ss']['DISPLAYING'] = 'Prikazovanje';
$lang['sl_SI']['TableListField_PageControls.ss']['OF'] = 'od';
$lang['sl_SI']['TableListField_PageControls.ss']['TO'] = 'do';
$lang['en_US']['TableListField_PageControls.ss']['VIEWFIRST'] = 'View first';
$lang['en_US']['TableListField_PageControls.ss']['VIEWLAST'] = 'View last';
$lang['en_US']['TableListField_PageControls.ss']['VIEWNEXT'] = 'View next';
$lang['en_US']['TableListField_PageControls.ss']['VIEWPREVIOUS'] = 'View previous';
$lang['sl_SI']['TimeField']['VALIDATEFORMAT'] = 'Vnesite datum v veljavni obliki (%s)';
$lang['sl_SI']['ToggleCompositeField.ss']['HIDE'] = 'Skrij';
$lang['sl_SI']['ToggleCompositeField.ss']['SHOW'] = 'Pokaži';
$lang['sl_SI']['ToggleField']['LESS'] = 'manj';
$lang['sl_SI']['ToggleField']['MORE'] = 'več';
$lang['sl_SI']['Translatable']['CREATE'] = 'Ustvari nov prevod';
$lang['sl_SI']['Translatable']['CREATEBUTTON'] = 'Ustvari';
$lang['sl_SI']['Translatable']['EXISTING'] = 'Obstoječi prevodi:';
$lang['sl_SI']['Translatable']['NEWLANGUAGE'] = 'Nov jezik';
$lang['en_US']['Translatable']['NOTICENEWPAGE'] = 'Please save this page before creating a translation';
$lang['sl_SI']['Translatable']['TRANSLATEALLPERMISSION'] = 'Prevedi v vse jezike, ki so na voljo';
$lang['sl_SI']['Translatable']['TRANSLATEPERMISSION'] = array(
	'Prevedi %s',
	PR_MEDIUM,
	'Translate pages into a language'
);
$lang['sl_SI']['Translatable']['TRANSLATIONS'] = 'Prevodi';
$lang['sl_SI']['TreeSelectorField']['CANCEL'] = 'prekliči';
$lang['sl_SI']['TreeSelectorField']['SAVE'] = 'shrani';
$lang['sl_SI']['Versioned']['has_many_Versions'] = array(
	'Različice',
	PR_MEDIUM,
	'Pretekle različice te strani'
);
$lang['sl_SI']['VirtualPage']['CHOOSE'] = 'Izberite stran za cilj povezave';
$lang['sl_SI']['VirtualPage']['EDITCONTENT'] = 'kliknite sem za urejanje vsebine';
$lang['sl_SI']['VirtualPage']['HEADER'] = 'To je navidezna stran';
$lang['sl_SI']['VirtualPage']['PLURALNAME'] = array(
	'Navidezne strani',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['sl_SI']['VirtualPage']['SINGULARNAME'] = array(
	'Navidezna stran',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['Widget']['PLURALNAME'] = array(
	'Widgets',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['Widget']['SINGULARNAME'] = array(
	'Widget',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);
$lang['en_US']['WidgetArea']['PLURALNAME'] = array(
	'Widget Areas',
	50,
	'Pural name of the object, used in dropdowns and to generally identify a collection of this object in the interface'
);
$lang['en_US']['WidgetArea']['SINGULARNAME'] = array(
	'Widget Area',
	50,
	'Singular name of the object, used in dropdowns and to generally identify a single object in the interface'
);

?>