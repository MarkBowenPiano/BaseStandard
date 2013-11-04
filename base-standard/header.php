<!DOCTYPE html>



<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


	<?php if (is_search()) { ?>


	<?php } ?>

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	<?php $display_options = get_pt_display_options(); ?>

	<?php if(isset($display_options['pt_favicon'])) { ?>
	<link rel="shortcut icon" href="<?php echo sanitize_text_field($display_options['pt_favicon']); ?>" type="image/x-icon" />
	<?php } else { ?>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
	<?php } ?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />


   <!-- IE Fixes -->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->

<!--[if IE 9]><link href="<?php bloginfo('template_directory'); ?>/css/ie9.css" rel="stylesheet" type="text/css" /><![endif]-->

<!--[if IE 8]><link href="<?php bloginfo('template_directory'); ?>/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->

<!--[if IE 7]><link href="<?php bloginfo('template_directory'); ?>/css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<style type="text/css">
	<?php if(isset($display_options['pt_customcss'])) { 
		echo sanitize_text_field($display_options['pt_customcss']);
	} ?>
	</style>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

	<?php wp_head(); ?>

	<script type="text/javascript">
	<?php if(isset($display_options['pt_googlea'])) { 
		echo sanitize_text_field($display_options['pt_googlea']);
	} ?>
	</script>
</head>

<body <?php body_class($class); ?>>

		<?php if(isset($display_options['pt_logo'])) { ?>
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="logo"><img src="<?php echo sanitize_text_field($display_options['pt_logo']); ?>" alt="<?php bloginfo('name'); ?>"></a>
		<?php } else { ?>
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a>
		<?php } ?>

		<?php wp_nav_menu( array(
			 'theme_location' => 'header-menu',
			 'container' =>false,
			 'menu_class' => 'nav',
			 'echo' => true,
			 'before' => '',
			 'after' => '',
			 'link_before' => '',
			 'link_after' => '',
			 'depth' => 0,
			 'walker' => new description_walker())
		); ?> <!-- WordPress Menu Structure -->


 <?php get_template_part('/includes/social-icons', ''); ?> 