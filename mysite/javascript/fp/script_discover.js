$(document).ready(function() {

	// Slider Full Page section
	$('#ascensorBuilding').ascensor({
		AscensorName:'ascensor',
		ChildType:'section',
		AscensorFloorName:'Discover it | Home',
		Time:1000,
		WindowsOn:1,
		Direction:'chocolate',
	    AscensorMap:'2|1 & 1|1',
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

});
