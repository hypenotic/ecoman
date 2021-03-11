<aside>
	<span class="-serif -italic">Topics</span>
	<ul class="-lst-none -m0 -p0 -ptb1">
	<?php
	$categories = get_categories('exclude=1&title_li=');
	foreach ($categories as $cat) { ?>
		<li class='-flex -flex-jc-sb'>
		<a href="/category/<?php echo $cat->category_nicename; ?>"><?php echo $cat->cat_name;?></a><?php echo $cat->category_count ?></li>
	<?php }
	?>
	</ul>

	<span class="-serif -italic -pt1 -d-b">Social Feeds</span>
	<ul class="-lst-none -m0 -p0 -ptb1 -flex sidebar_social">
		<li class=""><a id="facebook" target="_blank" class="btn -circle -bg-lgrey" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.facebook.com/Ecomantoronto');" href="https://www.facebook.com/Ecomantoronto"><i class="fa fa-facebook"></i></a></li>
		<li class=""><a id="twitter" onclick="ga('send', 'event', 'outbound', 'click', 'https://twitter.com/ecomandotca?lang=en');" href="https://twitter.com/ecomandotca?lang=en" target="_blank" class="btn -circle -bg-lgrey"><i class="fa fa-twitter"></i></a></li>
		<li class=""><a id="instagram" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.instagram.com/ecoman_jonas/');" href="https://www.instagram.com/ecoman_jonas/" target="_blank" class="btn -circle -bg-lgrey"><i class="fa fa-instagram"></i></a></li>
	</ul>
</aside>