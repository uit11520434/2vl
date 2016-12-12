<?php 
// option menu page name 
function rasel_rsu_menu () {
	add_menu_page('R Scroll up Options Page', 'R Scroll up', 'manage_options', 'r-scrollup-options', 'r_scrollup_options_cb_function');
	 add_submenu_page( 'r-scrollup-options', 'Main Settings', 'Main Settings', 'manage_options', 'r-scrollup-options', 
    	'r_scrollup_options_cb_function' );
}
add_action('admin_menu', 'rasel_rsu_menu');

function r_scrollup_options_general_settings_cb() {

}

function r_scrollup_options_cb_function () { 
?>

	<div class="wrap">
		<h2>R Scroll up Options Page</h2>

		<form action="options.php" method="post">


			<?php 

			settings_fields('rasel_rsu_section');
			settings_fields('rasel_rsu_section_2');

			do_settings_sections('r-scrollup-options'); 

			submit_button();
			?>

		</form>


	</div>
<?php
}

function r_scrollup_options_setting_register () {
	add_settings_section('rasel_rsu_section', 'General Settings', 'rasel_rsu_section_cb', 'r-scrollup-options' );
	add_settings_section('rasel_rsu_section_2', 'Select Your ScrollUp Image ( If ScrollUp Type = Image )', 'rasel_rsu_section_2_cb', 'r-scrollup-options' );
	//add_settings_section( $id, $title, $callback, $page );
	add_settings_field('r_scrollup_type', 'ScrollUp Type', 'r_scrollup_type_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_text', 'Text', 'r_scrollup_text_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_topDistance', 'Top Distance', 'r_scrollup_topDistance_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_topSpeed', 'Top Speed', 'r_scrollup_topSpeed_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_animation', 'Animation', 'r_scrollup_animation_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_animationInSpeed', 'Animation In Speed', 'r_scrollup_animationInSpeed_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_animationOutSpeed', 'Animation Out Speed', 'r_scrollup_animationOutSpeed_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_bottom_to_top_position', 'Position (Bottom to Top)', 'r_scrollup_bottom_to_top_position_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_right_to_left_position', 'Position (Right to Left)', 'r_scrollup_right_to_left_position_cb', 'r-scrollup-options', 'rasel_rsu_section');
	add_settings_field('r_scrollup_img_select', 'Select Your Image', 'r_scrollup_img_select_cb', 'r-scrollup-options', 'rasel_rsu_section_2');
	//add_settings_field( $id, $title, $callback, $page, $section, $args );
	register_setting('rasel_rsu_section', 'plugin_options');
	register_setting('rasel_rsu_section_2', 'plugin_options');

}

add_action('admin_init', 'r_scrollup_options_setting_register');


//Setting section callback
function rasel_rsu_section_cb() {
	 
}
function rasel_rsu_section_2_cb() {
	 
}
// ------Settings field Callback-------------//
function r_scrollup_type_cb () {
	  $options = get_option( 'plugin_options' );
     
    $html = '<select id="r_scrollup_type" name="plugin_options[r_scrollup_type]">';
        $html.= '<option value="image"'  . selected( $options['r_scrollup_type'], 'image', false) . ' >Image</option>';
        $html.= '<option value="link"' . selected( $options['r_scrollup_type'], 'link', false) . '>Link</option>';
        $html.= '<option value="pill"' . selected( $options['r_scrollup_type'], 'pill', false) . '>Pill</option>';
        $html.= '<option value="tab"' . selected( $options['r_scrollup_type'], 'tab', false) . '>Tab</option>';
    $html.= '</select>';
    $html.= '<p class="description">Set ScrollUp Type : Image, Link, Pill, Tab. Default= Image </p>';
     
    echo $html;
		 
}

function r_scrollup_text_cb () {
$options = get_option('plugin_options');
echo '<input id="r_scrollup_text" name="plugin_options[r_scrollup_text]" size="40" type="text" value="'.$options['r_scrollup_text'].'"/><p class="description">Text for element. Default= Top </p>';
}

function r_scrollup_topDistance_cb () {
$options = get_option('plugin_options');
echo '<input id="r_scrollup_text" name="plugin_options[r_scrollup_topDistance]" size="40" type="text" value="'.$options['r_scrollup_topDistance'].'"/>
		 <p class="description">Distance from top before showing element (px). Default= 300 </p>';	
}

