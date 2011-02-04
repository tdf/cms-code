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
                if ($(this).scrollTop() != 0) {
                        toTop.fadeIn();
                } else {
                        toTop.fadeOut();
                }
        });

        toTop.click(function(event) {
                event.preventDefault();
                $("html,body").animate({scrollTop: 0},800);
        });
})
})(jQuery);
