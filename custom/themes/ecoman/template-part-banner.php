
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

if (is_front_page()) { ?>
    <header class="header main-header -flex -flex-ia-c" style="background-image: url(<?php if ($thumbnail) { ?><?php echo $thumbnail[0]; ?><?php } else { echo $bannerurl ;} ?>);" id="scrollheader">
        <div class="header_text -flex -flex-ai-c">
            <div>
                <h1 class="-m0 -uppercase -fc-accent"><?php echo $heading; ?></h1>
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

<?php if ( is_page('about') || is_page('services') ) { ?>

    <?php get_template_part( 'template-part-signup' ); ?>

    <header class="main-header inner-nav small-header" style="background-image:url(<?php echo $bannerurl[0]; ?>);">
        <?php if ($theme == 'value2') { ?>
        <div class="header__text outer-container animated fadeIn light-theme">
        <?php } else { ?>
        <div class="header__text outer-container animated fadeIn">
        <?php } ?>
            <?php if ($theme == 'value2') { ?>
            <h1 class="left-align-text"><span class="black-highlight"><?php echo $heading; ?></span></h1>
            <?php } else { ?>
            <h1 class="left-align-text"><span class="white-highlight"><?php echo $heading; ?></span></h1>
            <?php } ?>
            <?php if ($subheading) { ?>
                <?php if ($theme == 'value2') { ?>
                <h2><span class="black-highlight"><?php echo $subheading; ?></span></h2>
                <?php } else { ?>
                <h2><span class="white-highlight"><?php echo $subheading; ?></span></h2>
                <?php } ?>
            <?php } ?>
            <?php if ($blurb) { ?>
                <div class="header-blurb">
                    <?php echo $blurb; ?>
                </div>
            <?php } ?>
        </div>
    </header>

<?php } ?>


<?php if (is_404()) { ?>

    <?php get_template_part( 'template-part-signup' ); ?>

    <header class="main-header inner-nav error-page" style="background-image:url('<?php echo get_template_directory_uri (); ?>/dist/images/404_image.jpg');" alt="404 image - picture of cows">
        <div class="header__text outer-container">
            <h2><span class="black-highlight">Looks like the cows got out of the barn...</span></h2>
            <p><span class="black-highlight">The page you've requested is not available. Try a search? <a href="#contact">Contact</a> us?</span></p>
            <?php get_search_form(); ?>
            <a href="/"><button class="error-page__btn copper-btn">
                    Back to the homepage, please!
                </button></a>
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