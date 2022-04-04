(function ($, Drupal, drupalSettings) {


  $(document).ready(function () {
    // animate - 06/26/2019
    // add class .animate
    // add data-animate-effect="zoomIn"

    // for ajax-loaded contents - delegate
    // animate-wrapper must be outside of the loaded ajax contents
    $(".animate-wrapper").on('mouseenter', '.animate', function() {
      $animate_effect = "pulse"; // default
      if (typeof $(e.currentTarget).data('animate-effect') !== 'undefined') {
        $animate_effect = $(this).find(".animate").data("animate-effect");
      }
      $(e.currentTarget).addClass("animated " + $animate_effect);
    });

    // for straightforward contents
    $('.animate').hover(function () {
      $animate_effect = "zoomIn"; // default
      if (typeof $(this).data('animate-effect') !== 'undefined') {
        $animate_effect = $(this).data("animate-effect");
      }

      $(this).addClass("animated " + $animate_effect);
    }, function () {
      $animate_effect = "zoomIn"; // default
      if (typeof $(this).data('animate-effect') !== 'undefined') {
        $animate_effect = $(this).data("animate-effect");
      }
      $(this).removeClass("animated " + $animate_effect);
    });

    // header logo
    $(".region-we-mega-menu").hover(function () {
      $(".we-megamenu .logo-wrapper.logo").addClass("shrink");
    }, function () {
      $(".we-megamenu .logo-wrapper.logo").removeClass("shrink");
    });
  });

  $(document).on("scroll", function () {
    if ($(document).scrollTop() > 100) {
      $(".we-megamenu .logo-wrapper.logo").addClass("shrink");
    } else {
      $(".we-megamenu .logo-wrapper.logo").removeClass("shrink");
    }
  });

})(jQuery, Drupal, drupalSettings);
