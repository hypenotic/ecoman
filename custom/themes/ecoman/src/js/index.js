$ = jQuery;

var previousScroll = 0, // previous scroll position
        menuOffset = 54, // height of menu (once scroll passed it, menu is hidden)
        detachPoint = 650, // point of detach (after scroll passed it, menu is fixed)
        hideShowOffset = 6; // scrolling value after which triggers hide/show menu
    // on scroll hide/show menu
    $(window).scroll(function() {
      if (!$('nav').hasClass('expanded')) {
        var currentScroll = $(this).scrollTop(), // gets current scroll position
            scrollDifference = Math.abs(currentScroll - previousScroll); // calculates how fast user is scrolling
        // if scrolled past menu
        if (currentScroll > menuOffset) {
          // if scrolled past detach point add class to fix menu
          if (currentScroll > detachPoint) {
            if (!$('nav').hasClass('detached'))
              $('nav').addClass('detached');
          }
          // if scrolling faster than hideShowOffset hide/show menu
          if (scrollDifference >= hideShowOffset) {
            if (currentScroll > previousScroll) {
              // scrolling down; hide menu
              if (!$('nav').hasClass('invisible'))
                $('nav').addClass('invisible');
            } else {
              // scrolling up; show menu
              if ($('nav').hasClass('invisible'))
                $('nav').removeClass('invisible');
            }
          }
        } else {
          // only remove “detached” class if user is at the top of document (menu jump fix)
          if (currentScroll <= 0){
            $('nav').removeClass('detached');
          }
        }
        // if user is at the bottom of document show menu
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
          $('nav').removeClass('invisible');
        }
        // replace previous scroll position with new one
        previousScroll = currentScroll;
      }
    })
    // shows/hides navigation’s popover if class "expanded"
    $('nav').on('click touchstart', function(event) {
      showHideNav();
      event.preventDefault();
    })
    $('#error-menu').on('click touchstart', function(event) {
      showHideNav();
      event.preventDefault();
    })
    // clicking anywhere inside navigation or heading won’t close navigation’s popover
    $('#navigation').on('click touchstart', function(event){
        event.stopPropagation();
    })
    // checks if navigation’s popover is shown
    function showHideNav() {
      if ($('nav').hasClass('expanded')) {
        hideNav();
        if ( $( "#home-badge" ).length ) {
          $('#home-badge').css("display", "block");
        }
        if ( $( "#banner-badge" ).length ) {
          $('#banner-badge').css("display", "block");
        }
      } else {
        showNav();
        if ( $( "#home-badge" ).length ) {
          $('#home-badge').css("display", "none");
        }
        if ( $( "#banner-badge" ).length ) {
          $('#banner-badge').css("display", "none");
        }
      }
    }
    // shows the navigation’s popover
    function showNav() {
      $('nav').removeClass('invisible').addClass('expanded');
      $('#container').addClass('blurred');
      window.setTimeout(function(){$('body').addClass('no_scroll');}, 200); // Firefox hack. Hides scrollbar as soon as menu animation is done
      $('#navigation a').attr('tabindex', ''); // links inside navigation should be TAB selectable
    }
    // hides the navigation’s popover
    function hideNav() {
      $('#container').removeClass('blurred');
      window.setTimeout(function(){$('body').removeClass();}, 10); // allow animations to start before removing class (Firefox)
      $('nav').removeClass('expanded');
      $('#navigation a').attr('tabindex', '-1'); // links inside hidden navigation should not be TAB selectable
      $('.icon').blur(); // deselect icon when navigation is hidden
    }
    // keyboard shortcuts
    $('body').keydown(function(e) {
      // menu accessible via TAB as well
      if ($("nav .icon").is(":focus")) {
        // if ENTER/SPACE show/hide menu
        if (e.keyCode === 13 || e.keyCode === 32) {
          showHideNav();
          e.preventDefault();
        }
      }
      // if ESC show/hide menu
      if (e.keyCode === 27) {
        showHideNav();
        e.preventDefault();
      }
    })

