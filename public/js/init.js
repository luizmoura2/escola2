$(document).ready(function(){
	$('.button-collapse').sideNav();
	$('.slider').slider({full_width: true});
	$('select').material_select();
	$('.modal').modal();

	//$('.datepicker').pickadate();
	

});

function sliderPrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}
function sliderNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');
}