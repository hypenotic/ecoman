<div id="post-social-share">
	<?php
	$post_title=get_the_title();
	$post_link= urlencode(get_permalink());

	$quotation= get_post_meta( $post->ID, '_pullquote_quote', true );

	$clean=rawurlencode($quotation);
	?>

	<?php if ( has_excerpt() ) { 

		$post_description=get_the_excerpt(); 
	?>
	<?php } else { 

		$post_description=get_the_title(); 
	?>
	<?php } ?>

	<?php if ( has_post_thumbnail() ) { 

		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

		$post_img=$url;	
	?>
	<?php } else { 

		$post_img=get_bloginfo('template_url').'/dist/images/ecoman_logo_icon_black.png';	
	?>
	<?php } ?>

	<?php 

	$twitter_url ='http://twitter.com/home?status='.$clean.'+'.$post_link.'+@ecomandotca';
	$fb_url = 'https://www.facebook.com/sharer.php?s=100&amp;p[title]='.$post_title.'&amp;p[summary]='.$post_description.'&amp;p[url]='.$post_link.'&amp;p[images][0]='.$post_img;
	?>
	<ul>
		<li><a id="twitter"  href="<?php echo $twitter_url;?>" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a></li>
    	<li><a id="facebook" href="<?php echo $fb_url;?>" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
    </ul>
</div>