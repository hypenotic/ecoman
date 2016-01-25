	<?php if ( is_front_page() ) { ?>

	<?php } else { ?>
		<footer class="main-footer">
			<div class="footer__blog footer__third">
				<h3><a href="<?php echo get_home_url(); ?>/news">Recent Posts</a></h3>
				
				<?php 

				$args = $args   = array(
						'post_type' 		=> 'post',
						'post__not_in' 		=> get_option( 'sticky_posts' ),
						'posts_per_page' 	=> 4,
						'order'          	=> 'DESC'
				);

				$the_query = new WP_Query($args); 

				?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<p><a href="<?php the_permalink(); ?>" class="footer__blog__posts">
						<?php the_title(); ?>
					</a></p>
				<?php endwhile; ?>
				
			</div>
			<div class="footer__news footer__third footer__third--align">
				<!-- Begin MailChimp Signup Form -->
				<style type="text/css">
					#mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
					/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
					   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
				<form action="//ingenuity.us12.list-manage.com/subscribe/post?u=0b66a91bd0f3c7ec3d595d5e4&amp;id=fd499abc6d" method="post" class="footer-newsletter" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<h4>Get Ingenuity in your mailbox!</h4>
					
					<span class="input input--ingenuity">
						<input type="email" value="" name="EMAIL" class="email input__field input__field--ingenuity" id="mce-EMAIL" placeholder="email address" required>
						<label class="input__label input__label--ingenuity" for="mce-EMAIL">
							<span class="input__label-content input__label-content--ingenuity">Email</span>
						</label>
					</span>
			    	<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    	<div style="position: absolute; left: -5000px;"><input type="text" name="b_0b66a91bd0f3c7ec3d595d5e4_fd499abc6d" tabindex="-1" value=""></div>
			    	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</form>
				</div>

				<!--End mc_embed_signup-->
			</div>
			<div class="footer__cta footer__third footer__third--align">
				<h4>​Great buildings begin with a conversation.</h4>
				<a href="<?php echo get_home_url(); ?>/contact-us"><button class="button-down">Let's talk over an espresso!</button></a>
			</div>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpGPGQX8oq7dF3OTm4OV-UiAKX_nr4_2w"></script>
		</footer>
		<!-- <div id="hypenotic-creds">
			Made with &hearts; by <a href="http://hypenotic.com/" target="_blank">Hypenotic</a>
		</div> -->
	<?php } ?>
	

	</main> <!-- mainWrapper ends here -->
	<?php wp_footer(); ?>
</body>
</html>

