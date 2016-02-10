<div class="contact-form">
	<div class="contact-form__left">
		<div class="contact__deats">
			<p>416.556.5516</p>
			<p>jonas@ecoman.ca</p>
			<p>44 Shanly Street,<br/>
			Toronto, ON. M6H 1S3</p>
		</div>
		<div class="contact__blurb">
			<?php dynamic_sidebar( 'contact-blurb' ); ?>
		</div>
		<div class="contact__social">
			<?php if(social_share()) { social_share();} ?>
		</div>
	</div>
	<div class="contact-form__right">
		<h4>GET IN TOUCH</h4>
		<p>DEAR: JONAS SPRING</p>
		<?php echo do_shortcode( '[contact-form-7 id="28" title="Contact form 1"]' ); ?>
	</div>
</div>