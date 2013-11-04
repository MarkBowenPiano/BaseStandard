<?php 
/*
Base Theme Options Admin Panel. 

Please only use this with Dijitul Sites. You'll only break stuff if you do.
*/

function pt_admin_css() { // css for PublishTheme Option Panel
  wp_enqueue_style('admin', get_template_directory_uri() . '/includes/css/admin.css');
}

add_action('admin_head', 'pt_admin_css');

function pt_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
}

function pt_admin_styles() {
wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'pt_admin_scripts');
add_action('admin_print_styles', 'pt_admin_styles');



function pt_create_menu_page() {

  add_menu_page(
    'Theme Options',
    'Theme Options',
    'administrator',
    'pt_menu',
    'pt_menu_page_display'
  );

  add_submenu_page(
    'Theme Options',
    'General',
    'General',
    'administrator',
    'pt_general_options',
    'pt_menu_page_display'
  );
}

add_action('admin_menu', 'pt_create_menu_page');

function pt_menu_page_display($active_tab = null) {
?>

<!-- Mark Up for the Publish Theme Admin Panel -->

<div class="pt_wrap">

  <!-- header -->

  <div class="pt_admin_header">
    
    <a href="?page=pt_menu"><img src="<?php bloginfo('template_directory'); ?>/includes/img/logo.png" alt="Publish Theme Admin"></a>
    
    <!-- active tabs -->
    <?php if(isset($_GET['tab'])) {
      $active_tab = $_GET['tab'];
    } elseif($active_tab == 'social_options') {
      $active_tab = 'social_options';
    } elseif ($active_tab == 'blog_options') {
      $active_tab == 'blog_options';
    } else {
      $active_tab = 'general_options';
    } // end if
    ?>

    <nav class="admin_navigation">

    <a href="?page=pt_menu&tab=general_options" class="pt_tabs first <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : '' ;?>">General</a>
    <a href="?page=pt_menu&tab=social_options" class="pt_tabs <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : '' ;?>">Social</a>
    <a href="?page=pt_menu&tab=blog_options" class="pt_tabs <?php echo $active_tab == 'blog_options' ? 'nav-tab-active' : '' ;?>">Blog</a>
    
    </nav>

  </div><!-- pt_admin_header -->

  <!-- Error Validation -->
    <?php settings_errors(); ?>

    <div class="pt_option_pane">

    <form method="post" action="options.php"  enctype="multipart/form-data">

      <?php 
        if ($active_tab == 'general_options') {

          settings_fields('pt_general_options');
          do_settings_sections('pt_general_options') ;

        } elseif ($active_tab == 'social_options') {

          $html = '<span class="homepageMod">Plus use the full urls, including http:// here.</span>';

          echo $html;

          settings_fields( 'pt_social_options' );
          do_settings_sections( 'pt_social_options' ); 
        
        } else {

          settings_fields('pt_blog_options');
          do_settings_sections('pt_blog_options');

        }// end if/else

        submit_button();

      ?>

    </form>

  </div><!-- options pane -->

</div><!-- pt_wrap -->

<?php }
?>

<?php
// Admin Functions


/* ------------------------------------------------
 * Setting Registration
 * -----------------------------------------------*/

function theme_option_initialize() {

  if( false == get_option('pt_general_options')) {
    add_option('pt_general_options');
  }

  add_settings_section(
      'general_settings_section',
      '',
      'publish_theme_callback',
      'pt_general_options'
    );

  add_settings_field (
      'pt_logo',
      'Logo',
      'pt_logo_callback',
      'pt_general_options',
      'general_settings_section'
  );

  add_settings_field (
      'pt_favicon',
      'Upload a Favicon',
      'pt_favicon_callback',
      'pt_general_options',
      'general_settings_section'
  );

  add_settings_field (
      'pt_googlea',
      'Google Analytics',
      'pt_googlea_callback',
      'pt_general_options',
      'general_settings_section'
  );

  add_settings_field (
      'pt_customcss',
      'Custom CSS',
      'pt_customcss_callback',
      'pt_general_options',
      'general_settings_section'
  );

  register_setting (
    'pt_general_options',
    'pt_general_options',
    'pt_validate_input_examples'
  );
}

add_action('admin_init', 'theme_option_initialize');

/* -------------------------------------------------
 * Initializing Social Section
 * ------------------------------------------------*/
