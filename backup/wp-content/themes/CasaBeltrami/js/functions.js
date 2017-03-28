/*jshint unused:false, jquery:true, browser:true, strict: false*/
/*global logo:true, escape:true, FB:true*/


var logoContent;
var single_gallery_layout;
var we_have_gallery_on_page;

if (typeof logo !== 'undefined') {
    addLogoToMenu(logo.logoContent);
}


function setCookie(c_name,value,exdays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays===null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

//Add logo to the center of all menu item list (Tripod theme)
function addLogoToMenu(logoContent){
    var middle = Math.round(jQuery(".menu-with-logo nav.main-menu > ul.sf-menu > li").length / 2);
    jQuery(".menu-with-logo nav.main-menu > ul.sf-menu > li:nth-child(" + middle + ")").after(jQuery('<li class="menu-logo">'+logoContent+'</li>'));
    if (typeof logo !== 'undefined') {
        jQuery(".sticky-menu-container nav.main-menu > ul.sf-menu > li:nth-child(" + middle + ")").after(jQuery('<li class="menu-logo">'+logoContent+'</li>'));
    }
}
function gallery_single(){
	if( single_gallery_layout == 'grid' ){
		new AnimOnScroll( document.getElementById( 'gal-grid' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		} );
		setTimeout(function(){
			jQuery('.gallery-list li').each(function(i, value) {
				jQuery(this).delay(100*i).animate({opacity: 1},200);
			});
		},400)
	}
	if( single_gallery_layout == 'photoset' ){
		jQuery('.photoset-grid-basic').photosetGrid();
	}
	if( single_gallery_layout == 'fotorama' ){
		var topFotorama = jQuery('.gallery-fotorama').offset().top;
		jQuery(document).scrollTo(topFotorama,600);
	}
}
function resizeVideo(){ //alert(1);
	if(jQuery('.featvideo').length){

		var iframe_width = jQuery('.featvideo iframe').width();
		var iframe_height = jQuery('.featvideo iframe').height();

		var iframe_proportion = iframe_width/iframe_height;

		var new_iframe_width = jQuery('.featvideo .feat-video-container').width();
		var new_iframe_height = new_iframe_width/iframe_proportion;

		jQuery('.featvideo iframe ').each(function(){

			jQuery(this).attr('width',new_iframe_width);
			jQuery(this).attr('height',new_iframe_height);
		});

		
	}
}
function initCarousel(){
  "use strict";
  jQuery('.carousel-wrapper').each(function(){
    var thisElem = jQuery(this);
    var numberOfElems = parseInt(jQuery('.carousel-container', thisElem).children().length, 10);
    var oneElemWidth;
    var numberOfColumns = [['two',6],['three',4],['four',3],['six',2],['twelve',1]];
    var curentNumberOfColumns;
    var moveMargin;
    var leftHiddenElems = 0;
    var rightHiddenElems; 
    var curentMargin = 0;
    var numberOfElemsDisplayed;
    var index = 0;
    var carouselContainerWidth;
    var carouselContainerWidthPercentage;
    var elemWidth;
    var elemWidthPercentage;

    while (index < numberOfColumns.length) {
            if (jQuery('.carousel-container>div', thisElem).hasClass(numberOfColumns[index][0])) {
                curentNumberOfColumns = numberOfColumns[index][1];
                break;
            }
            index++;
        }

        elemWidth = 100 / numberOfElems;
        elemWidth = elemWidth.toFixed(4);
        elemWidthPercentage = elemWidth + '%';

        function showHideArrows(){
            if(curentNumberOfColumns >= numberOfElems){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','0.4');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','0.4');

            } else if(leftHiddenElems === 0){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','0.4');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','1');

            } else if (rightHiddenElems === 0 ){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','1');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','0.4');

            } else {
                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','1');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','1');
            }
        }

        function reinitCarousel() {

            showHideArrows();
            jQuery('.carousel-container', thisElem).css('margin-left', 0);
            leftHiddenElems = 0;
            jQuery('ul.carousel-nav > li', thisElem).unbind('click');

            if (jQuery(window).width() <= 973) {

                carouselContainerWidth = 100 * numberOfElems;
                carouselContainerWidthPercentage = carouselContainerWidth + '%';
                rightHiddenElems = numberOfElems - 1;
                moveMargin = 100;
                curentMargin = 0;

                jQuery('ul.carousel-nav > li', thisElem).unbind('click');

                jQuery('ul.carousel-nav > li', thisElem).click(function () {
                    if (jQuery(this).hasClass('carousel-nav-left')) {
                        if (leftHiddenElems > 0) {
                            curentMargin = curentMargin + moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems++;
                            leftHiddenElems--;
                        }
                    } else {
                        if (rightHiddenElems > 0) {
                            curentMargin = curentMargin - moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems--;
                            leftHiddenElems++;
                        }
                    }
                    // Trigger arrows color change
                    showHideArrows();
                });

            } else {

                while (index < numberOfColumns.length) {
                    if (jQuery('.carousel-container>div', thisElem).hasClass(numberOfColumns[index][0])) {
                        numberOfElemsDisplayed = numberOfColumns[index][1];
                        moveMargin = 100 / numberOfElemsDisplayed;
                        rightHiddenElems = numberOfElems - numberOfElemsDisplayed;
                        oneElemWidth = 100 / numberOfColumns[index][1];
                        break;
                    }
                    index++;
                }

                carouselContainerWidth = oneElemWidth * numberOfElems;
                carouselContainerWidthPercentage = carouselContainerWidth + '%';

                curentMargin = 0;

                jQuery('ul.carousel-nav > li', thisElem).click(function () {
                    if (jQuery(this).hasClass('carousel-nav-left')) {
                        if (leftHiddenElems > 0) {
                            curentMargin = curentMargin + moveMargin + 0.00001;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems++;
                            leftHiddenElems--;
                        }
                    } else {
                        if (rightHiddenElems > 0) {
                            curentMargin = curentMargin - moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems--;
                            leftHiddenElems++;
                        }
                    }
                    // Trigger arrows color change
                    showHideArrows();
                });
            }

            //Set the container total width
            jQuery('.carousel-container', thisElem).width(carouselContainerWidthPercentage).css({
                'max-height': '9999px',
                'opacity': '1'
            });

            //Set width for each element
            jQuery('.carousel-container>div', thisElem).each(function () {
                jQuery(this).attr('style', 'width: ' + elemWidthPercentage + ' !important; float:left;');
            });
        }

        reinitCarousel();

        jQuery(window).resize(function () {
            reinitCarousel();
        });

  });
}


