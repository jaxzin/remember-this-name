<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
        <div>
          <strong>Date of Birth: </strong>
          <?php echo esc_html( get_post_meta( get_the_ID(), 'rtn-date-of-birth', true ) ); ?>
        </div>
        <div>
          <strong>Date of Death: </strong>
          <?php echo esc_html( get_post_meta( get_the_ID(), 'rtn-date-of-death', true ) ); ?>
        </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
<?php endwhile; ?>
