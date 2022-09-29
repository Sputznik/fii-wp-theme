jQuery(document).ready(function(){

    // SHOW SEARCH MODAL
    jQuery('.nav-search, [data-behaviour~=fii-search-modal]').on( 'click', function (){
      jQuery('#search-modal').show()
      jQuery('.search-field input.search-input').focus();
    });

    // SHOW USER MODAL
    jQuery('[data-behaviour~=fii-user-modal]').on( 'click', function (){
      jQuery('#fii-user-modal').show();
    });

    // CLOSE MODAL
    jQuery('[data-dismiss~=fii-modal]').on( 'click', function (){
      jQuery('.fii-modal').hide();
    });

    // CLOSE MODAL WHEN Esc key is pressed
    jQuery(document).on('keydown',function(event) {
      if( event.keyCode == 27){ jQuery('.fii-modal').hide(); }
    });

    function styleMegaParentItem(){
      if( window.outerWidth > 768 ){
        var $mega_item_active = jQuery('#fii-navigation .mega-menus > li.active');
        $mega_item_active.parents('li.mega-dropdown').addClass('active');
      }
      else{
        var $mega_item_active = jQuery('#mobile-nav .mega-menus > li.cat-parent-term.active');
        $mega_item_active.parents('li.mega-dropdown').addClass('active');
      }
    }

  	/* APPEND MOBILE NAVBAR DROPDOWN ICON */
  	jQuery( '#mobile-nav .menu .dropdown:not(".fii-plus-menu") > a, #mobile-nav .menu li.mega-dropdown > a' ).append( '<span class="menu-toggler" data-toggler-icon="caret"><i class="fas fa-angle-down"></i></span>' );
    jQuery( '#mobile-nav .menu .fii-plus-menu.dropdown > a' ).append( '<span class="menu-toggler" data-toggler-icon="plus"><i class="fas fa-plus"></i></span>' );

  	// SHOW MOBILE NAV
  	jQuery('.navbar-toggler').on('click', function(){
  		jQuery('body' ).addClass('show-mobile-nav');
  	});

    // CLOSE MOBILE NAV
  	jQuery('#close-mobile-nav').on('click', function(){
  		jQuery('body').removeClass('show-mobile-nav');
  	});

  	// MENU TOGGLER
  	jQuery('#mobile-nav .menu-toggler').on('click', function(e){
  		e.preventDefault();
  		var $this = jQuery( this ),
          $children = $this.children(),
          icon_name = $this.data('toggler-icon'),
          add_class    = "fa-angle-up",
          remove_class = "fa-angle-down";

      // CHANGE THE ICON CLASSES BASED ON THE ICON_NAME
      if( icon_name === 'plus' ){
        add_class    = "fa-minus";
        remove_class = "fa-plus";
      }

      // TOGGLER ICON
      if( $children.hasClass( remove_class ) ){
  			$children.removeClass( remove_class ).addClass( add_class );
  		} else{
  			$children.removeClass( add_class ).addClass( remove_class );
  		}

  		$this.parent().next().slideToggle( 'fast' );
  	});

  /* BACK TO TOP */
  jQuery('.scroll-top .back-to-top').on( 'click', function (e) {
    e.preventDefault();
    jQuery( 'html, body' ).animate( { scrollTop: 0 }, 700 );
  });

  jQuery(window).scroll(function() {

    /* SHOWS BACK TO TOP BUTTON */
    if( jQuery(this).scrollTop() > 220 ){
      jQuery('.scroll-top').addClass('show');
    }
    else { jQuery('.scroll-top').removeClass('show'); }

  });

  /* FII VIDEO SLIDER */
  jQuery('[data-behaviour~=fii-video-slider]').each( function () {
    var $this = jQuery( this ),
      slides = $this.data('slides'),
      infinity = true,
      autoplay = false,
      dots_show = true,
      arrows_show = true;
      $this.slick({
        infinite      : infinity,
        slidesToShow  : slides,
        slidesToScroll: slides,
        dots          : dots_show,
        autoplay      : autoplay,
        autoplaySpeed : 5000,
        speed         : 300,
        arrows        : arrows_show,
        nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
        prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
        responsive    : [
          {
            breakpoint: 1169,
            settings  : {
              slidesToShow  : 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings  : {
              slidesToShow  : 1,
              slidesToScroll: 1
            }
          }
        ]
      });	// slick

      $this.addClass( 'loaded' );
  });


  /* FII LOGO SLIDER */
	jQuery('[data-behaviour~=fii-logo-slider]').each( function () {

    var $this = jQuery( this );

    $this.slick({
      slidesToShow  : $this.data('slides'),
      slidesToScroll: 1,
      autoplay		  : true,
			autoplaySpeed	: 1500,
			arrows			  : false,
			dots			    : false,
			pauseOnHover	: false,
			responsive		: [{
				breakpoint	: 960,
				settings	: { slidesToShow: 4 }
			}, {
				breakpoint: 768,
				settings: { slidesToShow: 3 }
			},{
        breakpoint: 520,
				settings: { slidesToShow: 2 }
      }]
    });	// slick

    $this.addClass( 'loaded' );

  } );

  // EXECUTED ON PAGE LOAD
  styleMegaParentItem();

});
