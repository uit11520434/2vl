<?php 

/*
Plugin Name: R-scroll-up
Plugin URI: http://pristine-bd.com/r-scroll-up/
Description: Scroll Up plugin is Simple  wordpress plugin for scroll to top one click. 
Author: Rasel
Version: 1.0
Author URI: http://pristine-bd.com/
*/



// load jquery.scrollUp.js
 function rasel_rsu_js_file() {
	wp_enqueue_script('rasel_rsu_js_file',plugins_url( '/js/jquery.scrollUp.js' , __FILE__ ),array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'rasel_rsu_js_file' );

// load jquery.scrollUp Controls 
 function rasel_rsu_js_Controls() {
 	
 ?>

<script>
	jQuery(document).ready(function($) {
	$.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '<?php $options = get_option('plugin_options'); if(  $options['r_scrollup_topDistance'] == '' ) {echo '300';} else { echo  $options['r_scrollup_topDistance'];} ?>', // Distance from top before showing element (px)
    topSpeed:'<?php $options = get_option('plugin_options'); if(  $options['r_scrollup_topSpeed'] == '' ) {echo '300';} else { echo  $options['r_scrollup_topDistance'];} ?>', // Speed back to top (ms)
    animation: '<?php $options = get_option('plugin_options'); echo $options['r_scrollup_animation'];  ?>', // Fade, slide, none
    animationInSpeed: '<?php $options = get_option('plugin_options'); if(  $options['r_scrollup_animationInSpeed'] == '' ) {echo 200;} else { echo  $options['r_scrollup_animationInSpeed'];} ?>', // Animation in speed (ms)
    animationOutSpeed: '<?php $options = get_option('plugin_options'); if(  $options['r_scrollup_animationOutSpeed'] == '' ) {echo 200;} else { echo  $options['r_scrollup_animationOutSpeed'];} ?>', // Animation out speed (ms)
    scrollText: '<?php $options = get_option('plugin_options'); if(  $options['r_scrollup_text'] == '' ) {echo 'Top';} else { echo  $options['r_scrollup_text'];} ?>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });
});
</script>

<?php
}

add_action( 'wp_head', 'rasel_rsu_js_Controls' );

// load css file
function rasel_rsu_main_style_css() {
	$options = get_option('plugin_options'); 
	if ($options['r_scrollup_type'] == '') {
		$options['r_scrollup_type'] = 'image';
			}
	wp_enqueue_style('theme_style_css',plugins_url( '/css/themes/'.$options['r_scrollup_type'].'.css' , __FILE__ ),array(), '', 'all');

}

add_action( 'wp_enqueue_scripts', 'rasel_rsu_main_style_css' );


// Scroll up position and image 
function rasel_rsu_position () {
?>
<script>
	jQuery(document).ready(function($) {
		
	/*	$('#scrollUp').css({'bottom':'<?php $options = get_option('plugin_options'); echo  $options['r_scrollup_bottom_to_top_position']; ?>','right':'<?php $options = get_option('plugin_options'); echo  $options['r_scrollup_right_to_left_position']; ?>'});  */
				

		 <?php
		$options = get_option('plugin_options'); 

		 if ($options['r_scrollup_type'] == 'image') { $select_image_name =$options['r_scrollup_img_select']; } ?>


		  var select_image_name = '<?php $options = get_option('plugin_options'); echo $options['r_scrollup_type']; 
		  							 if ($options['r_scrollup_type'] == 'image') 
		  							 	{ $select_image_name =$options['r_scrollup_img_select']; 
		  								}
		  							 ?>';

		 if(select_image_name == 'image') {
			$('#scrollUp').css({'background':'url("<?php echo plugins_url( '/img/'.$select_image_name.'.png' , __FILE__ ) ?>")'}); }	 

		
		
	});
</script>
 <?php
}
add_action('wp_footer', 'rasel_rsu_position');


// Change image 
function rasel_rsu_image_change () {
	?>
<script>
	jQuery(document).ready(function($) {
		
		$('#scrollUp').css({'bottom':'<?php $options = get_option('plugin_options'); echo  $options['r_scrollup_bottom_to_top_position']; ?>','right':'<?php $options = get_option('plugin_options'); echo  $options['r_scrollup_right_to_left_position']; ?>'}); 		
		
	});
</script>
<?php
}
add_action('wp_footer', 'rasel_rsu_image_change');

require_once('inc/settings.php');

?>