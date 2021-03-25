<?php
/*
Template Name: Store
*/
?>

<?php get_header('store'); ?>

<div id="store">

<header>
    <h1>Instant <br>greenification</h1>
</header>

<section class="layout-store">
    <div>
        <div class="layout-store__inner">
            <img style="object-fit: contain; max-width: 100%;" src="<?php echo get_bloginfo('template_url').'/dist/images/store_jungle.jpg';?>" alt="">
            <div>
                <h3>Green toronto’s concrete + glass jungle one balcony at a time</h3>
                <p>Years of research and testing to figure out which plants love to grow on local cliffs and <a href="https://en.wikipedia.org/wiki/Alvar" target="_blank">alvars</a> are the basis for our curated selections that thrive on balconies and terraces.</p>
                <p>They’re low maintenance, resilient, perennials (come back year after year) and come as either pre-assembled “arrangements” or in their components.</p>
                <p>Green your space + grow our green urban network now.</p> 
            </div>
        </div>
    </div>
</section>

<section class="cta-layout">
    <img style="margin-bottom: 30px;" src="<?php echo get_bloginfo('template_url').'/dist/images/icon_truck.svg';?>" alt="">
    <h3>GTA DELIVERY <br><span style="color: #C25B24; font-style:italic">$55</span></h3>
    <p>Delivery to your lobby.<br> Pre-orders will ship after May 20th, 2021</p>
</section>

<section class="layout-store">
    <div>
        <h3 style="text-align:center; margin-top: 75px;"">Balcony + Terrace arrangements<br><span style="color: #C25B24; font-style:italic"> $150</span></h3>
        <div class="layout-store__inner">
            <img style="object-fit: contain; max-width: 100%" src="<?php echo get_bloginfo('template_url').'/dist/images/store_terrace.png';?>" alt="">
            <div>
                <h4>INCLUDES</h4>
                <p>12 locally-grown, hardy, low-maintenance perennial plants in Ecoman custom-formulated mineral soil in a 100% recycled textile planter (12” deep 18” in diameter). Plant selection based on supply, season.</p>
                <?php echo do_shortcode('[ecwid_product id="301419293" display="price addtobag" version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
        </div>
    </div>

    <div>
        <h3 style="text-align:center;">By the Component</h3>
        <div class="layout-store__inner">
            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_plants.jpg';?>" alt="">
                <h3 style="margin-top: 40px;">Curated Plants<br><span style="color: #C25B24; font-style:italic"> $75</span></h3>
                <p>A dozen locally-grown, hardy, low-maintenance plants excited to thrive on your balcony or terrace.</p>
                
                <p>Be sure to grab a bag of Ecoman mineral soil mix.</p>
                <?php echo do_shortcode('[ecwid_product id="301419297" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_soil.jpg';?>" alt="">
                <h3 style="margin-top: 40px;">Mineral Soil mix<br><span style="color: #C25B24; font-style:italic">$25</span></h3>
                <p>Ecoman mineral-based soil mix, tested and optimized for plants that thrive in natural cliff and crevice conditions.</p><p>37 litres/order (about 50 lbs.) fills 1 planter w/12plants</p>
                <?php echo do_shortcode('[ecwid_product id="301417470" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
        <div>
    </div>
</section>

<section class="cta-layout">
    <img style="margin-bottom: 30px;" src="<?php echo get_bloginfo('template_url').'/dist/images/icon_phone.svg';?>" alt="">
    <h3>CUSTOM ORDERS</h3>
    <p>Consult an expert to curate a coterie customized to suite your balcony or terrace. We’ll factor in colours, smells, and maintenance requirements for an outdoor living space that gives back year after year.</p> <p>Call or text for a consultation today!</p>
    <h3 style="color: #C25B24;">(416) 535-5565</h3>
</section>

<section style="background: rgba(138, 138, 128, 0.9);">
    <header style="position: relative; max-width: 100%; height: 450px; background:url(<?php echo get_bloginfo('template_url').'/dist/images/bg_banner_store2.jpg'?>) no-repeat; background-size: cover; background-position: 60% 60%;">
        <h1 style="position: absolute; bottom: -140px; display: inline-block; background: rgba(138, 138, 128, 0.9); padding: 50px 100px 40px 100px; color: white; text-transform: uppercase; font-style: italic;">Specifications <br>/care & feeding</h1>
    </header>

    <div class="care-layout" >
        <div>
            <div class="care-layout__inner">
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_watering.svg';?>" alt="">
                    <div>
                        <h3 style="color: white">Watering</h3>
                        <p>4 cups (1 litre) of water/week, especially if you don’t get rain on your balcony. </p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_care.svg';?>" alt="">
                    <div>
                        <h3 style="color: white">Winter Care</h3>
                        <p>Enjoy the view.</p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_spade.svg';?>" alt="">
                    <div>
                        <h3 style="color: white">Maintenance</h3>
                        <p>Plant it and forget it! (Seriously! We’ll share a few tips but they’re really low maintenance).</p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_ruler.svg';?>" alt="">
                    <div>
                        <h3 style="color: white">SQ FT</h3>
                        <p>12 plants will cover 50cm x 50cm (2.25 sq ft).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<?php //get_template_part( 'template-part-contact-form' ); ?>
<?php get_footer(); ?>