// Foundation

jQuery(function($) {

	"use strict";

	$(document).foundation();

});



jQuery(function ($) {
  'use strict'

  var md = new MobileDetect(window.navigator.userAgent)
  var ismobile = md.mobile()

  if (ismobile) {
    $('body').addClass('is-mobile')
  }
})


// Header Revolution Slider

jQuery(function ($) {
  'use strict'

  function getCurrentSliderAPI() {
    var slider = jQuery('.header-slider .rev_slider_wrapper .rev_slider')
    if (!slider.length) return false
    return eval(
      'revapi' + slider.attr('id').split('rev_slider_')[1].split('_')[0]
    )
  }

  var revapi = getCurrentSliderAPI()

  if (revapi) {
    revapi.one('revolution.slide.onloaded', function (e) {
      BackgroundCheck.init({
        targets: '.site-header, .tparrows, .tp-bullets',
        images: '.tp-bgimg',
        minComplexity: 80,
        maxDuration: 1250,
        threshold: 50,
        minOverlap: 10,
      })
    })
    revapi.on('revolution.slide.onchange', function (e, data) {
      node = '.rev_slider ul li:nth-child(' + data.slideIndex + ') .tp-bgimg'
    })
    revapi.on('revolution.slide.onbeforeswap', function (e, data) {
      BackgroundCheck.set('images', node)
      BackgroundCheck.refresh()
    })
  }
})

// Swiper Slider

jQuery(function ($) {
  'use strict'

  $('.eva-slider').each(function () {
    var swiper = new Swiper($(this), {
      // Optional parameters
      init: false,
      direction: 'horizontal',
      loop: true,
      grabCursor: true,
      preventClicks: true,
      preventClicksPropagation: true,
      autoplay: 10000,
      speed: 600,
      effect: 'slide',
      slidesPerView: 1,

      // // If we need pagination

      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
      },

      // // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      parallax: true,
    })

    swiper.on('init', function () {
      bgcheck()
    })

    swiper.init()

    swiper.on('slideChangeTransitionStart', function () {
      bgcheck()
    })

    function bgcheck() {
      var sliderColor = $('.eva-slider').attr('data-slider-color')
      var slideColor = $(swiper.slides[swiper.activeIndex]).attr(
        'data-slide-color'
      )

      if (sliderColor == 'true') {
        $(
          '.site-header, #header-top-bar, .eva-slider.swiper-container'
        ).removeClass('inherit background--light background--dark')
        $(
          '.site-header, #header-top-bar, .eva-slider.swiper-container'
        ).addClass(slideColor)
      } else {
        $('.eva-slider.swiper-container').removeClass(
          'inherit background--light background--dark'
        )
        $('.eva-slider.swiper-container').addClass(slideColor)
      }
    }
  })
})


// Post Gallery

jQuery(function ($) {
  'use strict'

  $('.format-gallery .swiper-container').each(function () {
    var gallerySwiper = new Swiper($(this), {
      init: false,
      speed: 300,
      centeredSlides: true,
      mode: 'horizontal',
      loop: true,
      slidesPerView: 1,

      grabCursor: true,
      pagination: {
        el: '.swiper-pagination',
      },

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      on: {
        slideChangeTransitionEnd: function () {
          BackgroundCheck.refresh()
        },
      },
    })

    gallerySwiper.on('init', function () {
      BackgroundCheck.init({
        targets: '.format-gallery .gallery-slider .swiper-container',
        images: '.swiper-slide img',
        minComplexity: 80,
        maxDuration: 1250,
        threshold: 50,
        minOverlap: 10,
      })

      setTimeout(function () {
        $('.gallery-slider-wrapper').css('visibility', 'visible')
        $('.gallery-slider-wrapper').css('opacity', '1')
      }, 300)
    })

    gallerySwiper.init()
  })
})



// Off-canvas Navigation

jQuery(function($) {
	
	"use strict";

	// $(document).foundation();

	window.offcanvas_open = false;
	window.offcanvas_from_left = false;
	window.offcanvas_from_right = false;

	window.offcanvas_close = function() {		
		
		window.offcanvas_open = false;
		window.offcanvas_from_left = false;
		window.offcanvas_from_right = false;			
		
		$("body").removeClass("offcanvas_open offcanvas_left offcanvas_right");

		$(".offcanvas_main_content").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {   
            setTimeout(function(){ 
            	$(window).trigger('resize');
            }, 600);
        });

	}

	window.offcanvas_left = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();
		window.offcanvas_open = true;
		window.offcanvas_from_left = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_left");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });		
	}

	window.offcanvas_right = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();	
		window.offcanvas_open = true;
		window.offcanvas_from_right = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_right");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });		
	}
	
	// Overlay Close Offcanvas

	$( ".offcanvas_overlay" ).on( "click", function() {
		window.offcanvas_close();
		$(".menu-trigger").removeClass("hovertrig");
    }); 

	$('.offcanvas_aside_left .offcanvas_close, .offcanvas_aside_right .offcanvas_close').on('click', function(){
		window.offcanvas_close();
		$(".menu-trigger").removeClass("hovertrig");
	});
});


jQuery(function($) {
	
	"use strict";

	$( ".menu-trigger" ).on( "click", function() {
		$('.offcanvas_mainmenu').show();
		$('.offcanvas_sidebars').hide();
		$(this).addClass("hovertrig");

		window.offcanvas_left();
    }); 

	$( ".search-button" ).on( "click", function(e) {
		e.preventDefault();
		
		$('.offcanvas_search').show();
		$('.offcanvas_sizechart').hide();
		$('.offcanvas_minicart').hide();

		$('.offcanvas_aside_right').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$('.offcanvas_search').find('input[type="search"]').focus().end().off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		});		

		window.offcanvas_right();
    }); 


	$( ".eva-size-chart-link" ).on( "click", function(e) {

		e.preventDefault();
		
		$('.offcanvas_sizechart').show();
		$('.offcanvas_search').hide();
		$('.offcanvas_minicart').hide();	

		window.offcanvas_right();

	});

});


// Off-canvas Navigation Reset

jQuery(function($) {
    "use strict";
	$('nav#menu').mmenu({
         offCanvas: false,
         "navbar": {
            "title": false
         }
     });
});


jQuery(function($) {
	
	"use strict";

	$( ".woocommerce .catalog-ordering .shop-filter" ).on( "click", function() {
		$('.offcanvas_mainmenu').hide();
		$('.offcanvas_sidebars').show();
		$('.offcanvas_blog_sidebar').hide();
		$('.offcanvas_shop_sidebar').show();

		window.offcanvas_left();
	});


});


jQuery(function($) {
	
	"use strict";


	var list_mobile_link = $('.list_shop_categories.mobile a'),
		list_mobile = $('.list_shop_categories.mobile'),
		list_desktop = $('.list_shop_categories.desktop'),
		page_header = $('.page-header');


	list_mobile_link.on('click', function(event){
		event.preventDefault();
		list_mobile.toggleClass('active');
		list_desktop.toggleClass('active');
		page_header.toggleClass('active');
	});


});



// Navigation Animation

