$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	});

	jQuery('.selectpicker').selectpicker;


	

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	$('.equal-height').matchHeight({
		property: 'max-height'
	});

	// var chartsheight = $('.flotRealtime2').height();
	// $('.traffic-chart').css('height', chartsheight-122);


	// Counter Number
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 3000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});


	 
	 
	// Menu Trigger
	$('#menuToggle').on('click', function(event) {
		var windowWidth = $(window).width();   		 
		if (windowWidth<1010) { 
			$('body').removeClass('open'); 
			if (windowWidth<760){ 
				$('#left-panel').slideToggle(); 
			} else {
				$('#left-panel').toggleClass('open-menu');  
			} 
		} else {
			$('body').toggleClass('open');
			$('#left-panel').removeClass('open-menu');  
		} 
			 
	}); 

	 
	$(".menu-item-has-children.dropdown").each(function() {
		$(this).on('click', function() {
			var $temp_text = $(this).children('.dropdown-toggle').html();
			$(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>'); 
		});
	});


	// Load Resize 
	$(window).on("load resize", function(event) { 
		var windowWidth = $(window).width();  		 
		if (windowWidth<1010) {
			$('body').addClass('small-device'); 
		} else {
			$('body').removeClass('small-device');  
		} 
		
	});
  
 
});
function validateEmail(email)
{
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}
function addAdmin()
{
	var login=document.getElementById("login");
	var name=document.getElementById("name").value;
	var pwd=document.getElementById("pwd");
	var email=document.getElementById("email");

	if(login.value.length<6)
	{
		document.getElementById("err-1").innerHTML="login must have at least 6 caracters";
		return false;
	}
	else
	{
		document.getElementById("err-1").innerHTML=""
	}
	if(/[A-Z]/.test(name[0]))
	{
		document.getElementById("err-2").innerHTML="";
		return false;
	}
	else
	{
		document.getElementById("err-2").innerHTML="First letter of name Must be capitalized";
	}
	if (pwd.value.length<8)
	{
		document.getElementById("err-3").innerHTML="password must have at least 8 caracters";
		return false;
	}
	else
	{
		document.getElementById("err-3").innerHTML=""
	}
	if((validateEmail(email))==false)
	{
		document.getElementById("err-4").innerHTML="Email wrong format:(nomprenom@domain.xyz)";
		return false;
	}
	else
	{
		document.getElementById("err-4").innerHTML=""
	}

}