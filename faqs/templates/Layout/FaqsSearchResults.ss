<% include FaqsSideBar %>
<div class="typography">
    <% if Results %>
        <ul id="SearchResults">
          <% control Results %>
            <li>
                <% if MenuTitle %>
                  <h3><a class="searchResultHeader" href="$Link">$MenuTitle</a></h3>
                <% else %>
                  <h3><a class="searchResultHeader" href="$Link">$Title</a></h3>
                <% end_if %>
              <% if Content %>
                $Content.LimitWordCount(20)
              <% end_if %>
              <a class="readMoreLink" href="$Link" title="<% _t('READMORE','') %> &quot;{$Title}&quot;"><% _t('READMORE') %> &quot;{$Title}&quot;...</a>
            </li>
          <% end_control %>
        </ul>
        <% include FaqsPagination %>
      <% else %>
        <p><% _t('NORESULTSFAQS', 'Search query did not return any results.') %></p>
      <% end_if %>
</div>