// ====================================================

$(".team__single").click(function(){
  var nextPanel = $(this).next(".drop-down-panel");
  
  nextPanel.slideToggle(300);
});

$(".drop-down-panel").click(function() {
  $(this).slideToggle(300);
});

  // Check if mobile
function mobilehome() {

  var currentpage = window.location.href;
  if (currentpage == "http://hypelabs.ca/ingenuity/") {
    var theurl = '/ingenuity/custom/themes/ingenuity/dist/images/site-default.jpg';
  } else {
    var theurl = '/custom/themes/ingenuity/dist/images/site-default.jpg'
  }

  if ( $( "#vid-check" ).length ) {
    var vid = document.getElementById("vid-check");
    var header = document.getElementById("header-check");
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      vid.style.display = "none";
      header.style.backgroundImage = "url('" + theurl + "')";  
    } else {
      //nothing
    }
  }
};


$(function() {
  IEcheck();

  mobilehome();

  new WOW({
     mobile: false
  }).init();

  var iframe = $('#vimeo_player')[0],
      player = $f(iframe),
      status = $('.status');

  // When the player is ready MUTE
  player.addEvent('ready', function() {
      player.api('setVolume', 0);
      player.api('seekTo',8);
  });

  $('.fadeInDown h1').widowFix({
    letterLimit: 5
  });
  $('.fadeInDown h2').widowFix();
  $('.blog-entry p').widowFix();
  $('.blog-single__title').widowFix();
});

// GOOGLE MAPS ============================================