jQuery(function($) {
	
	"use strict";

	var left_offCanvasIn = [{
	  e: $(".offcanvas_mainmenu nav#menu"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 600,
	    delay: 400
	  }
	},{
	  e: $(".offcanvas_mainmenu .offcanvas_close, .offcanvas_aside .language_currency, .mob_inputbox, .offcanvas_aside .header-contact"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 700,
	    delay: 100
	  }
	},{
	  e: $(".offcanvas_mainmenu nav#menu hr"),
	  p: {
	    opacity: [1, 0],
	    width: [50]
	  },
	  o: {
	    duration: 600,
	    delay: 0
	  }
	}];

	var right_cart_offCanvasIn = [{
	  e: $(".offcanvas_minicart"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 700,
	    delay: 800
	  }
	}];

	var right_search_offCanvasIn = [{
	  e: $(".offcanvas_search"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 700,
	    delay: 800
	  }
	}];

	var right_sizechart_offCanvasIn = [{
	  e: $(".offcanvas_sizechart"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 700,
	    delay: 800
	  }
	}];

	var left_offCanvasIn_sidebar = [{
	  e: $(".offcanvas_sidebars .offcanvas_close, .offcanvas_shop_sidebar"),
	  p: {
	    opacity: [1, 0]
	  },
	  o: {
	    duration: 700,
	    delay: 800
	  }
	}];

	var left_offCanvasOut = [{
	  e: $(".offcanvas_mainmenu .offcanvas_close, .offcanvas_mainmenu nav#menu, .offcanvas_aside .language_currency, .mob_inputbox, .offcanvas_aside .header-contact"),
	  p: {
	    opacity: [0, 1]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	},{
	  e: $(".offcanvas_mainmenu nav#menu hr"),
	  p: {
	    width: [0]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	}];

	var right_cart_offCanvasOut = [{
	  e: $(".offcanvas_minicart"),
	  p: {
	    opacity: [0, 1]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	}];

	var right_search_offCanvasOut = [{
	  e: $(".offcanvas_search"),
	  p: {
	    opacity: [0, 1]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	}];

	var right_sizechart_offCanvasOut = [{
	  e: $(".offcanvas_sizechart"),
	  p: {
	    opacity: [0, 1]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	}];

	var left_offCanvasOut_sidebars = [{
	  e: $(".offcanvas_shop_sidebar, .offcanvas_sidebars .offcanvas_close"),
	  p: {
	    opacity: [0, 1]
	  },
	  o: {
	    duration: 700,
	    delay: 0
	  }
	}];


	$(".menu-trigger").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(left_offCanvasIn);

	  	var $subMenuItem = $(".mm-panels > .mm-panel > .offcanvas_menu.mm-listview > li"),
	  		$transitionEffect = 'transition.slideLeftIn';

	  	if( $('body').hasClass('rtl') ) {
			$transitionEffect = 'transition.slideRightIn';
	  	} else {
			$transitionEffect = 'transition.slideLeftIn';
	  	}

	    $subMenuItem.velocity($transitionEffect, {
	      delay: 500,
	      duration: 300,
	      stagger: 100,
	    });	 	    	     
	});

	$(".woocommerce .catalog-ordering .shop-filter").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(left_offCanvasIn_sidebar); 	  	    	     
	});

	$(".cart-button").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(right_cart_offCanvasIn); 	  	    	     
	});

	$(".search-button").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(right_search_offCanvasIn); 	  	    	     
	});

	$(".eva-size-chart-link").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(right_sizechart_offCanvasIn); 	  	    	     
	});



	$("body").on("click", ".products .add_to_cart_button.product_type_simple, .wpb_wrapper .product .add_to_cart_button.product_type_simple", function(event) {
		event.preventDefault();

		setTimeout(function(){
		$("body").addClass("offcanvas_for_cart");
		$('.offcanvas_search').hide();
		$('.offcanvas_sizechart').hide();
		$.Velocity.RunSequence(right_cart_offCanvasIn);

		window.offcanvas_right();
		}, 1000);
	});


	$(".offcanvas_overlay, .offcanvas_mainmenu .offcanvas_close").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(left_offCanvasOut);
  
		var $menu = $("nav#menu");
		$menu.mmenu();

		var api = $menu.data( "mmenu" );
		setTimeout(function(){
		  api.closeAllPanels();
		}, 1000);
	});

	$(".offcanvas_overlay, .offcanvas_minicart .offcanvas_close").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(right_cart_offCanvasOut);
	});

	$(".offcanvas_overlay, .offcanvas_search .offcanvas_close").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(right_search_offCanvasOut);
	});

	$(".offcanvas_overlay, .offcanvas_sizechart .offcanvas_close").on('click', function(event) {
	  event.preventDefault();
	  
	  $.Velocity.RunSequence(right_sizechart_offCanvasOut);
	});

	$(".offcanvas_overlay, .offcanvas_sidebars .offcanvas_close").on('click', function(event) {
	  event.preventDefault();
	  $.Velocity.RunSequence(left_offCanvasOut_sidebars);
	});


});


jQuery(function($) {
	
	"use strict";

	$( ".cart-button" ).on( "click", function(e) {
		$('.offcanvas_search').hide();
		$('.offcanvas_sizechart').hide();
		$("body").addClass("offcanvas_for_cart");
		
		e.preventDefault();
		$('.offcanvas_minicart').show();
		
		window.offcanvas_right();
    }); 
});


jQuery(function($) {
	
	"use strict";

	$(document.body).on('added_to_wishlist removed_from_wishlist', function() {
		$.ajax({
			url     : eva_scripts_vars.eva_ajax_url,
			dataType: 'json',
			method  : 'post',
			data    : {
				action: 'eva_update_wishlist_count'
			},
			success : function(data) {
				$('.site-header').find('.wishlist-button .wishlist_items_number').html(data);
			}
		});
	});	

})

jQuery(function($) {
	
	"use strict";

	// $(".product_after_shop_loop .product_type_simple.add_to_cart_button, .category-price-grid-list .product_type_simple.add_to_cart_button, .single_add_to_cart_button").prepend("<span class='button-loader'></span>")


	$('.add_to_cart_button').on('click',function(){
		$(this).parents('li.product').addClass('product_added_to_cart')	
	})

	// $('.add_to_cart_button').one('click',function(){
		
	// 	var	add_to_cart_classes,
	// 		add_to_cart_styles,
	// 		that = $(this);
		
	// 	add_to_cart_classes = that.attr('class');
	// 	add_to_cart_classes=add_to_cart_classes.replace('add_to_cart_button','');
		
	// 	add_to_cart_styles = that.attr('style');
	// 	$('.offcanvas_search').hide();
	// 	$('.offcanvas_sizechart').hide();
	// 	$('.offcanvas_minicart').show();
		
	// 	that.parent().on('DOMNodeInserted', function(e) {
	// 		e.stopPropagation();
			
	// 		if ($(e.target).is('.added_to_cart')) {
	// 			$(e.target).addClass(add_to_cart_classes).removeClass('added_to_cart').addClass('added_to_cart_button');
	// 		    $(e.target).attr('style',add_to_cart_styles);
	// 		}
	// 	});
	// })

});

// CART REMOVE PRODUCT

jQuery(function($) {
	
	"use strict";

	var $cartPanel = $('.offcanvas_minicart');

	$cartPanel.on('click', '.remove', function(e) {
		e.preventDefault();
		e.stopPropagation();

		$('.offcanvas_aside_content .loading-overlay').fadeIn(200);
		$('.offcanvas_minicart').removeClass( "blurcontent-off" ).addClass( "blurcontent" );


		var currentURL = $(this).attr('href');
		$.ajax({
			url     : eva_scripts_vars.eva_ajax_url,
			dataType: 'json',
			method  : 'post',
			data    : {
				action: 'eva_remove_mini_cart_item',
				nonce : eva_scripts_vars.nonce,
				item  : $(this).data('item_key')
			},
			error   : function(response) {
				window.location = currentURL;
			},
			success : function(response) {

				if ( !response ) {
					window.location = currentURL;
					return;
				}

				if ( response.data == '0' ) {
					window.location = currentURL;
					return;
				}

				$(document.body).trigger('updated_wc_div');
				$(document.body).on('wc_fragments_refreshed', function() {
						$('.offcanvas_aside_content .loading-overlay').fadeOut(100);
						$('.offcanvas_minicart').removeClass( "blurcontent" ).addClass( "blurcontent-off" );
						$('.offcanvas_minicart').removeClass( "blurcontent-off" );
						$('.offcanvas_minicart').css("opacity", "1");
				});
			}
		});
	});

});





// Select settings

jQuery(function($) {
	
	"use strict";


	// $('select:not(.state_select):not(.country_select):not(.country_to_state):not(#calc_shipping_state), .top_bar_shop .orderby, .top_bar_shop .count, .widget-area select').select2({
	// 	allowClear: true,
	// 	minimumResultsForSearch: Infinity,
	// 	dropdownAutoWidth : true,
	// });

	$('.top_bar_shop .orderby, .top_bar_shop .count, .widget-area select').select2({
		// allowClear: true,
		minimumResultsForSearch: Infinity,
		dropdownAutoWidth : true,
	});

	$('.woocommerce-shipping-calculator select').select2({
		// allowClear: true,
		// minimumResultsForSearch: Infinity,
		// dropdownAutoWidth : true,
	});


	/////////////////////////////////////////////
	// WOOCOMMERCE SHOW PRODUCTS
	/////////////////////////////////////////////

	$('.woocommerce-viewing').off( 'change' ).on( 'change', 'select.count', function() {
		$( this ).closest( 'form' ).submit();	
	});

	$(".product_infos .variations .value select").wrap( '<label class="variation-select"></label>' );

});