function r_scrollup_topSpeed_cb () {
	$options = get_option('plugin_options');
	echo '<input id="r_scrollup_topSpeed" name="plugin_options[r_scrollup_topSpeed]" size="40" type="text" value="'.$options['r_scrollup_topSpeed'].'"/>
		 <p class="description">Speed back to top (ms). Default= 300 </p>';	
}

function r_scrollup_animation_cb () {
	  $options = get_option( 'plugin_options' );
     
    $html = '<select id="r_scrollup_animation" name="plugin_options[r_scrollup_animation]">';
        $html.= '<option value="fade"' . selected( $options['r_scrollup_animation'], 'fade', false) . '>Fade</option>';
        $html.= '<option value="slide"' . selected( $options['r_scrollup_animation'], 'slide', false) . '>Slide</option>';
        $html.= '<option value="none"' . selected( $options['r_scrollup_animation'], 'none', false) . '>None</option>';
    $html.= '</select>';
    $html.= '<p class="description">Fade, slide, none. Default= Fade </p>';
     
    echo $html;
		 
}

function r_scrollup_animationInSpeed_cb () {
	$options = get_option('plugin_options');
	echo '<input id="r_scrollup_topSpeed" name="plugin_options[r_scrollup_animationInSpeed]" size="40" type="text" value="'.$options['r_scrollup_animationInSpeed'].'"/><p class="description">Animation in speed (ms). Default= 200 </p>';	
}

function r_scrollup_animationOutSpeed_cb () {
	$options = get_option('plugin_options');
	echo '<input id="r_scrollup_animationOutSpeed" name="plugin_options[r_scrollup_animationOutSpeed]" size="40" type="text" 
	value="'.$options['r_scrollup_animationOutSpeed'].'"/><p class="description">Animation Out speed (ms). Default= 200 </p>';	
}

function r_scrollup_bottom_to_top_position_cb () {
	$options = get_option('plugin_options');
	echo '<input id="r_scrollup_bottom_to_top_position" name="plugin_options[r_scrollup_bottom_to_top_position]" size="40" type="text" 
	value="'.$options['r_scrollup_bottom_to_top_position'].'"/><p class="description">Position Botom to To. Use % or px. </p>';	
} 

function r_scrollup_right_to_left_position_cb () {
	$options = get_option('plugin_options');
	echo '<input id="r_scrollup_right_to_left_position" name="plugin_options[r_scrollup_right_to_left_position]" size="40" type="text" 
	value="'.$options['r_scrollup_right_to_left_position'].'"/><p class="description">Position Right to Left. Use % or px. </p>';	
} 

function r_scrollup_img_select_cb () {
 $options = get_option( 'plugin_options' );
     


     $html = '<input type="radio" id="r_scrollup_img_select" style="width:30px; height:30px;" checked name="plugin_options[r_scrollup_img_select]" value="2"' . checked( 2, $options['r_scrollup_img_select'], false ) .  ' />';
    $html .= ' <img calss="scrollup_sl_img" style="width:30px; height:30px;" src="'.plugins_url( '../img/2.png' , __FILE__ ).'" alt="">&nbsp;&nbsp;';




     $html .= '<input type="radio" id="r_scrollup_img_select" style="width:30px; height:30px;" name="plugin_options[r_scrollup_img_select]" value="4"' . checked( 4, $options['r_scrollup_img_select'], false ) .  ' />';
    $html .= ' <img calss="scrollup_sl_img" style="width:30px; height:30px;" src="'.plugins_url( '../img/4.png' , __FILE__ ).'" alt="">&nbsp;&nbsp;';


	 $html .= '<input type="radio" id="r_scrollup_img_select" style="width:30px; height:30px;" name="plugin_options[r_scrollup_img_select]" value="5"' . checked( 5, $options['r_scrollup_img_select'], false ) .  ' />';
    $html .= ' <img calss="scrollup_sl_img" style="width:30px; height:30px;" src="'.plugins_url( '../img/5.png' , __FILE__ ).'" alt="">&nbsp;&nbsp;';     
 
    echo $html; 
} 

?>