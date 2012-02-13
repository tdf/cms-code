<% if IsFullWidth %>
<% else %>
 <% include SideBar %>
 <div class="ThirdLevelPage FloatRight">
<% end_if %>
<% include Translations %>
<div class="typography">
		<h1>$Title</h1>
	
		<%-- $Content --%>
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
	margin:0 50px 50px;
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
    font-size: 1.4em;
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
</style>

<% if Downloads %><%-- Show downloads, if we have enough information --%>

<% if Downloads.IsPreRelease %><div class='warning'><% _t('DownloadsPrereleaseWarning','This is a pre-release version not meant for genereal use.') %></div><% end_if %>
<p><% sprintf(_t('DownloadsHeader','LibreOffice <b>%s</b>. Not the version you wanted?'),$DownloadTypeVersionLang) %>
<a href='$Link?nodetect'><% _t('DownloadsChangeLink','Change System or Language') %></a></p>

<div class="Downloads">
 <div  class="DownloadsLeft">
<% if Type != "src" %><% if Type != "box" %>
<% _t('DownloadNeededFiles','You need to download and install these files in order:') %>
<% end_if %><% end_if %>
<ul>
 <% control Downloads.Files %>
  <li>
   <h2><a href='http://download.documentfoundation.org/$Fullpath'> <% if InstallType = "Full" %><% _t('DownloadsInstallTypeFull','Base installer') %><% else_if InstallType = "Languagepack" %><% _t('DownloadsInstallTypeLanguagepack','Translated user interface') %><% else_if InstallType = "Helppack" %><% _t('DownloadsInstallTypeHelppack','LibreOffice built-in help') %><% else %>$InstallType<% end_if %></a></h2>
   $SizeNice
   (<a href='http://download.documentfoundation.org/{$Fullpath}.torrent' title='<% _t('DownloadsTorrentTitle','Download the files using BitTorrent') %>'><% _t('DownloadsTorrentLink','Torrent') %></a>,
   <a href='http://download.documentfoundation.org/{$Fullpath}.mirrorlist' title='<% _t('DownloadsInfoTitle','See the md5sum and list of download mirrors for the file') %>'><% _t('DownloadsInfoLink','Info') %></a>)
   </li>
 <% end_control %>
</ul>
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

<% if DownloadPortables || DownloadIsos %>
<div class="HalfBlockLeft">
<h1><% _t('DownloadsPackagesHeader','Packages') %></h1>
<ul class="libreoffice">
 <% control DownloadPortables %>
 <li><h2><a href="http://download.documentfoundation.org/$Fullpath"><% _t('DownloadsPortableHeader','PortableApps') %></a> $SizeNice</h2>
     <p><% _t('DownloadsPortableText','A portable version of LibreOffice packaged in PortableApps.com Format, so you can take all your documents and everything you need to work from a USB, cloud or local drive. See <a href="http://portableapps.com/">PortableApps.com</a> for more information.') %></p></li>
 <% end_control %>
 <% control DownloadIsos %>
  <li><h2><a href="http://download.documentfoundation.org/$Fullpath"><% sprintf(_t('DownloadsIsoHeader','%s image'),$InstallType) %></a> $SizeNice</h2>
      <p><% _t('DownloadsIsoText','Download an ISO-file to create an installation media') %>.</p></li>
 <% end_control %>
</ul>
</div>
<% end_if %>
<% if DownloadSdks || DownloadSources %>
<div class="HalfBlockRight">
 <h1><% _t('DownloadsDevelopersHeader','Developers') %></h1>
 <ul class="libreoffice">
 <% control DownloadSdks %>
  <li><h2><a href='http://download.documentfoundation.org/$Fullpath'><% _t('DownloadsSdkHeader','Software development kit (SDK)') %></a> $SizeNice</h2>
      <p><% _t('DownloadsSdkText','Download the SDK for developing extensions and external tools.') %></li>
 <% end_control %>
 <% if DownloadSources %>
  <li><h2><a href='$Link?type=src&version=$Version'><% _t('DownloadsSrcHeader','Source code') %></a></h2>
      <p><% _t('DownloadsSrcText','LibreOffice is an open source project and you can therefore download the source code to build your own installer.') %></li>
 <% end_if %>
 </ul>
</div>
<% end_if %>

<% else_if Versions %><%-- else version selection, if we have enough information --%>

<% control Versions.GroupedBy(Type) %>
 <% if Type = "testing" %>
  <h2><% _t('VersionsPrereleaseHeader','Pre-releases') %></h2>
  <p><% _t('VersionsPrereleaseText','Below, you can download a pre-release of the next version of LibreOffice for evaluation, QA testing, etc. These versions are not meant for genereal use.') %></p>
 <% end_if %>
 <ul>
  <% control Children %>
   <li><a href="$Link">$Version</a> <% if Recommended %><b><% _t('VersionsRecommended','Recommended') %></b><% end_if %>
  <% end_control %>
 </ul>
<% end_control %>

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

<% else %><%-- else type selection --%>

<%-- TODO: Generate list dynamicly <% control Types %><li><a href="$Link">$Name</a></li><% end_control %> --%>
<ul>
 <li><a href="{$Link}?type=win-x86">Windows</a>
 <li>Mac: 
   <a href="{$Link}?type=mac-x86">Intel</a> <% _t('TypeOr','or') %>
   <a href="{$Link}?type=mac-ppc">PowerPC</a>
 <li>Linux (deb):
   <a href="{$Link}?type=deb-x86">x86</a> <% _t('TypeOr','or') %>
   <a href="{$Link}?type=deb-x86_64">x86_64</a>
 <li>Linux (rpm):
   <a href="{$Link}?type=rpm-x86">x86</a> <% _t('TypeOr','or') %>
   <a href="{$Link}?type=rpm-x86_64">x86_64</a>
</ul>
<h2><% _t('TypeDescMulti','For multiple platforms') %></h2>
<ul>
 <li><a href="{$Link}?type=box"><% _t('TypeDescBox','CD/DVD images with installers for all platforms') %></a>
 <li><a href="{$Link}?type=src"><% _t('TypeDescSrc','Source code') %></a>
</ul>

<% end_if %>


		$Form
		$PageComments

</div>
<% if IsFullWidth %><% else %></div><% end_if %>
