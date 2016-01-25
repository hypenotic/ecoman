// use the API to grab PROJECT info
mainApp.grabProjectInfo = function($theid){
  $.ajax( {
      url: '/wp-json/wp/v2/project/' + $theid, 
      success: function ( res ) {
        console.log(res);
        mainApp.printProjectInfo(res);
      },
      cache: false
    } );
};

// print PROJECT info
mainApp.printProjectInfo = function(thepost) {
    var $bannerimage = 'url(' + thepost.cuztom_post_meta.bannerimg + ')';
    // HERO BANNER
    $('.default-hero').css("background-image", $bannerimage);
    $('.default-hero h1').html(thepost.title.rendered);
    $('.default-hero h2').html(thepost.cuztom_post_meta.subheading);

    // HERO BLURB
    var $blurbbox = $('<section>', {
        class: 'project__hero-blurb',
        html: '<p>' + thepost.cuztom_post_meta.blurb + '</p>'
    });

    // STATS
    var $client = $('<p>').html('<span class="stats_label">Client</span>: ' + thepost.cuztom_post_meta.client); 
    var $sqft = $('<p>').html('<span class="stats_label">SF</span>: ' + thepost.cuztom_post_meta.sqft); 
    var $budget = $('<p>').html('<span class="stats_label">Budget</span>: ' + thepost.cuztom_post_meta.budget); 
    var $duration = $('<p>').html('<span class="stats_label">Duration</span>: ' + thepost.cuztom_post_meta.duration); 
    var $loc = $('<p>').html('<span class="stats_label">Location</span>: ' + thepost.cuztom_post_meta.location); 

    var $statsbox = $('<section>', {
        class: 'project__stats'
    }).append($client, $sqft,$budget, $duration, $loc);

    // VIDEO
    mainApp.getVideo(thepost.cuztom_post_meta.video);

    // DIMENSION

    // TESTIMONIAL
    mainApp.getTestimonial(thepost.cuztom_post_meta.testimonial);


    // GALLERY

    // Append everything to the .main-content div
    $('.main-content').append($blurbbox, $statsbox);
};

// get VIDEO info
mainApp.getVideo = function($vidID){
  $.ajax( {
      url: '/wp-json/wp/v2/video/' + $vidID, 
      success: function ( res ) {
        console.log(res);
        mainApp.printVideoInfo(res);
      },
      cache: false
    } );
};

mainApp.printVideoInfo = function(vid) {

    // VIDEO
    var $vidlink = '<iframe src="https://player.vimeo.com/video/' + vid.cuztom_post_meta.vimeo + '" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

    var $vidbox = $('<section>', {
        class: 'project__video'
    }).append($vidlink);

    $('.main-content').append($vidbox);
};

// get TESTIMONIAL info
mainApp.getTestimonial = function($testID){
  $.ajax( {
      url: '/wp-json/wp/v2/testimonial/' + $testID, 
      success: function ( res ) {
        console.log(res);
        mainApp.printTestimonialInfo(res);
      },
      cache: false
    } );
};

mainApp.printTestimonialInfo = function(quote) {

    // // Testimonial
    // var $quotation = 

    // var $quotebox = $('<section>', {
    //     class: 'project__testimonial'
    // }).append();

    // $('.main-content').append($quotebox);
};