//init menu - you need just to give him the menu class
function initMenu(menu){
  	"use strict";
    jQuery(menu).supersubs({
            minWidth: 13, // minimum width of sub-menus in em units 
            maxWidth: 65, // maximum width of sub-menus in em units
            delay: 800

    }).superfish({
        delay: 400,
        speed: 450,
        animation: {
            height: 'show',
            opacity: 'show'
        }
    });

  	
    var theUlContainer = jQuery('#dl-menu').find('nav').html();
    jQuery('#dl-menu').append(theUlContainer);
    jQuery('#dl-menu').find('nav').remove();
    jQuery( '#dl-menu' ).dlmenu();
}

function loadPreview(post_id,ajax_container, similar_post_ids){
	//alert(ajax_container);

	jQuery.ajax({
        url: ajaxurl,
        data: '&action=load_preview&post_id='+post_id+'&ajaxPreviewNonce='+ajaxPreviewNonce+'&similar_post_ids='+similar_post_ids+'&ajax_container='+ajax_container,
        type: 'POST',
        //dataType: "json",
        cache: false,
        success: function (content) { 
            
            
            jQuery('.'+ajax_container).html(content);

            

            jQuery('body').delay(300).scrollTo('.red-ajax-box',{duration:'slow', offsetTop : '50', onAfter: function(){
            	jQuery('.'+ajax_container).addClass('opnd');
            }});
            setTimeout(function(){
	            jQuery('.red-ajax-preloader').css('opacity',0).fadeOut();
            },600)
            
        },
        error: function (xhr) {
            console.log(xhr);
        }
    });
}
function galleryScroll(){
	jQuery(function($){
		jQuery('.gallery-scroll .gallery-list').animate({opacity: 1},400);
		jQuery('.gallery-scroll .preloader').fadeOut(400);
		(function () {
			var $frame  = $('.gallery-scroll');
			if( jQuery('body').hasClass('single-gallery') || we_have_gallery_on_page == 'yes' ){
				var $slidee = $frame.children('ul').eq(0);
				var $wrap   = $frame.parent();

				// Call Sly on frame
				$frame.sly({
					horizontal: 1,
					itemNav: 'centered',
					smart: 1,
					activateOn: 'click',
					mouseDragging: 1,
					touchDragging: 1,
					releaseSwing: 1,
					startAt: 0,
					scrollBar: $wrap.find('.scrollbar'),
					scrollBy: 1,
					pagesBar: $wrap.find('.pages'),
					activatePageOn: 'click',
					speed: 300,
					elasticBounds: 1,
					easing: 'easeOutExpo',
					dragHandle: 1,
					dynamicHandle: 1,
					clickBar: 1,

					// Buttons
					// forward: $wrap.find('.forward'),
					// backward: $wrap.find('.backward'),
					prev: $wrap.find('.prev'),
					next: $wrap.find('.next'),
					prevPage: $wrap.find('.prevPage'),
					nextPage: $wrap.find('.nextPage')
				});
				$(window).resize(function(e) {
					$frame.sly('reload');
				});
				setTimeout(function(){
					$(window).load(function(e) {
						$frame.sly('reload');
					});
				},700);
			}
			
		}());
	});
}
jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
    	animation: 'slide',
        controlNav: false, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        animationLoop: true,
        touch: true,
        slideshow: true, /*//Boolean: Animate slider automatically*/
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        pauseOnHover: true,
        smoothHeight: true,
        prevText: "", 
		nextText: "",     
    });
});
function stickyMenuActivation(){
	if( jQuery('body').hasClass('sticky-menu-active') ){
		var menu_offset = jQuery('.header-main-menu').offset().top + jQuery('.header-main-menu').outerHeight();
		var menu_is_shown = false;
		jQuery(document).on('scroll', function(){
			if( jQuery(document).scrollTop() > menu_offset && menu_is_shown == false){
				menu_is_shown = true;
				jQuery('.sticky-menu-container').fadeIn(300);
				jQuery('.sticky-menu-container').css('top','0');
			}
			if( jQuery(document).scrollTop() < menu_offset && menu_is_shown == true){
				menu_is_shown = false;
				jQuery('.sticky-menu-container').fadeOut(300);
				jQuery('.sticky-menu-container').css('top','-30px');
			}
		});
	}
}