jQuery(function ($) {
  'use strict'

  //comming from wp_localize_script

  //eva_scripts_vars.shop_pagination_type
  //eva_scripts_vars.shop_layout_style

  //eva_scripts_vars.ajax_load_more_locale
  //eva_scripts_vars.ajax_loading_locale
  //eva_scripts_vars.ajax_no_more_items_locale

  var eva_ajax_load = {
    init: function () {
      if (
        eva_scripts_vars.shop_pagination_type == 'load_more' ||
        eva_scripts_vars.shop_pagination_type == 'infinite_scroll'
      ) {
        $(document).ready(function () {
          if ($('.woocommerce-pagination').length) {
            $('.woocommerce-pagination').before(
              '<div class="eva_ajax_load_button animated fadeIn"><a eva_ajax_load_more_processing="0"><i class="icon-px-outline-load"></i>&nbsp;&nbsp;' +
                eva_scripts_vars.ajax_load_more_locale +
                '</a></div>'
            )

            if (eva_scripts_vars.shop_pagination_type == 'infinite_scroll') {
              $('.eva_ajax_load_button').addClass('eva_ajax_load_more_hidden')
            }

            if ($('.woocommerce-pagination a.next').length == 0) {
              $('.eva_ajax_load_button').addClass('eva_ajax_load_more_hidden')
            }
          }

          //$('.woocommerce-pagination').addClass('eva_ajax_load_more_hidden');
          $('.woocommerce-pagination').hide()
          $('ul.products.products-grid li.product').addClass(
            'eva_ajax_load_more_item_visible'
          )
        })

        $('body').on('click', '.eva_ajax_load_button a', function (e) {
          e.preventDefault()

          if ($('.woocommerce-pagination a.next').length) {
            $('.eva_ajax_load_button a').attr(
              'eva_ajax_load_more_processing',
              1
            )
            var href = $('.woocommerce-pagination a.next').attr('href')

            /*if(!eva_ajax_load.msieversion()) {
							history.pushState(null, null, href);
						}*/

            eva_ajax_load.onstart()

            $('.eva_ajax_load_button').hide()
            $('.woocommerce-pagination').before(
              '<div class="eva_ajax_load_more_loader animated fadeIn"><a href="#"><i class="icon-px-outline-load"></i>&nbsp;&nbsp;<span>' +
                eva_scripts_vars.ajax_loading_locale +
                '</span></a></div>'
            )

            $.get(href, function (response) {
              /*if(!eva_ajax_load.msieversion()) {
								document.title = $(response).filter('title').html();
							}*/

              $('.woocommerce-pagination').html(
                $(response).find('.woocommerce-pagination').html()
              )

              $(response)
                .find('ul.products.products-grid li.product')
                .each(function () {
                  $(this).addClass('hidden_pr')

                  $('ul.products li.product:last').after($(this))
                })

              $('.eva_ajax_load_more_loader').fadeOut('slow')
              $('.eva_ajax_load_button').fadeIn('slow')

              $('.eva_ajax_load_button a').attr(
                'eva_ajax_load_more_processing',
                0
              )

              eva_ajax_load.onfinish()

              setTimeout(function () {
                $('ul.products li.product')
                  .not('.eva_ajax_load_more_item_visible')
                  .addClass('animated fadeIn')
                  .one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                      $(this)
                        .removeClass('hidden_pr animated fadeIn')
                        .addClass('eva_ajax_load_more_item_visible')
                    }
                  )
              }, 500)

              if ($('.woocommerce-pagination a.next').length == 0) {
                $('.eva_ajax_load_button')
                  .addClass('finished')
                  .removeClass('eva_ajax_load_more_hidden')
                $('.eva_ajax_load_button a')
                  .show()
                  .html(eva_scripts_vars.ajax_no_more_items_locale)
                  .addClass('disabled')
              }
            })
          } else {
            $('.eva_ajax_load_button')
              .addClass('finished')
              .removeClass('eva_ajax_load_more_hidden')
            $('.eva_ajax_load_button a')
              .show()
              .html(eva_scripts_vars.ajax_no_more_items_locale)
              .addClass('disabled')
          }
        })
      }

      if (eva_scripts_vars.shop_pagination_type == 'infinite_scroll') {
        var buffer_pixels = Math.abs(0)

        $(window).on('scroll', function () {
          if ($('ul.products').length) {
            var a =
              $('ul.products.products-grid').offset().top +
              $('ul.products').outerHeight()
            var b = a - $(window).scrollTop()

            if (b - buffer_pixels < $(window).height()) {
              if (
                $('.eva_ajax_load_button a').attr(
                  'eva_ajax_load_more_processing'
                ) == 0
              ) {
                $('.eva_ajax_load_button a').trigger('click')
              }
            }
          }
        })
      }
    },

    onstart: function () {},

    onfinish: function () {
      // window.shop_sidebar();
    },

    /*msieversion: function() {
	        var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");

	        if (msie > 0) // If Internet Explorer, return version number
	            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));

	        return false;
	    },*/
  }

  eva_ajax_load.init()
  eva_ajax_load.onfinish()
})


// Wishlist

jQuery(function($) {
	
	"use strict";

	// $("body").on('added_to_wishlist', function() { 
	// 	window.eva_refresh_dynamic_contents();
	// });

	// $("body").on('removed_from_wishlist', function() { 
	// 	window.eva_refresh_dynamic_contents();
	// });

	// $("#yith-wcwl-form").on("click", ".product-add-to-cart a", function() {
	// 	setTimeout(function() {	
	// 		window.eva_refresh_dynamic_contents();
	// 	}, 2000);
	// });

});

jQuery(function ($) {
  if ($('body[data-form-style="minimal"]').length > 0) {
    //turn user set place holders into labels for effect
    function convertPlaceholders() {
      $(
        'form input[placeholder]:not([name="min_price"]):not([name="max_price"]):not(.select2-search__field), form textarea[placeholder]'
      ).each(function (i) {
        if ($(this).attr('placeholder').length > 1) {
          var $placeholder = $(this).attr('placeholder')
          var $inputID = $(this).is('[id]') ? $(this).attr('id') : 'id-' + i
          //add placeholder as label if label doesn't already exist

          //skip cf7                               //|| $(this).prev('label').length == 1 && $placeholder.length > $(this).prev('label').text().length
          if ($(this).parents('.wpcf7-form-control-wrap').length == 0) {
            if ($(this).prev('label').length == 0 || $(this).is('textarea')) {
              $(
                '<label for="' + $inputID + '">' + $placeholder + '</label>'
              ).insertBefore($(this))
            }
          } else {
            if (
              $(this).parents('.wpcf7-form-control-wrap').find('label')
                .length == 0
            ) {
              $(
                '<label for="' + $inputID + '">' + $placeholder + '</label>'
              ).insertBefore($(this).parents('.wpcf7-form-control-wrap '))
            }
          }
          $(this).removeAttr('placeholder')
        }
      })
    }
    convertPlaceholders()
    setTimeout(convertPlaceholders, 500)

    //woocommerce placeholder fix
    $(
      '#billing_country, #shipping_country, .country_to_state, .select2-search__field'
    ).on('change', function () {
      convertPlaceholders()
      removeExcessLabels()
      var $wooDynamicPlaceholders = setInterval(function () {
        convertPlaceholders()
        convertToMinimalStyle('form label')
        removeExcessLabels()
      }, 30)
      setTimeout(function () {
        clearInterval($wooDynamicPlaceholders)
      }, 600)
    })

    function convertToMinimalStyle(selector) {
      $(selector).each(function () {
        if (
          $(this)
            .parent()
            .find(
              'input:not([type="checkbox"]):not([type="hidden"]):not(#search-outer input):not(.adminbar-input):not([type="radio"]):not([type="submit"]):not([type="button"]):not([type="date"]):not([type="color"]):not([type="range"]):not([role="button"]):not([role="combobox"]):not(.select2-focusser):not([name="min_price"]):not([name="max_price"])'
            ).length == 1 ||
          $(this).parent().find('textarea').length == 1
        ) {
          if ($(this).parents('.minimal-form-input').length == 0) {
            //if there's a direct input next to label

            if ($(this).next('input').length == 1) {
              $(this)
                .next('input')
                .addBack()
                .wrapAll('<div class="minimal-form-input"/>')
            } else if ($(this).find('.wpcf7-form-control-wrap').length > 0) {
              var $cloneInput = $(this).find('.wpcf7-form-control-wrap')
              $(this).find('.wpcf7-form-control-wrap').remove()
              $cloneInput.insertAfter($(this))
              $(this).parent().wrapInner('<div class="minimal-form-input" />')
            } else {
              //if we need to traverse to parent instead
              $(this).parent().wrapInner('<div class="minimal-form-input" />')
            }
            var $html = $(this).html()
            $(this)[0].innerHTML =
              '<span class="text"><span class="text-inner">' +
              $html +
              '</span></span>'

            if ($(this).parent().find('textarea').length == 1)
              $(this).parents('.minimal-form-input').addClass('textarea')
          }
        }
      })

      //for labels that changed that already have minimal form markup - just need to update content
      $(selector).each(function () {
        if (
          $(this).parents('.minimal-form-input').length == 1 &&
          $(this).find('.text').length == 0
        ) {
          var $html = $(this).html()
          $(this)[0].innerHTML =
            '<span class="text"><span class="text-inner">' +
            $html +
            '</span></span>'
        }
      })
    }

    convertToMinimalStyle('form label')

    jQuery(document.body).on('updated_cart_totals', function () {
      convertToMinimalStyle('form label')
    })

    setTimeout(function () {
      convertToMinimalStyle('form label')
      removeExcessLabels()
      checkValueOnLoad()
    }, 501)

    //remove excess labels
    function removeExcessLabels() {
      $('.minimal-form-input').each(function () {
        if ($(this).find('label').length > 1) {
          var $lngth = 0
          $(this)
            .find('label')
            .each(function () {
              if ($(this).text().length >= $lngth) {
                $lngth = $(this).text().length
                $(this)
                  .parents('.minimal-form-input')
                  .find('label')
                  .addClass('tbr')
                $(this).removeClass('tbr')
              }
            })
          $(this).find('label.tbr').remove()
        }
      })
    }
    removeExcessLabels()

    //add labels to inputs that don't have them
    $(
      'input:not([type="checkbox"]):not([type="radio"]):not([type="submit"]):not(#search-outer input):not([type="hidden"]):not([type="button"]):not([type="date"]):not([type="color"]):not([type="number"]):not([type="range"]):not([role="button"]):not([role="combobox"]):not(.select2-focusser):not([name="min_price"]):not([name="max_price"]), textarea'
    ).each(function () {
      if ($(this).parents('.minimal-form-input').length == 0) {
        $('<label></label>').insertBefore($(this))
        convertToMinimalStyle($(this).prev('label'))
      }
    })

    $('body').on(
      'focus',
      '.minimal-form-input input, .minimal-form-input textarea',
      function () {
        $(this)
          .parents('.minimal-form-input')
          .addClass('filled')
          .removeClass('no-text')
      }
    )
    $('body').on(
      'blur',
      '.minimal-form-input input, .minimal-form-input textarea',
      function () {
        if ($(this).val().length > 0)
          $(this)
            .parents('.minimal-form-input')
            .addClass('has-text')
            .removeClass('no-text')
        else
          $(this)
            .parents('.minimal-form-input')
            .removeClass('has-text')
            .addClass('no-text')
        $(this).parents('.minimal-form-input').removeClass('filled')
      }
    )

    //on load
    function checkValueOnLoad() {
      $('.minimal-form-input input, .minimal-form-input textarea').each(
        function () {
          if ($(this).val().length > 0)
            $(this)
              .parents('.minimal-form-input')
              .addClass('has-text')
              .removeClass('no-text')
        }
      )
    }
    checkValueOnLoad()

    // Textarea Auto Resize
    var hiddenDiv = $('.hiddendiv').first()
    if (!hiddenDiv.length) {
      hiddenDiv = $('<div class="textareahiddendiv common"></div>')
      $('body').append(hiddenDiv)
    }
    var text_area_selector = 'textarea'

    function textareaAutoResize($textarea) {
      // Set font properties of hiddenDiv

      var fontFamily = $textarea.css('font-family')
      var fontSize = $textarea.css('font-size')

      if (fontSize) {
        hiddenDiv.css('font-size', fontSize)
      }
      if (fontFamily) {
        hiddenDiv.css('font-family', fontFamily)
      }

      if ($textarea.attr('wrap') === 'off') {
        hiddenDiv.css('overflow-wrap', 'normal').css('white-space', 'pre')
      }

      hiddenDiv.text($textarea.val() + '\n')
      var content = hiddenDiv.html().replace(/\n/g, '<br>')
      hiddenDiv.html(content)

      // When textarea is hidden, width goes crazy.
      // Approximate with half of window size

      if ($textarea.is(':visible')) {
        hiddenDiv.css('width', $textarea.width())
      } else {
        hiddenDiv.css('width', $(window).width() / 2)
      }

      $textarea.css('height', hiddenDiv.height())
    }

    $(text_area_selector).each(function () {
      var $textarea = $(this)
      if ($textarea.val().length) {
        textareaAutoResize($textarea)
      }
    })

    $('body').on('keyup keydown autoresize', text_area_selector, function () {
      textareaAutoResize($(this))
    })
  }
})


