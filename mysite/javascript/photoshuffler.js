//
// CSS Photo Shuffler v1.0 by
//   Carl Camera
//   http://iamacamera.org
//
// SetOpacity Function and inpiration from Photo Fade by
//   Richard Rutter
//   http://clagnut.com
//
// License: Creative Commons Attribution 2.5  License
//   http://creativecommons.org/licenses/by/2.5/
//
//
// Customize your photo shuffle settings
//
// * Surround the target <img /> with a <div>. specify id= in both
// * set background-repeat:no-repeat in CSS for the div
// * The first and final photo displayed is in the html <img> tag
// * The array contains paths to photos you want in the rotation.
//   If you want the first photo in the rotation, then it's best to
//   put it as the final array image.  All photos must be same dimension
// * The rotations variable specifies how many times to repeat array.
//   images. zero is a valid rotation value.
//

var gblPhotoShufflerDivId = "screenshot-slide";
var gblPhotoShufflerImgId = "screenshot-slide-image";

var gblRotations = 40;
var gblFPS = 20;

// End Customization section

var gblOpacity = 100;
var gblOnDeck = 0;
var gblStartImg;

function photoShufflerLaunch()
{
    var theimg = document.getElementById(gblPhotoShufflerImgId);
    gblStartImg = theimg.src; // save away to show as final image

    document.getElementById(gblPhotoShufflerDivId).style.backgroundImage='url(' + gblImg[gblOnDeck] + ')';
    setTimeout("photoShufflerFade()",gblPauseSeconds*1000);
}

function photoShufflerFade()
{
    var theimg = document.getElementById(gblPhotoShufflerImgId);

    // determine delta based on number of fade seconds
    // the slower the fade the more increments needed
    var fadeDelta = 100 / (gblFPS * gblFadeSeconds);

    // fade top out to reveal bottom image
    if (gblOpacity < 2*fadeDelta)  {
        gblOpacity = 100;
        // stop the rotation if we're done
        if (gblImageRotations < 1) return;
        photoShufflerShuffle();
        // pause before next fade
        setTimeout("photoShufflerFade()",gblPauseSeconds*1000);
    } else {
        gblOpacity -= fadeDelta;
        setOpacity(theimg,gblOpacity);
        setTimeout("photoShufflerFade()",1000/gblFPS);
    }
}

var finished = false;
function photoShufflerShuffle()
{
    var thediv = document.getElementById(gblPhotoShufflerDivId);
    var theimg = document.getElementById(gblPhotoShufflerImgId);

    // copy div background-image to img.src
    theimg.src = gblImg[gblOnDeck];
    // set img opacity to 100
    setOpacity(theimg,100);

    // shuffle the deck
    gblOnDeck = ++gblOnDeck % gblDeckSize;
    // decrement rotation counter
    if (--gblImageRotations < 1) {
        finished = true;
        // insert start/final image if we're done
        gblImg[gblOnDeck] = gblStartImg;
    }

    // slide next image underneath
    thediv.style.backgroundImage='url(' + gblImg[gblOnDeck] + ')';
}

function setOpacity(obj, opacity)
{
    if (finished)
        return;

    opacity = (opacity == 100)?99.999:opacity;

    // IE/Win
    obj.style.filter = "alpha(opacity:"+opacity+")";

    // Safari<1.2, Konqueror
    obj.style.KHTMLOpacity = opacity/100;

    // Older Mozilla and Firefox
    obj.style.MozOpacity = opacity/100;

    // Safari 1.2, newer Firefox and Mozilla, CSS3
    obj.style.opacity = opacity/100;
}
