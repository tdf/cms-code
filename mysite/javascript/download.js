/* TODO: make the messages variables passed to the script or use hidden html elements or similar */
(function($) {
$(document).ready(function() {
	var multilangs = new Array("en-US","ar","ast","be-BY","bg","bn","bo","br","ca","ca-XV","cs","da","de","dz","el","en-GB","es","et","eu","fi","fr","gl","gu","he","hi","hr","hu","is","it","ja","km","kn","ko","lt","lv","mr","nb","nl","oc","om","or","pl","pt","pt-BR","ru","sh","si","sk","sl","sr","sv","te","tr","ug","vi","zh-CN","zh-TW");
	$("ul#uldown ul").hide(); /* collapse everything */
	$("ul#uldown li:only-child > ul").show(); /* when there is no choice, don't force the user to click */
	$("ul#uldown li#sourcedl > ul > li:first > ul").show(); /* show the latest version of sources by default */
	/* preselect platform  default to rpm on linux TODO: Change options in html, so that platform here doesn't need any mapping */
	var navplatform = navigator.platform.toLowerCase();
	var platform = "";
	if (navplatform == "win32") {
		platform = "winx86";
	} else if (navplatform == "macintel") {
		platform="macintel" ;
	} else if (navplatform == "macppc") {
		platform = "macpp";
	} else if (navplatform.substring(0,5) == "linux") {
		var ua = navigator.userAgent.toLowerCase();
		var pkgtype = "rpm"
		if (ua.indexOf("buntu") >= 0 || ua.indexOf("debian") >= 0 || ua.indexOf("iceweasel") >= 0 ) {
			pkgtype= "deb";
		}
		if (navplatform.indexOf("x86_64") >= 0 ) {
			platform = pkgtype+"x86_64";
		} else {
			platform = pkgtype+"x86";
		}
	}
	if (platform != "") {
		$("select#platform").val(platform);
		}
	var userLang = ((navigator.language) ? navigator.language : navigator.userLanguage).split("_");
	if ( $("select#lang option[value='"+userLang[0]+"-"+userLang[1]+"']").length) {
		$("select#lang").val(userLang[0]+"-"+userLang[1]);
	} else if ( $("select#lang option[value='"+userLang[0]+"']").length) {
		$("select#lang").val(userLang[0]);
	} else {
		$("select#lang").val("en-US");
	}

	$("select#platform").change(function () {
		var sel=$(this).val();
		var matches = "";
		$("select#lang").trigger("change");
		}).change();

	$("select#lang").change(function () {
		var matches = "";
		var downloadnote = "";
		var fullinstall = "";
		var platform = $("select#platform").val();
		var sel=$(this).val();
		if (platform == "winx86") {
			if ( $.inArray( sel, multilangs ) > -1 ) {
				fullinstall = "<li>"+$("ul#uldown ul.winx86 > li.install.multi").html()+"</li>";
			} else {
				fullinstall = "<li>"+$("ul#uldown ul.winx86 > li.install.all").html()+"</li>";
			}
			var helppack = $("ul#uldown ul.winx86 ul li."+sel).length ? $("ul#uldown ul.winx86 ul li."+sel).html() : $("ul#uldown ul.winx86 ul li.en-US").html() + " (fallback)";
			if(helppack != "") {
				matches = matches + "<li>"+helppack+"</li>";
			}

		} else {
			fullinstall = "<li>"+$("ul#uldown ul."+platform+" >li:first-child").html()+"</li>";

			if (sel != "en-US") {
				downloadnote = '<p>For languages other than english, you need to download both the full installset (in english language), as well as the language pack that will add support for the desired language</p>';
			}
			$("ul#uldown ul."+platform+" ul li."+sel).each(function() {
				matches = matches + "<li>"+$(this).html()+"</li>";
			});
		}
		if (matches == "" && sel != "en-US") {
			downloadnote = "<p>Sorry, no package for »"+sel+"« available for »"+$("select#platform option:selected").text()+"«. Please choose another language or only download the english version</p>";
		}
		$("div#filtered").html("<!-- "+downloadnote+" --><ul>"+fullinstall+matches+"</ul>");
		}).change();

	$("input#BT").change(function () {
		if ( $(this).is(":checked") ) {
			$("div#filtered ul li a, ul#uldown a:not(.action)").each( function() {
				     $(this).attr("href", this.href + ".torrent");
				     $(this).append(".torrent");
				       });
		} else {
			$("div#filtered ul li a, ul#uldown a:not(.action)").each( function() {
				$(this).attr("href", this.href.replace(/\.torrent$/,""));
				$(this).text($(this).text().replace(/\.torrent$/, ""));
				});

		}
	}).change();

	$("ul#uldown li a.action").click(function(event) {
		$(this).next("ul").slideToggle();
		event.preventDefault();
		});
})
})(jQuery);