function pt_intialize_social_options() {
 
    if( false == get_option( 'pt_social_options' ) ) {   
        add_option( 'pt_social_options');
    } // end if
    
    add_settings_section(
      'social_settings_section',
      '',
      'pt_social_options_callback',
      'pt_social_options'
    );

    add_settings_field(
      'twitter',
      'Twitter',
      'pt_twitter_callback',
      'pt_social_options',
      'social_settings_section'
    );

    add_settings_field(
      'facebook',
      'Facebook',
      'pt_facebook_callback',
      'pt_social_options',
      'social_settings_section'
    );

    add_settings_field(
      'googleplus',
      'Google+',
      'pt_googleplus_callback',
      'pt_social_options',
      'social_settings_section'
    );

    register_setting(
      'pt_social_options',
      'pt_social_options',
      'pt_sanitize_social_options'
    );

}
add_action( 'admin_init', 'pt_intialize_social_options' );

/* -------------------------------------------------
 * Initializing Blog Section
 * ------------------------------------------------*/

function publish_theme_intialize_input_examples() {
  if(false == get_option('pt_blog_options')) {
    add_option('pt_blog_options');
  } //end if

  add_settings_section(
    'blog_section',
    '',
    'pt_blog_options_callback',
    'pt_blog_options'
  );

  add_settings_field(
    'pt_blog_name',
    'Blog Name',
    'pt_blog_name_callback',
    'pt_blog_options',
    'blog_section'
  );

  add_settings_field(
    'pt_blog_desc',
    'Blog Description',
    'pt_blog_desc_callback',
    'pt_blog_options',
    'blog_section'
  );

  add_settings_field(
    'pt_blog_social',
    'Display Sharing Icons',
    'pt_blog_social_callback',
    'pt_blog_options',
    'blog_section'
  );

  add_settings_field(
    'pt_blog_comments',
    'Display Comments',
    'pt_blog_comments_callback',
    'pt_blog_options',
    'blog_section'
  );

  register_setting(
    'pt_blog_options',
    'pt_blog_options',
    'pt_validate_input_examples'
  );
}

add_action('admin_init', 'publish_theme_intialize_input_examples');
/* -------------------------------------------------
 * Section Callbacks
 * ------------------------------------------------*/

function publish_theme_callback() {
  // This is empty for a reason.
}

function pt_social_options_callback() {
  // This is empty for a reason.
}

function pt_blog_options_callback() {
  // This is empty for a reason.
}

/* -------------------------------------------------
 * Field Callbacks
 * ------------------------------------------------*/

function pt_logo_callback($args) {

  $options = get_option('pt_general_options');

    if(!isset($options['pt_logo']))
    $options['pt_logo'] = '';

  $html = '<span class="pt_description">Make sure this is an 
image called logo.png</span>';

  $html .= '<input type="text" id="pt_logo" name="pt_general_options[pt_logo]" value="' .$options['pt_logo'] .'"/>';

  echo $html;

}

function pt_color_scheme_callback($args) {

  $options = get_option('pt_general_options');

  if(!isset($options['colour_options']))
    $options['colour_options'] = '';

    $html = '<select id="colour_options" name="pt_general_options[colour_options]">';
    $html .='<option value="red"' . selected($options['colour_options'], 'red', false) . '>Red</option>';
    $html .='<option value="blue"' . selected($options['colour_options'], 'blue', false) . '>Blue</option>';
    $html .='<option value="yellow"' . selected($options['colour_options'], 'yellow', false) . '>Yellow</option>';
    $html .='<option value="green"' . selected($options['colour_options'], 'green', false) . '>Green</option>';
    $html .='<option value="pink"' . selected($options['colour_options'], 'pink', false) . '>Pink</option>';
  $html .= '</select>';
  
  echo $html;  
}
function pt_favicon_callback($args) {

  $options = get_option('pt_general_options');

  if(!isset($options['pt_favicon']))
    $options['pt_favicon'] = '';

  $html = '<span class="pt_description">Make sure this is a 32px by 32px 
image called favicon.ico</span>';

  $html .= '<input type="text" id="pt_favicon" name="pt_general_options[pt_favicon]" value="' .$options['pt_favicon'] .'"/>';

  echo $html;
}


function pt_googlea_callback() {
  $options = get_option('pt_general_options');

  if(!isset($options['pt_googlea']))
    $options['pt_googlea'] = '';

  $html = '<span class="pt_description">Login to your Google Analytics account and after creating your web site profile copy and paste the analytics code into this field.</span>';

  $html .= '<textarea id="pt_googlea" name="pt_general_options[pt_googlea]" rows="5" cols="50">' . $options['pt_googlea'] . '</textarea>';

  echo $html;
}

