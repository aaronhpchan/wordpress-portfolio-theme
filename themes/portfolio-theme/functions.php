<?php

/* load CSS and JS files */
function portfolio_files() {
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900');
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
  wp_enqueue_style('portfolio_styles', get_stylesheet_uri());
  wp_enqueue_script('portfolio-js', get_theme_file_uri('/src/index.js'), NULL, '1.0', true);
}
add_action('wp_enqueue_scripts', 'portfolio_files');

/* set browser title */
// enable featured image
function portfolio_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'portfolio_features');

?>