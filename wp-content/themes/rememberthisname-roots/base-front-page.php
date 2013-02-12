<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <?php
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div id="wrap" class="container" role="document">
    <div id="content" class="row">
      <div id="main" class="<?php echo roots_main_class(); ?>" role="main">
        <p class="lead">Will you remember this name?</p>
        <hr class="soften" />
        <?php include roots_template_path(); ?>
        
        <section class="marketing" id="samples">
        <div class="row">
        <div class="span4 offset4">
        <h2>Feedback</h2>
        If you find something that needs to be fixed.
        
        <a class="btn" href="mailto:feedback@rememberthisname.org">Contact Us »</a>

        <a class="btn" href="https://github.com/jaxzin/remember-this-name">Contribute »</a>
        
        </div>
        </section>
      </div>
      <?php if (roots_display_sidebar()) : ?>
      <aside id="sidebar" class="<?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php get_template_part('templates/sidebar'); ?>
      </aside>
      <?php endif; ?>
    </div><!-- /#content -->
  </div><!-- /#wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
