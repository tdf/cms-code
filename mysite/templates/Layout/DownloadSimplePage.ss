<% if IsFullWidth %>
<% else %>
 <% include SideBar %>
 <div class="ThirdLevelPage FloatRight">
<% end_if %>
<% include Translations %>
<div class="typography">
		<h1>$Title</h1>
<!--
$DebugInfo
-->
<% cached "Downloads", Aggregate(Download).Max(LastEdited), SubsiteID, Type, Lang, Version %>
<style>
table.columns {
	border-collapse: collapse;
	 margin:0 auto;
}
table.columns>tbody>tr>td {
	border-left:1px solid #18A303;
	vertical-align:top;
	padding:0 5px;
}
table.columns>tbody>tr>td:first-child {
	border-left:none;
}

div.Downloads {
	margin:0 50px;
	overflow:hidden;
}
div.DownloadsLeft {
	float: left;
	width: 540px;
}
div.DownloadsRight {
	float: right;
	width: 240px;
}

div.DownloadsLeft li {
    background: url("themes/libo/images/download-button.png") no-repeat scroll 0 -10px #18A303;
    box-shadow: 0 3px 5px #AAAAAA;
    color: #FFFFFF;
    display: block;
    font-size: .9em;
    font-weight: bold;
    height: 50px;
    padding: 10px 0 0 100px;
    text-shadow: 0 2px #18A303;
    width: 340px;
    margin:10px 0;
    line-height: 120%;
}
div.DownloadsLeft li:hover {
    background-position: 0 -90px;
    color: #ffffff;
    text-decoration: none;
}
div.DownloadsLeft li h2 {
    font-size: 1.2em;
    font-weight: bold;
    margin: 0 0 3px;
}
div.DownloadsLeft li a, div.DownloadsLeft li a:visited {
    color: #ffffff;
}
div.DownloadsLeft li a:hover {
    color: #ffffff;
}
div.DownloadsLeft li h2 {
	color:inherit;
	border:0;
}
div.DownloadsRight h3 {
	margin:0.5em 0 0 0;
	color:#000000;
}
div.DownloadsRight p {
	margin:0 0 0.1em 0;
}
div.DownloadsRight a {
	color:#1C99E0;
}

.warning {
    background: url("themes/libo/images/warning.png") no-repeat scroll 5px 5px transparent;
    padding: 15px 0 0 45px;
    height:30px;
    border:1px solid #d9961e;
}
p.inline {display: inline;}
ul.osarch { display:inline;}
ul.osarch li, ul.osarch ul {display:inline; background: none !important; padding: 0 0.3em; }
ul.osarch > li { padding-left: 0;}
ul.osarch > li:not(:last-child):after { content: " |"; }
#$Top.Type, #ver-$Version.HTMLATT, .current {font-weight: bold;}

