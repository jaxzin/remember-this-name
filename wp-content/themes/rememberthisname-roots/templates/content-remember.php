<section class="marketing" id="the-name">
<script src="/assets/js/jquery/jquery.masonry.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
<script src="/assets/js/jquery/jquery.flip.min.js"></script>
<script src="/assets/js/mosaic.js"></script>
<div id="mosaic">
<?php
	# Find all posts with images
	$media_query = new WP_query();

	$media_query->query(
		array(
			'showposts' => 21,
			'meta_key' => '_thumbnail_id'
			)
	);

	while ( $media_query->have_posts() ) : $media_query->the_post(); if ( has_post_thumbnail() ) { ?>
		<div class="mosaicItem" data-name="<?php echo the_title();?>" data-url="<?php echo the_permalink();?>">
			<a href="<?php the_permalink(); ?>">
			<img src="<?php 
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(), array(150,150));
					if(is_array($image)) {
						print $image[0]; 
					}
				?>" alt="<?php the_title(); ?>">
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

$container.imagesLoaded( function(){
	// Start up tile flipping animation, flip every 10s.
	flipTile();
	setInterval(flipTile, 10000);
});
</script></section>


<hr class="soften" />

