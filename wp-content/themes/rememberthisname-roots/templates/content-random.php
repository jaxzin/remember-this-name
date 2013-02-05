<?php
	$random_post = new WP_query(); 
	$random_post->query('showposts=1&orderby=rand');
	while ($random_post->have_posts()) : $random_post->the_post(); ?>
    	<h1><?php the_title() ?></h1>
        <div>
        	<?php the_content(); ?>
        </div>
	<?php
    endwhile;
?>
