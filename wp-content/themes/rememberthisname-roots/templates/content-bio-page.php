<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('vcard marketing') ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="entry-title fn"><?php the_title(); ?></h1>
        <div class="lifetime">
          <?php $birth = get_post_meta( get_the_ID(), 'rtn-date-of-birth', true );
                $birth = date('F j, Y', strtotime($birth));
                $death = get_post_meta( get_the_ID(), 'rtn-date-of-death', true );
                $death = date('F j, Y', strtotime($death));
                if ( $birth != '' and $death != '' ) { ?>
                  <time class="bday"><?php 
                    echo esc_html( $birth ); 
                  ?></time>-<time class="date-of-death"><?php 
                    echo esc_html( $death ); 
                  ?></time><?php
                }
          ?>
        </div>
    </header>
    <div class="entry-featured-image photo">
      <?php print wp_get_attachment_image(get_post_thumbnail_id(), 'medium'); ?>
    </div>
    <div class="entry-content note">
      <?php the_content(); ?>
      <div id="donations">
        <h3>Donations and Charities</h3>
        <div id="personal-donations">
          <?php meta('donations'); ?>
        </div>
        <div id="group-donations">
          <?php $cat = get_the_category(); $result = categoryCustomFields_GetCategoryCustomField($cat[0]->cat_ID,'donations'); 
              echo $result[0]->field_value;?>
        </div>
      </div>
      <div id="causes">
        <h3>Causes and Communities</h3>
        <div id="personal-causes">
          <?php meta('causes'); ?>
        </div>
        <div id="group-causes">
          <?php $result = categoryCustomFields_GetCategoryCustomField($cat[0]->cat_ID,'causes'); 
              echo $result[0]->field_value;?>
        </div>
      </div>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
<?php endwhile; ?>
