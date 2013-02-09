<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="/wp-content/themes/rememberthisname-roots/assets/js/vendor/jquery.masonry.min.js"></script>
<div id="mosaic">
<?php
	# Find all posts with images
	$media_query = new WP_query();

	$media_query->query('showposts=20');

	while ( $media_query->have_posts() ) : $media_query->the_post(); if ( has_post_thumbnail() ) { ?>
		<div class="mosaicItem">
			<a href="<?php the_permalink(); ?>">
			<img src="<?php print wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
	<?php
	   }
	endwhile;
?>
</div>
<script type="text/javascript">
var $container = $('#mosaic');

$container.imagesLoaded( function(){
  $container.masonry({
    itemSelector : '.mosaicItem',
    columnWidth: 150,
    isAnimated: true
  });
});
</script>

