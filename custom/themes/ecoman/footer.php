	<footer>
		<p>Terms & Conditions</p>
		<p>Made with love by <a href="http://hypenotic.com" target="_blank">Hypenotic</a>.</p>
	</footer>
	</main>

	<?php wp_footer();

	if (is_page( 'services' ) || is_page( 'about' )) {?>
		<script src="<?php echo get_template_directory_uri();?>/includes/vue/services/dist/build-190303.js"></script>
	<?php } else if (is_page_template( 'about.php' )) { ?>
		<script src="<?php echo get_template_directory_uri();?>/src/vue/seekers/dist/build-190303.js"></script>
	<?php } else {}?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</body>
</html>

