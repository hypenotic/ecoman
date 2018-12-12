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
		    'walker' => new Main_Menu_Walker(),
		  )); 
		?>
		<div class="contact__deats">
			<p>Ecoman</p>
			<p>44 Shanly Street,<br/>
			Toronto, ON<br/>
			M6H 1S3 <a href="https://www.google.ca/maps/place/44+Shanly+St,+Toronto,+ON+M6H+1S3/@43.6637464,-79.4326931,17z/data=!4m2!3m1!1s0x882b34674ae9fbf9:0x25f8e5b90548ccfa" target="_blank"><i class="fa fa-map-marker"></i></a></p>
		</div>
		<div class="contact__blurb">
			<p><a href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
			<a href="tel:4165565516">416.556.5516</a></p>
		</div>
		<div class="footer__social">
			<ul class="social-share">
		  	<li class="white-btn"><a id="facebook" target="_blank" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.facebook.com/Ecomantoronto');" href="https://www.facebook.com/Ecomantoronto"><i class="fa fa-facebook"></i></a></li>
		  	<li class="white-btn"><a id="twitter" onclick="ga('send', 'event', 'outbound', 'click', 'https://twitter.com/ecomandotca?lang=en');" href="https://twitter.com/ecomandotca?lang=en" target="_blank"><i class="fa fa-twitter"></i></a></li>
		  	<li class="white-btn"><a id="instagram" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.instagram.com/ecoman_jonas/');" href="https://www.instagram.com/ecoman_jonas/" target="_blank"><i class="fa fa-instagram"></i></a></li>
		  	<li class="white-btn"><a id="mail" onclick="ga('send', 'event', 'outbound', 'click', 'mailto:jonas@ecoman.ca');" href="mailto:jonas@ecoman.ca" rel="nofollow" target="_blank"><i class="fa fa-envelope-o"></i></i></a></li>
		  </ul>
		</div>
		<?php get_search_form(); ?>
	</div>

	<?php wp_footer();

	if (is_page( 'services' )) {?>
		<script src="<?php echo get_template_directory_uri();?>/includes/vue/services/dist/build.js?v=181212-vlemvkenw3c"></script>
	<?php } else if (is_page_template( 'about.php' )) { ?>
		<script src="<?php echo get_template_directory_uri();?>/src/vue/seekers/dist/build.js"></script>
	<?php } else {}?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</body>
</html>