/**
 * categories.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2016, Codrops
 * http://www.codrops.com
 */
;(function(window) {

	'use strict';

	// Helper vars and functions.
	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	// from http://www.quirksmode.org/js/events_properties.html#position
	function getMousePos(e) {
		var posx = 0, posy = 0;
		if (!e) var e = window.event;
		if (e.pageX || e.pageY) 	{
			posx = e.pageX;
			posy = e.pageY;
		}
		else if (e.clientX || e.clientY) 	{
			posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
		}
		return { x : posx, y : posy }
	}

	/**
	 * TiltFx obj.
	 */
	function TiltFx(el, options) {
		this.DOM = {};
		this.DOM.el = el;
		this.options = extend({}, this.options);
		extend(this.options, options);
		this._init();
	}

	TiltFx.prototype.options = {
		movement: {
			imgWrapper : {
				translation : {x: 0, y: 0, z: 0},
				rotation : {x: -5, y: 5, z: 0},
				reverseAnimation : {
					duration : 1200,
					easing : 'easeOutElastic',
					elasticity : 600
				}
			},
			lines : {
				translation : {x: 10, y: 10, z: [0,10]},
				reverseAnimation : {
					duration : 1000,
					easing : 'easeOutExpo',
					elasticity : 600
				}
			},
			caption : {
				translation : {x: 20, y: 20, z: 0},
				rotation : {x: 0, y: 0, z: 0},
				reverseAnimation : {
					duration : 1500,
					easing : 'easeOutElastic',
					elasticity : 600
				}
			},
			/*
			overlay : {
				translation : {x: 10, y: 10, z: [0,50]},
				reverseAnimation : {
					duration : 500,
					easing : 'easeOutExpo'
				}
			},
			*/
			shine : {
				translation : {x: 50, y: 50, z: 0},
				reverseAnimation : {
					duration : 1200,
					easing : 'easeOutElastic',
					elasticity: 600
				}
			}
		}
	};

	/**
	 * Init.
	 */
	TiltFx.prototype._init = function() {
		this.DOM.animatable = {};
		this.DOM.animatable.imgWrapper = this.DOM.el.querySelector('.tilter__figure');
		this.DOM.animatable.lines = this.DOM.el.querySelector('.tilter__deco--lines');
		this.DOM.animatable.caption = this.DOM.el.querySelector('.tilter__caption');
		this.DOM.animatable.overlay = this.DOM.el.querySelector('.tilter__deco--overlay');
		this.DOM.animatable.shine = this.DOM.el.querySelector('.tilter__deco--shine > div');
		this._initEvents();
	};

	/**
	 * Init/Bind events.
	 */
	TiltFx.prototype._initEvents = function() {
		var self = this;
		
		this.mouseenterFn = function() {
			for(var key in self.DOM.animatable) {
				anime.remove(self.DOM.animatable[key]);
			}
		};
		
		this.mousemoveFn = function(ev) {
			requestAnimationFrame(function() { self._layout(ev); });
		};
		
		this.mouseleaveFn = function(ev) {
			requestAnimationFrame(function() {
				for(var key in self.DOM.animatable) {
					if( self.options.movement[key] == undefined ) {continue;}
					anime({
						targets: self.DOM.animatable[key],
						duration: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.duration || 0 : 1,
						easing: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.easing || 'linear' : 'linear',
						elasticity: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.elasticity || null : null,
						scaleX: 1,
						scaleY: 1,
						scaleZ: 1,
						translateX: 0,
						translateY: 0,
						translateZ: 0,
						rotateX: 0,
						rotateY: 0,
						rotateZ: 0
					});
				}
			});
		};

		this.DOM.el.addEventListener('mousemove', this.mousemoveFn);
		this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
		this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
	};

	TiltFx.prototype._layout = function(ev) {
		// Mouse position relative to the document.
		var mousepos = getMousePos(ev),
			// Document scrolls.
			docScrolls = {left : document.body.scrollLeft + document.documentElement.scrollLeft, top : document.body.scrollTop + document.documentElement.scrollTop},
			bounds = this.DOM.el.getBoundingClientRect(),
			// Mouse position relative to the main element (this.DOM.el).
			relmousepos = { x : mousepos.x - bounds.left - docScrolls.left, y : mousepos.y - bounds.top - docScrolls.top };

		// Movement settings for the animatable elements.
		for(var key in this.DOM.animatable) {
			if( this.DOM.animatable[key] == undefined || this.options.movement[key] == undefined ) {
				continue;
			}
			var t = this.options.movement[key] != undefined ? this.options.movement[key].translation || {x:0,y:0,z:0} : {x:0,y:0,z:0},
				r = this.options.movement[key] != undefined ? this.options.movement[key].rotation || {x:0,y:0,z:0} : {x:0,y:0,z:0},
				setRange = function (obj) {
					for(var k in obj) {
						if( obj[k] == undefined ) {
							obj[k] = [0,0];
						}
						else if( typeof obj[k] === 'number' ) {
							obj[k] = [-1*obj[k],obj[k]];
						}
					}
				};

			setRange(t);
			setRange(r);
			
			var transforms = {
				translation : {
					x: (t.x[1]-t.x[0])/bounds.width*relmousepos.x + t.x[0],
					y: (t.y[1]-t.y[0])/bounds.height*relmousepos.y + t.y[0],
					z: (t.z[1]-t.z[0])/bounds.height*relmousepos.y + t.z[0],
				},
				rotation : {
					x: (r.x[1]-r.x[0])/bounds.height*relmousepos.y + r.x[0],
					y: (r.y[1]-r.y[0])/bounds.width*relmousepos.x + r.y[0],
					z: (r.z[1]-r.z[0])/bounds.width*relmousepos.x + r.z[0]
				}
			};

			this.DOM.animatable[key].style.WebkitTransform = this.DOM.animatable[key].style.transform = 'translateX(' + transforms.translation.x + 'px) translateY(' + transforms.translation.y + 'px) translateZ(' + transforms.translation.z + 'px) rotateX(' + transforms.rotation.x + 'deg) rotateY(' + transforms.rotation.y + 'deg) rotateZ(' + transforms.rotation.z + 'deg)';
		}
	};

	window.TiltFx = TiltFx;

})(window);


