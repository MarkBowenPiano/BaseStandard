<?php
/*
Template Name: Custom Post Type Template
*/
?>

<?php get_header(); ?>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?><!-- Post Loop Breadcrumbs -->

	<?php if (have_posts()) : ?>
			
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts('post_type=*Custom_Post_Type*&posts_per_page=10&paged='. $paged ); ?>

	<?php while (have_posts()) : the_post(); ?><!-- Start of the WordPress Custom Loop
													Replace the *Custom_Post_Type* with the name of your Custom Post Type -->
	
	<?php the_title() ;?><!-- Post Title -->

	<?php the_excerpt(); ?><!-- Post Excerpt -->

    <?php endwhile; ?>
	<?php else: ?>
	<?php endif; ?><!-- end of WordPress loop -->

	<?php get_sidebar(); ?><!-- WordPress Sidebar -->

<?php get_footer(); ?>