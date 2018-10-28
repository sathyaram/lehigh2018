/* =========
   JAVASCRIPT
   ========= */

(function ($) {

	// Puts Scrolled class on Body when Scrolling
	$(window).scroll(function() {  
	      var scroll = $(window).scrollTop();
 
	      if (scroll >= 1) {
	        $('body.front').addClass("scrolling"); 
	      } else {
	        $('body.front').removeClass("scrolling");
	      }
	 });

	$(document).ready(function() {

		// //  Initial Main Menu Height Check for Mobile Menu
		// if ($('.main-menu').height() >= 47) {
		//    $('.main-toggle').show();
		//    $('.main-menu').addClass('overflow');
		// }

		// $('.main-menu').delay(100).queue(function(next){
		//     $(this).addClass("processed");
		//     next();
		// });
		
		// // On Resize of Window Height Check
		// $(window).on('resize', function(){
		// 	if ($('.main-menu').height() >= 47) {
		// 	   $('.main-toggle').show();
		// 	   $('.main-menu').toggleClass('overflow');
		// 	}
		// });

		// Main Menu Toggle
		$('.main-toggle').on('click', function(e) {
			e.preventDefault();
			if($('.quick-toggle').hasClass('on')) {
				// do nothing
			} else {
				$('html').toggleClass('nav-open');	
			}
			$('.header .main-menu, .main-toggle').toggleClass('on');
			$('.secondary-menu, .quick-toggle').removeClass('on');
			$('.header .lines').toggleClass('is-active');
		});

		// Quick Menu Toggle
		$('.quick-toggle').on('click', function(e) {
			e.preventDefault();
			if($('.main-toggle').hasClass('on')) {
				// do nothing
			} else {
				$('html').toggleClass('nav-open');	
			}
			$('.secondary-menu, .quick-toggle').toggleClass('on');
			$('.header .lines').removeClass('is-active');
			$('.header .main-menu, .main-toggle').removeClass('on');
		});

		// Adds 'Hover' class to li and removes when mouses off
 		$(".main-menu > div > ul > li").on("mouseenter", function() {
		    $(this).addClass("hover")
		}).on("mouseleave", function() {
		    $(this).removeClass("hover")
		});

		// Click off Menu and it closes Menu
		$('.main, .banner').click(function(e) {
			$('html').removeClass('nav-open');
			$('.main-menu, .secondary-menu, .main-toggle, .quick-toggle').removeClass('on');
			$('.header .lines').removeClass('is-active');
     	});

		// In This Section Expanding
     	$('.left-nav > button').click(function(e) {
     		e.preventDefault();
     		$('.left-nav').toggleClass('show');
     	});

		// Menu '+' Expanding
		$('.menu-expand').click(function(e) {
		  e.preventDefault();
		  $(this).parent().toggleClass('active');
		});
	});


}(jQuery));