function resize_menu($) {
        var available_width, menuitems, padding, element_count, element_width, csspad, leftshift;
	if ($.length < 1) {
		return true;
	}
        available_width = $.width(); /*doesn't return "exceed-the-div size"*/
        menuitems = $.find("> li > a > span");
        padding = $.find("> li:first-child > a").css("padding-left").replace('px','');
        element_count = menuitems.length;
        element_width = 0;
        menuitems.each(function() {
            element_width+=jQuery(this).width();
        });
        if ((element_width+2*element_count*padding) > available_width) {
                padding = (available_width - element_width)/(2*element_count);
                if (padding < 10) {
                        leftshift = (available_width - element_width - 20*element_count)/2;
                        $.css("margin-left", leftshift+"px");
                        padding = 10;
                }
                csspad = {"padding-left": padding+"px", "padding-right": padding+"px"};
                $.find("> li > a").each(function() {
                        jQuery(this).css(csspad);
                });
        }
}
(function($) {
$(document).ready(function() {
        resize_menu($("#FirstNavigation"));
        resize_menu($("#SecondNavigation"));
        var toTop=$("#toTop");
        if ($(window).scrollTop() == 0) {
                toTop.fadeOut(1000);
        }
        $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                        toTop.fadeIn();
                } else {
                        toTop.fadeOut();
                }
        });

        toTop.click(function(event) {
                event.preventDefault();
                $("html,body").animate({scrollTop: 0},800);
        });

	$('div#translations input').show();
	$('#langfilter').keyup(function(event){
		var term = $(this).val();
		// hide all
		$('ul.translations li').stop(true,true).fadeOut();
		// show the matching ones
		$('ul.translations li:icontains("' + term.toUpperCase() + '")').fadeIn();
		});

	$.expr[':'].icontains = function(a, i, m) {
		return $(a).text().toUpperCase().indexOf(m[3]) >= 0 || $(a).attr('class').toUpperCase().indexOf(m[3]) >= 0;
	};

     $('.tablesorter').each(function() {
       $(this).tablesorter();
     });

// qa feedback page
	$('.happy').click(function(){
		$('.sad').removeClass('initial');
		$('.sad').removeClass('active');
		$('.sad-area').removeClass('active');
		$('.tweet').removeClass('active');
		$('.characters').removeClass('active');
		$('.happy').addClass('active');
		$('.happy-area').addClass('active');
		$('.tweet').addClass('active');
		$('.characters').addClass('active');
		$('.happy-area').focus();
		return false;
	});
	$('.sad').click(function(){
		$('.happy').removeClass('initial');
		$('.happy').removeClass('active');
		$('.happy-area').removeClass('active');
		$('.tweet').removeClass('active');
		$('.characters').removeClass('active');
		$('.sad').addClass('active');
		$('.sad-area').addClass('active');
		$('.tweet').addClass('active');
		$('.characters').addClass('active');
		$('.sad-area').focus();
		return false;
	});
	// Populate our Bug Report button with any passed-in variables.
	var param_index = window.location.href.indexOf('?');
	// Only try to add parameters if some have been passed-in.
	if(param_index > -1) {
	  var params = window.location.href.slice(window.location.href.indexOf('?'));
	  var url = $('#bugbutton').attr('href');
	  $('#bugbutton').attr('href', url + params);
	}
})
})(jQuery.noConflict());
