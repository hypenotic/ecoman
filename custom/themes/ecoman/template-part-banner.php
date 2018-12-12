
<?php 
// Variables
$banner         = get_post_meta( $post->ID, '_banner_image', true );
$bannerurl      = wp_get_attachment_image_src( $banner,'banner', true );
$thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' );
$heading        = get_post_meta( $post->ID, '_banner_heading', true );
$subheading     = get_post_meta( $post->ID, '_banner_subheading', true );
$cta            = get_post_meta( $post->ID, '_em_banner_cta', true );
$ctaLink        = get_post_meta( $post->ID, '_em_banner_link', true );
$blurb          = get_post_meta( $post->ID, '_banner_blurb', true );
$theme          = get_post_meta( $post->ID, '_banner_theme', true );

if (is_front_page() || is_page('about') || is_page('services') ) { ?>
    <header class="header -flex -flex-ia-c" style="background-image: url(<?php if ($thumbnail) { ?><?php echo $thumbnail[0]; ?><?php } else { echo $bannerurl ;} ?>);" id="scrollheader">
        <div class="header_text -flex -flex-ai-c <?php if (!is_front_page()) { echo '-bg-blue-t'; } ?>">
            <div>
                <h1 class="-m0 -uppercase -italic -fc-accent <?php if (is_page('about')) { echo '-small'; } ?>"><?php echo $heading; ?></h1>
                <?php if ($subheading) { ?>
                    <p><?php echo $subheading; ?></p>
                <?php } ?>
                <?php if ($cta && $cta != '') { ?>
                    <a href="<?php echo $ctaLink;?>" class="btn -bg-accent"><?php echo $cta;?></a>
                <?php } ?>
            </div>
        </div>
    </header>
<?php } ?>

<?php if (is_404()) { ?>

    <header class="error-header -flex -flex-ia-c" style="background-image:url('<?php echo get_template_directory_uri (); ?>/dist/images/dustin-scarpitti-1019-unsplash-ecoman-404-compress.jpg');" alt="Forest floor with ferns growing amongst the base of a tree trunk.">
        <div class="header_text -color-w -flex -flex-jc-c -flex-d-c -serif -p-large">
           <p class="-text-large">Getting lost in nature is fun.<br/>
           On the internet, less so.</p>
           <span class="-sans-serif">Whoops! Looks like the page you're looking for isn't available at the moment.</span>
        </div>
    </header>

<?php } ?>


<?php // For search results, default archive and blog index
    if ( is_search() || is_archive() || is_home() || is_single() || is_page('resources') ) 
{ ?>

    <?php get_template_part( 'template-part-signup' ); ?>

    <?php // For search results, default archive and blog index
    if ( is_single() ) { ?>

    <?php if(social_share()) { social_share();} ?>

    <?php } ?>

<?php } ?>