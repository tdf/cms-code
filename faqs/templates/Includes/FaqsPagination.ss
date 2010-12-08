<% if Results.MoreThanOnePage %>
	<div id="PageNumbers">
		<p>
			<% if Results.NotFirstPage %>
				<a class="prev" href="$Results.PrevLink" title="<% _t('GOTOPREVIOUSPAGE', 'View the previous page') %>"><% _t('PREVIOUSPAGE', 'Prev') %></a>
			<% end_if %>
		
			<span>
		    	<% control Results.PaginationSummary(4) %>
					<% if CurrentBool %>
						$PageNum
					<% else %>
						<% if Link %>
							<a class="pageNum" href="$Link" title="<% _t('VIEWPAGENUM', 'View page number') %> $PageNum">$PageNum</a>
						<% else %>
							&hellip;
						<% end_if %>
					<% end_if %>
				<% end_control %>
			</span>
		
			<% if Results.NotLastPage %>
				<a class="next" href="$Results.NextLink" title="<% _t('GOTONEXTPAGE', 'View the next page') %>"><% _t('NEXTPAGE', 'Next') %></a>
			<% end_if %>
		</p>
	</div>
<% end_if %>