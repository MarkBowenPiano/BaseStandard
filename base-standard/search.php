<?php get_header(); ?>

    Search Result for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('articles'); wp_reset_query(); ?><!-- To display the search term for the user and the number of results -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><!-- Start of the WordPress Loop -->
		
	<?php the_title() ;?><!-- Post/Page Title -->
			
	<?php the_time('F j, Y'); ?><!-- Post Date -->
	
	<?php the_excerpt(); ?><!-- Post/Page Excerpt -->
            
	<?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?><!-- end of the WordPress Loop -->
            
    <?php get_sidebar(); ?>
            
<?php get_footer(); ?>