$ = jQuery; 



/*

  JV jQuery Mobile Menu
  Author: Julius van der Vaart (http://juliusvaart.com)
  Version: 2.3

*/

(function ($) {
  
  $.fn.jvmobilemenu = function (options) {
  
    settings = $.extend({
      // Default settings
      mainContent: $('.page'),
      theMenu: $('.mobile-nav'),
      slideSpeed: 0.3,
      menuWidth: 240,
      position: 'right',
      push: true,
      menuPadding: '20px 20px 60px'
    }, options );
    
    
    // Insert hamburger button
    $(this).prepend('<div class="hamburger"><div class="hamburger-inner"><div class="bar bar1 hide"></div><div class="bar bar2 cross"></div><div class="bar bar3 cross hidden"></div><div class="bar bar4 hide"></div></div></div>');
    
    
    // Menu settings
    settings.theMenu.css({
      width: settings.menuWidth, 
      position: 'fixed',
      top: 0,
      display: 'none',
      height: '100%'
    }).addClass('mobile-menu').wrapInner('<div class="mobile-menu-inner"></div>');
    
    $('.mobile-menu-inner').css({
      width: 'auto', 
      padding: settings.menuPadding, 
      display: 'block'
    });
    
    
    // Fix height
    function mainContentHeightFix() {
      settings.mainContent.css({
        minHeight: $(window).height()
      });
    }
    mainContentHeightFix();
    
    
    // Hamburger & Mobile Menu vars
    var hamburger = $('.hamburger'),
    hamburgerMarginLeft = parseInt(hamburger.css('margin-left')),
    hamburgerLeftPushPosition = hamburger.outerWidth(true) - hamburgerMarginLeft,
    crosses = $('.bar2,.bar3'),
    crossLeft = $('.bar2'),
    crossRight = $('.bar3');
    
    
    // Mobile menu & hamburger position left or right
    if (settings.position === 'left') {
      theMarginLeft = settings.menuWidth;
      settings.theMenu.add(hamburger)
        .css({
          left: 0, 
          right: 'auto'
        });
    } else if (settings.position === 'right') {
      theMarginLeft = -settings.menuWidth;
      settings.theMenu.add(hamburger)
        .css({
          left: 'auto', 
          right: 0
        });
    }
  
  
    // menuClose function
    function menuClose() {
      
      // Hamburger
      hamburger.removeClass('open');
      
      //Cross
      TweenMax.to(crosses, settings.slideSpeed / 2, {rotation:0, ease:Power3.easeOut});
      
      // Move content back to hide menu
      TweenMax.to(settings.mainContent, settings.slideSpeed, {marginLeft: 0});
      
      if (settings.position === 'left') {
        TweenMax.to(hamburger, settings.slideSpeed, {marginLeft: hamburgerMarginLeft});
      }
      
      // Hide content (safari bounce fix)
      setTimeout( function(){ 
        settings.theMenu.css({display: 'none'}); 
      }, 200);
      
      // Disable scrolling plus fix menu-scrolling
      // From http://stackoverflow.com/a/14244680
      settings.theMenu.css({
        'overflow-y': 'hidden',
        '-webkit-overflow-scrolling': 'inherit',
        'overflow-scrolling': 'inherit'
      });
      $(document).off('touchmove');
      $('body').css({overflow: 'inherit'});
    }
    
  
    // menuOpen function
    function menuOpen() {

      // Hamburger
      hamburger.addClass('open');
      
      // Cross
      TweenMax.to(crossLeft, settings.slideSpeed / 2, {rotation:45, ease:Power3.easeOut});
      TweenMax.to(crossRight, settings.slideSpeed / 2, {rotation:-45, ease:Power3.easeOut});
      
      // Move content to show menu
      TweenMax.to(settings.mainContent, settings.slideSpeed, {marginLeft: theMarginLeft});
      
      if (settings.position === 'left') {
        TweenMax.to(hamburger, settings.slideSpeed, {marginLeft: theMarginLeft - hamburgerLeftPushPosition});
      }
      
      // Show content (safari bounce fix)
      settings.theMenu.css({display: 'block'});
      
      // Disable scrolling on page except header
      // From http://stackoverflow.com/a/14244680
      var setScrollable = '.mobile-menu',
      bodySelect = $('body');
  
      bodySelect.css({overflow: 'hidden'});
  
      $(document).on('touchmove',function(e){
        e.preventDefault();
      });
      bodySelect.on('touchstart', setScrollable, function(e) {
      if (e.currentTarget.scrollTop === 0) {
        e.currentTarget.scrollTop = 1;
      } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
        e.currentTarget.scrollTop -= 1;
      }
      });
      bodySelect.on('touchmove', setScrollable, function(e) {
        e.stopPropagation();
      });
      settings.theMenu.css({
        'overflow-y': 'scroll',
        'overflow-scrolling': 'touch',
        '-webkit-overflow-scrolling': 'touch'
      });
    }
  
  
    // Stuff on Window-resize
    $(window).resize(function() {
      menuClose();
      mainContentHeightFix();
    });
    
  
    // Hamburger click
    hamburger.on('click', function(e) {
      if ($(this).hasClass('open')) {
        menuClose();
      } else {
        menuOpen();
      }
      e.stopPropagation();
      return false;
    });
  
  
    // Close main-menu on click outside menu
    settings.mainContent.on('click', function() {
      if (hamburger.hasClass('open')) {
        menuClose();
      }
    });
  
  };
  
  // If no element is supplied, we'll attach to body
  // Borrowed from https://github.com/srobbin/jquery-backstretch
  $.jvmobilemenu = function (options) {
    // Return the instance
    return $('body').jvmobilemenu(options);
  };

})(jQuery);




