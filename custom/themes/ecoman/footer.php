	<footer>
		<p>Terms & Conditions</p>
		<p>Made with love by <a href="http://hypenotic.com" target="_blank">Hypenotic</a>.</p>
	</footer>
	</main>

	<div class="mobile-menu">
	  <div class="mobile-menu-inner">
	    <?php 
	        wp_nav_menu(array(
	          'menu' => 'Main Menu',  
	          'container_id' => 'main-menu',
	          'walker' => new Main_Menu_Walker()
	        )); 
	    ?>
	  </div>
	</div>
	
	<?php wp_footer(); ?>
</body>
</html>

