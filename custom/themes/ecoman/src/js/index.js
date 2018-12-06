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
        // 'overflow-y': 'hidden',
        // '-webkit-overflow-scrolling': 'inherit',
        // 'overflow-scrolling': 'inherit'
      });
      // $(document).off('touchmove');
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
      // var setScrollable = '.mobile-menu',
      // bodySelect = $('body');
  
      // bodySelect.css({overflow: 'hidden'});
  
      // $(document).on('touchmove',function(e){
      //   e.preventDefault();
      // });
      // bodySelect.on('touchstart', setScrollable, function(e) {
      // if (e.currentTarget.scrollTop === 0) {
      //   e.currentTarget.scrollTop = 1;
      // } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
      //   e.currentTarget.scrollTop -= 1;
      // }
      // });
      // bodySelect.on('touchmove', setScrollable, function(e) {
      //   e.stopPropagation();
      // });
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
      // if (hamburger.hasClass('open')) {
      //   menuClose();
      // }
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


  var windowwidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

  if (windowwidth > 480){
    var windoww = 250;
  } else {
    var windoww = windowwidth;
  }

  $.jvmobilemenu({
    mainContent: $('.page'),
    theMenu: $('.mobile-nav'),
    slideSpeed: 0.3,
    menuWidth: windoww,
    position: 'right',
    menuPadding: '20px 20px 60px'
  });

});



// ====================== ABOUT CASE STUDIES APP

var aboutApp = { };

