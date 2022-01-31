
var img = document.getElementById("img");
var image = ['./icons/slider1.jpg','./icons/slider2.jpg','./icons/slider3.jpg'];
var x=0;
function slide(){
    if(x<image.length){
        x =x+1;
    }else{
        x=1;
    }

    img.innerHTML = "<img src="+image[x-1]+">";
}

setInterval(slide,2000);