if(typeof enable_filters != 'undefined' && enable_filters == 1){
	/* ###### Filters ##### */

	/* thumbs filter */
	jQuery(function(){
	  "use strict";
	    var $container = jQuery('.filter-on');
	    
	    $container.isotope({
	      itemSelector : '.massonry-elem'
	    });
	    
	    var $optionSets = jQuery('.thumbs-splitter'),
	        $optionLinks = $optionSets.find('a');

	    $optionLinks.click(function(){
	        var $this = jQuery(this);
	        // don't proceed if already selected
	        if ( $this.parent().hasClass('selected') ) {
	          return false;
	        }
	        var $optionSet = $this.parents('.thumbs-splitter');
	        $optionSet.find('.selected').removeClass('selected');
	        $this.parent().addClass('selected');

	        // make option object dynamically, i.e. { filter: '.my-filter-class' }
	        var options = {},
	            key = $optionSet.attr('data-option-key'),
	            value = $this.attr('data-option-value');
	        // parse 'false' as false boolean
	        value = value === 'false' ? false : value;
	        options[ key ] = value;
	          // otherwise, apply new options
	          $container.isotope( options );
	        
	        return false;
	    });
	  
	});
}
jQuery(document).ready(function(){
	initMenu('.main-menu ul.sf-menu');



	/*resize FB comments depending on viewport*/

	setTimeout(function(){
		viewPort();
	},3000); 
	
	resizeVideo();

	jQuery( window ).resize( function(){
		viewPort();
		resizeVideo();
		listViewArrange();
	});

	/*Tweets widget*/
	var delay = 4000; //millisecond delay between cycles
	function cycleThru(variable, j){
		var jmax = jQuery(variable + " div").length;
		jQuery(variable + " div:eq(" + j + ")")
			.css('display', 'block')
			.animate({opacity: 1}, 600)
			.animate({opacity: 1}, delay)
			.animate({opacity: 0}, 800, function(){
				if(j+1 === jmax){ 
					j=0;
				}else{ 
					j++; 
				}
				jQuery(this).css('display', 'none').animate({opacity: 0}, 10);
				cycleThru(variable, j);
			});
	}
	jQuery('.tweets').each(function(index, val) {
		//iterate through array or object
		var parent_tweets = jQuery(val).parent().attr('id');
		var actioner = '#' + parent_tweets + ' .tweets .dynamic .red_twitter .slides_container';
		cycleThru(actioner, 0);
	});

	/*Testimonials*/
	jQuery('.testimonials-list').each(function(index, val) {
		//iterate through array or object
		var parent_tweets = jQuery(val).parent().attr('id');
		var actioner = '.testimonials-list';
		cycleThru(actioner, 0);
	});

	/* flickr widget*/
	jQuery('.flickr_badge_image').each(function(index){
		var x = index % 3;
		if(index !==1 && x === 2){
			jQuery(this).addClass('last');
        } 
	});

		
	jQuery(document).ready(function() {
		jQuery('.widget_tabber .tabs-controller li a' ).click(function(){
		    jQuery(this).parent('li').parent('ul').find('.active').removeClass('active');
		    jQuery(this).parent('li').parent('ul').parent('div').find( 'div.tab_menu_content.tabs-container').fadeTo( 200 , 0 );
		    jQuery(this).parent('li').parent('ul').parent('div').find( 'div.tab_menu_content.tabs-container').hide();
		    jQuery( jQuery( this ).attr('href') ).fadeTo( 600 , 1 );
		    jQuery( this ).parent('li').addClass('active');
		    return false;
		});
		jQuery('aside.widget').append('<div class="clear"></div>');
	});
	/* Mobile responsiveness */
	var sidebar_type = jQuery('#secondary').attr('class');
	jQuery(window).on('resize load orientationChanged', function() {
		// do your stuff here
		if(jQuery(this).width() < 767){
			jQuery('#secondary').removeClass('right-sidebar left-sidebar');
		}else{
			jQuery('#secondary').addClass(sidebar_type);
		}
	});	
});




