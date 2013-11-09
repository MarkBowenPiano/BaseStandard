<?php
/*
Template Name: Custom Post Type Template
*/
?>

<?php get_header(); ?>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?><!-- Post Loop Breadcrumbs -->

	<?php
    $query_args = array(
    'post_type' => '*Custom_Post_Type*',
    'posts_per_page' => 3
    );
    $loop = new WP_Query($query_args);
    while($loop->have_posts()) : $loop->the_post();
	?>
	<!-- Start of the WordPress Custom Loop
	Replace the *Custom_Post_Type* with the name of your Custom Post Type -->
	
	<?php the_title() ;?><!-- Post Title -->

	<?php the_excerpt(); ?><!-- Post Excerpt -->

    <?php endwhile; ?>

	<?php get_sidebar(); ?><!-- WordPress Sidebar -->

<?php get_footer(); ?>