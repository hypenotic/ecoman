	<footer>
		<p>Terms & Conditions</p>
		<p>Made with love by <a href="http://hypenotic.com" target="_blank">Hypenotic</a>.</p>
	</footer>
	</main>

	<div class="mobile-nav">
	  <?php 
	      wp_nav_menu(array(
	        'menu' => 'Main Menu',  
	        'container_id' => 'main-menu',
	        'walker' => new Main_Menu_Walker()
	      )); 
	  ?>
	  <?php get_search_form(); ?>
	</div>

	<?php wp_footer(); ?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</body>
</html>

