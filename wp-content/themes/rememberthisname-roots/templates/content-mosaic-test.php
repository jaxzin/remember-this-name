<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="/wp-content/themes/rememberthisname-roots/assets/js/vendor/jquery.masonry.min.js"></script>
<div id="mosaic">
<?php
	$media_query = new WP_Query(
	    array(
	        'post_type' => 'attachment',
	        'post_status' => 'inherit',
	        'posts_per_page' => -1,
	    )
	);
	$list = array();
	foreach ($media_query->posts as $post) {
	    $list[] = wp_get_attachment_image_src($post->ID, array(150,150))[0];
	}

	foreach ( $list as $url)  { ?>
		<div class="mosaicItem">
			<img src="<?php print $url;?>">
		</div>
	<?php
	}
?>
</div>
<script type="text/javascript">
var $container = $('#mosaic');

$container.imagesLoaded( function(){
  $container.masonry({
    itemSelector : '.mosaicItem',
    columnWidth: 150
  });
});
</script>

