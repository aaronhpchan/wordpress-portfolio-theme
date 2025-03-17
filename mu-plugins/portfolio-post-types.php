<?php

// create custom post type
function portfolio_post_types() {
  // About post type
  register_post_type('about', array(
    'public' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_icon' => 'dashicons-format-status',
    'capability_type' => 'post',
    'capabilities' => array(
      'create_posts' => 'do not allow',
      'delete_published_posts' => 'do not allow' 
    ),
    'map_meta_cap' => true, // if set to false then standard admin role can’t edit
    'labels' => array(
      'name' => 'About',
      'edit_item' => 'Edit About'
    )
  ));

  // Skill post type
  register_post_type('skill', array(
    'public' => true,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-businessman',
    'labels' => array(
      'name' => 'Skills',
      'singular_name' => 'Skill',
      'add_new' => 'Add New Skill',
      'add_new_item' => 'Add New Skill',
      'edit_item' => 'Edit Skill',
      'all_items' => 'All Skills'
    )
  ));

  // Project post type
  register_post_type('project', array(
    'public' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'menu_icon' => 'dashicons-portfolio',
    'labels' => array(
      'name' => 'Projects',
      'singular_name' => 'Project',
      'add_new' => 'Add New Project',
      'add_new_item' => 'Add New Project',
      'edit_item' => 'Edit Project',
      'all_items' => 'All Projects'
    )
  ));

  // Social post type
  register_post_type('social', array(
    'public' => true,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-networking',
    'labels' => array(
      'name' => 'Socials',
      'singular_name' => 'Social',
      'add_new' => 'Add New Social',
      'add_new_item' => 'Add New Social',
      'edit_item' => 'Edit Social',
      'all_items' => 'All Socials'
    )
  ));
}

add_action('init', 'portfolio_post_types');

?>