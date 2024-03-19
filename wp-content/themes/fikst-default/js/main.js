// Add your custom JS here.
(function($) {
  console.log('test');
  $(window).on('load resize', function() {
    if ($(window).width() <= 992) {
      // Navbar On Hover
      $('.navbar .dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
      }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
      });
    }
  });

  $('.navbar .dropdown > a').click(function(){
    if ($(this).attr('href') != "#") {
      location.href = this.href;
    }
  });

  // Navigation Mobile Arrow
  $('#main-menu .menu-item-has-children > .nav-link, #main-menu .dropdown-menu .menu-item-has-children > .dropdown-item, #top-line-menu .menu-item-has-children > .nav-link').after("<span class='m-subnav-arrow dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></span>");
  $('.site-nav-container-screen').on('click', function() {
    $('.navbar-close-toggler').trigger('click');
  });
  
  // Side nav
  $('.side-nav .menu-item-has-children').append("<span class='m-subnav-arrows'></span>");

  $('.side-nav .m-subnav-arrows').click(function() {
    $(this).toggleClass('active');
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $(this).parent('.menu-item-has-children').children('ul').toggleClass('active');
  });

  $('.sn-nav .menu-item-has-children > a').focus(function() {
    $(this).siblings('.m-subnav-arrows').trigger('click');
  });

  $('#main-menu .menu-item-has-children > a').each(function() {
     var parentHref = $(this).attr('href');
     if (parentHref == "#" || !parentHref ) {
       $(this).addClass('nonlink');
     }
  });

  $('#main-menu .menu-item-has-children > a').click(function() {
     if ($(this).hasClass('nonlink')) {
       $(this).siblings('.m-subnav-arrow').trigger('click');
     }
  });

  $('.sitemap-menu .menu-item-has-children > a').each(function() {
     var parentHref = $(this).attr('href');
     if (parentHref == "#" || !parentHref ) {
       $(this).addClass('nonlink').attr('tabindex', '-1');
     }
  });

  $( ".m-subnav-arrow.dropdown-toggle" ).each(function( index ) {
    var parent_nav_id = $(this).parent().attr('id');
    if (parent_nav_id) {
      var subId = parent_nav_id.slice(-4);
      $(this).next('.dropdown-menu').attr('aria-labelledby', 'menu-item-dropdown-'+subId);
    }
  });

  $('.menu-item-has-children > .dropdown-toggle').on("click", function(e) {
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $(this).next('ul').toggle();
    $(this).toggleClass('active1');

    $(this).parent('.menu-item-has-children').siblings('.menu-item-has-children').removeClass('active').find('.dropdown-toggle').removeClass('active1');

    if (!$(this).parent('.menu-item-has-children').hasClass('active')) {
      $(this).parent('.menu-item-has-children').find('.dropdown-toggle').removeClass('active1');
      $(this).parent('.menu-item-has-children').find('.menu-item-has-children').removeClass('active');
    }
    e.stopPropagation();
    e.preventDefault();
  });

	// Bootstrap Carousel
	$('#carouselExampleIndicators').carousel({
		keyboard: true,
	});

  // Carousel Animation class
	$('#carouselExampleIndicators').on('slid.bs.carousel', function () {
		$(this).find('.carousel-item .carousel-content').removeClass('wow');
	   	$(this).find('.carousel-item.active .carousel-content').addClass('wow');
	});

  // Carousel ADA
  $('#carouselExampleIndicators a, #carouselExampleIndicators .carousel-indicators li').on('focus', function() {
    $('#carouselExampleIndicators').carousel('pause');
  });

  $('#carouselExampleIndicators .carousel-indicators li:first-of-type').on('focus', function() {
    $('#carouselExampleIndicators').carousel(0);
  });

  $('#carouselExampleIndicators .carousel-indicators li').keyup(function(e){
      if(e.which === 13){ //13 is the char code for Enter
          $(this).click();
      }
  });

  $('.cwc-carousel .carousel-item:not(:last-child) .carousel-content a:last-of-type').on('blur', function() {
    $('#carouselExampleIndicators').carousel('next');
    setTimeout(function() {
      $('#carouselExampleIndicators .carousel-item.active a:first-of-type').focus();
    }, 100);
  });

  // Bootstrap Carousel 1
  $('#carouselExampleIndicators1').carousel({
    keyboard: true,
  });

  // Carousel Animation class
  $('#carouselExampleIndicators1').on('slid.bs.carousel', function () {
    $(this).find('.carousel-item .carousel-content').removeClass('wow');
      $(this).find('.carousel-item.active .carousel-content').addClass('wow');
  });

  // Carousel ADA
  $('#carouselExampleIndicators1 a, #carouselExampleIndicators1 .carousel-indicators li').on('focus', function() {
    $('#carouselExampleIndicators1').carousel('pause');
  });

  $('#carouselExampleIndicators1 .carousel-indicators li:first-of-type').on('focus', function() {
    $('#carouselExampleIndicators1').carousel(0);
  });

  $('#carouselExampleIndicators1 .carousel-indicators li').keyup(function(e){
      if(e.which === 13){ //13 is the char code for Enter
          $(this).click();
      }
  });

  $('.cwc-carousel .carousel-item:not(:last-child) .carousel-content a:last-of-type').on('blur', function() {
    $('#carouselExampleIndicators1').carousel('next');
    setTimeout(function() {
      $('#carouselExampleIndicators1 .carousel-item.active a:first-of-type').focus();
    }, 100);
  });

  // Bootstrap Carousel 2
  $('#carouselExampleIndicators2').carousel({
    keyboard: true,
  });

  // Carousel Animation class
  $('#carouselExampleIndicators2').on('slid.bs.carousel', function () {
    $(this).find('.carousel-item .carousel-content').removeClass('wow');
      $(this).find('.carousel-item.active .carousel-content').addClass('wow');
  });

  // Carousel ADA
  $('#carouselExampleIndicators2 a, #carouselExampleIndicators2 .carousel-indicators li').on('focus', function() {
    $('#carouselExampleIndicators2').carousel('pause');
  });

  $('#carouselExampleIndicators2 .carousel-indicators li:first-of-type').on('focus', function() {
    $('#carouselExampleIndicators2').carousel(0);
  });

  $('#carouselExampleIndicators2 .carousel-indicators li').keyup(function(e){
      if(e.which === 13){ //13 is the char code for Enter
          $(this).click();
      }
  });

  $('.cwc-carousel .carousel-item:not(:last-child) .carousel-content a:last-of-type').on('blur', function() {
    $('#carouselExampleIndicators2').carousel('next');
    setTimeout(function() {
      $('#carouselExampleIndicators2 .carousel-item.active a:first-of-type').focus();
    }, 100);
  });

  // Bootstrap Carousel 3
  $('#carouselExampleIndicators3').carousel({
    keyboard: true,
  });

  // Carousel Animation class
  $('#carouselExampleIndicators3').on('slid.bs.carousel', function () {
    $(this).find('.carousel-item .carousel-content').removeClass('wow');
      $(this).find('.carousel-item.active .carousel-content').addClass('wow');
  });

  // Carousel ADA
  $('#carouselExampleIndicators3 a, #carouselExampleIndicators3 .carousel-indicators li').on('focus', function() {
    $('#carouselExampleIndicators3').carousel('pause');
  });

  $('#carouselExampleIndicators3 .carousel-indicators li:first-of-type').on('focus', function() {
    $('#carouselExampleIndicators3').carousel(0);
  });

  $('#carouselExampleIndicators3 .carousel-indicators li').keyup(function(e){
      if(e.which === 13){ //13 is the char code for Enter
          $(this).click();
      }
  });

  $('.cwc-carousel .carousel-item:not(:last-child) .carousel-content a:last-of-type').on('blur', function() {
    $('#carouselExampleIndicators3').carousel('next');
    setTimeout(function() {
      $('#carouselExampleIndicators3 .carousel-item.active a:first-of-type').focus();
    }, 100);
  });


	//Magnific Popup
	$('.lightbox').magnificPopup({
	    type: 'image',
	    removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
	    mainClass: 'mfp-fade', //The actual animation
	    callbacks: {
	      close: function() {
        $('html').removeClass('mfg-popup-open');
	      $.each(this.items, function( index, value ) {
	        if (value.el) {
	          $(value.el[0]).addClass('tse-remove-border');
	        } else {
	          $(value).removeClass('tse-remove-border');
	        }
	      });
	    },
  	  open: function() {
  	    var self = this;
  	    $('.input-group-append.search-close').trigger('çlick');
  	    if ($( window ).height() < $( document ).height()) {
  	       $('html').addClass('mfg-popup-open');
  	    }
  	    self.wrap.on('click.pinhandler', 'img', function() {
  	      self.wrap.toggleClass('mfp-force-scrollbars');
  	    });
  	  },
  	  beforeClose: function() {
  	    this.wrap.off('click.pinhandler');
  	    this.wrap.removeClass('mfp-force-scrollbars');
  	  }
	},
	 
	image: {
    verticalFit: false
  }
	});

	$(document).ready(function() {
	  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	    type: 'iframe',
	    mainClass: 'mfp-fade',
	    removalDelay: 500,
	    preloader: false,
	    overflowY: 'hidden',
	    fixedContentPos: true,
	    fixedBgPos: true,
	    callbacks: {
	    	open: function() {
	        $('.input-group-append.search-close').trigger('çlick');
	        if ($( window ).height() < $( document ).height()) {
	          $('html').addClass('mfg-popup-open');
	        }
	      },
	      close: function() {
          $('html').removeClass('mfg-popup-open');
	        $(this.items).each(function() {
	         if ($(this.el)) {
	           $(this.el).addClass('tse-remove-border');
	         }
	        });
	      },
	    },
	    iframe: {
	      patterns: {
	        youtube: {
	          index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
	          id: 'v=', // String that splits URL in a two parts, second part should be %id%
	          // Or null - full URL will be returned
	          // Or a function that should return %id%, for example:
	          // id: function(url) { return 'parsed id'; }

	          src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe.
	        }
	      },
	      srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
	    }
	  });

    $('.popup-gallery').each(function() {

  	  $(this).magnificPopup({
        delegate: 'a',
  	    type: 'image',
  	    mainClass: 'mfp-with-zoom', 
  	    gallery:{
  	      enabled:true,
  	      preload: [0,1],
  	    },

  	    zoom: {
  	      enabled: true,
  	      duration: 300, // duration of the effect, in milliseconds
  	      easing: 'ease-in-out', // CSS transition easing function

  	      opener: function(openerElement) {
  	        return openerElement.is('img') ? openerElement : openerElement.find('img');
  	      }
  	    },
  	    image: {
  	      titleSrc: function(item) {
  	        var markup = '';
  	        if (item.el[0].hasAttribute("data-title")) {
  	          markup += '<h3>' + item.el.attr('data-title') + '</h3>';
  	        }
  	        
  	        if (item.el[0].hasAttribute("data-description")) {
  	          markup += '<p>' + item.el.attr('data-description') + '</p>';
  	        }
  	        return markup
  	      }
  	    },
  	    callbacks: {
  	      open: function() {
  	        $('.input-group-append.search-close').trigger('çlick');
  	        if ($( window ).height() < $( document ).height()) {
  	          $('html').addClass('mfg-popup-open');
  	        }
  	      },
  	      close: function() {
  	        $('html').removeClass('mfg-popup-open');
  	        },
  	      },

    	});
    });

    $('.popup-inline').magnificPopup({
        type: 'inline',
        midClick: true,

        callbacks: {
          open: function() {
            $('.input-group-append.search-close').trigger('çlick');
            if ($( window ).height() < $( document ).height()) {
              $('html').addClass('mfg-popup-open');
            }
          },
          close: function() {
            $('html').removeClass('mfg-popup-open');
            $(this.items).each(function() {
             if ($(this.el)) {
               $(this.el).addClass('tse-remove-border');
             }
            });
          },
        },
    });
	});

	// Module Equal Height
	$(window).on('load resize orientationchange', function() {
		setTimeout(function() {
		    var lcrilmHeight = $('.left-content-right-icon-title-listing-module .lcrilm-content-wrap').outerHeight();
		    $('.lcrilm-item-link').outerHeight(lcrilmHeight/2);
		}, 500);
  });

	// Animation on Scroll
	var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  });
	wow.init();

	// Show Search on icon click
	$('[data-toggle=search-form]').click(function(e) {
		e.preventDefault();
	    $('.search-module').toggleClass('open');
	    $('.search-module .search').focus();
	    $('html').toggleClass('search-form-open');
      $('.search-module input, .search-module button, .search-module .search-close').attr('tabindex', '0');
	});

	$('[data-toggle=search-form-close]').click(function() {
	    $('.search-module').removeClass('open');
	    $('html').removeClass('search-form-open');
	});

	$('.search-module .search').keypress(function( event ) {
	  if($(this).val() == "Search") $(this).val("");
	});

	$('.search-close').click(function(event) {
    event.preventDefault();
	  $('.search-module').removeClass('open');
	  $('html').removeClass('search-form-open');
    $('.search-module input, .search-module button .search-module .search-close').attr('tabindex', '-1');
	});

  $('.top-banner-close').click(function(event) {
    event.preventDefault();
    $('.top-banner-module').remove('.hi-wrap');
    //$('html').removeClass('top-banner-form-open');
    //$('.search-module input, .search-module button .search-module .search-close').attr('tabindex', '-1');
  });



	//Smooth Scroll - Detects a #hash on-page link and will smooth scroll to that position. Will not affect regular links.
  $('.smooth-scroll, .smooth-scroll > a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      var smoothtop = 0;
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      var header_height = $('.sh-sticky-wrap').height();
      var pillar_nav_height = $('.pillarpage-linklist-module').outerHeight();
      var wWidth = $(window).width();
      if (wWidth > 767) {
        smoothtop = pillar_nav_height ? (header_height + pillar_nav_height) : header_height;
      }
      if (target.length ) {
        $('html, body').animate({
          scrollTop: target.offset().top - smoothtop
        }, 1000);
        return false;
      }
    }
  });

  // Smooth scroll on load
  if(window.location.hash) {
    var hash = window.location.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 1500);
  }


	//Slide in CTA
  var findEl = $('#slidebox').length;
  if (findEl <= 0) {
      // do nothing
  } else {
      var slidebox = $('#slidebox');
      if (slidebox) {
          $(window).scroll(function() {
              var distanceTop = $('#last').offset().top - $(window).height();
              if ($(window).scrollTop() > distanceTop)
                  slidebox.animate({
                      'right': '0px'
                  }, 300);
              else
                  slidebox.stop(true).animate({
                      'right': '-430px'
                  }, 100);
          });
          $('#slidebox .close').on('click', function() {
              $(this).parent().remove();
          });
      }
  }

	// Scroll to top
	$( window ).bind( "scroll", function() {
    if ( $( this ).scrollTop() > 520 ) {
      $( "#toTop" ).fadeIn();
    } else {
      $( "#toTop" ).stop().fadeOut();
    }
	});

	$('#toTop').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 1000);
	});

	//Sticky Nav
  if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
  }
  
  if (!$('body').hasClass('page-template-navigations-template')) {
    $(window).on('load orientationchange resize', function() {
      var wWidth = $(window).width();
      if (wWidth > 991) {
        var findEl = $('.sh-sticky-wrap').length;
        if (findEl <= 0) {
            // do nothing
        } else {
          //Set the height of the sticky container to the height of the nav
          //var navheight = $('.sub-nav-container').height();
          // grab the initial top offset of the navigation 
          var sticky_navigation_offset_top = $('.sh-sticky-wrap').offset().top;
          var header_height = $('.sh-sticky-wrap').outerHeight();
          // our function that decides weather the navigation bar should have "fixed" css position or not.
         
          var sticky_navigation = function(){
            var scroll_top = $(window).scrollTop(); // our current vertical position from the top
            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scroll_top > sticky_navigation_offset_top) { 
              $('.sh-sticky-wrap').addClass('stuck');
              $('body').css('padding-top',header_height+'px');
              //$('.sh-sticky-inner-wrap').css('height', '187px');
            } else if(scroll_top <= sticky_navigation_offset_top) {
              $('.sh-sticky-wrap').removeClass('stuck'); 
              $('body').css('padding-top','0');
              // $('.site-header').css('height', 'auto');
            }   
          };
          // run our function on load
          sticky_navigation();
          // and run it again every time you scroll
          $(window).scroll(function() {
            sticky_navigation();
          });

        }
      }
    });
  }

  $('.pillar-nav a').on('click', function() {
    $('.pillar-nav a').removeClass('pillar-active');
    $(this).addClass('pillar-active');

  });

  if ($('section').hasClass('pillarpage-linklist-module')) {
    var pillar_navigation_offset_top = $('.pillarpage-linklist-module').offset().top;
    var pillar_nav_height = $('.pillarpage-linklist-module').outerHeight();
    var header_height = $('.sh-sticky-wrap').outerHeight();

    // Cache selectors
    var lastId,
    topMenu = $(".pillarpage-linklist-module"),
    topMenuHeight = topMenu.outerHeight()+15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

    var pillar_sticky_navigation = function(){
      var scroll_top = $(window).scrollTop(); 

      if (scroll_top > pillar_navigation_offset_top) { 
        $('.pillarpage-linklist-module').addClass('stuck').css('top', header_height+'px');
        $('.additional-content').css('padding-top',pillar_nav_height+'px');
      } else if(scroll_top <= pillar_navigation_offset_top) {
        $('.pillarpage-linklist-module').removeClass('stuck'); 
        $('.additional-content').css('padding-top','0');
      }

      // Get container scroll position
      var fromTop = $(this).scrollTop()+ (topMenuHeight + header_height);
       
      // Get id of current scroll item
      var cur = scrollItems.map(function(){
         if ($(this).offset().top < fromTop)
           return this;
      });
      // Get the id of the current element
      cur = cur[cur.length-1];
      var id = cur && cur.length ? cur[0].id : "";
       
      if (lastId !== id) {
           lastId = id;
           // Set/remove active class
           menuItems
             .parent().removeClass("pillar-active")
             .end().filter("[href='#"+id+"']").parent().addClass("pillar-active");
      }          
    }

    var wWidth = $(window).width();
    if (wWidth > 767) {
      // run our function on load
      pillar_sticky_navigation();
      // and run it again every time you scroll
      $(window).scroll(function() {
        pillar_sticky_navigation();
      });
    }
  }

	/*============== Focus on tab (ADA)=============*/
  $(document).on('keyup keydown', function(e) {
    var code = e.keyCode || e.which;
    if (code == '9') {
         
      $('#main-menu .menu-item-has-children > a, #top-line-menu .menu-item-has-children > a').focus(function(){
          $(this).parent('.menu-item-has-children').children('.dropdown-menu').show();
      });

     $('#main-menu .menu-item-has-children > .dropdown-menu li:last-of-type > a, #top-line-menu .menu-item-has-children > .dropdown-menu li:last-of-type > a').blur(function(){

        if (!$(this).parent().children().hasClass('dropdown-menu') && $(this).parent().is(':last-child')) {
          $(this).parent().parent('.dropdown-menu').hide();
          if ($(this).parent('li').parent('.dropdown-menu').parent('li').next().length <= 0) {
              $(this).parent('li').parent('.dropdown-menu').parent('li').parent('.dropdown-menu').hide();
          }
          
          if ($(this).parent().next().length <= 0 && $(this).parent('li').parent('.dropdown-menu').parent('li').next().length <= 0 && $(this).parent('li').parent('.dropdown-menu').hasClass('sn-level-3')) {
            $('.dropdown-menu').hide();
          }
        }
        
     });

     if (code == '9' && e.shiftKey) {
       if ($(document.activeElement).parent().hasClass('menu-item-has-children')) {
         $(document.activeElement).parent().children('.dropdown-menu').hide();
       }
       $('#main-menu .menu-item-has-children > .dropdown-menu li:last-of-type a, #top-line-menu .menu-item-has-children > .dropdown-menu li:last-of-type a').blur(function(){
         $(this).closest('.dropdown-menu').show();
       });
 
     }

     $(document).click(function(e) {
          console.log('document click');
        if (!$(e.target).is('#main-menu .menu-item-has-children a')) {
          $('#main-menu .dropdown-menu').hide();
          $('.m-subnav-arrow').removeClass('active1');
        }

        if (!$(e.target).is('#top-line-menu .menu-item-has-children a')) {
          $('#top-line-menu .dropdown-menu').hide();
        }

        if (!$(e.target).is('a') || !$(e.target).is('button') || !$(e.target).is('input') || !$(e.target).is('[tabindex="0"]')) {

          $('a, button, input, [tabindex="0"]').removeClass('tse-remove-border');
        }

        if (!$(e.target).is('[data-toggle="tab"]')) {
          $('[data-toggle="tab"]').attr('tabindex', "0")
        }
     });
    }
  });

  $(document).click(function(e) {
    console.log('document click');
    if (!$(e.target).is('#main-menu .menu-item-has-children a')) {
      $('.m-subnav-arrow').removeClass('active1');
    }
  });

  // Modal
  $('[data-toggle="modal"]').on('keyup', function(e) {
    if(e.which === 13){ //13 is the char code for Enter
      $(this).click();
    }
  });

  $('[data-dismiss="modal"]').on('click', function(e) {
    setTimeout(function() {
      $('[data-toggle="modal"]').addClass('tse-remove-border');
    }, 10);
  });

  $('.modal').on('click', function(e) {
    e.stopPropagation();
    setTimeout(function() {
      $('[data-toggle="modal"]').addClass('tse-remove-border');
    }, 10);
  });
  
  $(document).ready(function () {
    $("#skipToContent").on('click', function(e){
      $('body').toggleClass('changeCursor');
      e.stopPropagation();
      e.preventDefault();
        $('.site-header').after('<a href="javascript:void(0)" tabindex="-1" id="siteContentFocusable"></a>');
        $(this).blur();
        if ( window.location.pathname == '/' ){
          $('html, body').animate({
              scrollTop: $("#siteContentFocusable").offset().top
          }, 1000);
        } else {
            $('html, body').animate({
              scrollTop: 0
          }, 1000);
        }
        $('#siteContentFocusable').trigger('focus');
    });

    $('body').on('click contextmenu drag auxclick', 'a, button, input, select', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('[tabindex="0"]').on('click contextmenu drag auxclick', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('select, button, input').on('mousemove', function(event) {
      //$('a, button, input, select').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    });

    $("a[href*='tel'], [href*='mailto']").on('click contextmenu drag auxclick', function() {
      $('a, button, input').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function() {
      $(this).addClass('tse-remove-border');
    });

    $("a:not([href*='tel']), a:not([href*='mailto'])").on('blur', function() {
      $("[href*='mailto'], [href*='tel']").removeClass('tse-remove-border');
    });

    $('button').on('click contextmenu drag auxclick', '.slick-arrow', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });
    
  });

  $(window).on('load', function() {
    setTimeout(function() {
      $('.slick-slide.slick-cloned *[tabindex="0"], .slick-slide.slick-cloned a').attr('tabindex', '-1');
    }, 1000);
  });

  $(window).on('blur', function() {
      $(document.activeElement).addClass('tse-remove-border');
  });

  $(document).ready(function () {
	  $('a[href$=".pdf"]').attr('rel', 'noopener noreferrer');
	});

  // Bootstrap Tabs ADA
  $('.bootstrap-tabs .bt-nav-item a:not(.active)').attr('tabindex', '-1');

  $('.bootstrap-tabs .tab-pane:not(:last-child) .bt-tab-body a:last-of-type').on('blur', function() {
    $('.bootstrap-tabs .bt-nav-item a.active').parent().next().find('a').trigger('click');
    setTimeout(function() {
      $('.bootstrap-tabs .bt-nav-item a:not(.active)').attr('tabindex', '-1');
    }, 300);

    $('.bootstrap-tabs .bt-nav-item a.active').attr('tabindex', '0').focus();
  });

  // content-tabs-2lv Tabs ADA
  $('.content-tabs-2lv .ctl-nav-item a:not(.active)').attr('tabindex', '-1');

  $('.content-tabs-2lv .tab-pane:not(:last-child) .ctl-nested-nav-item:last-of-type a').on('blur', function() {
    $('.content-tabs-2lv .ctl-nav-item a.active').parent().next().find('a').trigger('click');
    setTimeout(function() {
      $('.content-tabs-2lv .ctl-nav-item a:not(.active)').attr('tabindex', '-1');
    }, 300);

    $('.content-tabs-2lv .ctl-nav-item a.active').attr('tabindex', '0').focus();
  });

  $('.ctl-nested-nav-item > a').on('mouseenter focus', function() {
    var ctl_nested_nav_item_id = $(this).attr('href');
    console.log(ctl_nested_nav_item_id);
    $(this).trigger('click');
  });

  // Industries We Serve Module
  $('.industries-we-serve-module .nav-pills-custom a:not(.active)').attr('tabindex', '-1');

  $('.industries-we-serve-module .tab-pane:not(:last-child) div[role="tabpanel"] a:last-of-type').on('blur', function() {
    $('.industries-we-serve-module .nav-pills-custom a.active').next('.nav-link').trigger('click');
    setTimeout(function() {
      $('.industries-we-serve-module .nav-pills-custom a:not(.active)').attr('tabindex', '-1');
    }, 300);

    $('.industries-we-serve-module .nav-pills-custom a.active').attr('tabindex', '0').focus();
  });

  //destination page slider    
  $(document).ready(function() {

    $('.slider-for').each(function(key, item) {

      var sliderIdName = 'slider' + key;
      var sliderNavIdName = 'sliderNav' + key;

      this.id = sliderIdName;
      $('.slider-nav')[key].id = sliderNavIdName;

      var sliderId = '#' + sliderIdName;
      var sliderNavId = '#' + sliderNavIdName;

      $(sliderId).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: sliderNavId
      });

      $(sliderNavId).slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: sliderId,
        prevArrow: '<span class="slick-prev-wrap"><a class="slick-prev" href="javascript:void(0)" aria-label="Previous">Prev</a></span>',
        nextArrow: '<span class="slick-next-wrap"><a class="slick-next" href="javascript:void(0)" aria-label="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></span>',
        dots: false,
        focusOnSelect: true,
        accessibility: true,
        responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 3
          }
        },
      ]
      });

    });


  });

