	<footer>
		<p>Terms & Conditions</p>
		<p>Made with love by <a href="http://hypenotic.com" target="_blank">Hypenotic</a>.</p>
	</footer>
	</main>

	<div class="mobile-nav">
	  <?php 
	      wp_nav_menu(array(
	        'menu' => 'Mobile Menu',  
	        'container_id' => 'short-menu',
	        'walker' => new Main_Menu_Walker()
	      )); 
	  ?>
	  <?php get_search_form(); ?>
	  <div class="contact__deats">
	  	<p>ecoman</p>
	  	<p>44 shanly street,<br/>
	  	toronto, on<br/>
	  	M6H 1S3 <a href="https://www.google.ca/maps/place/44+Shanly+St,+Toronto,+ON+M6H+1S3/@43.6637464,-79.4326931,17z/data=!4m2!3m1!1s0x882b34674ae9fbf9:0x25f8e5b90548ccfa" target="_blank"><i class="fa fa-map-marker"></i></a></p>
	  </div>
	  <div class="contact__blurb">
	  	<p><a href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
	  	<a href="tel:4165565516">416.556.5516</a></p>
	  </div>
	</div>

	<?php wp_footer(); ?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</body>
</html>