function viewPort(){  
	/* Determine screen resolution */
	//var $body = jQuery('body');
	var wSizes = [1200, 960, 768, 480, 320, 240];
	var wSizesClasses = ['w1200', 'w960', 'w768', 'w480', 'w320', 'w240'];
	
	//$body.removeClass(wSizesClasses.join(' '));
	var size = jQuery(this).width();
	
	for (var i=0; i<wSizes.length; i++) { 
		if (size >= wSizes[i] ) { 
			//$body.addClass(wSizesClasses[i]);

			jQuery('.fb_iframe_widget:not(.fb_edge_widget_with_comment)').css('width','100%');
			jQuery('.fb_iframe_widget:not(.fb_edge_widget_with_comment) span').css('width','100%');
			jQuery('.fb_iframe_widget:not(.fb_edge_widget_with_comment) iframe').css('width','100%');
			break;
		}
	}
	if(typeof(FB) !== 'undefined' ){
		FB.Event.subscribe('xfbml.render', function(response) {
			FB.Canvas.setAutoGrow();
		});
	}  
	/** Mobile/Default      -   320px
 * Mobile (landscape)  -   480px
 * Tablet              -   768px
 * Desktop             -   960px
 * Widescreen          -   1200px
 * Widescreen HD       -   1920px*/
	
}
function listViewArrange(){
	var listViews = jQuery('.red-list-view');
	jQuery.each(jQuery(listViews), function( index, value ) {
		var thisView = jQuery(this);
		var thisViewWidth = jQuery(thisView).width();

		if( thisViewWidth > 960 ){
			jQuery(thisView).addClass('fullwidth-list');
		}
		if( thisViewWidth < 960 && thisViewWidth > 800){
			jQuery(thisView).addClass('mid-list');
		}
		if( thisViewWidth < 800 && thisViewWidth > 767 ){
			jQuery(thisView).addClass('small-list');
		}
		
	});
}

