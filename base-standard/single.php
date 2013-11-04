<?php get_header(); ?>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?><!-- Post BreadCrumbs -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><!-- Start of the WordPress Loop -->

	<?php the_title() ;?><!-- Post Title -->

	<?php the_content(); ?><!-- Post Content -->

	<?php the_time('F j, Y'); ?><!-- Post Data -->

	<?php $blog_options = get_pt_blog_options(); ?>

	<?php if(isset($blog_options['pt_blog_social'] == 'yes')) { ?>
	
	<span class='st_sharethis_large' displayText='ShareThis'></span>
	<span class='st_facebook_large' displayText='Facebook'></span>
	<span class='st_twitter_large' displayText='Tweet'></span>
	<span class='st_linkedin_large' displayText='LinkedIn'></span>
	<span class='st_pinterest_large' displayText='Pinterest'></span>
	<span class='st_email_large' displayText='Email'></span>

	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "25902510-a4d7-4854-8a03-f1a2eeda6a66", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
	<?php } ?>

	<?php if(isset($blog_options['pt_blog_comments'] == 'yes')) { ?>
    <?php comments_template( '', true ); ?><!-- WordPress Comments for the Post -->
   	<?php } ?>

	<?php endwhile; ?>
   	<?php else: ?>
	<?php endif; ?><!-- end of WordPress loop -->

   	<?php get_sidebar(); ?><!-- WordPress Sidebar -->

<?php get_footer(); ?>