//destination page slider    
  $(document).ready(function() {

    $('.fvm-slider-for').each(function(key, item) {

      var sliderIdName = 'fvm-slider' + key;
      var sliderNavIdName = 'fvm-sliderNav' + key;

      this.id = sliderIdName;
      $('.fvm-slider-nav')[key].id = sliderNavIdName;

      var sliderId = '#' + sliderIdName;
      var sliderNavId = '#' + sliderNavIdName;

      $(sliderId).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: sliderNavId
      });

      $(sliderNavId).slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: sliderId,
        arrows:false,
        dots: true,
        focusOnSelect: true,
        accessibility: true,
        responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2
          }
        },
      ]
      });

    });


  });

  // Accordion Tabs
  $(document).ready(function () {
    $('.accordion-tabs').each(function(index) {
      $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
    });
    $('.accordion-tabs').on('click focus', 'li > a.tab-link', function(event) {
      if (!$(this).hasClass('is-active')) {
        event.preventDefault();
        var accordionTabs = $(this).closest('.accordion-tabs');
        accordionTabs.find('.is-open').removeClass('is-open').hide();

        $(this).next().toggleClass('is-open').toggle();
        accordionTabs.find('.is-active').removeClass('is-active');
        $(this).addClass('is-active');
      } else {
        event.preventDefault();
      }
    });
  });

  // Click to Expand Module
  $('.click-expand-module .card-header').on('click', function() {
    $('.click-expand-module .card-header i').removeClass('fa-minus').addClass('fa-plus');
    $('.click-expand-module .card-header .material-icons').text('add');

    if ($(this).hasClass('collapsed')) {
      $(this).children('i').removeClass('fa-plus').addClass('fa-minus');
      $(this).children('.material-icons').text('remove');
    } else {
      $(this).children('i').removeClass('fa-minus').addClass('fa-plus');
      $(this).children('.material-icons').text('add');
      $(this).blur();
    }
  });


  //Buckets Hover/Focus
  $(document).ready(function() {

    // Market Serve Carousel
    $('.hero-interactive-1-mobile-carousel').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      arrows: false,
      prevArrow: '<a class="slick-prev" href="javascript:void(0)" aria-label="Previous"></a>',
      nextArrow: '<a class="slick-next" href="javascript:void(0)" aria-label="Next"></a>',
      accessibility: true,
      pauseOnFocus: true,
      rows: 0,
    });

    var height = 0;
    $('.hero-interactive-1-mobile-carousel .slick-slide').each(function() {
      height = Math.max(height, $(this).find(".hi1m-slide").outerHeight());
    }).find('.hi1m-slide').css('min-height', height);

    // Market Serve Module
    $(document).on('mouseenter','.hi1m-item', function (event) {
      $('.hi1m-item').removeClass('hi1m-item-hovered').addClass('hi1m-item-normal');
      $(this).addClass('hi1m-item-hovered').removeClass('hi1m-item-normal');
    });

    $(document).on('focus','.hi1m-item', function (event) {
      $('.hi1m-item').removeClass('hi1m-item-hovered').addClass('hi1m-item-normal');
      $(this).addClass('hi1m-item-hovered').removeClass('hi1m-item-normal');
    });

    $(window).on('load orientationchange resize', function() {
      var wWidth = $(window).width();
      if (wWidth < 1100) {
        if (!$('.hi2m-carousel').hasClass('slick-initialized')) {
          $('.hi2m-carousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            mobileFirst: true,
            arrows: true,
            dots: true,
            infinite: true,
            accessibility: true,
            pauseOnFocus: true,
            responsive: [
              {
                breakpoint: 1100,
                settings: 'unslick'
              }
            ]
          });
        }

        $('.hi2m-carousel').on("afterChange", function (event, slick, currentSlide, nextSlide){
          $('.hi2m-wrapper').hide();
          $('.hi2m-slider-hover-content').css('opacity', 1);
          $('.hi2m-slide').css('background-size', 'cover');
        });

      } else {
        $('.hi2m-slide-title').on("mouseenter focus ontouchstart", function(e) {
          console.log('test');
          $('.hi2m-slide').removeClass('active-slide');
          var type = e.type;
          var dataImgSrc = $(this).parent('.hi2m-slide').attr('data-imgsrc');
          $(this).parent('.hi2m-slide').addClass('active-slide');
          $('.hi2m-carousel').css('background-image', 'url('+dataImgSrc+')');
        });
        
        if ($('.hi2m-carousel').hasClass('slick-initialized')) {
          setTimeout(function(){
              $('.hi2m-carousel').slick('unslick');
              location.reload();
          },100);
        }
      }
    });

    var index = parseInt(Math.ceil(($('.hi2m-slide').length/2) - 1));
    $(window).on('load', function() {
      if ($('.hi2m-carousel').hasClass('slick-initialized')) {
          $('.hi2m-carousel').slick('slickGoTo', index, true);
          $('.hi2m-wrapper').show();
          $('.hi2m-slide').css('background-size', '0 0');
          $('.hi2m-slider-hover-content').css('opacity', 0);
      }
    });
    $(window).on('load', function() {
      $('.hts-slider').slick({
           arrows:false,
           fade: true,
           autoplay: false,
           dots: true,
           speed: 800,
           customPaging : function(slider, i) {
                var thumb = $(slider.$slides[i]).find('.slider-nav');
                return thumb;
           }
      });
    });
    $(window).on('load', function() {
      $('.tm-carousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: true,
        dots: true,
        infinite: true,
        accessibility: true,
        pauseOnFocus: true,
      });
    });
    $('.tcm-carousel').slick({
      centerMode: true,
      centerPadding: '15px',
      slidesToShow: 3,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '80px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 639,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 1
          }
        }
      ]
    });
  });


  $(window).on('load', function() {
    
    // Added recaptcha *
    //$('.ginput_recaptcha').parent('.gfield').children('.gfield_label').append('<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span>');
  });

   


  $(document).on('ready', function() {
  $('.cbs-slider').slick({
    arrows: true,
        dots: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 768,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 480,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }
        ]
  });
  $('.cbs-slider .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function() {
    $('.cbs-slider .slick-next').trigger('click');
    setTimeout(function() {
      $('.cbs-slider .slick-current').find('a').focus();
    }, 500);
  });

  //$('.cbs-slider .slick-dots li button').attr('tabindex', -1);

  $('.cbs-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
       $('a, button, input').removeClass('tse-remove-border');
       $(this).addClass('tse-remove-border');
     }).on('blur', function() {
       $(this).removeClass('tse-remove-border');
  });

