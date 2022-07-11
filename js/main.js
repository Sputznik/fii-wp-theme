jQuery(document).ready(function(){

    // SHOW SEARCH MODAL
    jQuery('.nav-search').on( 'click', function (){
      jQuery('#search-modal').show()
      jQuery('.search-field input.search-input').focus();
    });

    // CLOSE MODAL
    jQuery('.fii-modal .close-modal').on( 'click', function (){
      jQuery('.fii-modal').hide();
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

  	/* MOBILE NAVBAR */
  	jQuery( '#mobile-nav .menu .dropdown > a, #mobile-nav .menu li.mega-dropdown > a' ).append( '<span class="menu-toggler"><i class="fas fa-angle-down"></i></span>' );

  	// TOGGLE MOBILE MENU
  	jQuery('.navbar-toggler').on('click', function(){
  		jQuery('body' ).addClass('show-mobile-nav');
  	});

  	// MENU TOGGLER
  	jQuery('#mobile-nav .menu-toggler').on('click', function(e){
  		e.preventDefault();
  		var $this = jQuery( this );

  		if($this.children().hasClass('fa-angle-down')){
  			$this.children().removeClass('fa-angle-down').addClass('fa-angle-up');
  		}
  		else{
  			$this.children().removeClass('fa-angle-up').addClass('fa-angle-down');
  		}

  		$this.parent().next().slideToggle( 'fast' );
  	});

  	// CLOSE MOBILE NAV
  	jQuery('#close-mobile-nav').on('click', function(){
  		jQuery('body').removeClass('show-mobile-nav');
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
