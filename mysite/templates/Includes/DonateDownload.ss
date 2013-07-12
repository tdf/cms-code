<% if RefreshTarget %>
<style>
div.DownloadsLeft {
	display: inline-table;
}
div.DownloadsLeft p { display: table-cell; padding-left: 1em; vertical-align: middle;}
div.DownloadsLeft ul { display: table-cell; }
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
</style>
<div  class="DownloadsLeft">
<% if Downloads.full %><%-- only display block if there are matching downloads --%>
<% control Downloads %>
  <ul>
    <% control full %><% if Type = src %><%-- add source-packages, but skip the first --%><% if First %><% else %><% include DownloadButton %><% end_if %><% end_if %><% end_control %>
    <% if langpack %><% control langpack %><% include DownloadButton %><% end_control %><% end_if %>
    <% if helppack %><% control helppack %><% include DownloadButton %><% end_control %><% end_if %>
  </ul>
<p><% sprintf(_t('DonatePage.DLRefreshMsg','Your download %s should begin shortly. Please click the link in case it doesn\'t start.'),$Top.RefreshTarget.PlainLink) %><% if langpack || helppack %><br/><% _t('DonatePage.DLOptional','You can find the optional downloads on the left.') %><% end_if %></p>
<% end_control %>
<% end_if %>
</div>
<div class="clear"></div>
<% end_if %>
