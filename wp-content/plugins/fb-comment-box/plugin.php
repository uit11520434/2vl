<?php
/**
 * Plugin Name: Facebook Comment Box
 * Description: This WordPress plugin will help you to display Facebook Comments on your website. You can use Facebook Comments box on your pages/posts
 * Plugin URI: http://plugin.rayhan.info
 * Author: King Rayhan
 * Author URI: http://www.facebook.com/rayhan.info
 * Version: 1.0.1
 * License: GPL2
 *
 */
/**
 * Copyright (c) 2016 | rayhan095@gmail.com | All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */
// Cannot access pages directly.
if ( ! defined( 'ABSPATH' ) ) { die; }


add_action('admin_footer',function(){
	?>
<script>
	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title1]"]').hide();
	jQuery('[name="facebook_comment_box_settings_styles[settings_section_title1]"]').hide()
	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title1]"]')
		.parent()
		.parent()
		.prepend('<h2 style="font-size:25px;color: #45619D;width:375px">Header label styles</h2>');

	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title2]"]').hide();
	jQuery('[name="facebook_comment_box_settings_styles[settings_section_title2]"]').hide()
	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title2]"]')
		.parent()
		.parent()
		.prepend('<h2 style="font-size:25px;color: #45619D;width:375px">Comment box container Styles</h2>');


	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title3]"]').hide();
	jQuery('[name="facebook_comment_box_settings_styles[settings_section_title3]"]').hide()
	jQuery('[for="facebook_comment_box_settings_styles[settings_section_title3]"]')
		.parent()
		.parent()
		.prepend('<h2 style="font-size:25px;color: #45619D;width:375px">Comment box Styles</h2>');

</script>
	<?php
});

	//-----------------------------------------------------------------------------------
	//  Plugin Settings page
	//-----------------------------------------------------------------------------------
	require_once dirname( __FILE__ ) . '/class.settings-api.php';
	require_once dirname( __FILE__ ) . '/comment-box-settings.php';
	new facebook_comment_box_plugin();

	
  /**----------------------------------------------------------------------------------
   *
   *  Include facebook header script
   * 
   *-----------------------------------------------------------------------------------*/
  add_action('wp_head',function(){
  	$facebook_comment_box_app_id = fbcb_option('fb_app_id','facebook_comment_box_settings');
?>
  	<!--=================================================================================
  			Facebook Comment box header script
  			plugin url: http://plugin.rayhan.info/facebook-comment-box/
  	=================================================================================-->
  	<meta property="fb:app_id" content="<?php echo $facebook_comment_box_app_id; ?>" />
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=<?php echo $facebook_comment_box_app_id; ?>";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	</script>
	<!-- Facebook comment box style -->
	<style>
		.fbcb_leave_cmnt_label{
			padding: 15px;
			font-weight: <?php echo fbcb_option('fbcb_header_label_font_weight','facebook_comment_box_settings_styles','bold'); ?>;
			font-size: <?php echo fbcb_option('fbcb_header_label_font_size','facebook_comment_box_settings_styles','35px'); ?>;
			text-align: <?php echo fbcb_option('fbcb_header_label_font_align','facebook_comment_box_settings_styles','center'); ?>;
			color: <?php echo fbcb_option('fbcb_header_label_font_color','facebook_comment_box_settings_styles','#000'); ?>;
		}
		.fbcb_container{
			padding: <?php echo fbcb_option('fbcb_box_container_padding','facebook_comment_box_settings_styles'); ?>;
			background-color: <?php echo fbcb_option('fbcb_box_container_bg','facebook_comment_box_settings_styles'); ?>;
			background-image: url(<?php echo fbcb_option('fbcb_box_container_bg_img','facebook_comment_box_settings_styles'); ?>);
			background-repeat: <?php echo fbcb_option('fbcb_box_container_bg_img_repeat','facebook_comment_box_settings_styles','repeat'); ?>;
			background-position: <?php echo fbcb_option('fbcb_box_container_bg_img_pos','facebook_comment_box_settings_styles','top center'); ?>;
			background-attachment: <?php echo fbcb_option('fbcb_box_container_bg_img_attachment','facebook_comment_box_settings_styles','scroll'); ?>;
			background-size: <?php echo fbcb_option('fbcb_box_container_bg_size','facebook_comment_box_settings_styles','auto'); ?>;
		}
		.fb-comments{
			padding: <?php echo fbcb_option('fbcb_box_padding','facebook_comment_box_settings_styles'); ?>;
			background-color: <?php echo fbcb_option('fbcb_box_bg','facebook_comment_box_settings_styles'); ?>;
			background-image: url(<?php echo fbcb_option('fbcb_box_bg_img','facebook_comment_box_settings_styles'); ?>);
			background-repeat: <?php echo fbcb_option('fbcb_box_bg_img_repeat','facebook_comment_box_settings_styles','repeat'); ?>;
			background-position: <?php echo fbcb_option('fbcb_box_bg_img_pos','facebook_comment_box_settings_styles','top center'); ?>;
			background-attachment: <?php echo fbcb_option('fbcb_box_bg_img_attachment','facebook_comment_box_settings_styles','scroll'); ?>;
			background-size: <?php echo fbcb_option('fbcb_box_bg_size','facebook_comment_box_settings_styles','auto'); ?>;
		}
	</style>
	<!--
			Facebook Comment Box
	=================================================================================-->

  	<?php
  });