// FIND OUT WHAT PAGE WE'RE ON - WHERE ARE WE?!?
aboutApp.grabType = function(){

    var currenturl = window.location.href; 
    // console.log(currenturl);

    if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/about/'  ) {

      var hype = '';

    } else {

      var hype = '/dev/ecoman';

    }

    var $aboutcases = $('#about-case.about-case-studies').data('cases');

    // console.log($aboutcases);

    // use the API to grab PROJECT info
    aboutApp.grabCases = function($type){
      $.ajax( {
          url: hype + '/wp-json/wp/v2/case_study', 
          success: function ( res ) {
            // console.log(res);
            aboutApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // print PROJECT info
    aboutApp.printProjectInfo = function(thepost, $thetype) {

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

        $('#about-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center"});

        $( '#about-case.about-case-studies .outer-container .main-content-case-study').append($staticintro, $posttitle, $postcontent);
    };

    // initialize events - GOOOOOOOOOO!!!!
    aboutApp.grabCases($aboutcases);
};

// NEXT CASE STUDY

aboutApp.nextCase = function() {

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/about/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/ecoman';

  }

  // use the API to grab PROJECT info
  aboutApp.grabCases = function(){
    $.ajax( {
        url: hype + '/wp-json/wp/v2/case_study', 
        success: function ( res ) {
          // console.log('BOOM');
          aboutApp.printProjectInfo(res);
        },
        cache: false
      } );
  };

  // print PROJECT info
  aboutApp.printProjectInfo = function(thepost) {

    var caseamount = thepost.length;
    var casenum = $('#about-next').data('casenum');

    if (casenum == 0 ) {
      var num = 1;
    } else if ( casenum == (caseamount - 1)) {
      var num = 0;
    } else {
      var num = casenum + 1;
    }

    // console.log(num);
    

    if ( thepost[num].cuztom_post_meta.beforeimg !== 'http://ecoman.dev/wordpress/wp-includes/images/media/default.png' ) {
        var $beforeimg = thepost[num].cuztom_post_meta.beforeimg;
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
        id: 'case-title',
        html: thepost[num].title.rendered
    });
    
    // POST CONTENT
    var $postcontent = thepost[num].content.rendered;

    $('#about-next').data('casenum', num);

    $('#about-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center", "z-index":"90"});

    $('#about-case.about-case-studies .outer-container .main-content-case-study').hide().append($staticintro, $posttitle, $postcontent).fadeIn(500);

  };

  aboutApp.grabCases();

};

$('#about-next').click(function() {
  // $('html, body').animate({
  //         scrollTop: $("#about-case").offset().top
  //     }, 1000);
  $('#about-cs-content').empty();
  aboutApp.nextCase();
});

// PREV CASE STUDY

aboutApp.prevCase = function() {

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/about/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/ecoman';

  }

  // use the API to grab PROJECT info
  aboutApp.grabCases = function(){
    $.ajax( {
        url: hype + '/wp-json/wp/v2/case_study', 
        success: function ( res ) {
          // console.log('BOOM');
          aboutApp.printProjectInfo(res);
        },
        cache: false
      } );
  };

  // print PROJECT info
  aboutApp.printProjectInfo = function(thepost) {

    var caseamount = thepost.length;
    var casenum = $('#about-next').data('casenum');

    if (casenum == 0 ) {
      var num = caseamount - 1;
    } else {
      var num = casenum - 1;
    }

    // console.log(num);
    

    if ( thepost[num].cuztom_post_meta.beforeimg !== 'http://ecoman.dev/wordpress/wp-includes/images/media/default.png' ) {
        var $beforeimg = thepost[num].cuztom_post_meta.beforeimg;
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
        id: 'case-title',
        html: thepost[num].title.rendered
    });
    
    // POST CONTENT
    var $postcontent = thepost[num].content.rendered;

    $('#about-next').data('casenum', num);

    $('#about-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center", "z-index":"90"});

    $( '#about-case.about-case-studies .outer-container .main-content-case-study').hide().append($staticintro, $posttitle, $postcontent).fadeIn(500);

  };

  aboutApp.grabCases();

};

$('#about-prev').click(function() {
  $('html, body').animate({
          scrollTop: $("#about-case").offset().top
      }, 1000);
  $('#about-cs-content').empty();
  aboutApp.prevCase();
});

// ====================== SERVICES CASE STUDY APP =====================

var mainApp = { };

// FIND OUT WHAT PAGE WE'RE ON - WHERE ARE WE?!?
mainApp.grabType = function(){

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/services/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/ecoman';

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
            // console.log(res);
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
            // console.log(res);
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
            // console.log(res);
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
            // console.log(res);
            mainApp.printProjectInfo(res, $type);
          },
          cache: false
        } );
    };

    // print PROJECT info
    mainApp.printProjectInfo = function(thepost, $thetype) {

        var cslength = thepost.length;
        // console.log($thetype, cslength);

        if (thepost.length == 1) {
          var prev = $('#' + $thetype + '-case .outer-container .previous-cs');
          var next = $('#' + $thetype + '-case .outer-container .next-cs');

          prev.remove();
          next.remove();
        }

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

        if ( $thetype == 'design')  {
          var $typecontainer = '#design-case';
        } else if ( $thetype == 'maintenance' ) {
          var $typecontainer = '#maintenance-case';
        } else if ( $thetype == 'consulting' ) {
          var $typecontainer = '#consulting-case';
        } else {
          var $typecontainer = '#artinstallations-case';
        }

        $($typecontainer).css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center"});

        $( $typecontainer + '.services-case-studies .outer-container .main-content-case-study').append($staticintro, $posttitle, $postcontent);
    };

    // initialize events - GOOOOOOOOOO!!!!
    mainApp.grabDesign($designcases);
    mainApp.grabMain($maintcases);
    mainApp.grabConsult($consultcases);
    mainApp.grabAI($aicases);

};


// PREV CASE STUDY

var casesApp = { };

casesApp.prevCase = function(hashtag) {

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/services/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/ecoman';

  }

  // use the API to grab PROJECT info
  casesApp.grabCases = function($hash){
    $.ajax( {
        url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $hash, 
        success: function ( res ) {
          // console.log('BOOM');
          casesApp.printProjectInfo(res, $hash);
        },
        cache: false
      } );
  };

  // print PROJECT info
  casesApp.printProjectInfo = function(thepost, hash) {

    var caseamount = thepost.length;
    var casenum = $('#' + hash + '-next').data('casenum');

    if (casenum == 0 ) {
      var num = caseamount - 1;
    } else {
      var num = casenum - 1;
    }

    // console.log(caseamount, num);
    

    if ( thepost[num].cuztom_post_meta.beforeimg !== 'http://ecoman.dev/wordpress/wp-includes/images/media/default.png' ) {
        var $beforeimg = thepost[num].cuztom_post_meta.beforeimg;
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
        id: 'case-title',
        html: thepost[num].title.rendered
    });
    
    // POST CONTENT
    var $postcontent = thepost[num].content.rendered;

    $('#' + hash + '-next').data('casenum', num);

    $('#' + hash + '-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center", "z-index":"90"});

    $( '#' + hash + '-case .outer-container .main-content-case-study').append($staticintro, $posttitle, $postcontent);

  };

  casesApp.grabCases(hashtag);

};

