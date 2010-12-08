<% include FaqsSideBar %>
<div id="faqsContent" class="faqscontent typography">
    <% include BreadCrumbs %>   
    $SearchFaqsForm
    $Content
    <% if Results %>
        <% control Results %>
            <% include FaqsSummary %>
        <% end_control %>
    <% else %>
        <h3><% _t('NOFAQSENTRIES', 'There are no Faqs entries') %></h3>
    <% end_if %>    
    
    <% include FaqsPagination %>
</div>