#selection {margin-bottom: 1.5em;}
#selection li { line-height: normal;}
#versionlist > li:first-child {padding-left: 0;}
#versionlist ul, #versionlist li { display: inline; padding: 0 0.3em; }
#versionlist li.other   { display: none;/* hide for now, maybe float: right; */}
/* #versionlist li.other ul, #versionlist li.testing { display: none; } */
#versionlist li.other:before   { content: "Other Versions (hover to show):"; }
#versionlist li.testing:before { content: "<% _t('VersionsPrereleaseHeader', 'Pre-Release:') %>"; }
#versionlist li.other:hover { position: relative;  height: 3em; }
#versionlist li.other:hover ul { display: initial; position: absolute; right: 0; top: 1em; }
#versionlist li { background: none; }
#versionlist { display: inline; white-space: nowrap; overflow: hidden; margin-bottom: 0.5em; }
</style>
<% if Downloads %><%-- Show downloads, if we have enough information --%>
$Content
<% if Downloads.IsPreRelease %><div class='warning'><% _t('DownloadsPrereleaseWarning','This is a pre-release version not meant for genereal use.') %></div><% end_if %>
<p><% sprintf(_t('DownloadsHeader','Selected: LibreOffice <b>%s</b>'),$DownloadTypeVersionLang) %></p>
<!-- warning goes here --><% if IsDotZero %><!-- is dot zero -->$dot_zero_warning<% else_if IsDotOne %><!-- is dot one -->$dot_one_warning<% end_if %>
<% if SubsiteID = 3 %><%-- english box text --%><% if Type == "box" %><% _t('DownloadsInstallTypeBox','<h2><strong>CD/DVD</strong> image files with English or German User Interface</h2>
<br />
<ul>
	<li>LibreOffice for <u>all supported platforms in all available languages</u> (Windows™ + Portable)</li>
	<li>Help- and Language-packs in several languages (GNU Linux 32/64 Bit, Mac OSX x86/PPC)</li>
	<li>Selected Extensions, Templates, Dictionaries, and Documentation</li>
	<li>Label, Cover, Inlays, and other Artwork</li>
	<li>Complementary Open Source Software for Your Office</li>
	<li>LibreOffice Source and Development Tools (German DVD only)</li>
</ul>
Detailed descriptions: <a href="http://www.libreoffice-na.us/" target="_blank">English DVD</a>&nbsp; &nbsp;<a href="http://de.libreofficebox.org/" target="_blank">German DVD</a><br /><br />') %><% end_if %>
<% else_if SubsiteID = 2 %><%-- german box text --%><% if Type == "box" %><% _t('DownloadsInstallTypeBox','<h2><strong>CD/DVD</strong> iso Dateien mit Benutzeroberfläche in Deutsch oder Englisch</h2>
<br />
<ul>
	<li>LibreOffice für <u>alle unterstützten Betriebssysteme in allen verfügbaren Sprachen</u> (Windows™ + Portable)</li>
	<li>Hilfe- and Sprachpakete in mehereren Sprachen (GNU Linux 32/64 Bit, Mac OSX x86/PPC)</li>
	<li>Extensions, Vorlagen, Wörterbücher, und Dokumentationen</li>
	<li>Label, Cover, Inlays, und anderes Artwork</li>
	<li>Ergänzende Open Source Software für Ihr Büro</li>
	<li>LibreOffice Quellcode und Entwicklungswerkzeuge (DVD)</li>
</ul>
Detailierte Beschreibung: <a href="http://www.libreoffice-na.us/" target="_blank">English DVD</a>&nbsp; &nbsp;<a href="http://de.libreofficebox.org/" target="_blank">German DVD</a><br /><br />') %><% end_if %><% end_if %>

<div class="Downloads">
 <div  class="DownloadsLeft">
<% if Downloads.full %><%-- only display block if there are matching downloads --%>
<% if Type != "src" %><% if Type != "box" %>
<% _t('DownloadNeededFiles','You need to download and install these files in order:') %>
<% end_if %><% end_if %>
<% control Downloads %>
  <ul>
    <% if full %><% control full %><% include DownloadButton %><% end_control %><% end_if %>
    <% if langpack %><% control langpack %><% include DownloadButton %><% end_control %><% end_if %>
    <% if helppack %><% control helppack %><% include DownloadButton %><% end_control %>
    <% else_if helppack_fallback %><% control helppack_fallback %><% include DownloadButton %><% end_control %><% end_if %>
  </ul>
<% end_control %>
<% else %>
  <p><% _t('NoRegularDL','No regular installation files are available.<br/>
  Please change your selection or pick one from the additional downloads below.') %></p>
  <p><% _t('ViewDLArchive','If you\'re looking for old versions, please visit our <a href="http://downloadarchive.documentfoundation.org/libreoffice/old">downloadarchive</a>.') %></p>
<% end_if %>
 </div>
 <div class="DownloadsRight">
 <% if RelatedPages %>
  <h3><% _t('DownloadsRelatedRessources','Handy ressources') %></h3>
  <% control RelatedPages %>
   <p><a href='$Link'>$MenuTitle</a></p>
  <% end_control %>
 <% end_if %>
 </div>
</div>
<div id="selection">
<% _t('NotWanted','Not the version you wanted?') %>
<br/><a href='$Link?type=$Top.Type&version=$Top.Version&lang=pick'><% _t('ChangeLanguage', 'Change the language') %></a>
<br/><% _t('ChangeVersion', 'Change the version:') %> <ul id="versionlist"><% control Versions %>
  <li class="$Type"><ul><% control data %>
      <li id="ver-$Version.HTMLATT"<% if Recommended %> class="recommended"<% end_if %>><a href="$Top.Link?type=$Top.Type&version=$Version&lang=$Top.Lang">$Version</a></li><% end_control %>
    </ul>
  </li>
<% end_control %></ul>
<br/><% _t('ChangeOS', 'Change <abbr title="Operating System">OS</abbr>:') %> <ul class="osarch">
	<li id="win-x86"><a href="$Top.Link?type=win-x86&version=$Top.Version&lang=$Top.Lang">Windows</a></li>
	<li class="relative">Mac OS X:<ul>
		<li id="mac-x86"><a href="$Top.Link?type=mac-x86&version=$Top.Version&lang=$Top.Lang">Intel</a></li>
		<li id="mac-x86_64"><a href="$Top.Link?type=mac-x86_64&version=$Top.Version&lang=$Top.Lang">Intel <small>(64bit, &gt;= 10.8)</small></a></li>
	</ul></li>
	<li class="relative">Linux:<ul>
		<li id="rpm-x86"   ><a href="$Top.Link?version=$Top.Version&lang=$Top.Lang&type=rpm-x86"   >rpm (x86)</a></li>
		<li id="rpm-x86_64"><a href="$Top.Link?version=$Top.Version&lang=$Top.Lang&type=rpm-x86_64">rpm (x86_64)</a></li>
		<li id="deb-x86"   ><a href="$Top.Link?version=$Top.Version&lang=$Top.Lang&type=deb-x86"   >deb (x86)</a></li>
		<li id="deb-x86_64"><a href="$Top.Link?version=$Top.Version&lang=$Top.Lang&type=deb-x86_64">deb (x86_64)</a></li>
	</ul></li>
</ul>
<br/><% _t('TypeOr','or download') %> <ul class="osarch">
	<li id="box"><a href="$Top.Link?type=box&version=$Top.Version&lang=$Top.Lang">CD/DVD-images</a></li>
	<li id="src"><a href="$Top.Link?type=src&version=$Top.Version&lang=$Top.Lang">Source Code</a></li>
</ul>
</div>
<% if DownloadPortables || DownloadIsos %>
 <div class="HalfBlockLeft">
  <h1><% _t('DownloadsPackagesHeader','Packages') %></h1>
  <ul class="libreoffice">
   <% if DownloadPortables %><% control DownloadPortables %>
    <li><h2><a href="<% if Top.getDonatePageLink %>{$Top.getDonatePageLink}dl/portable/$Version/$ID/$Filename<% else %>http://download.documentfoundation.org/$Fullpath<% end_if %>" class="piwik_download"><% _t('DownloadsPortableHeader','PortableApps') %></a> $SizeNice</h2>
        <p><% _t('DownloadsPortableText','A portable version of LibreOffice packaged in PortableApps.com Format, so you can take all your documents and everything you need to work from a USB, cloud or local drive. See <a href="http://portableapps.com/">PortableApps.com</a> for more information.') %></p></li>
   <% end_control %><% end_if %>
   <% if DownloadIsos %><% control DownloadIsos %>
    <li><h2><a href="<% if Top.getDonatePageLink %>{$Top.getDonatePageLink}dl/box/$Version/multi/$Filename<% if TotalItems %>?idx=$Pos<% end_if %><% else %>http://download.documentfoundation.org/$Fullpath<% end_if %>" class="piwik_download">$Filename (<% sprintf(_t('DownloadsIsoHeader','%s image'),$InstallMedia) %>)</a> $SizeNice</h2>
        <p><% _t('DownloadsIsoText','Download an ISO-file to create an installation media') %>.</p></li>
   <% end_control %><% end_if %>
   <% if DownloadAppStores %><% control DownloadAppStores %>
    <li><h2><img src="/assets/appup24x24.png" alt="icon" align="top"> <a href="$Fullpath" class="piwik_download"><% sprintf(_t('DownloadsAppStoreHeader','%s install'),$InstallType) %></a> $SizeNice</h2>
     <p><% sprintf(_t('DownloadsAppStoreText','Install LibreOffice %s via the Intel AppUp Center'),$Version) %>.</p></li>
   <% end_control %><% end_if %>
  </ul>
 </div>
 <% if DownloadSdks || DownloadSources %>
  <div class="HalfBlockRight">
   <h1><% _t('DownloadsDevelopersHeader','Developers') %></h1>
   <ul class="libreoffice">
    <% if DownloadSdks %><% control DownloadSdks %>
     <li><h2><a href='<% if Top.getDonatePageLink %>{$Top.getDonatePageLink}dl/SDK/$Version/$ID/$Filename<% else %>http://download.documentfoundation.org/$Fullpath<% end_if %>' class="piwik_download"><% _t('DownloadsSdkHeader','Software development kit (SDK)') %></a> $SizeNice</h2>
         <p><% _t('DownloadsSdkText','Download the SDK for developing extensions and external tools.') %></li>
    <% end_control %><% end_if %>
    <% if DownloadSources %>
     <li><h2><a href='$Link?type=src&version=$Version'><% _t('DownloadsSrcHeader','Source code') %></a></h2>
         <p><% _t('DownloadsSrcText','LibreOffice is an open source project and you can therefore download the source code to build your own installer.') %></li>
    <% end_if %>
   </ul>
  </div>
 <% end_if %>
<% else %>
 <div class="HalfBlockLeft">
  <% if DownloadSdks %><% control DownloadSdks %><ul class="libreoffice">
    <li><h2><a href='<% if Top.getDonatePageLink %>{$Top.getDonatePageLink}dl/SDK/$Version/$ID/$Filename<% else %>http://download.documentfoundation.org/$Fullpath<% end_if %>' class="piwik_download"><% _t('DownloadsSdkHeader','Software development kit (SDK)') %></a> $SizeNice</h2>
        <p><% _t('DownloadsSdkText','Download the SDK for developing extensions and external tools.') %></li>
  </ul><% end_control %><% end_if %>
 </div>
 <div class="HalfBlockRight">
   <% if DownloadSources %><ul class="libreoffice">
    <li><h2><a href='$Link?type=src&version=$Version'><% _t('DownloadsSrcHeader','Source code') %></a></h2>
        <p><% _t('DownloadsSrcText','LibreOffice is an open source project and you can therefore download the source code to build your own installer.') %></li>
   </ul><% end_if %>
 </div>
<% end_if %>

<% else_if Languages %><%-- else language selection, if we have enough information --%>

<p><% _t('LanguagesPleaseSelect','Please select your language') %></p>
<table role="presentation" datatable="0" class="columns">
 <tr>
  <% control Languages.Chunked(3) %>
   <td>
    <ul class="table">
     <% control Children %><li><a href="$Link">$Name</a> $NativeName</li><% end_control %>
    </ul>
   </td>
  <% end_control %>
 </tr>
</table>

<% end_if %>

<% end_cached %>
</div>
<% if IsFullWidth %><% else %></div><% end_if %>