function facebook_comment_box_show($content) {
	$show_in_page = fbcb_option('show_in_page','facebook_comment_box_settings');
	$show_in_post = fbcb_option('show_in_post','facebook_comment_box_settings');
	// Show comment box in post
	if ( is_single() && $show_in_post == 'on' ) {
		$fb_cemment_box = '<div class="fbcb_container" align="'.fbcb_option('fbcb_box_align','facebook_comment_box_settings').'" style="background-color:'.fbcb_option('fbcb_box_container_bg','facebook_comment_box_settings').';padding:15px;"
			>
		<h3 class="fbcb_leave_cmnt_label">'.fbcb_option('fbcb_header_lebel','facebook_comment_box_settings','Leave a comment').'</h3>
			<div 
				class="fb-comments"
				colorscheme="'.fbcb_option('fbcb_color_scheme','facebook_comment_box_settings','light').'"
				data-width="'.fbcb_option('fbcb_width','facebook_comment_box_settings','550px').'"
				data-href="'.get_the_permalink().'" 
				data-numposts="'.fbcb_option('fbcb_comment_per_page','facebook_comment_box_settings',5).'"

				></div>
			</div>';
			$content .= $fb_cemment_box;
	}
	// Show comment box in page
	if ( is_page() && $show_in_page == 'on' ) {
		$fb_cemment_box = '<div class="fbcb_container" align="'.fbcb_option('fbcb_box_align','facebook_comment_box_settings','left').'" style="background-color:'.fbcb_option('fbcb_box_container_bg','facebook_comment_box_settings').';padding:15px;"
			>
		<h3 class="fbcb_leave_cmnt_label">'.fbcb_option('fbcb_header_lebel','facebook_comment_box_settings','Leave a comment').'</h3>
			<div 
				class="fb-comments"
				colorscheme="'.fbcb_option('fbcb_color_scheme','facebook_comment_box_settings','light').'"
				data-width="'.fbcb_option('fbcb_width','facebook_comment_box_settings','550px').'"
				data-href="'.get_the_permalink().'" 
				data-numposts="'.fbcb_option('fbcb_comment_per_page','facebook_comment_box_settings',5).'"

				></div>
			</div>';
			$content .= $fb_cemment_box;
	}
	
	return $content;
}
add_filter('the_content', 'facebook_comment_box_show');
	







/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */


	function fb_comment_box_dashboard_widget() {

		wp_add_dashboard_widget(
	                 'fb_comment_box_dashboard_widget_slug',         // Widget slug.
	                 'Facebook Comment Box',         // Title.
	                 'fb_comment_box_dashboard_widget_function' // Display function.
	        );	
	}
	add_action( 'wp_dashboard_setup', 'fb_comment_box_dashboard_widget' );


/**
 * Create the function to output the contents of our Dashboard Widget.
 */

function fb_comment_box_dashboard_widget_function() { 
	if(current_user_can('manage_options')):
?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=580763681972670";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>




	<p>Facebook Comment box plugin by <a target="_blank" href="https://www.facebook.com/rayhan095">King Rayhan</a></p>
	<p>Check my all cool plugins <a target="_blank" href="https://profiles.wordpress.org/kingrayhan/#content-plugins" class="button">Here</a></p>
	<br>
	If you love my plugin then please <div style="display:inline" class="fb-follow" data-href="https://www.facebook.com/rayhan095" data-layout="button" data-show-faces="true"></div> me on facebook :)
	
	
	<?php 
	$fb_app_id = fbcb_option('fb_app_id','facebook_comment_box_settings');
	if( !empty($fb_app_id) ) : ?>
		<a 
			target="_blank" 
			class="button button-primary button-hero"
			href="https://developers.facebook.com/tools/comments/<?php echo fbcb_option('fb_app_id','facebook_comment_box_settings'); ?>/approved/descending/"
		    style="display:block;text-align:center;margin-top:25px;"><span class="dashicons dashicons-facebook" style="vertical-align: middle;"></span> Go to facebook comment modaration page</a>

	<?php else: ?>
		<div class="dashicons-before dashicons-warning" style="    
		    background-color: red;
		    padding: 1em;
		    font-weight: bolder;
		    color: #fff;
		    margin: 2em;
		    border-radius: 15px;
		    font-size: 15px;
		    box-shadow: 0 0 27px 8px rgba(231, 76, 60,.5);
    	">
			You have to insert facebook app id to make facebook comment box enable.
		</div>
		<div style="
			text-align:center;
			margin-top:15px;
		">
			<a href="admin.php?page=facebook-comment-box" class="button button-primary">Insert app id</a>
		</div>
	<?php endif; //if( !empty($fb_app_id) ) ?>

<?php endif; //if(current_user_can('manage_options')):
}


function fb_comment_box_warning_message() {
	$fb_app_id = fbcb_option('fb_app_id','facebook_comment_box_settings');
	if(empty($fb_app_id)) :
	?>
    <div class="error" style="background-color: rgba(220,50,50,.2);color: rgb(220,50,50);font-weight: bold;">
        <p>You have to insert facebook app id to make "Facebook comment box" plugin enable. <a href="admin.php?page=facebook-comment-box" class="button button-primary">Insert app id</a></p>
    </div>
    <?php
	endif;
}
add_action( 'admin_notices', 'fb_comment_box_warning_message' );




//==================================
// Add custom plugin action link
//================================== 
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fb_comment_box_action_link' );

function fb_comment_box_action_link( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=facebook-comment-box') ) .'">Settings</a>';
   $links[] = '<a target="_blank" href="https://profiles.wordpress.org/kingrayhan/#content-plugins" target="_blank">More plugins by <span style="background-color: #1abc9c;color: #fff;font-weight: bold;padding: 1px 8px;">King Rayhan</span></a>';
   return $links;
}