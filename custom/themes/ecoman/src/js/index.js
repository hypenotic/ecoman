$ = jQuery; 

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