jQuery(function($) {
	
	"use strict";

		(function() {
			var tiltSettings = [
			{},
			{
				movement: {
					imgWrapper : {
						translation : {x: 10, y: 10, z: 30},
						rotation : {x: 0, y: -10, z: 0},
						reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
					},
					lines : {
						translation : {x: 10, y: 10, z: [0,70]},
						rotation : {x: 0, y: 0, z: -2},
						reverseAnimation : {duration : 2000, easing : 'easeOutExpo'}
					},
					caption : {
						rotation : {x: 0, y: 0, z: 2},
						reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
					},
					overlay : {
						translation : {x: 10, y: -10, z: 0},
						rotation : {x: 0, y: 0, z: 2},
						reverseAnimation : {duration : 2000, easing : 'easeOutExpo'}
					},
					shine : {
						translation : {x: 100, y: 100, z: 0},
						reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
					}
				}
			},
			{
				movement: {
					imgWrapper : {
						rotation : {x: -5, y: 10, z: 0},
						reverseAnimation : {duration : 900, easing : 'easeOutCubic'}
					},
					caption : {
						translation : {x: 30, y: 30, z: [0,40]},
						rotation : {x: [0,15], y: 0, z: 0},
						reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
					},
					overlay : {
						translation : {x: 10, y: 10, z: [0,20]},
						reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
					},
					shine : {
						translation : {x: 100, y: 100, z: 0},
						reverseAnimation : {duration : 900, easing : 'easeOutCubic'}
					}
				}
			},
			{
				movement: {
					imgWrapper : {
						rotation : {x: -5, y: 10, z: 0},
						reverseAnimation : {duration : 50, easing : 'easeOutQuad'}
					},
					caption : {
						translation : {x: 20, y: 20, z: 0},
						reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
					},
					overlay : {
						translation : {x: 5, y: -5, z: 0},
						rotation : {x: 0, y: 0, z: 6},
						reverseAnimation : {duration : 1000, easing : 'easeOutQuad'}
					},
					shine : {
						translation : {x: 50, y: 50, z: 0},
						reverseAnimation : {duration : 50, easing : 'easeOutQuad'}
					}
				}
			},
			{
				movement: {
					imgWrapper : {
						translation : {x: 0, y: -8, z: 0},
						rotation : {x: 3, y: 3, z: 0},
						reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
					},
					lines : {
						translation : {x: 15, y: 15, z: [0,15]},
						reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
					},
					overlay : {
						translation : {x: 0, y: 8, z: 0},
						reverseAnimation : {duration : 600, easing : 'easeOutExpo'}
					},
					caption : {
						translation : {x: 10, y: -15, z: 0},
						reverseAnimation : {duration : 900, easing : 'easeOutExpo'}
					},
					shine : {
						translation : {x: 50, y: 50, z: 0},
						reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
					}
				}
			},
			{
				movement: {
					lines : {
						translation : {x: -5, y: 5, z: 0},
						reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
					},
					caption : {
						translation : {x: 15, y: 15, z: 0},
						rotation : {x: 0, y: 0, z: 3},
						reverseAnimation : {duration : 1500, easing : 'easeOutElastic', elasticity : 700}
					},
					overlay : {
						translation : {x: 15, y: -15, z: 0},
						reverseAnimation : {duration : 500,easing : 'easeOutExpo'}
					},
					shine : {
						translation : {x: 50, y: 50, z: 0},
						reverseAnimation : {duration : 500, easing : 'easeOutExpo'}
					}
				}
			},
			{
				movement: {
					imgWrapper : {
						translation : {x: 5, y: 5, z: 0},
						reverseAnimation : {duration : 800, easing : 'easeOutQuart'}
					},
					caption : {
						translation : {x: 10, y: 10, z: [0,50]},
						reverseAnimation : {duration : 1000, easing : 'easeOutQuart'}
					},
					shine : {
						translation : {x: 50, y: 50, z: 0},
						reverseAnimation : {duration : 800, easing : 'easeOutQuart'}
					}
				}
			},
			{
				movement: {
					lines : {
						translation : {x: 40, y: 40, z: 0},
						reverseAnimation : {duration : 1500, easing : 'easeOutElastic'}
					},
					caption : {
						translation : {x: 20, y: 20, z: 0},
						rotation : {x: 0, y: 0, z: -5},
						reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
					},
					overlay : {
						translation : {x: -30, y: -30, z: 0},
						rotation : {x: 0, y: 0, z: 3},
						reverseAnimation : {duration : 750, easing : 'easeOutExpo'}
					},
					shine : {
						translation : {x: 100, y: 100, z: 0},
						reverseAnimation : {duration : 750, easing : 'easeOutExpo'}
					}
				}
			}];

			function init() {
				var idx = 0;
				[].slice.call(document.querySelectorAll('a.tilter')).forEach(function(el, pos) { 
					idx = pos%30 === 0 ? idx+1 : idx;
					new TiltFx(el, tiltSettings[idx-1]);
				});
			}

			init();


		})();

});

jQuery(function ($) {
  'use strict'

  var window_width = $(window).innerWidth()

  //submenu adjustments
  function submenu_adjustments() {
    $('.main-navigation > ul > .menu-item').on('mouseenter', function () {
      if ($(this).children('.sub-menu').length > 0) {
        var submenu = $(this).children('.sub-menu')
        var window_width = parseInt($(window).outerWidth())
        var submenu_width = parseInt(submenu.outerWidth())
        var submenu_offset_left = parseInt(submenu.offset().left)
        var submenu_adjust = window_width - submenu_width - submenu_offset_left

        if (submenu_adjust < 0) {
          submenu.css('left', submenu_adjust - 30 + 'px')
        }
      }
    })
  }

  submenu_adjustments()

  $(window).on('resize', function () {
    $('.main-navigation > ul > .menu-item > .sub-menu').css('left', '-15px')
  })

  $('.main-navigation ul li.mega-menu').each(function () {
    const context = $(this)
    const children_cat = context.find('.level-0')
    children_cat.addClass(`children-${children_cat.children().length}`)
  })
})


/************************************************************************/
/****************************** QUICK VIEW ******************************/
/************************************************************************/

jQuery(function ($) {
  function product_quick_view_ajax(id) {
    $.ajax({
      url: eva_scripts_vars.eva_ajax_url,
      data: {
        action: 'eva_product_quick_view',
        product_id: id,
      },
      success: function (results) {
        $('#placeholder_product_quick_view').html(results)

        var curent_dragging_item

        $('#placeholder_product_quick_view .featured_img_temp').hide()

        $(
          '#placeholder_product_quick_view #product-images-carousel'
        ).owlCarousel({
          singleItem: true,
          autoHeight: true,
          transitionStyle: 'fade',
          lazyLoad: true,
          slideSpeed: 300,
          dragBeforeAnimFinish: false,
          // afterAction : afterAction,
          beforeUpdate: function () {},
          startDragging: function () {},
          afterMove: function () {},
          navigation: true,
          navigationText: ['', ''],
          dots: true,
        })

        $('#quick_view_container').show()

        var form_variation = $('#placeholder_product_quick_view').find(
          '.variations_form'
        )
        var form_variation_select = $('#placeholder_product_quick_view').find(
          '.variations_form .variations select'
        )

        form_variation.wc_variation_form()
        form_variation_select.change()

        /*plugin: watches variation*/
        if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
          form_variation.tawcvs_variation_swatches_form()
        }

        // window.product_gallery();
        // window.product_variations_label();
      },
      error: function (errorThrown) {
        console.log(errorThrown)
      },
    })
  }

  $('.st-content').on('click', '.eva_product_quick_view_button', function (e) {
    e.preventDefault()
    var product_id = $(this).data('product_id')
    product_quick_view_ajax(product_id)
  })

  $(window).on('mouseup', function (e) {
    var container = $('#placeholder_product_quick_view')
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      $('#quick_view_container').hide()
    }
  })

  $(document).on('click', '#close_quickview', function (e) {
    // e.preventDefault();
    $('#quick_view_container').hide()
  })

  $('#quick_view_container').on('click', '.zoom', function (e) {
    e.preventDefault()
  })

  //final width --> this is the quick view image slider width
  //maxQuickWidth --> this is the max-width of the quick-view panel
  var sliderFinalWidth = 480,
    maxQuickWidth = 960

  var allowClicks = true

  //open the quick view panel
  $(document).on('click', '.eva_product_quick_view_button', function (event) {
    event.preventDefault()

    var $this = $(this)

    $this.parent().find('.product_thumbnail').addClass('loading')

    var product_id = $(this).data('product_id')
    var selectedImage = $(this).parents('li').find('.product_thumbnail img')

    // $( '.variations_form' ).tawcvs_variation_swatches_form();
    // $( document.body ).trigger( 'tawcvs_initialized' );

    $.ajax({
      url: eva_scripts_vars.eva_ajax_url,
      data: {
        action: 'eva_product_quick_view',
        product_id: product_id,
      },
      success: function (results) {
        // console.log(results);

        $('.cd-quick-view').empty().html(results)

        animateQuickView(selectedImage, sliderFinalWidth, maxQuickWidth, 'open')
      },
      error: function (errorThrown) {
        console.log(errorThrown)
      },
    }).done(function () {
      $this.parent().find('.product_thumbnail').removeClass('loading')
    })

    // //update the visible slider image in the quick view panel
    // //you don't need to implement/use the updateQuickView if retrieving the quick view data with ajax
    // updateQuickView(selectedImageUrl);
  })

  //close the quick view panel
  $('body').on('click', function (event) {
    if (
      ($(event.target).is('.cd-close') ||
        $(event.target).is('body.overlay-layer')) &&
      allowClicks === true
    ) {
      event.preventDefault()
      closeQuickView(sliderFinalWidth, maxQuickWidth)
    }
  })
  $(document).on('keyup', function (event) {
    //check if user has pressed 'Esc'

    if (event.which == '27') {
      closeQuickView(sliderFinalWidth, maxQuickWidth)
    }
  })

  //center quick-view on window resize
  $(window).on('resize', function () {
    if ($('.cd-quick-view').hasClass('is-visible')) {
      window.requestAnimationFrame(resizeQuickView)
    }
  })

  function resizeQuickView() {
    var quickViewLeft = ($(window).width() - $('.cd-quick-view').width()) / 2,
      quickViewTop = ($(window).height() - $('.cd-quick-view').height()) / 2
    $('.cd-quick-view').css({
      top: quickViewTop,
      left: quickViewLeft,
    })
  }

  function closeQuickView(finalWidth, maxQuickWidth) {
    var close = $('.cd-close'),
      selectedImage = $('.empty-box').find('img')

    //update the image in the gallery
    if (
      !$('.cd-quick-view').hasClass('velocity-animating') &&
      $('.cd-quick-view').hasClass('add-content')
    ) {
      animateQuickView(selectedImage, finalWidth, maxQuickWidth, 'close')
    } else {
      closeNoAnimation(selectedImage, finalWidth, maxQuickWidth)
    }
  }

  function animateQuickView(image, finalWidth, maxQuickWidth, animationType) {
    //store some image data (width, top position, ...)
    //store window data to calculate quick view panel position
    var parentListItem = image.parents('li'),
      topSelected = image.offset().top - $(window).scrollTop(),
      leftSelected = image.offset().left,
      widthSelected = image.width(),
      heightSelected = image.height(),
      windowWidth = $(window).width(),
      windowHeight = $(window).height(),
      finalLeft = (windowWidth - finalWidth) / 2,
      finalHeight = 596,
      finalTop = (windowHeight - finalHeight) / 2,
      quickViewWidth =
        windowWidth * 0.8 < maxQuickWidth ? windowWidth * 0.8 : maxQuickWidth,
      quickViewLeft = (windowWidth - quickViewWidth) / 2

    if (animationType == 'open') {
      $('body').addClass('overlay-layer')
      //hide the image in the gallery
      parentListItem.addClass('empty-box')
      //place the quick view over the image gallery and give it the dimension of the gallery image
      $('.cd-quick-view')
        .css({
          top: topSelected,
          left: leftSelected,
          width: widthSelected,
          height: finalHeight,
        })
        .velocity(
          {
            //animate the quick view: animate its width and center it in the viewport
            //during this animation, only the slider image is visible
            top: finalTop + 'px',
            left: finalLeft + 'px',
            width: finalWidth + 'px',
          },
          1000,
          [400, 20],
          function () {
            //animate the quick view: animate its width to the final value
            $('.cd-quick-view')
               .addClass('animate-width')
              .velocity(
                {
                  left: quickViewLeft + 'px',
                  width: quickViewWidth + 'px',
                },
                300,
                'ease',
                function () {
                  //show quick view content
                  $('.cd-quick-view').addClass('add-content')

                  var qvSlider = new Swiper(
                    '.cd-quick-view .swiper-container',
                    {
                      pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        clickable: true,
                      },

                      navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                      },

                      preventClick: true,
                      preventClicksPropagation: true,
                      grabCursor: true,

                      on: {
                        touchStart: function () {
                          allowClicks = false
                        },
                      },

                      on: {
                        TouchMove: function () {
                          allowClicks = false
                        },
                      },

                      on: {
                        TouchEnd: function () {
                          setTimeout(function () {
                            allowClicks = true
                          }, 300)
                        },
                      },
                    }
                  )

                  var form_variation = $('.cd-quick-view').find(
                    '.variations_form'
                  )
                  var form_variation_select = $('.cd-quick-view').find(
                    '.variations_form .variations select'
                  )
                  $(
                    '.cd-item-info .product_infos .variations .value select'
                  ).wrap('<label class="variation-select"></label>')

                  form_variation.wc_variation_form()
                  form_variation_select.change()

                  /*plugin: watches variation*/
                  if (
                    typeof $.fn.tawcvs_variation_swatches_form !== 'undefined'
                  ) {
                    form_variation.tawcvs_variation_swatches_form()
                  }

                  form_variation.on('change', 'select', function () {
                    qvSlider.slideTo(0)
                  })
                }
              )
          }
        )
        .addClass('is-visible')
    } else {
      //close the quick view reverting the animation
      $('.cd-quick-view')
        .removeClass('add-content')
        .velocity(
          {
            top: finalTop + 'px',
            left: finalLeft + 'px',
            width: finalWidth + 'px',
          },
          300,
          'ease',
          function () {
            $('body').removeClass('overlay-layer')
            $('.cd-quick-view')
              .removeClass('animate-width')
              .velocity(
                {
                  top: topSelected,
                  left: leftSelected,
                  width: widthSelected,
                },
                500,
                'ease',
                function () {
                  $('.cd-quick-view').removeClass('is-visible')
                  parentListItem.removeClass('empty-box')
                }
              )
          }
        )
    }
  }
  function closeNoAnimation(image, finalWidth, maxQuickWidth) {
    var parentListItem = image.parents('li'),
      topSelected = image.offset().top - $(window).scrollTop(),
      leftSelected = image.offset().left,
      widthSelected = image.width()

    //close the quick view reverting the animation
    $('body').removeClass('overlay-layer')
    parentListItem.removeClass('empty-box')
    $('.cd-quick-view')
      .velocity('stop')
      .removeClass('add-content animate-width is-visible')
      .css({
        top: topSelected,
        left: leftSelected,
        width: widthSelected,
      })
  }
})


