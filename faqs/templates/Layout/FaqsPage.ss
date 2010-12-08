<% include FaqsSideBar %>
<div id="faqsContent" class="faqscontent typography">
    <% include BreadCrumbs %>
    <div class="blogEntry">
        <h1>$Title</h1>
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