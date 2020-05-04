$ = jQuery; 

jQuery(document).ready(function($){
	$('#responsive-tabs').responsiveTabs({
		startCollapsed: 'accordion',
		animation: 'fade',
		animationQueue: 'tabs',
		scrollToAccordion: true,
		duration: 300
	});	

  $( "#nav-trigger" ).click(function() {
    $(this).toggleClass( "is-active" );
    $("#main-nav").toggleClass( "is-active" );
    $("#nav-fixed").toggleClass( "is-active" );
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

  // Select all links with hashes
$('a[href*="#"]')
// Remove links that don't actually link to anything
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event) {
  // On-page links
  if (
    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
    && 
    location.hostname == this.hostname
  ) {
    // Figure out element to scroll to
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    // Does a scroll target exist?
    if (target.length) {
      // Only prevent default if animation is actually gonna happen
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }
  }
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
