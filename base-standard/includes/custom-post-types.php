<?php
/*
 *
 * Custom Post Types
 *
 * Add More as necessary before the closing } add the bottom of the page. 
*/
add_action('init', 'listing_register');
function listing_register() {
    register_post_type('Slider', array(
        'labels' => array(
            'name' => 'Slider',
            'singular_name' => 'Slide',
            'add_new' => 'Add Slide',
            'edit_item' => 'Edit Slide',
            'new_item' => 'New Slide',
            'view_item' => 'View Slide',
            'search_items' => 'Search Slides',
            'not_found' => 'No Slides found',
            'not_found_in_trash' => 'No Slides in Trash'
        ),
        'public' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail'
        ),
        'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
    ));
  }
?>