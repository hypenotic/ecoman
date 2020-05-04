<?php

/** 
 * Function to add social sharing buttons on right side of any template or page
 * @example <?php if(social_share()) { social_share();} ?>
 * require_once('includes/functions/add-social-share.php');
*/

function social_share() {
?>

<div id="side-social-share" class="social-share">
	<?php
	$post_title=get_the_title();
	$post_link= urlencode(get_permalink());
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

	$twitter_url ='http://twitter.com/home?status='.$post_title.'+'.$post_link.'+@ecomandotca';
	$fb_url = 'https://www.facebook.com/sharer.php?s=100&amp;p[title]='.$post_title.'&amp;p[summary]='.$post_description.'&amp;p[url]='.$post_link.'&amp;p[images][0]='.$post_img;
	$pintrest_url='http://pinterest.com/pin/create/bookmarklet/?media='.$post_img.'&amp;url='.$post_link.'&amp;is_video=false&amp;description='.$post_description;
	// $gplus_url='https://plus.google.com/share?url='.$post_link;
	// $linkedin_url='http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'&amp;title='.$post_title.'&amp;source='.$post_link;
	// //$mail_url='mailto:?subject='.$post_title.'&amp;body='.$post_description .'-'.$post_link;
	// $mail_url='http://www.sharethis.com/share?url='.$post_link.'&title='.$post_title.'&summary='.$post_description.'&img='.$post_img;
	?>
	<ul class="social-share">
    	<li><a id="facebook" onclick="ga('send', 'social', 'Facebook', 'share', '<?php echo $fb_url;?>');" href="<?php echo $fb_url;?>" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
    	<li><a id="twitter" onclick="ga('send', 'social', 'Twitter', 'share', '<?php echo $twitter_url;?>');" href="<?php echo $twitter_url;?>" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a></li>
    	<li><a id="pinterest" onclick="ga('send', 'social', 'Pinterest', 'share', '<?php echo $pintrest_url;?>');" href="<?php echo $pintrest_url;?>" rel="nofollow" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    </ul>
</div>
<?php } ?>