<?php
/*
Template Name: Store
*/
?>

<?php get_header('store'); ?>

<div>
<img style="object-fit: cover; max-width: 100%;" src="<?php echo get_bloginfo('template_url').'/src/images/bg_balcony.jpg';?>" alt="">
</div>
<h1><?php the_title();?></h1>

<section></section>

<section class="store" style="max-width: 1160px; margin: 0 auto; display: grid; grid-gap: 70px; justify-content: center;">
    <div>
        <h3 style="text-align:center; text-transform: uppercase">Balcony + Terrace arrangements<br><span style="color: #C25B24; font-style:italic"> $150</span></h3>

        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px; padding: 70px 0;">
            <img style="object-fit: contain; max-width: 100%;" src="<?php echo get_bloginfo('template_url').'/src/images/store_terrace.jpg';?>" alt="">
            <div>
                <h4>INCLUDES</h4>
                <p>12 locally-grown, hardy, low-maintenance perennial plants in Ecoman custom-formulated mineral soil in a 100% recycled textile planter (12” deep 18” in diameter). Plant selection based on supply, season.</p>
                <?php echo do_shortcode('[ecwid_product id="301419293" display="price addtobag" version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
        </div>
    </div>


    <div>
        <h3 style="text-align:center; text-transform: uppercase">By the Component</h3>

        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px; padding: 70px 0;">

            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_plants.jpg';?>" alt="">
                <h3 style="text-transform: uppercase">Curated Plants<br><span style="color: #C25B24; font-style:italic"> $50</span></h3>
                <p>A dozen locally-grown, hardy, low-maintenance plants excited to thrive on your balcony or terrace. (Be sure to grab a bag of Ecoman mineral soil mix).</p>
                <?php echo do_shortcode('[ecwid_product id="301419297" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>

            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_soil.jpg';?>" alt="">
                <h3 style="text-transform: uppercase">Mineral Soil mix<br><span style="color: #C25B24; font-style:italic">$25</span></h3>
                <p>Ecoman mineral-based soil mix, tested and optimized for plants that thrive in natural cliff and crevice conditions.</p><p>37 litres/order (about 50 lbs.) fills 1 planter w/12plants</p>
                <?php echo do_shortcode('[ecwid_product id="301417470" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>

        <div>
    </div>

</section>


<?php //the_content();?>


<?php get_template_part( 'template-part-contact-form' ); ?>
<?php get_footer(); ?>