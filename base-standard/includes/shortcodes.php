<?php
/*
* Shortcodes for Column Layouts
*/

// Half Column
function columnHalf_shortcode( $atts, $content = null ) {
	return '<div class="column_half">' . $content . '</div>';
}
add_shortcode( 'column_half', 'columnHalf_shortcode' );

// One Third Column
function columnThird_shortcode( $atts, $content = null ) {
	return '<div class="column_third">' . $content . '</div>';
}
add_shortcode( 'column_third', 'columnThird_shortcode' );

// Two Thirds Column
function columnTwothirds_shortcode( $atts, $content = null ) {
	return '<div class="column_two_thirds">' . $content . '</div>';
}
add_shortcode( 'column_two_thirds', 'columnTwothirds_shortcode' );

// Two Thirds Column
function columnQuarter_shortcode( $atts, $content = null ) {
	return '<div class="column_quarter">' . $content . '</div>';
}
add_shortcode( 'column_quarter', 'columnQuarter_shortcode' );


// Testimonials Short Code 
function add_shortcode_testimonials( $atts, $content ){
	global $add_tabs_script;$add_tabs_script=true;
	$GLOBALS['testimonial_count'] = 0;
	do_shortcode( $content );
	if( is_array( $GLOBALS['testimonials'] ) ){
		foreach( $GLOBALS['testimonials'] as $testimonial ){
			$tesimonials[] = '<div class="testimonial-item"><div class="testimonial-content">'.$testimonial['content'].'</div><div class="testimonial-author">'.$testimonial['author'].'</div></div>';
		}
		$output = '<div class="testimonialBlock"><div id="testimonials-wrapper">'.do_shortcode(implode( "\n", $tesimonials )).'</div><a id="prev2" href="#">Prev</a><a id="next2" href="#">Next</a></div>';
	}
	return $output;	
}
add_shortcode( 'testimonial-group', 'add_shortcode_testimonials' );
function add_shortcode_tesimontial( $atts, $content ){
	extract(shortcode_atts(array(
	'author' => ''
	), $atts));
	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array( 'author' => sprintf( $author, $GLOBALS['testimonial_count'] ), 'content' =>  $content );
	$GLOBALS['testimonial_count']++;
}
add_shortcode( 'testimonial', 'add_shortcode_tesimontial' );
// Script Enqueue
// 
// 
function dijitul_scripts() {
	if(is_admin()) return false;
	wp_enqueue_script('slider', plugins_url('/dijitul_testimonials/js/slider.js'));
	wp_enqueue_script('jquery.cycle.all', plugins_url('/dijitul_testimonials/js/jquery.cycle.all.js'));
}
add_action('wp_enqueue_scripts', 'dijitul_scripts');
function dijitul_styles()  
{ 
  wp_register_style( 'custom-style', plugins_url('/dijitul_testimonials/css/custom-style.css'));
  // enqueing:
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'dijitul_styles');

?>