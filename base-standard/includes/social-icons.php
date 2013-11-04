<?php
// For Displaying Social icons and accounts as completed in the Theme Options of this framework. Change the icons in the theme /img folder. 

// get_template_path(); is located in the header.php that display content in this file. Move this to where you need it in the theme.
?>

<?php $social_options = get_pt_social_options() ?>

<?php if(isset($social_options['twitter'])) { ?>

	<a href="<?php echo $social_options['twitter']; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt="Twitter"></a>

<?php } ?>

<?php if(isset($social_options['facebook'])) { ?>

	<a href="<?php echo $social_options['facebook']; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt="Facebook"></a>

<?php } ?>

<?php if(isset($social_options['googleplus'])) { ?>

	<a href="<?php echo $social_options['googleplus']; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/google-plus.png" alt="Google Plus"></a>

<?php } ?>