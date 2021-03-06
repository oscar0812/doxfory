(function($) {
  "use strict"

  ///////////////////////////
  // Sign out
  $('#signout').on('click', function() {
    window.location = $(this).attr('data-url');
  });

  ///////////////////////////
  // Scrollspy
  $('body').scrollspy({
    target: '#nav',
    offset: $(window).height() / 2
  });

  ///////////////////////////
  // Smooth scroll
  $("#nav .main-nav a[href^='#'], .scroll").on('click', function(e) {
    e.preventDefault();
    var hash = this.hash;

    if (typeof hash == 'undefined') {
      // if hash isn't found, just send to about section
      hash = "#about";
    }
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 600);
  });

  $('#back-to-top').on('click', function() {
    $('body,html').animate({
      scrollTop: 0
    }, 600);
  });

  ///////////////////////////
  // Btn nav collapse
  $('#nav .nav-collapse').on('click', function() {
    $('#nav').toggleClass('open');
  });

  ///////////////////////////
  // Mobile dropdown
  $('.has-dropdown a').on('click', function() {
    $(this).parent().toggleClass('open-drop');
    return false;
  });

  // if its a link inside the ul and then inside the li, then its valid,
  // change the page to the link
  $('.has-dropdown ul li a').on('click', function() {
    window.location.href = $(this).attr('href');
  });

  ///////////////////////////
  // On Scroll
  $(window).on('scroll', function() {
    var wScroll = $(this).scrollTop();

    if ($("#nav").hasClass("nav-transparent")) {
      // Fixed nav
      wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');
    }

    // Back To Top Appear
    wScroll > 700 ? $('#back-to-top').fadeIn() : $('#back-to-top').fadeOut();
  });

  ///////////////////////////
  // magnificPopup
  $('.work').magnificPopup({
    delegate: '.lightbox',
    type: 'image'
  });

  ///////////////////////////
  // Owl Carousel
  $('#about-slider').owlCarousel({
    items: 1,
    loop: true,
    margin: 15,
    nav: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    dots: true,
    autoplay: true,
    animateOut: 'fadeOut'
  });

  $('#testimonial-slider').owlCarousel({
    loop: true,
    margin: 15,
    dots: true,
    nav: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      992: {
        items: 2
      }
    }
  });

  $('[data-toggle="tooltip"]').tooltip({
    trigger: 'hover',
    html: 'true'
  });

})(jQuery);