if ( $( "#contact-map" ).length ) {
 
  // When the window has finished loading create our google map below
  google.maps.event.addDomListener(window, 'load', init);

  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var isDraggable = false;
  } else {
    var isDraggable = true;
  }

  function init() {

    // Basic options for a simple Google Map
   // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
   var mapOptions = {
       // How zoomed in you want the map to start at (always required)
       zoom: 15,

       scrollwheel:  false,
       draggable: isDraggable,

       // The latitude and longitude to center the map (always required)
       center: new google.maps.LatLng(43.5238744, -79.7086458), 

       // How you would like to style the map. 
       // This is where you would paste any style found on Snazzy Maps.
       styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}]
   };

   // Determine zoon and pan amounts based on isDraggable (mobile)
   if (isDraggable == true) {
    var zoomNum = 16;
    var panNum = 80;
   } else {
    var zoomNum = 15;
    var panNum = 30;
   }
   

   var mapOptions2 = {
       // How zoomed in you want the map to start at (always required)
       zoom: zoomNum,

       scrollwheel:  false,
       draggable: isDraggable,

       // The latitude and longitude to center the map (always required)
       center: new google.maps.LatLng(43.52385109999999, -79.71254299999998), 

       // How you would like to style the map. 
       // This is where you would paste any style found on Snazzy Maps.
       styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
   };

   // Get the HTML DOM element that will contain your map 
   // We are using a div with id="map" seen below in the <body>
   // var mapElement = document.getElementById('footer-map');
   var contactMap = document.getElementById('contact-map');
   var moveMap = document.getElementById('move-map');

   // Create the Google Map using our element and options defined above
   // var map = new google.maps.Map(mapElement, mapOptions);
   var mapC = new google.maps.Map(contactMap, mapOptions);
   var mapM = new google.maps.Map(moveMap, mapOptions2);
   //move map down
   mapC.panBy(0, -120);
   // for moving map
   mapM.panBy(panNum, 0);

  var currentpage = window.location.href;
  if (currentpage == "http://hypelabs.ca/ingenuity/contact-us/") {
    var theicon = '/ingenuity/custom/themes/ingenuity/dist/images/homemap.png';
  } else {
    var theicon = '/custom/themes/ingenuity/dist/images/homemap.png'
  }

  if (currentpage == "http://hypelabs.ca/ingenuity/contact-us/") {
    var theiconN = '/ingenuity/custom/themes/ingenuity/dist/images/homen.png';
  } else {
    var theiconN = '/custom/themes/ingenuity/dist/images/homen.png'
  }  

  if (currentpage == "http://hypelabs.ca/ingenuity/contact-us/") {
    var theiconO = '/ingenuity/custom/themes/ingenuity/dist/images/homeo.png';
  } else {
    var theiconO = '/custom/themes/ingenuity/dist/images/homeo.png'
  }  

  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(43.5238744, -79.7086458),
    map: mapC,
    icon: theicon
  });
  var newplace = new google.maps.Marker({
    position: new google.maps.LatLng(43.52385109999999, -79.71254299999998),
    map: mapM,
    icon: theiconN
  });
  var oldplace = new google.maps.Marker({
    position: new google.maps.LatLng(43.5238744, -79.7086458),
    map: mapM,
    icon: theiconO
  });

  // Define a symbol using a predefined path (an arrow)
    // supplied by the Google Maps JavaScript API.
    var lineSymbol = {
      path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
    };


  var line = new google.maps.Polyline({
      path: [
          new google.maps.LatLng(43.5238744, -79.7086458),
          new google.maps.LatLng(43.52385109999999, -79.71254299999998)          
      ],
      strokeColor: "#FF0000",
      icons: [{
            icon: lineSymbol,
            offset: '100%'
          }],
      strokeOpacity: 1.0,
      strokeWeight: 4,
      map: mapM
  });

  var contentString = '<div id="info-window-content">'+
   '<h3 id="firstHeading" class="firstHeading">Drop by for an espresso!</h3>'+
   '<a href="https://www.google.ca/maps/place/Ingenuity+Developments+Inc/@43.52352,-79.7077452,14.98z/data=!4m2!3m1!1s0x0:0x621fce01694efaaf" target="_blank"><p>3450 Ridgeway Dr. Unit • 3 </p>'+
   '<p>Mississauga, ON L5L 0A2</p></a>'+
   '<a href="tel:+1-905-569-2624" target="_blank"><p>(905) 569-2624</p></a>'+
   '</div>';

  var infowindow = new google.maps.InfoWindow({
     content: contentString
  });

  google.maps.event.addListener(marker, 'click', function() {
     infowindow.open(mapC,marker);
  });

  infowindow.open(mapC,marker);

  }
 
}

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
  var ua = window.navigator.userAgent;

  // test values
  // IE 10
  //ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';
  // IE 11
  //ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';
  // IE 12 / Spartan
  //ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';
  
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
    // IE 12 => return version number
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }

  // other browser
  return false;
}

// detect IE
var IEversion = detectIE();

var vwidth = document.documentElement.clientWidth;

function IEcheck() {
  var vwidth = document.documentElement.clientWidth;

  if ( IEversion !== false ) {
    // console.log('You are using IE! ' + vwidth);

    var myElements = document.querySelectorAll(".default-hero");
     
    for (var i = 0; i < myElements.length; i++) {
        myElements[i].style.height = '100vh';
    }

  } else {
    // console.log('You are not using IE! ' + vwidth);
  }
}

// Header Logo Shrink
function headerinit() {
  window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
          shrinkOn = 20,
          header = document.getElementById("default-logo");
          headerh = document.querySelector("nav");
      if (distanceY > shrinkOn) {
          classie.add(header,"smaller");
          classie.add(headerh,"logo-appear");
          classie.remove(headerh,"logo-appear-top");
      } else {
          if (classie.has(header,"smaller")) {
              classie.remove(header,"smaller");
              classie.remove(headerh,"logo-appear");
              classie.add(headerh,"logo-appear-top");
          }
      }
  });
}
window.onload = headerinit();