// Image Carousels

jQuery(function ($) {
  /**
   * Initialize desktop slider ( default layout )
   *
   */
  function product_gallery_slider() {
    if ($('.product-images-carousel').length) {
      /**
       * Init slider
       */
      var product_images = new Swiper('.product-images-carousel', {
        autoHeight: true,
        preloadImages: false,
        preloaderClass: 'swiper-lazy-preloader',
        updateOnImagesReady: true,
        lazy: true,

        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

        preventClicks:
          eva_scripts_vars.product_lightbox != 1 ? 'true' : 'false',
        preventClicksPropagation:
          eva_scripts_vars.product_lightbox != 1 ? 'true' : 'false',

        on: {
          slideChange: function () {
            activate_slide(product_images.activeIndex)
          },
        },
      })
      var $product_thumbnails = $('.product_thumbnails')

      /**
       * Move slider on thumbnail click
       */
      $product_thumbnails.on('click', '.carousel-cell', function (event) {
        var index = $(event.currentTarget).index()
        activate_slide(index)
      })

      /**
       * Link between thumbs & slider
       */
      function activate_slide(index) {
        product_images.slideTo(index, 300, false)

        var $product_thumbnails_cells = $product_thumbnails.find(
          '.carousel-cell'
        )
        var $product_thumbnails_height = $product_thumbnails.height()
        var $product_thumbnails_cells_height = $product_thumbnails_cells.outerHeight()

        $product_thumbnails
          .find('.is-nav-selected')
          .removeClass('is-nav-selected')

        var $selected_cell = $product_thumbnails_cells
          .eq(product_images.activeIndex)
          .addClass('is-nav-selected')

        var $scrollY =
          product_images.activeIndex * $product_thumbnails_cells_height -
          ($product_thumbnails_height - $product_thumbnails_cells_height) / 2 -
          10

        $product_thumbnails.animate(
          {
            scrollTop: $scrollY,
          },
          300
        )
      }

      var temp_var = $('li.carousel-cell:first-child img').attr('src')

      /**
       * Change slide on variation change
       */

      $('.variations_form').on('change', 'select', function () {
        if ($('li.carousel-cell:first-child img').attr('src') != temp_var) {
          temp_var = $('li.carousel-cell:first-child img').attr('src')
          activate_slide(0)
        }
      })

      $('.variations_form').on('click', '.reset_variations', function () {
        activate_slide(0)
      })
    }
  }

  /**
   *  Initialize the mobile slider & thumbnail slider
   */
  function product_gallery_mobile() {
    /**
     * Main slider
     */
    var mobileGallery = new Swiper('.product_content_wrapper .mobile_gallery', {
      autoHeight: true,
      preloadImages: false,
      preloaderClass: 'swiper-lazy-preloader',
      updateOnImagesReady: true,
      lazy: true,
      nested: true,
    })

    /**
     * Thumbnail slider
     */
    var mobileGalleryThumbs = new Swiper(
      '.product_content_wrapper .mobile_gallery_thumbs',
      {
        centeredSlides: true,
        freeMode: false,
        slidesPerView: 'auto',
        touchRatio: 0.5,
        slideToClickedSlide: true,
        nested: true,
        grabCursor: true,
        touchMoveStopPropagation: true,
        preventClicks: true,
      }
    )

    /**
     * Link the sliders
     */
    mobileGallery.controller.control = mobileGalleryThumbs
    mobileGalleryThumbs.controller.control = mobileGallery

    /**
     * On variation change update images & reset slider
     */
    $(document).on(
      'change',
      '.single-product .variations_form',
      'select',
      function () {
        var product_img_desktop = $(
          '.product_images  .product-image:first-child img'
        ).attr('src')
        $(
          '.mobile_gallery .swiper-wrapper .swiper-slide:first-child .woocommerce-product-gallery__image a img'
        ).attr('src', product_img_desktop)
        $(
          '.mobile_gallery_thumbs .swiper-wrapper .swiper-slide:first-child'
        ).attr('style', 'background-image: url(' + product_img_desktop + ')')
        mobileGallery.slideTo(0)
      }
    )
  }

  // Product Layout Default Gallery Video Min Height
  function minHeightVideo() {
    if ($('.carousel-cell.youtube')) {
      var productInfos = $('.product_infos')

      if ($(window).width() > 640 && $(window).width() < 1024) {
        productInfos.css({
          'margin-top': '80px',
        })
      } else {
        productInfos.css({
          'margin-top': '0',
        })
      }
    }
  }

  $(window).on('resize', function () {
    minHeightVideo()
  })
  $(document).ready(function () {
    product_gallery_slider()
    minHeightVideo()

    if ($('body').hasClass('single-product')) {
      product_gallery_mobile()
    }
  })
})

// Scroll Images Animations