function pt_customcss_callback() {
  $options = get_option('pt_general_options');

  if(!isset($options['pt_customcss']))
    $options['pt_customcss'] = '';

  $html = '<span class="pt_description">Add your custom css here.</span>';

  $html .= '<textarea id="pt_customcss" name="pt_general_options[pt_customcss]" rows="5" cols="50">' . $options['pt_customcss'] . '</textarea>';

  echo $html;
}

// Social Options

function pt_twitter_callback() {
    $options = get_option('pt_social_options');

    if(!isset($options['twitter']))
    $options['twitter'] = '';

    $url = '';
    if( isset( $options['twitter'] ) ) {
        $url = $options['twitter'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="twitter" name="pt_social_options[twitter]" value="' . $options['twitter'] . '" />';
     
}

function pt_facebook_callback() {
    $options = get_option('pt_social_options');

    if(!isset($options['facebook']))
    $options['facebook'] = '';

    $url = '';
    if( isset( $options['facebook'] ) ) {
        $url = $options['facebook'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="facebook" name="pt_social_options[facebook]" value="' . $options['facebook'] . '" />';
     
}

function pt_googleplus_callback() {
    $options = get_option('pt_social_options');

    if(!isset($options['googleplus']))
    $options['googleplus'] = '';

    $url = '';
    if( isset( $options['googleplus'] ) ) {
        $url = $options['googleplus'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="googleplus" name="pt_social_options[googleplus]" value="' . $options['googleplus'] . '" />';
     
}

// Blog Options

function pt_blog_name_callback() {
  $options = get_option('pt_blog_options');

  if(!isset($options['pt_blog_name']))
    $options['pt_blog_name'] = '';

  $html = '<span class="pt_description">Your Blog Name will display at the top of your Blog Feed Page.</span>';

  $html .= '<input type="text" id="pt_blog_name" name="pt_blog_options[pt_blog_name]" value="' .$options['pt_blog_name'] .'"/>';

  echo $html;
}

function pt_blog_desc_callback() {
  $options = get_option('pt_blog_options');

  if(!isset($options['pt_blog_desc']))
    $options['pt_blog_desc'] = '';

  $html = '<span class="pt_description">A short description of your blog to display at the top of your blog page.</span>';

  $html .= '<input type="text" id="pt_blog_desc" name="pt_blog_options[pt_blog_desc]" value="' .$options['pt_blog_desc'] .'"/>';

  echo $html;
}

function pt_blog_social_callback() {
  $options = get_option('pt_blog_options');

  if(!isset($options['pt_blog_social']))
    $options['pt_blog_social'] = '';

  $html = '<span class="pt_description">Show Social sharing icons on posts. </span>';

  $html .= '<select id="pt_blog_social" name="pt_blog_options[pt_blog_social]">';
    $html .='<option value="yes"' . selected($options['pt_blog_social'], 'yes', false) . '>Yes</option>';
    $html .='<option value="no"' . selected($options['pt_blog_social'], 'no', false) . '>No</option>';
  $html .= '</select>';
  
  echo $html;  
}

function pt_blog_comments_callback() {
  $options = get_option('pt_blog_options');

  if(!isset($options['pt_blog_comments']))
    $options['pt_blog_comments'] = '';

  $html = '<span class="pt_description">Show comments on posts. </span>';

  $html .= '<select id="pt_blog_comments" name="pt_blog_options[pt_blog_comments]">';
    $html .='<option value="yes"' . selected($options['pt_blog_comments'], 'yes', false) . '>Yes</option>';
    $html .='<option value="no"' . selected($options['pt_blog_comments'], 'no', false) . '>No</option>';
  $html .= '</select>';
  
  echo $html;  
}

/* -------------------------------------------------
 * Validation
 * ------------------------------------------------*/

function pt_sanitize_social_options($input) {
  
  $output = array();

  foreach ($input as $key => $val) {
    if (isset($input[$key])) {
      $output[$key] = esc_url_raw(strip_tags(stripslashes($input[$key])));
    }
  } // end foreach

  return apply_filters('pt_sanitize_social_options', $output, $input);
}

function pt_validate_input_examples($input) {
   // Create array
  $output = array();

  // Loop incoming options
  foreach($input as $key => $value) {

    // check if options has a value
    if(isset($input[$key])) {
      // strips out html tags
      $output[$key] = esc_attr(strip_tags(stripslashes($input[$key])));
    } // end if
  } // end foreach

  return apply_filters('pt_validate_input_examples', $output, $input);
}
?>