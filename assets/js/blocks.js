jQuery.noConflict();
jQuery(document).ready(function($){

// Hero
$('.block-type-hero').each( function() {
  const carousel = $(this).find('.carousel');
  carousel.slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
  });
});

// Cards Carousel
$('.block-type-cards_carousel').each( function() {
  const carousel = $(this).find('.cards-carousel');
  carousel.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    autoplay: false,
    dots: true,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
  ]
  });
});

// Modules Carousel
$('.block-type-modules').each( function() {
  const carousel = $(this).find('.cards-carousel');
  carousel.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    autoplay: false,
    dots: true,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
  ]
  });
});

// Accordion
$('.accordion').each( function( key, value  ) {
  $(this).children('.accordion-title').on('click', function() {
    var current = $(this);
    var id = current.data('accordion');
    if( current.hasClass('is-active') ) {
      current.removeClass('is-active');
      current.parent().find('#' + id).slideUp();
    } else {
      // current.parent().find('.accordion-title.is-active').removeClass('is-active').next().slideUp();
      current.addClass('is-active');
      current.parent().find('#' + id).slideDown();
    }
  });
});
$('.sub-accordion').each( function( key, value  ) {
  $(this).children('.sub-accordion-title').on('click', function() {
    var current = $(this);
    var id = current.data('accordion');
    if( current.hasClass('is-active') ) {
      current.removeClass('is-active');
      current.parent().find('#' + id).slideUp();
    } else {
      // current.parent().find('.sub-accordion-title.is-active').removeClass('is-active').next().slideUp();
      current.addClass('is-active');
      current.parent().find('#' + id).slideDown();
    }
  });
});

// Cards Fancybox
$('[data-fancybox="module-cards"]').fancybox({
	// Options will go here
});

});
