<div class="faqsList">
    <h3><a class="faqsTitle" href="$Link" title="<% _t('GOTOFAQ', 'Show Detail -') %> '$Title'">$MenuTitle</a></h3>
              <% if Content %>
                $Content.LimitWordCount(20)
              <% end_if %>    
    <% if Comments.Count  %>
        <p class="faqsListComments"><a href="$Link#PageComments_holder" title="<% _t('VIEWFAQSCOMMENTS', 'View Comments Posted') %>">$Comments.Count <% _t('COMMENTS', 'Comments') %></a></p>
    <% end_if %>         
</div>