//more product line
$('.mpl-slider').slick({
    arrows: true,
        dots: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 768,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 480,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }
        ]
  });
  $('.mpl-slider .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function() {
    $('.mpl-slider .slick-next').trigger('click');
    setTimeout(function() {
      $('.mpl-slider .slick-current').find('a').focus();
    }, 500);
  });

//more product line
$('.rpm-items-wrap').slick({
    arrows: true,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
        {
          breakpoint: 1128,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 992,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 640,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }
        ]
  });
  $('.rpm-items-wrap .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function() {
    $('.rpm-items-wrap .slick-next').trigger('click');
    setTimeout(function() {
      $('.rpm-items-wrap .slick-current').find('a').focus();
    }, 500);
  });


  //$('.mpl-slider .slick-dots li button').attr('tabindex', -1);

  $('.mpl-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
       $('a, button, input').removeClass('tse-remove-border');
       $(this).addClass('tse-remove-border');
     }).on('blur', function() {
       $(this).removeClass('tse-remove-border');
  });
 //Image Carousel
 $('.icwt-slider').slick({
    dots: true,
    infinite: false,
    arrows: false,
    slidesToShow: 1,
    autoplay:false,
    fade: true,
    prevArrow: '<a class="slick-prev" href="javascript:void(0)" aria-label="Previous">Prev</a>',
    nextArrow: '<a class="slick-next" href="javascript:void(0)" aria-label="Next"></a>',
    accessibility: true,
  });
  
  //$('.tm-carousel .slick-dots li button').attr('tabindex', -1);

  $('.icwt-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
    $('a, button, input').removeClass('tse-remove-border');
    $(this).addClass('tse-remove-border');
  }).on('blur', function() {
    $(this).removeClass('tse-remove-border');
  }); 

  //Content association module two
  $('.camt-slider').slick({
    arrows: false,
        dots: true,
        slidesToShow: 6,
        slidesToScroll: 6,
        infinite: true,
        responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
           breakpoint: 400,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 2
           }
        }
        ]
  });   
});

  $(document).ready(function(){
    // Content-Value Prop 2 ADA
    $(".cvp2-box:nth-child(2)").addClass('active');
    $(".cvp2-link:nth-child(2)").addClass('active');

    $('.cvp2-link').on('mouseover focus', function () {
      $('.cvp2-box').removeClass('active');
      $('.cvp2-link').removeClass('active');
      $(this).addClass('active');
      var target = $(this).attr('id');
      var hover_target = $('.cvp2-txt').find('.'+target).addClass('active');
    });



    // Content-Tabs-2Lv-2 Slider
    $(window).on('load', function () {
      $('.ctl2-slider').slick({
         infinite: true,
         slidesToShow: 2,
         slidesToScroll: 2,
         dots: true,
         arrows: false,
        accessibility: true,
        responsive: [
         {
            breakpoint: 767,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            // autoplay: true,
            }
          }
        ]
      });

      $('a[data-toggle="tab"], a[data-toggle="collapse"]').on('shown.bs.tab', function (e) {
        $('.ctl2-slider').slick('setPosition');
      });

      $('.content-tabs-2lv-2-module .nav-item a:not(.active)').attr('tabindex', '-1');

      $('.content-tabs-2lv-2-module .tab-pane:not(:last-child) .slick-slide:last-of-type .ctl2-btn').on('blur', function() {
        $('.content-tabs-2lv-2-module .nav-item a.active').parent().next().find('a').trigger('click');
        setTimeout(function() {
          $('.content-tabs-2lv-2-module .nav-item a:not(.active)').attr('tabindex', '-1');
        }, 300);

        $('.content-tabs-2lv-2-module .nav-item a.active').attr('tabindex', '0').focus();
      });

      $('.ctl2-tab-title').on('click focus', function() {
        $('.ctl2-tab-title').attr('tabindex', '-1');
          $(this).attr('tabindex', '0');
      });

      $('.ctl2-slider .slick-slide:not(:last-of-type) .ctl2-btn').blur(function() {
        $('.ctl2-slider .slick-current').next('.slick-slide').find('.ctl2-tab-title').trigger('click');
        $('.ctl2-slider .slick-current .ctl2-btn').focus();
      });

      $('.ctl2-slider .slick-dots li button').attr('tabindex', -1);

    });

    $('.pm-listing').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      autoplay: false,
      infinite: true,
      focusOnSelect: true,
      accessibility: true,
      responsive: [
        {
          breakpoint: 1230,
          settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
          }
        },
        {
          breakpoint: 992,
          settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          }
        },
        {
          breakpoint: 500,
          settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          }
        }
      ]
    });

  });

  // hide #back-top first
  $("#back-top").hide();
  // fade in #back-top
  $(function() {
      $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
          } else {
              $('#back-top').fadeOut();
          }
      });

      // scroll body to 0px on click
      $('#back-top a').click(function() {
          $('body,html').animate({
              scrollTop: 0
          }, 800);
          return false;
      });
  });



}(jQuery));