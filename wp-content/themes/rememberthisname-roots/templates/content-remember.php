<section class="marketing" id="the-name">
<div class="carousel slide" id="nameCarousel"><!-- Carousel items -->
<div class="carousel-inner">
<?php $first = 1; ?>
<?php while (have_posts()) : the_post(); ?>
  <div class="<?php if($first == 1){ $first = 0; ?>active <?php } ?> item">
  	<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
  </div>
<?php endwhile; ?>
</div>
<!-- Carousel nav -->
<a class="carousel-control left" href="#nameCarousel" data-slide="prev">‹</a>
<a class="carousel-control right" href="#nameCarousel" data-slide="next">›</a>

</div>
</section>

<script>
	$('.carousel').carousel('cycle');
</script>

<hr class="soften" />

