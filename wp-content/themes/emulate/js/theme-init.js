/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

var p_scrollCount;
var p_itemWidth;
var p_itemMargin;
var b_scrollCount;
var b_itemWidth;
var b_itemMargin;


(function(jQuery)
{
    'use strict';


	// Init the functions
	jQuery(document).ready(function()
    {
		// init
		twoot_menu();
		twoot_image_preload();
		twoot_sticky_header();
		twoot_niceScroll();
		twoot_top_search();
		twoot_top_responsive_menu();
		twoot_image_hover();
		twoot_fancybox_init();
		twoot_bxslider_init();
		twoot_isotope_init();
		twoot_masonry_init();
		twoot_post_masonry_init();
		twoot_wpml_language_switcher();
		twoot_accordion();
		twoot_toggle();
		twoot_tab();
		twoot_faqs();
		twoot_progress_bar();
		twoot_number();
		twoot_quick_contact();


		// External links
		jQuery('a[rel*=external]').click( function() {
			window.open(this.href);
			return false;
		});

		// Add Class For current page
		jQuery( '.current_page_item, .current-menu-item, .current_page_parent, .current-menu-parent, .current-page-ancestor' ).addClass( 'current-page' );

		// Video Responsive
		jQuery('.fitvids').fitVids();

		// Placeholder
		jQuery('.text-field').simplePlaceholder();

		// GoTop
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() !== 0) {
				jQuery('#gotop').fadeIn(200);	
			} else {
				jQuery('#gotop').fadeOut(200);
			}
		});
		jQuery('#gotop').click(function() {
			jQuery('body,html').animate({scrollTop:0},300,'easeOutCubic');
		});

		// Close Message Box
		jQuery('.shortcode-message-box a.close').click(function() {
			jQuery(this).parent().fadeOut();
			return false;
		});
	});


	// Common For Carousel
	if( jQuery(window).width() < 240 ) {
		p_scrollCount = 1;
		p_itemWidth = 220;
		p_itemMargin = 0;
		b_scrollCount = 1;
		b_itemWidth = 220;
		b_itemMargin = 0;
	} else if( jQuery(window).width() < 320 ) {
		p_scrollCount = 1;
		p_itemWidth = 300;
		p_itemMargin = 0;
		b_scrollCount = 1;
		b_itemWidth = 300;
		b_itemMargin = 0;
	} else if( jQuery(window).width() < 480 ) {
		p_scrollCount = 2;
		p_itemWidth = 220;
		p_itemMargin = 20;
		b_scrollCount = 2;
		b_itemWidth = 220;
		b_itemMargin = 20;
	} else if( jQuery(window).width() < 768 ) {
		p_scrollCount = 4;
		p_itemWidth = 172;
		p_itemMargin = 20;
		b_scrollCount = 4;
		b_itemWidth = 172;
		b_itemMargin = 20;
	} else if( jQuery(window).width() < 960 ) {
		p_scrollCount = 4;
		p_itemWidth = 235;
		p_itemMargin = 20;
		b_scrollCount = 4;
		b_itemWidth = 235;
		b_itemMargin = 20;
	} else {
		p_scrollCount = 4;
		p_itemWidth = 270;
		p_itemMargin = 30;
		b_scrollCount = 4;
		b_itemWidth = 270;
		b_itemMargin = 30;
	}


	
	// Superfish Menu
	function twoot_menu() 
	{
		if ( jQuery().superfish ) {
			jQuery('ul.sf-menu').superfish({
				delay: 200,                                               // one second delay on mouseout
				hoverClass:  'selected', 
				animation: {opacity:'show'},   // fade-in and slide-down animation
				speed: 500,                                            // faster animation speed
				autoArrows:  false,                                    // disable generation of arrow mark-up
				onBeforeShow: function() {
					 jQuery('ul.sf-menu li').each(function() {
						var WindowWidth = jQuery(window).width();
						var subMenuExist = jQuery(this).children('ul').length;
						if( subMenuExist > 0){
							var subMenuWidth = jQuery(this).children('ul').width();
							var subMenuOffset = jQuery(this).offset().left + subMenuWidth;

							if(WindowWidth-subMenuOffset < subMenuWidth){                  
								jQuery(this).addClass('fixed');
							}else{
								jQuery(this).removeClass('fixed');
							}
						}
					});
				} // Fixed there is enough space for the menu issue.
			});
		}

		jQuery('ul.sub-menu > li.menu-item-has-children > a, ul.children > li.page_item_has_children > a').append('<span class="arrow"></span>');
	}


	// Sticky header
	function twoot_sticky_header() 
	{
		if ( jQuery('body').hasClass('sticky-header') ) {
			if ( jQuery('#wpadminbar').length ) {
				jQuery('.site-header').css('top', jQuery('#wpadminbar').innerHeight());
			} else {
				jQuery('.site-header').css('top', '0');
			}
			// Sticky Header
			var stickyTop = jQuery('.site-header').height();
			var stickyHeader = function() {
				if ( ( jQuery(window).scrollTop() > stickyTop ) && ( jQuery(window).width() >768 ) ) {
					if( ! (jQuery('.site-header').hasClass('is-sticky'))) {
						jQuery('.site-header').addClass('is-sticky');
					}
				} else {
					if( jQuery('.site-header').hasClass('is-sticky') ) {
						jQuery('.site-header').removeClass('is-sticky');
					}
				}
			};
			//scroll
			jQuery(window).scroll(function(){
				stickyHeader();
			});
			//resize
			jQuery(window).resize(function() {
				stickyHeader();
			});
		}
	}


	// Nice Scroll
	function twoot_niceScroll() 
	{
		if ( jQuery().niceScroll ) {
			jQuery('html').niceScroll();
		}
	}


	// Top Search
	function twoot_top_search() 
	{
		jQuery('.top-search .top-search-bt').click(function() {
			jQuery('.top-search-wrapper').slideToggle(300, 'easeOutCubic');
			jQuery(this).toggleClass('close');
			return false;
		});
	}


	// Responsive Menu
	function twoot_top_responsive_menu() 
	{
		jQuery('#toggle-top-responsive-menu').click(function() 
		{	
			jQuery('.top-responsive-menu').slideToggle(300, 'easeOutCubic');
			jQuery(this).toggleClass('close');

			return false;
		}); 
	}



	// Image Preload
	function twoot_image_preload() 
	{
		jQuery(window).load(function() {
			jQuery('.img-preload').image_preload({ imagedelay:50 });
		});
	}



	// Image Hover
	function twoot_image_hover() 
	{
		jQuery('.img-hover').find('.overlay').css({ opacity: 0 });
		jQuery('.shortcode-team-member .img-hover').find('.name').css({ opacity: 0 });
		jQuery('.the-portfolio-post .img-hover').find('.item-head').css({ opacity: 0 });
		jQuery('.img-hover').hover(
			function() {
				jQuery(this).find('.overlay').stop().animate({ opacity:0.5 }, 500, 'easeOutCubic');
			}, 
			function() {
				jQuery(this).find('.overlay').animate({ opacity:0 }, 500, 'easeOutCubic');
			}
		);

		jQuery('.the-grid-list ul li.item .img-hover, .the-post-list li.item .img-hover').hover(
			function() {
				jQuery(this).find('.overlay').stop().animate({ opacity:0.8 }, 500, 'easeOutCubic');
			}, 
			function() {
				jQuery(this).find('.overlay').animate({ opacity:0 }, 500, 'easeOutCubic');
			}
		);

		jQuery('.shortcode-team-member .img-hover').hover(
			function() {
				jQuery(this).find('.overlay').stop().animate({ opacity:0.8 }, 500, 'easeOutCubic');
				jQuery(this).find('.name').stop().animate({ opacity:1 }, 500, 'easeOutCubic');
			}, 
			function() {
				jQuery(this).find('.overlay').animate({ opacity:0 }, 500, 'easeOutCubic');
				jQuery(this).find('.name').stop().animate({ opacity:0 }, 500, 'easeOutCubic');
			}
		);

		jQuery('.the-portfolio-post .img-hover').hover(
			function() {
				jQuery(this).find('.item-head').stop().animate({ opacity:1 }, 500, 'easeOutCubic');
			}, 
			function() {
				jQuery(this).find('.item-head').stop().animate({ opacity:0 }, 500, 'easeOutCubic');
			}
		);
	}


	// FancyBox
	function twoot_fancybox_init() 
	{
		if ( jQuery().fancybox ) {
			//Gallery
			jQuery('.fancybox-gallery').fancybox({
				openEffect	: 'fade',
				closeEffect	: 'fade',
				padding : 10,
				autoPlay : false,
				playSpeed : 3000,
				helpers : {title : {type : 'float'}, thumbs : {width: 75, height: 50}}
			});


			//Slider
			jQuery('.fancybox-slider').fancybox({
				openEffect	: 'fade',
				closeEffect	: 'fade',
				padding : 10,
				autoPlay : false,
				playSpeed : 3000,
				helpers : {title : {type : 'float'}}
			});


			//Carousel
			jQuery('.fancybox-carousel').fancybox({
				openEffect	: 'fade',
				closeEffect	: 'fade',
				padding : 10,
				autoPlay : false,
				playSpeed : 3000,
				helpers : {title : {type : 'float'}}
			});


			//Video
			jQuery('.fancybox-video').fancybox({
				openEffect	: 'fade',
				closeEffect	: 'fade',
				padding : 10,
				helpers : {media : {}}
			});
		}
	}


	// Bx Slider
	function twoot_bxslider_init() 
	{
		if ( jQuery().bxSlider ) {

			jQuery('.post-slider-list').bxSlider({
				adaptiveHeight: true,
				auto: false,
				speed: 800,
				pause: 5000,
				mode: 'fade',
				pager: false,
				captions: false,
				touchEnabled: true,
				nextText: '',
				prevText: '',
				preloadImages: 'visible'
			});

			jQuery('.post-slider-single').bxSlider({
				adaptiveHeight: true,
				auto: false,
				speed: 800,
				pause: 5000,
				mode: 'fade',
				pager: false,
				captions: false,
				touchEnabled: true,
				nextText: '',
				prevText: '',
				preloadImages: 'visible'
			});

			jQuery('#related-post-carousel').bxSlider({
				auto: false,
				speed: 800,
				pause: 5000,
				moveSlides: 4,
				minSlides: 1,
				maxSlides: p_scrollCount,
				slideWidth: p_itemWidth,
				slideMargin: p_itemMargin,
				touchEnabled: true,
				easing: 'easeOutCubic',
				nextText: '',
				prevText: '',
				controls:  true,
				pager: false,
				onSliderLoad: function(){
					twoot_image_preload(); 
				}
			});

			var post_slider = jQuery('.shortcode-post-slider .post-slider');
			post_slider.bxSlider({
				adaptiveHeight: true,
				auto: post_slider.attr('data-auto'),
				speed: post_slider.attr('data-speed'),
				pause: post_slider.attr('data-pause'),
				mode: post_slider.attr('data-mode'),
				pager: false,
				captions: false,
				touchEnabled: true,
				nextText: '',
				prevText: '',
				preloadImages: 'visible'
			});

			var testimonial_carousel = jQuery('.testimonial-carousel');
			testimonial_carousel.bxSlider({
				adaptiveHeight: true,
				auto: testimonial_carousel.attr('data-auto'),
				speed: testimonial_carousel.attr('data-speed'),
				pause: testimonial_carousel.attr('data-pause'),
				mode: testimonial_carousel.attr('data-mode'),
				pager: true,
				controls:  false,
				captions: false,
				touchEnabled: true,
				nextText: '',
				prevText: '',
				preloadImages: 'visible'
			});

			var twitter_carousel = jQuery('.twitter-carousel');
			twitter_carousel.bxSlider({
				adaptiveHeight: true,
				auto: twitter_carousel.attr('data-auto'),
				speed: twitter_carousel.attr('data-speed'),
				pause: twitter_carousel.attr('data-pause'),
				mode: twitter_carousel.attr('data-mode'),
				pager: true,
				controls:  false,
				captions: false,
				touchEnabled: true,
				nextText: '',
				prevText: '',
				preloadImages: 'visible'
			});

			jQuery('.bx-slider .bx-wrapper').find('.bx-controls-direction a').css({ opacity: 0 });
			jQuery('.bx-slider .bx-wrapper').hover(function()
			{
				jQuery(this).find('.bx-controls-direction a').stop().animate({ opacity:1 }, 150);
			}, function()
			{
				jQuery(this).find('.bx-controls-direction a').animate({ opacity:0 }, 150);
			});
		}
	}


	// Isotope
	function twoot_isotope_init() 
	{
		if ( jQuery().isotope ) {
			jQuery(window).load(function() {

				// cache container
				var container = jQuery('.the-not-masonry-list .filter-items');

				// initialize isotope
				container.isotope({
					itemSelector: '.item',
					layoutMode: 'fitRows',
					animationOptions: {
						duration: 500,
						easing: 'swing',
						queue: false
					}
				});

				// add active class
				jQuery('.filter li a').click(function () {
					jQuery('.filter li a').removeClass('active');
					jQuery(this).addClass('active');

					var selector = jQuery(this).attr('data-filter');
					container.isotope({
						filter: selector
					});

					return false;
				});

				jQuery(window).resize(function () {
				
					// cache container
					var container = jQuery('.the-not-masonry-list .filter-items');
					// initialize isotope
					container.isotope({ });
				
				}); // END resize

			});
		}				
	}


	// Masonry
	function twoot_masonry_init() 
	{
		if ( jQuery().isotope ) {
			jQuery(window).load(function() {

				// cache container
				var container = jQuery('.the-masonry-list .filter-items');

				// initialize isotope
				container.isotope({
					itemSelector: '.item',
					layoutMode: 'masonry',
					animationOptions: {
						duration: 500,
						easing: 'swing',
						queue: false
					}
				});

				// add active class
				jQuery('.filter li a').click(function () {
					jQuery('.filter li a').removeClass('active');
					jQuery(this).addClass('active');

					var selector = jQuery(this).attr('data-filter');
					container.isotope({
						filter: selector
					});

					return false;
				});

				jQuery(window).resize(function () {
				
					// cache container
					var container = jQuery('.the-masonry-list .filter-items');
					// initialize isotope
					container.isotope({ });
				
				}); // END resize

			});
		}				
	}


	// Masonry
	function twoot_post_masonry_init() 
	{
		if ( jQuery().isotope ) {
			jQuery(window).load(function() {

				// cache container
				var container = jQuery('.post-masonry-wrapper .filter-items');

				// initialize isotope
				container.isotope({
					itemSelector: '.item',
					layoutMode: 'masonry',
					animationOptions: {
						duration: 500,
						easing: 'swing',
						queue: false
					}
				});


				jQuery(window).resize(function () {
				
					// cache container
					var container = jQuery('.post-masonry-wrapper .filter-items');
					// initialize isotope
					container.isotope({ });
				
				}); // END resize

			});
		}				
	}


	// WPML
	function twoot_wpml_language_switcher() 
	{
		if(jQuery('body').hasClass('wpml')) {
			jQuery('.wpml-language-switcher').live("mouseenter", function() {
				if(!jQuery(this).data('init'))
				{
					jQuery(this).data('init', true);
					jQuery(this).hoverIntent(
						function()
						{
							jQuery('.wpml-language-switcher ul').fadeIn(300);
							jQuery('.wpml-language-switcher .actived-language a').addClass('selected');
						},

						function()
						{
							jQuery('.wpml-language-switcher ul').fadeOut(300);
							jQuery('.wpml-language-switcher .actived-language a').removeClass('selected');
						}
					);
					jQuery(this).trigger('mouseenter');
				}
			});
		}
	}


	// Accordion
	function twoot_accordion() 
	{
		jQuery('.shortcode-accordion a.tog').click(function (e) { 
			var dropDown = jQuery(this).closest('.acc-item').find('.acc-content');

			jQuery(this).closest('.shortcode-accordion').find('.acc-content').not(dropDown).slideUp();

			if (jQuery(this).hasClass('active')) { 
				jQuery(this).removeClass('active');
			} else { 
				jQuery(this).closest('.shortcode-accordion').find('.tog.active').removeClass('active');
				jQuery(this).addClass('active');
			}

			dropDown.stop(false, true).slideToggle();

			e.preventDefault();
		});
	}


	// Toggle
	function twoot_toggle() 
	{
		jQuery('.shortcode-toggle a.tog').click(function (e) { 
			var dropDown = jQuery(this).closest('.tog-item').find('.tog-content');

			if (jQuery(this).hasClass('active')) { 
				jQuery(this).removeClass('active');
			} else { 
				jQuery(this).addClass('active');
			}

			dropDown.stop(false, true).slideToggle();

			e.preventDefault();
		});
	}


	// Tab
	function twoot_tab()
	{
		if ( jQuery().easytabs ) {
			jQuery('.shortcode-tab-wrap').easytabs({
				animationSpeed: 300,
				updateHash: false
			});

			if(jQuery('.shortcode-tab-wrap .tabs li.tab a').find('.separate').length === 0) { 
				jQuery('.shortcode-tab-wrap .tabs li.tab a').append('<span class="separate"></span>');
			}
		}
	}


	// Faqs
	function twoot_faqs()
	{
		// Filter
		var faqItems = jQuery('#faqs .faq-item');
                                                    
		jQuery('.filter a').click(function(){

			jQuery('.filter li a').removeClass('active');
			
			jQuery(this).addClass('active');
			
			var faqSelector = jQuery(this).attr('data-filter');
			
			faqItems.css('display', 'none');
			
			if( faqSelector != '*' ) {		
				jQuery( faqSelector ).fadeIn(500);			
			} else {				
				faqItems.fadeIn(500);				
			}
			
			return false;

	    });
	}


	// Progress Bar
	function twoot_progress_bar()
	{
		if ( jQuery().appear ) {
			jQuery('.progress-bar').appear(function() {
				jQuery('.progress-bar').each(function() {
					var data_percent = jQuery(this).attr('data-percent');
					jQuery(this).find('.percentage').animate({ 'width' : data_percent + '%'}, data_percent*20);
				});
			});
		}
	}


	// Number
	function twoot_number()
	{
		if ( jQuery().countTo && jQuery().appear ) {
			jQuery('.shortcode-number .item-content').appear(function() {
				jQuery('.shortcode-number .item-content').each(function(){
					var data_percent = jQuery(this).attr('data-percent');
					jQuery(this).find('.count').delay(6000).countTo({
						from: 0,
						to: data_percent,
						speed: 2000,
						refreshInterval: 100
					});
				});
			});
		}
	}


	// Quick Contact
	function twoot_quick_contact() 
	{
		var MenuStatus = 'closed';

		jQuery('#quick-contact-switch').click(function() 
		{	
			if(MenuStatus === 'closed'){
				jQuery('.quick-contact').stop(true, true).fadeIn(300, 'easeInQuart', function(){MenuStatus = 'open';});			
			}else if(MenuStatus === 'open'){
				jQuery('.quick-contact').stop(true, true).fadeOut(300, 'easeOutQuart', function(){MenuStatus = 'closed';});			
			}

			return false;
		}); 
	}


})(jQuery);