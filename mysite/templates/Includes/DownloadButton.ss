<li><h2>
<% if Top.getDonatePageLink %><% if InstallType = Full %><a href='{$Top.getDonatePageLink}dl/$Top.Type/$Top.Version/$Top.Lang/$Filename<% if SessionCampaign %>?pk_campaign=$SessionCampaign<% end_if %>'
<% else_if Type = box    %><a href='{$Top.getDonatePageLink}dl/$Top.Type/$Top.Version/multi/$Filename<% if TotalItems %>?idx=$Pos<% if SessionCampaign %>&pk_campaign=$SessionCampaign<% end_if %><% else %><% if SessionCampaign %>?pk_campaign=$SessionCampaign<% end_if %><% end_if %>'
<% else_if Type = src    %><% if First %><a href='{$Top.getDonatePageLink}dl/$Top.Type/$Top.Version/all/$Filename?idx=1<% if SessionCampaign %>&pk_campaign=$SessionCampaign<% end_if %>'<% else %><a href='http://download.documentfoundation.org/$Fullpath'<% end_if %>
<% else %><a href='http://download.documentfoundation.org/$Fullpath'<% end_if %><% else %><%-- donate page was not found --%><a href='http://download.documentfoundation.org/$Fullpath'<% end_if %>
     class="piwik_download"><% if fallback %>$ButtonLabel(1)<% else %>$Buttonlabel<% end_if %></a></h2> $Size.Nice
   (<a href='http://download.documentfoundation.org/{$Fullpath}.torrent' class="piwik_download" title='<% _t('DownloadsTorrentTitle','Download the files using BitTorrent') %>'><% _t('DownloadsTorrentLink','Torrent') %></a>,
   <a href='http://download.documentfoundation.org/{$Fullpath}.mirrorlist' title='<% _t('DownloadsInfoTitle','See the md5sum and list of download mirrors for the file') %>'><% _t('DownloadsInfoLink','Info') %></a>)</li>
