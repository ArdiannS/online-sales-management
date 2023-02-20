var i = 0;
var images = [];
var time = 5000;
images[0] = "../images/decemberdeals.jpg";
images[1] = "../images/christmasd.jpg";
images[2] = "../images/rtx.jpg";


function changeImg() {
    document.slide.src = images[i];

    if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }
    setTimeout("changeImg()", time);
}
window.onload = changeImg;