function headerFullScreen(){
	if( jQuery('body').hasClass('full-screen-header') ){
		var menuHeight = 0;
		if( jQuery('body').hasClass('menu-above-header') ){
			menuHeight = jQuery('.outside-menu').outerHeight();
		}
		var windowHeight = jQuery(window).height();
		jQuery('#header').height(windowHeight-menuHeight);



		// Center the content
		if( jQuery('body').hasClass('menu-middle-header') ){
			var contentHeight = jQuery('.header-containe-wrapper').outerHeight();
			var paddingTop = ( windowHeight - menuHeight - contentHeight ) / 2;
			jQuery('#header').css('padding-top', paddingTop);
		}
		// Center the header text
		if( jQuery('.header-text').length > 0 ){
			jQuery('.header-text').css('top',paddingTop + contentHeight + 140);
		}
	}
}
function preloaderHide(){
	if( jQuery('body').hasClass('preloaded') ){
		setTimeout(function(){
			jQuery('.preloader-cortina').addClass('closed');
		},800);
		setTimeout(function(){
			jQuery('.preloader-cortina').hide();
		},1700);
	}
}
function showHiddenContent(){
	jQuery('.content-expander').click(function(){
		jQuery('.hidden-post-content').toggleClass('shown');
	});
}
function goToTop(){
	jQuery(window).on('scroll', function(){
		if( jQuery(window).scrollTop() > 250 && !jQuery('.go-to-top').hasClass('shown') ){
			jQuery('.go-to-top').addClass('shown');
		}
		if(jQuery('.go-to-top').hasClass('shown') && jQuery(window).scrollTop() < 250){
			jQuery('.go-to-top').removeClass('shown');
		}
	});
	jQuery('.go-to-top').click(function(){
		jQuery(window).scrollTo(0,400);
	});
}

function dynamicCartShow(){
	jQuery(document).on("mouseenter", ".gbtr_little_shopping_bag_wrapper", function () {
	    if (!jQuery(this).data('init')) {
	        jQuery(this).data('init', true);
	        jQuery(this).hover(function () {
	                jQuery('.gbtr_minicart_wrapper').fadeIn(200);
	            },
	            function () {
	                jQuery('.gbtr_minicart_wrapper').fadeOut(200);
	            });
	        jQuery(this).trigger('mouseenter');
	    }
	});
}


// Do following after window load:

jQuery(window).load(function(){
	jQuery('#headerbgvideo').mediaelementplayer({
	    success: function(player, node) {
	        jQuery('#' + node.id + '-mode').html('mode: ' + player.pluginType);
	    }
	});
	if(typeof enable_massonry != 'undefined' && enable_massonry == 1 ){
		setTimeout(function(){
			jQuery('.massonry').isotope({
	            // options
	            itemSelector : '.massonry .massonry-elem'
	        });
		},400)
	}
	if (typeof enb_infinitescroll != 'undefined' && enb_infinitescroll == 1 ) {
		jQuery('.latest-portfolios .massonry').infinitescroll({
	        navSelector  : '#page_nav',    // selector for the paged navigation 
	        nextSelector : '#page_nav a',  // selector for the NEXT link (to page 2)
	        itemSelector : '.massonry .massonry-elem',     // selector for all items you'll retrieve
	        loading: {
	            finishedMsg: 'No more pages to load.',
	            img: 'http://i.imgur.com/qkKy8.gif'
	          }
	        },
	        // call Isotope as a callback
	        function( newElements ) {
	          	jQuery('.latest-portfolios .massonry').isotope( 'appended', jQuery( newElements ) ); 
	          	jQuery('.red-thumb-view.title-over > .columns').each( function() { jQuery(this).hoverdir(); } );
	        }
	    );
	}
	listViewArrange();
	headerFullScreen();
	preloaderHide();
	goToTop();
	initCarousel();
	dynamicCartShow();
	gallery_single();
	showHiddenContent();
	stickyMenuActivation();
	setTimeout(function(){
		galleryScroll();
	},500);
	
	jQuery('#product-carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 134,
        itemMargin: 0,
        asNavFor: '#product-slider'
    });

	jQuery('#product-slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        smoothHeight: true,
        sync: "#carousel"
    });
});

// Do following after window resize:
jQuery(window).on('resize orientationChanged',function(){
	listViewArrange();
	if( jQuery('.massonry').length > 0 ){
		jQuery('.massonry').isotope('reLayout');
	}
});