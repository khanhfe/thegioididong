function clickable(){
	document.querySelector('.owl-control').classList.add('active')
}
function clickdisable(){
	document.querySelector('.owl-control').classList.remove('active')
}
var carousel = document.querySelector('.owl-wrapper')
var style = window.getComputedStyle(carousel);
var matrix = new WebKitCSSMatrix(style.webkitTransform)

$('#sync1 .owl-item').css('width','790px')
$('#sync2 .owl-item').css('width','158px')
$('#sync2 .owl-item:first-child').addClass('synced')
$('#sync1 .owl-wrapper').css('width',$('#sync1 .owl-item').length*790+'px');
$('#sync2 .owl-wrapper').css('width',$('#sync2 .owl-item').length*158+'px');
var widthcarousel = document.querySelector('#sync1 .owl-wrapper').offsetWidth
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
$('.product .owl-item').css('width','240px')
var translateX = 0
$('.btn.next').click(function(event) {
	$(this).closest('.product').find('.owl-wrapper').css({
		'width': $(this).closest('.product').find('.owl-item').length*240+'px',
		'left': '0'
	})
	translateX -= $('.product .owl-wrapper-out').width()
	if ((-translateX)>=($('.product .owl-wrapper').width())) {
		translateX = 0
		$(this).closest('.product').find('.owl-wrapper').css({
			'transition': 'all 500ms ease 0s',
			'transform': 'translate3d('+translateX+'px, 0px, 0px)'
		});
	}else{
		$(this).closest('.product').find('.owl-wrapper').css({
			'transition': 'all 200ms ease 0s',
			'transform': 'translate3d('+translateX+'px, 0px, 0px)'
		});
	}
})
$('.btn.prev').click(function(event) {
	$(this).closest('.product').find('.owl-wrapper').css({
		'width': $(this).closest('.product').find('.owl-item').length*240+'px',
		'left': '0'
	});
	if (translateX==0) {
		translateX = - $(this).closest('.product').find('.owl-wrapper-out').width()
		console.log(translateX);
		$(this).closest('.product').find('.owl-wrapper').css({
			'transition': 'all 500ms ease 0s',
			'transform': 'translate3d('+translateX+'px, 0px, 0px)'
		});
	}else{
		translateX += $(this).closest('.product').find('.owl-wrapper-out').width()
		$(this).closest('.product').find('.owl-wrapper').css({
			'transition': 'all 200ms ease 0s',
			'transform': 'translate3d('+translateX+'px, 0px, 0px)'
		});
	}
});