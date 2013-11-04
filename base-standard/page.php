<?php get_header(); ?>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> <!-- Page BreadCrumbs -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><!-- Start of the WordPress Loop -->

	<?php the_title() ;?> <!-- Page Title -->

	<?php the_content(); ?> <!-- Page Content -->

    <?php endwhile; ?>
	<?php else: ?>
	<?php endif; ?><!-- end of the WordPress loop -->

	<?php get_sidebar(); ?><!-- WordPress Sidebar -->

<?php get_footer(); ?>