jQuery(function ($) {
  'use strict'

  $.fn.visible = function (partial) {
    var $t = $(this),
      $w = $(window),
      viewTop = $w.scrollTop(),
      viewBottom = viewTop + $w.height(),
      _top = $t.offset().top,
      _bottom = _top + $t.height(),
      compareTop = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom

    return compareBottom <= viewBottom && compareTop >= viewTop
  }

  var win = $(window)

  var allMods = $('.module')

  allMods.each(function (i, el) {
    var el = $(el)
    if (el.visible(true)) {
      el.addClass('already-visible')
    }
  })
  win.on('scroll', function (event) {
    if ($(window).width() > 1024) {
      allMods.each(function (i, el) {
        var el = $(el)
        if (el.visible(true)) {
          el.addClass('come-in')
        }
      })
    }
  })
})


jQuery(function ($) {
  'use strict'

  $(window).on('load', function () {
    //Product Gallery zoom

    if ($('.easyzoom').length) {
      if ($(window).width() > 1024) {
        var $easyzoom = $('.easyzoom').easyZoom({
          loadingNotice: '',
          errorNotice: '',
          preventClicks: false,
          linkAttribute: 'href',
        })

        var easyzoom_api = $easyzoom.data('easyZoom')

        $('.variations').on('change', 'select', function () {
          easyzoom_api.teardown()
          easyzoom_api._init()
        })
      } else {
        $('.easyzoom a').on('click', function (e) {
          e.preventDefault()
        })
      }
    }
  })
})


jQuery(function ($) {
  'use strict'

})
// Image Lightbox

jQuery(function ($) {
  'use strict'

  var initPhotoSwipeFromDOM = function (gallerySelector) {
    // parse slide data (url, title, size ...) from DOM elements
    // (children of gallerySelector)
    var parseThumbnailElements = function (el) {
      var thumbElements = $(el).find('.photoswipe-item').get(),
        numNodes = thumbElements.length,
        items = [],
        figureEl,
        linkEl,
        size_w,
        size_h,
        item

      for (var i = 0; i < numNodes; i++) {
        figureEl = thumbElements[i] // <figure> element

        // include only element nodes
        if (figureEl.nodeType !== 1) {
          continue
        }

        linkEl = figureEl.children[0] // <a> element

        size_w = linkEl.children[0].getAttribute('data-large_image_width')
        size_h = linkEl.children[0].getAttribute('data-large_image_height')

        // create slide object
        if ($(linkEl).data('type') == 'video') {
          item = {
            html: $(linkEl).data('video'),
          }
        } else {
          item = {
            src: linkEl.getAttribute('href'),
            w: size_w,
            h: size_h,
          }
        }

        if (figureEl.children.length > 1) {
          // <figcaption> content
          item.title = $(figureEl).find('.caption').html()
        }

        if (linkEl.children.length > 0) {
          // <img> thumbnail element, retrieving thumbnail url
          item.msrc = linkEl.children[0].getAttribute('src')
        }

        item.el = figureEl // save link to element for getThumbBoundsFn
        items.push(item)
      }

      return items
    }

    // find nearest parent element
    var closest = function closest(el, fn) {
      return el && (fn(el) ? el : closest(el.parentNode, fn))
    }

    function hasClass(element, cls) {
      return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1
    }

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function (e) {
      e = e || window.event
      e.preventDefault ? e.preventDefault() : (e.returnValue = false)

      var eTarget = e.target || e.srcElement

      // find root element of slide
      var clickedListItem = closest(eTarget, function (el) {
        return hasClass(el, 'photoswipe-item')
      })

      if (!clickedListItem) {
        return
      }

      // find index of clicked item by looping through all child nodes
      // alternatively, you may define index via data- attribute
      var clickedGallery = clickedListItem.closest('.photoswipe-wrapper'),
        childNodes = $(clickedListItem.closest('.photoswipe-wrapper'))
          .find('.photoswipe-item')
          .get(),
        numChildNodes = childNodes.length,
        nodeIndex = 0,
        index

      for (var i = 0; i < numChildNodes; i++) {
        if (childNodes[i].nodeType !== 1) {
          continue
        }

        if (childNodes[i] === clickedListItem) {
          index = nodeIndex
          break
        }
        nodeIndex++
      }

      if (index >= 0) {
        // open PhotoSwipe if valid index found
        openPhotoSwipe(index, clickedGallery)
      }
      return false
    }

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function () {
      var hash = window.location.hash.substring(1),
        params = {}

      if (hash.length < 5) {
        return params
      }

      var vars = hash.split('&')
      for (var i = 0; i < vars.length; i++) {
        if (!vars[i]) {
          continue
        }
        var pair = vars[i].split('=')
        if (pair.length < 2) {
          continue
        }
        params[pair[0]] = pair[1]
      }

      if (params.gid) {
        params.gid = parseInt(params.gid, 10)
      }

      return params
    }

    var openPhotoSwipe = function (
      index,
      galleryElement,
      disableAnimation,
      fromURL
    ) {
      var pswpElement = document.querySelectorAll('.pswp')[0],
        gallery,
        options,
        items

      items = parseThumbnailElements(galleryElement)

      // define options (if needed)
      options = {
        closeOnScroll: false,
        bgOpacity: 0.85,

        shareButtons: [
          {
            id: 'facebook',
            label: eva_scripts_vars.share_fb,
            url: 'https://www.facebook.com/sharer/sharer.php?u={{url}}',
          },
          {
            id: 'twitter',
            label: eva_scripts_vars.tweet,
            url: 'https://twitter.com/intent/tweet?text={{text}}&url={{url}}',
          },
          {
            id: 'pinterest',
            label: eva_scripts_vars.pin_it,
            url:
              'http://www.pinterest.com/pin/create/button/' +
              '?url={{url}}&media={{image_url}}&description={{text}}',
          },
          {
            id: 'download',
            label: eva_scripts_vars.download_image,
            url: '{{raw_image_url}}',
            download: true,
          },
        ],

        // define gallery index (for URL)
        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

        getThumbBoundsFn: function (index) {
          // See Options -> getThumbBoundsFn section of documentation for more info
          var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
            pageYScroll =
              window.pageYOffset || document.documentElement.scrollTop,
            rect = thumbnail.getBoundingClientRect()

          return {
            x: rect.left,
            y: rect.top + pageYScroll,
            w: rect.width,
          }
        },
      }

      // PhotoSwipe opened from URL
      if (fromURL) {
        if (options.galleryPIDs) {
          // parse real index when custom PIDs are used
          // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
          for (var j = 0; j < items.length; j++) {
            if (items[j].pid == index) {
              options.index = j
              break
            }
          }
        } else {
          // in URL indexes start from 1
          options.index = parseInt(index, 10) - 1
        }
      } else {
        options.index = parseInt(index, 10)
      }

      // exit if index not found
      if (isNaN(options.index)) {
        return
      }

      if (disableAnimation) {
        options.showAnimationDuration = 0
      }

      // Pass data to PhotoSwipe and initialize it
      gallery = new PhotoSwipe(
        pswpElement,
        PhotoSwipeUI_Default,
        items,
        options
      )

      gallery.init()

      // Image loaded
      gallery.listen('imageLoadComplete', function (index, item) {
        var item1 = item.src
        var curimg = gallery.currItem

        var image = new Image()

        image.onload = function () {
          var colorThief = new ColorThief()
          var color = colorThief.getColor(image)
          if (eva_scripts_vars.product_lightbox_dominant == '1') {
            setTimeout(function () {
              $('.pswp__bg').css('backgroundColor', 'rgb(' + color + ')')
            }, 200)
          } else {
            $('.pswp__bg').css('backgroundColor', 'rgba(0,0,0,.9)')
          }
        }

        image.src = curimg.src
      })

      gallery.listen('close', function () {
        $('.pswp__video').each(function () {
          $(this).attr('src', $(this).attr('src'))
        })
      })

      gallery.listen('afterChange', function () {
        var curimg = gallery.currItem

        var image = new Image()

        image.onload = function () {
          var colorThief = new ColorThief()
          var color = colorThief.getColor(image)

          if (eva_scripts_vars.product_lightbox_dominant == '1') {
            setTimeout(function () {
              $('.pswp__bg').css('backgroundColor', 'rgb(' + color + ')')
            }, 200)
          } else {
            $('.pswp__bg').css('backgroundColor', 'rgba(0,0,0,.9)')
          }
        }

        image.src = curimg.src
      })
    }

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll(gallerySelector)

    for (var i = 0, l = galleryElements.length; i < l; i++) {
      galleryElements[i].setAttribute('data-pswp-uid', i + 1)
      galleryElements[i].onclick = onThumbnailsClick
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash()
    if (hashData.pid && hashData.gid) {
      openPhotoSwipe(
        hashData.pid,
        galleryElements[hashData.gid - 1],
        true,
        true
      )
    }
  }

  // execute above function

  initPhotoSwipeFromDOM('.photoswipe-wrapper')
})


// Single Product Tabs

jQuery(function($) {
	
	"use strict";

	$('.product_meta_ins:not(:has(span))').hide();

	$('.woocommerce-review-link').off('click').on('click',function(){
	
		$('.tabs li a').each(function(){
			if ($(this).attr('href')=='#tab-reviews') {
				$(this).trigger('click');
			}
		});
		
		var tab_reviews_topPos = $('.woocommerce-tabs').offset().top;
		
		$('html, body').animate({
            scrollTop: tab_reviews_topPos
        }, 500);
		
		return false;
	});

	$( '.wc-tabs-wrapper, .woocommerce-tabs' ).off('click').on('click', '.wc-tabs li a, ul.tabs li a', function() {

		if ($(this).parent('li').hasClass('active'))
		{
			return false;
		}
		else 
		{
			var $tab          = $( this );
			var $tabs_wrapper = $tab.closest( '.wc-tabs-wrapper, .woocommerce-tabs' );
			var $tabs         = $tabs_wrapper.find( '.wc-tabs, ul.tabs' );

			$tabs.find( 'li' ).removeClass( 'active' );
			$(this).parent('li').addClass( 'active' );

			$tabs_wrapper.find( '.wc-tab:visible').fadeOut(300, function(){
				$tabs_wrapper.find( $tab.attr( 'href' ) ).fadeIn(300);
			});

			return false;
		}
	});

});

// Single Product Tab Reviews

jQuery(function($) {
	
	"use strict";

	$(".woocommerce-tabs #reviews .comment-text > p.meta").contents().filter(function(){
	    return (this.nodeType == 3);
	}).remove();

	$("#reviews #comments .comment_container").each(function(){
		$(this).find(".star-rating").detach().insertAfter($(this).find(".meta"));
	});

	if ( ($('ol.commentlist').length < 1) && ($('body.woocommerce').length > 1)  )
	{
		$('#comments').hide();
	}

});

// Related Products Slider

jQuery(function ($) {
  var perView = $(
    '.single_product_summary_related #products-carousel, .cross-sells #products-carousel, .upsells #products-carousel'
  ).attr('data-per-view')

  ;('use strict')

  var owl = $(' #products-carousel #products')

  owl.owlCarousel({
    rtl: $('body').hasClass('rtl'),
    items: perView,
    margin: 30,
    lazyLoad: true,
    dots: true,
    responsiveClass: true,
    nav: true,
    mouseDrag: true,
    navText: ['', ''],
    responsive: {
      0: {
        margin: 20,
        items: 2,
        nav: false,
      },
      600: {
        margin: 25,
        items: 3,
        nav: false,
      },
      1000: {
        items: 4,
        nav: true,
        dots: false,
      },
      1200: {
        items: perView,
        nav: true,
        dots: false,
      },
    },
  })
})


jQuery(function($) {
	
	"use strict";

	var login_container = $('.login-register-container');
	
	login_container.on('click','.account-tab-link',function(){
		
		var that = $(this),
			target = that.attr('href');
		
		that.parent().siblings().find('.account-tab-link').removeClass('current');
		that.addClass('current');
		
		$(target).siblings().stop().fadeOut(function(){
			$(target).fadeIn();	
		});
		
		return false;
	});	

});

// Fresco Gallery

jQuery(function($) {
	
	"use strict";

	$(".gallery").each(function() {
		$(this).find('.fresco')
			.attr('data-fresco-group', $(this).attr('id'));
	});	

});

// Back link

jQuery(function($) {
	
	"use strict";

	$( ".back-btn" ).on( "click", function(e) {
	    e.preventDefault();
	    history.back(1);
    }); 


});

// Back to Top

jQuery(function ($) {
  'use strict'

  if (!$('.progress-page')[0]) {
    return
  }

  $('.scrolltotop').on('click', function () {
    $('html, body').animate({ scrollTop: 0 }, 800)
    return false
  })

  if ($('.offcanvas_container').length > 0) {
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop()

      if (scroll >= 300) {
        $('.progress-page').addClass('is-active')
      } else {
        $('.progress-page').removeClass('is-active')
      }
    })
  }

  var lastScroll = 0

  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop()
    if (scroll > lastScroll) {
      $('.progress-page').addClass('is-visible')
    } else if (scroll < lastScroll) {
      $('.progress-page').removeClass('is-visible')
    }
    lastScroll = scroll
  })

  var progressPath = document.querySelector('.progress-page path')
  var pathLength = progressPath.getTotalLength()
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none'
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength
  progressPath.style.strokeDashoffset = pathLength
  progressPath.getBoundingClientRect()
  progressPath.style.transition = progressPath.style.WebkitTransition =
    'stroke-dashoffset 10ms linear'
  var updateProgress = function () {
    var scroll = $(window).scrollTop()
    var height = $(document).height() - $(window).height()
    var progress = pathLength - (scroll * pathLength) / height
    progressPath.style.strokeDashoffset = progress
  }
  updateProgress()

  $(window).on('scroll', function () {
    updateProgress()
  })
})


