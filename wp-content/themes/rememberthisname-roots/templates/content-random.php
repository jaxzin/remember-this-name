<?php
	$random_post = new WP_query(); 
	$random_post->query('showposts=1&orderby=rand');
	while ($random_post->have_posts()) : $random_post->the_post(); ?>
    	<h1><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></h1>
	    <div class="entry-featured-image photo">
	    	<a href="<?php echo get_permalink() ?>">
		    	<?php print wp_get_attachment_image(get_post_thumbnail_id(), array(150,150)); ?>
			</a>
	    </div>
        <div>
          <?php $birth = get_post_meta( get_the_ID(), 'rtn-date-of-birth', true );
                $birth = date('F j, Y', strtotime($birth));
                $death = get_post_meta( get_the_ID(), 'rtn-date-of-death', true );
                $death = date('F j, Y', strtotime($death));
                if ( $birth != '' and $death != '' ) { ?>
                  <time class="bday"><?php echo esc_html( $birth ); ?>
                  -
                  <time class="date-of-death"><?php echo esc_html( $death ); 
                }
          ?>
        </div>
        <div>
        	<?php the_content(); ?>
        </div>
	<?php
    endwhile;
?>
