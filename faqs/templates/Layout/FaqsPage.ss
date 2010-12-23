<% include FaqsSideBar %>
<% include BreadCrumbs %>
<div id="faqsContent" class="faqscontent typography">
    <div class="blogEntry">
        <h2>$Title</h2>
        <p>$Content</p>
	</div>
	<% if FaqsRelated %>
	   <h4><% _t('RELATEDFAQ', 'Related Faqs') %></h4>
	    <% control FaqsRelated %>
	        <p><a class="faqsTitle" href="$Link" title="<% _t('GOTOFAQ', 'Show Detail -') %> '$Title'">$Title</a></p>
	    <% end_control %>
    <% end_if %>
	$PageComments
</div>