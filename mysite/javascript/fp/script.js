$(document).ready(function() {

//Si l'on est pas en version mobile
if (window.innerWidth >= 550){
	// Background Slider
	$('#slides').superslides({
	slide_easing: 'easeInOutCubic',
	slide_speed: 800,
	pagination: false,
	hashchange: false,
	scrollable: true,
	play: 10000
	});

	// Slider Full Page section
	$('#ascensorBuilding').ascensor({
		AscensorName:'ascensor',
		ChildType:'section',
		AscensorFloorName:'Home | Discover it',
		Time:1000,
		WindowsOn:1,
		Direction:'chocolate',
		AscensorMap:'1|1 & 2|1',
		Easing:'easeInOutQuad',
		KeyNavigation:false,
		Queued:false,
	});

	// Action after Slider Full Page section
	$('nav.navigation a').click(function(e) {
		var anchor = $(this), h, btn_active;
		h = anchor.attr('href');
		btn_active = anchor.attr('class')
		if(h != "http://www.libreoffice.org/download" && btn_active != "active" && h != "http://www.libreoffice.org" ){
			e.preventDefault();
			anchor.animate({'opacity' : 0}, 1000, function() {
				window.location = h;
			});
		}
	});
}


$("#btn_nav").click(function () {
	$("nav.navigation").toggle();
});

if (window.innerWidth <= 550){
	responsiveMobile();
};

$(window).resize(function() {
	responsiveMobile();
});


//Fonction
function responsiveMobile() {

	if (window.innerWidth >= 550) {
		$("html").removeClass("no-js");
		$("html").addClass("js");
		$('#slides').superslides({
			slide_easing: 'easeInOutCubic',
			slide_speed: 800,
			pagination: false,
			hashchange: true,
			scrollable: true,
			play: 10000
		});
		$("nav.navigation").show();
		$("#slides .slide_1 .container").removeAttr('style');
	}else{
		$("html").removeClass("js");
		$("html").addClass("no-js");
		$(".slide_1").show();
		$(".slide_2").show();
		$(".slide_3").show();
		$(".slide_1").removeAttr('style');
		$(".slide_2").removeAttr('style');
		$(".slide_3").removeAttr('style');
		$("nav.navigation").hide();
		$("#slides .slide_1 .container").attr('style', 'padding-top:100px;');

	};
};


});
