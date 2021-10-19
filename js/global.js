(function($) {
  'use strict';

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $('.popover-dismiss').popover({
      trigger: 'focus'
    })
	
  });
AOS.init();
  $(function() {
    if ($('#mainNav').offset().top > 100) {
      $('#mainNav').addClass('navbar-bg-onscroll');
    }

    $(window).on('scroll', function() {
      var navbarOffset = $('#mainNav').offset().top > 100;
      if(navbarOffset) {
        $('#mainNav').addClass('navbar-bg-onscroll');
      }
      else {
        $('#mainNav').removeClass('navbar-bg-onscroll');
        $('#mainNav').addClass('navbar-bg-onscroll--fade');
      }
    });
  });

  $(function() {
    $('a[href*=#js-scroll-to-]:not([href=#js-scroll-to-])').on('click', function() {
      if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 10
          }, 1000);
          return false;
        }
      }
    });
  });
  
          $('.portfolio-item').isotope({
         	itemSelector: '.item',
         	layoutMode: 'fitRows'
         });
         $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');
         	
         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
		 
}(jQuery));
