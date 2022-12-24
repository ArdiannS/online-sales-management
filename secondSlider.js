var i = 0;
var images = [];
var time = 5000;
images[0] = "C:\\Users\\Dell\\Desktop\\school-projects\\online-sales-management\\decemberdeals.jpg";
images[1] = "C:\\Users\\Dell\\Desktop\\school-projects\\online-sales-management\\christmasd.jpg";
images[2] = "C:\\Users\\Dell\\Desktop\\school-projects\\online-sales-management\\rtx.jpg";


function changeImg(){
    document.slide.src = images[i];

    if(i < images.length - 1){
        i++;
    }else{
        i=0;
    }
    setTimeout("changeImg()",time);
}
window.onload = changeImg;