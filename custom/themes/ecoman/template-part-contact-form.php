<div class="full-screen-wrapper contact" id="contact">
	<div class="outer-container">
		<div class="contact-section">
	
			<div class="contact-form">
				<div class="contact-form__left">
					<div><?php dynamic_sidebar( 'contact-blurb' ); ?></div>
					<div class="contact__deats">
						<p>Jonas Spring,Ecoman</p>
						<p><a href="https://goo.gl/maps/X7qbM7n4wDAuujEE9" target="_blank>">11 Watkinson Ave,<br/>
						Toronto, ON<br/>
						M6P 2E6</a></p>
					</div>
					<div class="contact__blurb">
						<p><a onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
						<a href="tel:+14165355565">416.535.5565</a></p>
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
				<!-- / .contact-form__left -->

				<div class="contact-form__right -pos-r">
					<h3>Contact Form</h3>
					<?php echo do_shortcode( '[gravityform id="1" ajax="true" title="false" description="false"]' ); ?>
				</div>
				<!-- / .contact-form__right -->

			</div>
			<!-- / .contact-form -->
			
				
				<!--
				<div class="contact-temp-layout">
					<div><?php dynamic_sidebar( 'contact-blurb' ); ?></div>
					<div class="contact__deats" style="padding-top: 27px;">
						<p>Jonas Spring,Ecoman</p>
						<p><a href="https://goo.gl/maps/X7qbM7n4wDAuujEE9" target="_blank>">240 Sterling Rd,<br/>
						Toronto, ON<br/>
						M6R 2B9</a></p>
					</div>
					<div class="contact__blurb" style="padding-top: 10px;">
						<p><a onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
						<a href="tel:+14165355565">416.535.5565</a></p>
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
				-->
				
			
		</div>
		<!-- /. contact-section -->
	</div>
</div>