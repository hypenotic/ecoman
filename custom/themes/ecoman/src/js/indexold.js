var mainApp = { };

// FIND OUT WHAT PAGE WE'RE ON - WHERE ARE WE?!?
mainApp.grabType = function(){
    var $type       = $('body').data('type');
    var $archive    = $('body').data('archive');

    var $postid = $('body').data('theid');

    if ( $type == 'project' && $archive == false ) {

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
            $('.default-hero h1').html(thepost.cuztom_post_meta.heading);
            $('.default-hero h2').html(thepost.cuztom_post_meta.subheading);

            // HERO BLURB
            if ( thepost.cuztom_post_meta.blurb !== '') {
                var $blurbbox = $('<section>', {
                    class: 'project__hero-blurb',
                    html: '<p>' + thepost.cuztom_post_meta.blurb + '</p>'
                });
            } else {
                var $blurbbox = '';
            }

            // STATS
            var $client     = $('<p>').html('<span class="stats_label">Client</span>: ' + thepost.cuztom_post_meta.client); 
            var $sqft       = $('<p>').html('<span class="stats_label">SF</span>: ' + thepost.cuztom_post_meta.sqft); 
            var $budget     = $('<p>').html('<span class="stats_label">Budget</span>: ' + thepost.cuztom_post_meta.budget); 
            var $duration   = $('<p>').html('<span class="stats_label">Duration</span>: ' + thepost.cuztom_post_meta.duration); 
            var $loc        = $('<p>').html('<span class="stats_label">Location</span>: ' + thepost.cuztom_post_meta.location); 

            var $statsbox = $('<section>', {
                class: 'project__stats'
            }).append($client, $sqft, $budget, $duration, $loc);

            // VIDEO
            if (thepost.cuztom_post_meta.video !== '') {
                var $vidbox = $('<section>', {
                    class: 'project__video'
                });

                mainApp.getVideo(thepost.cuztom_post_meta.video);
            } else {
                var $vidbox = '';
            }
            
            // DIMENSION
            var $dimensionbox = $('<section>', {
                class: 'project__dimension',
                html: '<p>' + thepost.content.rendered + '</p>'
            });

            // TESTIMONIAL

            if (thepost.cuztom_post_meta.testimonial !== '') {
                var $quotebox = $('<section>', {
                    class: 'project__testimonial'
                });

                mainApp.getTestimonial(thepost.cuztom_post_meta.testimonial);
            }

            // GALLERY

            $('.main-content').append($blurbbox, $statsbox, $vidbox, $dimensionbox, $quotebox);

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


            $('.project__video').append($vidlink);
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
            var $quotation = $('<p>').html(quote.cuztom_post_meta.quote);

            // var $quotebox = $('<section>', {
            //     class: 'project__testimonial'
            // }).append($quotation);

            $('.project__testimonial').append($quotation);
        };

        // initialize events - GOOOOOOOOOO!!!!
        mainApp.grabProjectInfo($postid);

    } else if ( $type == 'project' && $archive !== false ) {
        console.log('Project ARCHIVEEEEEE');

        // use the API to grab PROJECT info
        mainApp.grabProjectArchive = function(){
          $.ajax( {
              url: '/wp-json/wp/v2/project/', 
              success: function ( res ) {
                console.log(res);

                mainApp.projectArchiveSingle(res);
              },
              cache: false
            } );
        };

        mainApp.projectArchiveSingle = function(res) {
            $.each(res, function(i, item) {
                console.log('Data for ' + (i +1) + ' is coming a back!');
                console.log(item);
            });
        };


        mainApp.grabProjectArchive();
    }
};




window.onload = function() {
    console.log( "ready!" );
    mainApp.grabType();
};