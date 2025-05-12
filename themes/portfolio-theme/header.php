<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="loader">
      <div class="loader-dot"></div>
      <div class="loader-dot"></div>
      <div class="loader-dot"></div>
    </div>
    <nav class="navbar">
      <div class="navbar-logo">
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_theme_file_uri('/images/logo-quicksand.png'); ?>">
        </a>
      </div>
      <ul class="navbar-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="navbar-btn fa-solid fa-bars" aria-hidden="true"></i>
      <div class="navbar-mobile hidden" aria-hidden="true">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <ul class="navbar-show__social">
          <?php 
            $socials = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'social',
              'meta_key' => 'social_order', 
              'orderby' => 'meta_value_num',
              'order' => 'ASC'
            ));

            while($socials->have_posts()) {
              $socials->the_post(); ?>
              <li>
                <a href="<?php the_field('social_link') ?>" target="_blank">
                  <i class="<?php the_field('social_class') ?>"></i>
                </a>
              </li>
            <?php }
          ?>
        </ul>
      </div>
    </nav>
