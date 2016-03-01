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
	  	M6H 1S3</p>
	  </div>
	  <div class="contact__blurb">
	  	<p>jonas@ecoman.ca<br/>
	  	416.556.5516</p>
	  </div>
	</div>

	<?php wp_footer(); ?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</body>
</html>

