var array = document.querySelectorAll('#sync1 .owl-item')
for (var i = 0; i < array.length; i++) {
	array[i].style.width = '790px'
}
document.querySelector('.owl-wrapper').style.width = 790*array.length+'px'
var widthcarousel = document.querySelector('.owl-wrapper').offsetWidth
var carousel = document.querySelector('.owl-wrapper')
var style = window.getComputedStyle(carousel);
var matrix = new WebKitCSSMatrix(style.webkitTransform)
function clickable(){
	document.querySelector('.owl-control').classList.add('active')
}
function clickdisable(){
	document.querySelector('.owl-control').classList.remove('active')
}
document.querySelector('.owl-next').addEventListener('click',next)
function next(){
	matrix.m41-=790
	if ((-matrix.m41)>=widthcarousel) {
		matrix.m41 = 0
		document.querySelector('.owl-wrapper').style.transition = "all 800ms ease 0s"
		document.querySelector('.owl-wrapper').style.transform = 'translate3d('+matrix.m41+'px, 0, 0)'
	}else{
		document.querySelector('.owl-wrapper').style.transition = "all 500ms ease 0s"
		document.querySelector('.owl-wrapper').style.transform = 'translate3d('+matrix.m41+'px, 0, 0)'
	}		
}
document.querySelector('.owl-prev').addEventListener('click',prev)
function prev(){
	console.log(matrix.m41)
	if ((matrix.m41)==0) {
		matrix.m41 = -widthcarousel +790
		document.querySelector('.owl-wrapper').style.transition = "all 800ms ease 0s"
		document.querySelector('.owl-wrapper').style.transform = 'translate3d('+matrix.m41+'px, 0, 0)'
	}else{
		matrix.m41+=790
		document.querySelector('.owl-wrapper').style.transition = "all 500ms ease 0s"
		document.querySelector('.owl-wrapper').style.transform = 'translate3d('+matrix.m41+'px, 0, 0)'
	}
}
var auto = setInterval(next,5000)
var arraysync2 = document.querySelectorAll('#sync2 .owl-item')
for (var i = 0; i < arraysync2.length; i++) {
	arraysync2[i].style.width = '158px'
}
document.querySelector('#sync2 .owl-wrapper').style.width = 158*arraysync2.length+'px'


document.getElementById('next').addEventListener("click", carouselNext);
var li = document.getElementById('carousel').offsetWidth ;
li = parseInt(li);
function carouselNext() {
	console.log(li);
	document.getElementById("carousel").style.transition = "all 200ms ease 0s"
	document.getElementById("carousel").style.transform = "translateX(-"+li+"px)";
}
document.getElementById('prev').addEventListener("click", carouselPrev);
function carouselPrev() {
	console.log(li);
	document.getElementById("carousel").style.transform = "translateX(0px)";
}