jQuery(function($) {
	
	"use strict";

	//responsive videos
	$(".blog-content-area, .content-area").fitVids();

});

// Sharing

jQuery(function ($) {
  'use strict'

  var $share_elements = $('.box-share-master-container').attr('data-share-elem')

  $('.social-sharing').socialShare({
    social: $share_elements,
    animation: 'launchpadReverse',
    blur: true,
  })
})


// Page Loader

jQuery(window).on('load', function () {
  // Animate loader off screen
  setTimeout(function () {
    jQuery('body').addClass('loaded')
  }, 2000)
})



// Parallax

jQuery(function($) {
	
	"use strict";

	var rellax = new Rellax('.rellax');

});

// Ajax add to cart

jQuery(function ($) {
  'use strict'

  if (eva_scripts_vars.product_add_to_cart_ajax == '0') {
    return
  }

  $(document.body).on('submit', 'form.cart', function () {
    var $form = $(this),
      $button = $form.find('.single_add_to_cart_button'),
      url = $form.attr('action') ? $form.attr('action') : window.location.href,
      data = $form.serialize()

    if ($form.closest('div.product').hasClass('product-type-external')) {
      return
    }

    $button
      .removeClass('added')
      .addClass('loading disabled')
      .prop('disabled', true)

    if ($button.attr('name')) {
      data +=
        '&' +
        encodeURI($button.attr('name')) +
        '=' +
        encodeURI($button.attr('value'))
    }

    $.ajax({
      url: url,
      data:
        data + '&eva_add_to_cart_nonce=' + eva_scripts_vars.add_to_cart_nonce,
      method: $form.attr('method')
        ? $form.attr('method').toUpperCase()
        : 'POST',

      success: function (response) {
        $button
          .removeClass('loading disabled')
          .addClass('added')
          .prop('disabled', false)

        var $message = $(response).find(
            '.woocommerce-error, .woocommerce-info, .woocommerce-message'
          ),
          $alert = $('.eva-woocommerce-alert')

        if ($message.hasClass('woocommerce-error')) {
          if ($message.length) {
            if (!$alert.length) {
              $alert = $('<div class="eva-woocommerce-alert"></div>')
              $(document.body).append($alert)
            }

            $alert.html($message)
            setTimeout(function () {
              $alert.addClass('active')
            }, 500)

            setTimeout(function () {
              $alert.removeClass('active')
            }, 7000)

            return
          }
        }

        if ($(response).find('.woocommerce-message').length) {
          $(document.body).trigger('added_to_cart')
        }

        if (!response) {
          window.location = currentURL
        }

        if (typeof wc_add_to_cart_params !== 'undefined') {
          if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
            window.location = wc_add_to_cart_params.cart_url
            return
          }
        }

        $(document.body).trigger('updated_wc_div')
        $(document.body).on('wc_fragments_refreshed', function () {
          $button.removeClass('loading')
          $('.cd-quick-view').removeClass('is-visible')
          $('.cd-quick-view').hide()
          $('.offcanvas_search').hide()
          $('.offcanvas_sizechart').hide()
          $('.offcanvas_minicart').show()
          $('body').removeClass('overlay-layer')

          setTimeout(function () {
            $('body').addClass('offcanvas_for_cart')

            var right_cart_offCanvasIn = [
              {
                e: $('.offcanvas_minicart'),
                p: {
                  opacity: [1, 0],
                },
                o: {
                  duration: 700,
                  delay: 800,
                },
              },
            ]

            $.Velocity.RunSequence(right_cart_offCanvasIn)

            window.offcanvas_right()
          }, 100)
        })
      },
    })

    return false
  })
})


// Attribute Swatches

jQuery(function ($) {
  'use strict'

  $('body').on('tawcvs_initialized', function () {
    $('.variations_form').unbind('tawcvs_no_matching_variations')
    $('.variations_form').on(
      'tawcvs_no_matching_variations',
      function (event, $el) {
        event.preventDefault()
        $el.addClass('selected')

        $('.variations_form')
          .find('.woocommerce-variation.single_variation')
          .show()
        if (typeof wc_add_to_cart_variation_params !== 'undefined') {
          $('.variations_form')
            .find('.single_variation')
            .slideDown(200)
            .html(
              '<p>' +
                wc_add_to_cart_variation_params.i18n_no_matching_variations_text +
                '</p>'
            )
        }
      }
    )
  })

  $('body').on('click', '.ev-swatch-variation-image', function (e) {
    e.preventDefault()
    $(this).siblings('.ev-swatch-variation-image').removeClass('selected')
    $(this).addClass('selected')
    var imgSrc = $(this).data('src'),
      imgSrcSet = $(this).data('src-set'),
      $mainImages = $(this)
        .parents('li.product')
        .find('.product_thumbnail > a'),
      $image = $mainImages.find('img').first(),
      imgWidth = $image.first().width(),
      imgHeight = $image.first().height()

    $mainImages.addClass('image-loading')
    $mainImages.css({
      width: imgWidth,
      height: imgHeight,
      display: 'block',
    })

    $image.attr('src', imgSrc)

    if (imgSrcSet) {
      $image.attr('srcset', imgSrcSet)
    }
    $image.on('load', function () {
      $mainImages.removeClass('image-loading')
      $mainImages.removeAttr('style')
    })
  })
})



