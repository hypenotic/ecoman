<nav class="nav -mobile" id="nav-fixed">
    <div class="nav_left -flex -flex-ai-c">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="Ecoman logo of a hand picking up a palnt from the ground">
        </a>
        <span>ECOMAN</span>
    </div>
</nav>

<nav class="nav" id="main-nav">
    <div class="nav_left -flex -flex-ai-c">
        <a class="-flex -flex-ai-c" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="Ecoman logo of a hand picking up a palnt from the ground.">
        </a>
        <span class="-serif - uppercase -italic">ECOMAN<span class="text-disappear"> <a href="tel:+4165565516">416.556.5516</a></span></span>
    </div>
    <div class="nav_right -flex -flex-ai-c">
        <?php 
            wp_nav_menu(array(
                'menu' => 'Main Menu',  
                'container_id' => 'main-menu',
                'walker' => new Main_Menu_Walker()
            )); 
        ?>
    </div>
</nav>

<button id="nav-trigger" class="hamburger hamburger--slider" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>