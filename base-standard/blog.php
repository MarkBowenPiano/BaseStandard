<?php
/*
Template Name: Blog Feed
*/
?>

<?php get_header(); ?>

	<?php $blog_options = get_pt_blog_options(); ?>

	<h1><?php echo sanitize_text_field($blog_options['pt_blog_name']); ?></h1>

	<h2><?php echo sanitize_text_field($blog_options['pt_blog_desc']); ?></h2>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?><!-- Post Loop Breadcrumbs -->

	<?php if (have_posts()) : ?>
			
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts('post_type=post&posts_per_page=10&paged='. $paged ); ?>

	<?php while (have_posts()) : the_post(); ?><!-- Start of the WordPress Custom Loop
													Replace the *Custom_Post_Type* with the name of your Custom Post Type -->
	
	<?php the_title() ;?><!-- Post Title -->

	<?php the_excerpt(); ?><!-- Post Excerpt -->

    <?php endwhile; ?>
	<?php else: ?>
	<?php endif; ?><!-- end of WordPress loop -->

	<?php get_sidebar(); ?><!-- WordPress Sidebar -->

<?php get_footer(); ?>