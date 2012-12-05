/* TODO: make the messages variables passed to the script or use hidden html elements or similar */
(function($) {
$(document).ready(function() {
	var multilangs = new Array("en-US","ar","ast","be-BY","bg","bn","bo","br","ca","ca-XV","cs","da","de","dz","el","en-GB","es","et","eu","fi","fr","gl","gu","he","hi","hr","hu","is","it","ja","km","kn","ko","lt","lv","mr","nb","nl","oc","om","or","pl","pt","pt-BR","ru","sh","si","sk","sl","sr","sv","te","tr","ug","vi","zh-CN","zh-TW");
	$("ul#uldown ul").hide(); /* collapse everything */
	$("ul#uldown li:only-child > ul").show(); /* when there is no choice, don't force the user to click */
	$("ul#uldown li#sourcedl > ul > li:first > ul").show(); /* show the latest version of sources by default */
	/* remove obsolete langs from dropdown - map it in the change function instead */
	if ($("select#lang option[value='nso']").length > 0) { $("select#lang option[value='ns']").remove(); }
	if ($("select#lang option[value='be']").length  > 0) { $("select#lang option[value='be-BY']").remove(); }
	/* preselect platform  default to rpm on linux TODO: Change options in html, so that platform here doesn't need any mapping */
	var navplatform = navigator.platform.toLowerCase();
	var platform = "";
	if (navplatform == "win32") {
		platform = "winx86";
	} else if (navplatform == "macintel") {
		platform="macx86" ;
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
	if (userLang.length == 1) {
		userLang = userLang[0].split("-");
	}
	if ( $("select#lang option[value='"+userLang[0]+"-"+userLang[1]+"']").length) {
		$("select#lang").val(userLang[0]+"-"+userLang[1]);
	} else if ( $("select#lang option[value='"+userLang[0]+"']").length) {
		$("select#lang").val(userLang[0]);
	} else {
		$("select#lang").val("en-US");
	}

	$("select#platform").change(function () {
		var sel=$(this).val();
		$("select#lang").trigger("change");
		}).change();

	$("select#lang").change(function () {
		var platform = $("select#platform").val();
		var sel=$(this).val();
		var filteredoutput = "";
		$("ul#uldown > li#libodl > ul > li > a").each(function() {
			var downloadnote = "";
			var fullinstall = "";
			var helppack = "";
			var langpack = "";
			var version = $(this).html();
			/* nso and ns are both used - nso is preferred, be-BY and be are both used, be is preferred */
			if (version.indexOf("3.4.6") >= 0) { return; /* 3.4.6 has security-flaw */}
			if (version.indexOf("3.3.") >= 0) {
				if (sel == "nso") {
					sel="ns";
				} else if (sel == "be") {
					sel="be-BY";
				}
			}

			if (platform == "winx86") {
				if ( !(version.indexOf("3.3.") >= 0) || $.inArray( sel, multilangs ) > -1 ) {
					fullinstall = "<li>"+$(this).next("ul").find("ul.winx86 > li.install.multi").html()+"</li>";
				} else {
					fullinstall = "<li>"+$(this).next("ul").find("ul.winx86 > li.install.all").html()+"</li>";
				}
			} else {
				fullinstall = "<li>"+$(this).next("ul").find("ul."+platform+" >li.install").html()+"</li>";
				if (sel != "en-US") {
					downloadnote = '<p>For languages other than english, you need to download both the full installset (in english language), as well as the language pack that will add support for the desired language</p>';
					langpack = "<li>"+$(this).next("ul").find("ul."+platform+" ul li.lang."+sel).html()+"</li>";
				}
			}
			/* fallback to en-US helppack in case there is none for the desired language */
			helppack = (platform.indexOf("mac") >= 0) ? "" : $(this).next("ul").find("ul."+platform+" ul li.help."+sel).length ? "<li>"+$(this).next("ul").find("ul."+platform+" ul li.help."+sel).html()+"</li>" : "<li>"+$(this).next("ul").find("ul."+platform+" ul li.help.en-US").html() + " (fallback)</li>";
			filteredoutput += "<!-- "+downloadnote+' --><ul class="'+ ((version.indexOf("beta") >= 0 || version.indexOf("rc") >= 0 || version.indexOf("3.6.0") >= 0 ) ? "warning" : (version == "3.6.1" ? "information" : "tick")) +'">'+fullinstall+langpack+helppack+"</ul>";
		});
		if (sel == "pt-BR" && platform == "winx86") {
			/* special treatment for BrOffice - phased out with 3.4 */
			filteredoutput = filteredoutput.replace(/LibO_3.3/g, "BrOffice_3.3");
		}
		$("div#filtered").html(filteredoutput);
		$("div#filtered a").each(function() { try { piwikTracker.addListener(this); } catch(err) {} });
		}).change();

	$("input#BT").change(function () {
		if ( $(this).is(":checked") ) {
			$("div#filtered ul li > a, ul#uldown li > a:not(.action)").each( function() {
				     $(this).attr("href", this.href + ".torrent");
				     $(this).append(".torrent");
				       });
		} else {
			$("div#filtered ul li > a, ul#uldown li > a:not(.action)").each( function() {
				$(this).attr("href", this.href.replace(/\.torrent$/,""));
				$(this).text($(this).text().replace(/\.torrent$/, ""));
				});

		}
	}).change();

	$("input#Details").change(function () {
		if ( $(this).is(":checked") ) {
			if ($("input#BT").is(":checked")) {
				$("div#filtered ul li a, ul#uldown a:not(.action)").each( function() {
					$(this).parent().append('<span class="detaillink"> <a href="' + this.href.replace(/torrent$/,"mirrorlist") +'">md5sum,…</a></span>');
				});
			} else {
				$("div#filtered ul li a, ul#uldown a:not(.action)").each( function() {
					$(this).parent().append('<span class="detaillink"> <a href="' + this.href +'.mirrorlist">md5sum,…</a></span>');
				});
			}
		} else {
			$(".detaillink").remove();
		}
	}).change();

	$("ul#uldown li a.action").click(function(event) {
		$(this).next("ul").slideToggle();
		event.preventDefault();
		});
	/* handle URL-parameters to expand the list */
	if (window.location.hash.indexOf("#sourcedl") >= 0) {
		$("#sourcedl > a").trigger("click");
		$("html,body").animate({ scrollTop: $("#sourcedl").offset().top }, { duration: 'slow', easing: 'swing'});
	}
	/* allow selecting a language by URL parameter */
	if (window.location.search.indexOf("lang=") >= 0) {
		var results = new RegExp('[?&]lang=([^&]*)').exec(window.location.search);
		if (results) {
			$("select#lang").val(results[1]);
			$("select#lang").trigger("change");
		}
	}
})
})(jQuery);