$('.previous-cs').click(function() {
  var parent = $(this).parent();
  var hash = parent.data('hash');

  // console.log(parent, hash);

  $(this).siblings('.main-content-case-study').empty();
  casesApp.prevCase(hash);
});


// NEXT CASE STUDY

var casesApp = { };

casesApp.nextCase = function(hashtag) {

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/ecoman/services/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/ecoman';

  }

  // use the API to grab PROJECT info
  casesApp.grabCases = function($hash){
    $.ajax( {
        url: hype + '/wp-json/wp/v2/case_study?filter[taxonomy]=service&filter[term]=' + $hash, 
        success: function ( res ) {
          // console.log('BOOM');
          casesApp.printProjectInfo(res, $hash);
        },
        cache: false
      } );
  };

  // print PROJECT info
  casesApp.printProjectInfo = function(thepost, hash) {

    var caseamount = thepost.length;
    var casenum = $('#' + hash + '-next').data('casenum');

    if (casenum == 0 ) {
      var num = 1;
    } else if ( casenum == (caseamount - 1)) {
      var num = 0;
    } else {
      var num = casenum + 1;
    }

    // console.log(caseamount, num);
    

    if ( thepost[num].cuztom_post_meta.beforeimg !== 'http://ecoman.dev/wordpress/wp-includes/images/media/default.png' ) {
        var $beforeimg = thepost[num].cuztom_post_meta.beforeimg;
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
        id: 'case-title',
        html: thepost[num].title.rendered
    });
    
    // POST CONTENT
    var $postcontent = thepost[num].content.rendered;

    $('#' + hash + '-next').data('casenum', num);

    $('#' + hash + '-case').css({"background-image":"url("+ $beforeimg + ")","background-size":"cover","background-position":"center center", "z-index":"90"});

    $( '#' + hash + '-case .outer-container .main-content-case-study').append($staticintro, $posttitle, $postcontent);

  };

  casesApp.grabCases(hashtag);

};

$('.next-cs').click(function() {
  var parent = $(this).parent();
  var hash = parent.data('hash');

  // console.log(parent, hash);

  $(this).siblings('.main-content-case-study').empty();
  casesApp.nextCase(hash);
});

$('#menu-main-menu li:last-child a').click(function(event) {
  event.preventDefault();
  $('#contact-modal').toggle("fast");
  $('#menu-main-menu li:last-child').toggleClass('contact-modal-on');
});


window.onload = function() {
    // console.log( "ready!" );
    
    if ( $( '.services-case-studies' ).length ) {
      mainApp.grabType();
    }

    if ( $( '.about-case-studies' ).length ) {
      aboutApp.grabType();
    }

    $('#comments').hide();

    $('#see-comments').click(function() {
      $('#comments').toggle("slow");
    });

    var cwidth = $('#about-cs-content').width();
    // console.log(cwidth);

    var newleft = cwidth + 120;
    // console.log(newleft + ' new');

    $('#about-next').css({ "left": newleft });

    $( window ).resize(function() {
      var cwidth = $('#about-cs-content').width();
      // console.log(cwidth);

      var newleft = cwidth + 120;
      // console.log(newleft + ' new');

      $('#about-next').css({ "left": newleft });
    });

    /**
     * detect IE
     * returns version of IE or false, if browser is not Internet Explorer
     */
    function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
           // Edge (IE 12+) => return version number
           return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        return false;
    }


    function isitie() {
      if (detectIE() !== false) {
        console.log(detectIE());
        $('.full-screen-wrapper.contact').css({ "background-image": "none" });
      }
    }
    isitie();


};