// Header Text Appear
function logotextinit() {
  window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
          appearOn = 100,
          header = document.getElementById("default-logo-text");
          icon = document.getElementById("default-menu-icon");
      if (distanceY > appearOn) {
          classie.add(header,"logo-appear");
          classie.add(icon,"logo-appear");
      } else {
          if (classie.has(header,"logo-appear")) {
              classie.remove(header,"logo-appear");
              classie.remove(icon,"logo-appear");
          }
      }
  });
}
window.onload = logotextinit();

/*
 * jQuery WidowFix Plugin
 * http://matthewlein.com/widowfix/
 * Copyright (c) 2010 Matthew Lein
 * Version: 1.3.2 (7/23/2011)
 * Dual licensed under the MIT and GPL licenses
 * Requires: jQuery v1.4 or later
 */


(function( $ ){

  jQuery.fn.widowFix = function(userOptions) {

    var defaults = {
      letterLimit: null,
      prevLimit: null,
      linkFix: false,
      dashes: false
    };

    var wfOptions = $.extend(defaults, userOptions);

    if (this.length) {

      return this.each(function(){

        var $this = $(this);
        var linkFixLastWord;
        
        if ( wfOptions.linkFix ) {
          var $linkHolder = $this.find('a:last');
          //find the anchors and wrap them up with a <var> tag to find it later
          $linkHolder.wrap('<var>');
          //store the anchor inside
          var $lastLink = $('var').html();
          //get the real length of the last word
          linkFixLastWord = $linkHolder.contents()[0];
          //remove the anchor
          $linkHolder.contents().unwrap();
        }

        var contentArray = $(this).html().split(' '),
          lastWord = contentArray.pop();

        if (contentArray.length <= 1) {
          // it's a one word element, abort!
          return;
        }

        function checkSpace(){
          if (lastWord === ''){
            // trailing space found, pop it off and check again
            lastWord = contentArray.pop();
            checkSpace();
          }
        }
        checkSpace();
        
        // if contains a dash, use white-space nowrap to stop breaking
        if (wfOptions.dashes) {
          
          // all 3 dash types: regular, en, em
          var dashes = ['-','–','—'];
        
          $.each(dashes, function(index, dash) {

            if ( lastWord.indexOf(dash) > 0 ) {
              lastWord = '<span style="white-space:nowrap;">' + lastWord + '</span>';
              return false; // break out early
            }
            
          });
        
        }
        
        var prevWord = contentArray[contentArray.length-1];

        //if linkFix is on, check for the letter limit
        if (wfOptions.linkFix) {
          //if the last word is longer than the limit, stop the script
          if (wfOptions.letterLimit !== null &&
            linkFixLastWord.length >= wfOptions.letterLimit
            ) {

              $this.find('var').each(function(){
                $(this).contents().replaceWith($lastLink);
                $(this).contents().unwrap();
              });
              return;

          //or if the prev word is longer than the limit
          } else if (wfOptions.prevLimit !== null &&
                 prevWord.length >= wfOptions.prevLimit
                 ) {
                  $this.find('var').each(function(){
                    $(this).contents().replaceWith($lastLink);
                    $(this).contents().unwrap();
                  });
                  return;
          }


        } else {
          //if the last word is longer than the limit, stop the script
          if (wfOptions.letterLimit !== null &&
            lastWord.length >= wfOptions.letterLimit
            ) {
              return;
          } else if (wfOptions.prevLimit !== null &&
            prevWord.length >= wfOptions.prevLimit
            ) {
              return;
          }
        }

        var content = contentArray.join(' ') + '&nbsp;' + lastWord;
        $this.html(content);

        if (wfOptions.linkFix) {

          //find the var and put the anchor back in, then unwrap the <var>
          $this.find('var').each(function(){
            $(this).contents().replaceWith($lastLink);
            $(this).contents().unwrap();
          });
        }

      });

    }

  };

})( jQuery );
