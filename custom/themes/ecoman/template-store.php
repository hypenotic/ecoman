<?php
/*
Template Name: Store
*/
?>

<?php get_header('store'); ?>

<header style="position: relative; max-width: 100%; height: 450px; background: url(<?php echo get_bloginfo('template_url').'/dist/images/bg_banner_store1.jpg'?>) no-repeat; background-size: cover;">
    <h1 style="position: absolute; bottom: -140px; display: inline-block; background: rgba(255, 255, 255, 0.9); padding: 50px 100px 40px 100px; color: #C25B24; text-transform: uppercase; font-style: italic;">Instant <br>greenification</h1>
</header>

<section class="store" style="max-width: 1100px; margin: 0 auto; display: grid; grid-gap: 50px; justify-content: center; margin-top: 150px">
    <div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px; padding: 70px 0;">
            <img style="object-fit: contain; max-width: 100%;" src="<?php echo get_bloginfo('template_url').'/dist/images/store_jungle.jpg';?>" alt="">
            <div>
                <h3 style="text-transform: uppercase">Green toronto’s concrete + glass jungle one balcony at a time</h3>
                <p>Years of research and testing the plants happiest growing on cliffs and in climates like Ontario’s informed a selection that thrives on balconies and terraces.</p>
                <p>They’re low maintenance, resilient, perennials (come back year after year) and come as either pre-assembled “arrangements” or in their components.</p>
                <p>Green your space + grow our green urban network now.</p> 
            </div>
        </div>
    </div>
</section>

<section style="background-color: #EDF6E9; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 75px 200px;  text-align: center">
    <img style="margin-bottom: 30px;" src="<?php echo get_bloginfo('template_url').'/dist/images/icon_truck.svg';?>" alt="">
    <h3 style="text-transform: uppercase;">GTA DELIVERY <br><span style="color: #C25B24; font-style:italic">$55</span></h3>
    <p>Delivery to your lobby.<br> Pre-orders will ship after May 20th, 2021</p>
</section>

<section class="store" style="max-width: 1100px; margin: 0 auto; display: grid; grid-gap: 50px; justify-content: center;">
    <div>
        <h3 style="text-align:center; text-transform: uppercase; margin-top: 75px;"">Balcony + Terrace arrangements<br><span style="color: #C25B24; font-style:italic"> $150</span></h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px; padding: 70px 0;">
            <img style="object-fit: contain; max-width: 100%;" src="<?php echo get_bloginfo('template_url').'/dist/images/store_terrace.jpg';?>" alt="">
            <div>
                <h4>INCLUDES</h4>
                <p>12 locally-grown, hardy, low-maintenance perennial plants in Ecoman custom-formulated mineral soil in a 100% recycled textile planter (12” deep 18” in diameter). Plant selection based on supply, season.</p>
                <?php echo do_shortcode('[ecwid_product id="301419293" display="price addtobag" version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
        </div>
    </div>

    <div>
        <h3 style="text-align:center; text-transform: uppercase;">By the Component</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px; padding: 70px 0;">
            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_plants.jpg';?>" alt="">
                <h3 style="text-transform: uppercase; margin-top: 40px;">Curated Plants<br><span style="color: #C25B24; font-style:italic"> $50</span></h3>
                <p>A dozen locally-grown, hardy, low-maintenance plants excited to thrive on your balcony or terrace. (Be sure to grab a bag of Ecoman mineral soil mix).</p>
                <?php echo do_shortcode('[ecwid_product id="301419297" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
            <div>
                <img style="object-fit: cover; max-width: 100%; height: 300px" src="<?php echo get_bloginfo('template_url').'/dist/images/store_soil.jpg';?>" alt="">
                <h3 style="text-transform: uppercase; margin-top: 40px;">Mineral Soil mix<br><span style="color: #C25B24; font-style:italic">$25</span></h3>
                <p>Ecoman mineral-based soil mix, tested and optimized for plants that thrive in natural cliff and crevice conditions.</p><p>37 litres/order (about 50 lbs.) fills 1 planter w/12plants</p>
                <?php echo do_shortcode('[ecwid_product id="301417470" display="price addtobag"  version="2" show_border="0" show_price_on_button="1" center_align="0"]'); ?>
            </div>
        <div>
    </div>
</section>

<section style="background-color: #EDF6E9; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 75px 200px;  text-align: center">
    <img style="margin-bottom: 30px;" src="<?php echo get_bloginfo('template_url').'/dist/images/icon_phone.svg';?>" alt="">
    <h3 style="text-transform: uppercase;">CUSTOM ORDERS</h3>
    <p>Consult an expert to curate a coterie customized to suite your balcony or terrace. We’ll factor in colours, smells, and maintenance requirements for an outdoor living space that gives back year after year.</p> <p>Call or text for a consultation today!</p>
    <h3 style="text-transform: uppercase;  color: #C25B24;">(416) 535-5565</h3>
</section>

<section style="background: rgba(138, 138, 128, 0.9);">
    <header style="position: relative; max-width: 100%; height: 450px; background:url(<?php echo get_bloginfo('template_url').'/dist/images/bg_banner_store2.jpg'?>) no-repeat; background-size: cover;">
        <h1 style="position: absolute; bottom: -140px; display: inline-block; background: rgba(138, 138, 128, 0.9); padding: 50px 100px 40px 100px; color: white; text-transform: uppercase; font-style: italic;">Specifications <br>/care & feeding</h1>
    </header>

    <div style="margin: 0 auto; display: grid; grid-gap: 50px; justify-content: center; margin-top: 150px; ">
        <div>
            <div style="max-width: 1100px; color: white; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 50px; padding: 70px 0;">
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_watering.svg';?>" alt="">
                    <div>
                        <h3 style="text-transform: uppercase; color: white">Watering</h3>
                        <p>4 cups (1 litre) of water/week, especially if you don’t get rain on your balcony. </p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_care.svg';?>" alt="">
                    <div>
                        <h3 style="text-transform: uppercase; color: white">Winter Care</h3>
                        <p>Enjoy the view.</p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_spade.svg';?>" alt="">
                    <div>
                        <h3 style="text-transform: uppercase; color: white">Maintenance</h3>
                        <p>Plant it and forget it! (Seriously! We’ll share a few tips but they’re really low maintenance).</p>
                    </div>
                </div>
                <div style="display:grid; grid-template-rows: 60px 1fr">
                    <img src="<?php echo get_bloginfo('template_url').'/dist/images/icon_ruler.svg';?>" alt="">
                    <div>
                        <h3 style="text-transform: uppercase; color: white">SQ FT</h3>
                        <p>12 plants will cover 50cm x 50cm (2.25 sq ft).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'template-part-contact-form' ); ?>
<?php get_footer(); ?>