jQuery(document).ready(function($){
	$('#responsive-tabs').responsiveTabs({
		startCollapsed: 'accordion',
		animation: 'fade',
		animationQueue: 'tabs',
		scrollToAccordion: true,
		duration: 300
	});	

  new WOW({
     mobile: false
  }).init();

  $.jvmobilemenu({
    mainContent: $('.page'),
    theMenu: $('.mobile-nav'),
    slideSpeed: 0.3,
    menuWidth: 240,
    position: 'right',
    menuPadding: '20px 20px 60px'
  });

});



// ====================== ABOUT CASE STUDIES APP



// ====================== SERVICES CASE STUDY APP

var mainApp = { };

// FIND OUT WHAT PAGE WE'RE ON - WHERE ARE WE?!?
mainApp.grabType = function(){

  var currenturl = window.location.href; 
  console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/ecoman/services/'  ) {

    var hype = '';

  } else {

    var hype = '/ecoman';

  }

    var $designcases       = $('#design-case.services-case-studies').data('cases');
    var $maintcases       = $('#maintenance-case.services-case-studies').data('cases');
    var $consultcases       = $('#consulting-case.services-case-studies').data('cases');
    var $aicases       = $('#artinstallations-case.services-case-studies').data('cases');

    console.log($designcases);

    // use the API to grab PROJECT info
    mainApp.grabDesign = function($type){
      $.ajax( {
          url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $type, 
          success: function ( res ) {
            console.log(res);
            mainApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // use the API to grab PROJECT info
    mainApp.grabMain = function($type){
      $.ajax( {
          url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $type, 
          success: function ( res ) {
            console.log(res);
            mainApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // use the API to grab PROJECT info
    mainApp.grabConsult = function($type){
      $.ajax( {
          url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $type, 
          success: function ( res ) {
            console.log(res);
            mainApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // use the API to grab PROJECT info
    mainApp.grabAI = function($type){
      $.ajax( {
          url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $type, 
          success: function ( res ) {
            console.log(res);
            mainApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // print PROJECT info
    mainApp.printProjectInfo = function(thepost, $thetype) {

        if ( thepost[0].cuztom_post_meta.beforeimg !== 'http://ecoman.dev/wordpress/wp-includes/images/media/default.png' ) {

            var $beforeimg = thepost[0].cuztom_post_meta.beforeimg;

        } else {

            var $beforeimg = '/custom/themes/ecoman/dist/images/before.jpg';

        }

        

        // STATIC INTRO
        var $staticintro = $('<p>', {
            class: 'project__static-intro',
            html: 'A project we loved working on:'
        });

        // POST TITLE
        var $posttitle = $('<h1>', {
            class: 'project__dimension',
            html: thepost[0].title.rendered
        });
        
        // POST CONTENT
        var $postcontent = thepost[0].content.rendered;

        if ( $thetype == 'design') {

            $('#design-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center"});

            $('#design-case.services-case-studies .outer-container .main-content-case-study').append($posttitle, $postcontent);

        } else if ( $thetype == 'maintenance' ) {

            $('#maintenance-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover",});

            $('#maintenance-case.services-case-studies .outer-container .main-content-case-study').append($posttitle, $postcontent);


        } else if ( $thetype == 'consulting' ) {

            $('#consulting-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover",});

            $('#consulting-case.services-case-studies .outer-container .main-content-case-study').append($posttitle, $postcontent);

        } else {

            $('#artinstallations-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover",});

            $('#artinstallations-case.services-case-studies .outer-container .main-content-case-study').append($staticintro, $posttitle, $postcontent);

        }

    };

    // initialize events - GOOOOOOOOOO!!!!
    mainApp.grabDesign($designcases);
    mainApp.grabMain($maintcases);
    mainApp.grabConsult($consultcases);
    mainApp.grabAI($aicases);

};

window.onload = function() {
    console.log( "ready!" );
    
    if ( $( '.services-case-studies' ).length ) {
     
      mainApp.grabType();
     
    }
};
