jQuery.noConflict();
jQuery(document).ready(function($){

// # NAVIGATION BURGER
  $('[data-target]').on('click', function(){
    const navId = $(this).data('target');
    if( $(this).hasClass('is-active') ) {
      $(this).removeClass('is-active');
      $('#' + navId).hide();
    } else {
      $(this).addClass('is-active');
      $('#' + navId).show();
    }
  });

// # STICKY NAVIGATION
  // Stick on scroll
  $(window).on('scroll', function(){
    if( $('.navbar-wrapper.is-fixed').length > 0 ) {
      // Navbar wrapper position
      const navPosition = $('.navbar-wrapper').offset().top;
      // Scroll position
      const viewportPosition = $(document).scrollTop();
      // Stick when scroll position is past navbar wrapper
      if( viewportPosition >= navPosition && viewportPosition > 0 ){
        const navHeight = $('nav.navbar').outerHeight();
        $('nav.navbar').addClass('is-fixed-top');
        $('.navbar-wrapper').css({ 'height': navHeight});
      } else {
        $('nav.navbar').removeClass('is-fixed-top');
        $('.navbar-wrapper').css({ 'height': 'auto'});
      }
    }
  });

// # Smooth Scrolling Anchor Links
  $('.scroll').on('click', function(e){
    e.preventDefault();
    const linkId = $(this).data('scroll');
    const navHeight = $('.navbar').outerHeight() + 50;
    $('html, body').animate({ scrollTop: ($(`#${linkId}`).offset().top - navHeight)}, 900);
  });

// # Animate in on scroll / load
  $(window).on('scroll load', function(){
    $('.fade-in').each( function(i){
      const element = $(this).offset().top + 150;
      const viewport = $(window).scrollTop() + $(window).height();

      if ( viewport > (element - 50) ){
        $(this).css({'opacity': '1', 'transform': 'translateY(0px)'});
      }
    });
  });

// # Modals
  $('[data-modal]').on('click', function(e){
    e.preventDefault();
    const modalId = $(this).data('modal');
    $(`#${modalId}`).addClass('is-active');
  })
  $('.modal-close, .modal-background').on('click', function(e){
    $('.modal.is-active').removeClass('is-active');
  })

// # Module filters

  // term filter
  // $('#moduleTermFilter').on('change', function () {
  //   console.log('testing');
  //   var url = $(this).val(); // get selected value
  //   console.log(url);
  //   if (url) { // require a URL
  //     window.location = url; // redirect
  //   }
  //   return false;
  // });

});
