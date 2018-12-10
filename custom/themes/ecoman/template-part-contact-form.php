<div class="full-screen-wrapper contact" id="contact">
	<div class="outer-container">
		<div class="contact-section">
			<div class="contact-form">
				<div class="contact-form__left">
					<div><?php dynamic_sidebar( 'contact-blurb' ); ?></div>
					<div class="contact__deats">
						<p>Jonas Spring,Ecoman</p>
						<p>44 Shanly Street,<br/>
						Toronto, ON<br/>
						M6H 1S3</p>
					</div>
					<div class="contact__blurb">
						<p><a onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
						<a href="tel:4165565516">416.556.5516</a></p>
					</div>
					<div class="contact__social">
						<ul class="social-share">
		                	<li class="white-btn"><a id="facebook" target="_blank" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.facebook.com/Ecomantoronto');" href="https://www.facebook.com/Ecomantoronto"><i class="fa fa-facebook"></i></a></li>
		                	<li class="white-btn"><a id="twitter" onclick="ga('send', 'event', 'outbound', 'click', 'https://twitter.com/ecomandotca?lang=en');" href="https://twitter.com/ecomandotca?lang=en" target="_blank"><i class="fa fa-twitter"></i></a></li>
		                	<li class="white-btn"><a id="instagram" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.instagram.com/ecoman_jonas/');" href="https://www.instagram.com/ecoman_jonas/" target="_blank"><i class="fa fa-instagram"></i></a></li>
		                	<li class="white-btn"><a id="mail" onclick="ga('send', 'event', 'outbound', 'click', 'mailto:jonas@ecoman.ca');" href="mailto:jonas@ecoman.ca" rel="nofollow" target="_blank"><i class="fa fa-envelope-o"></i></i></a></li>
		                </ul>
					</div>
				</div>
				<div class="contact-form__right -pos-r">
					<img src="<?php echo get_template_directory_uri(); ?>/src/images/froggy.png" alt="Black and white illustration of a frog.">
					<?php echo do_shortcode('[contact-form-7 id="28" title="Contact form 1"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>