<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('vcard') ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="entry-title fn"><?php the_title(); ?></h1>
        <div>
          <?php $birth = get_post_meta( get_the_ID(), 'rtn-date-of-birth', true );
                $death = get_post_meta( get_the_ID(), 'rtn-date-of-death', true );
                if ( $birth != '' and $death != '' ) { ?>
                  <time class="bday"><?php echo esc_html( $birth ); ?>
                  -
                  <time class="date-of-death"><?php echo esc_html( $death ); 
                }
          ?>
        </div>
    </header>
    <div class="entry-featured-image photo">
      <?php print wp_get_attachment_image(get_post_thumbnail_id(), 'medium'); ?>
    </div>
    <div class="entry-content note">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
<?php endwhile; ?>
