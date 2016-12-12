<?php
/*
Plugin Name: Facebook, Google+ & Twitter Share
Plugin URI: 
Description: Facebook, Google+ and Twitter share. Easy to use, just install and activate. No database table will be create. No javascript or js file required.
Version: 1.4
Author: Ranveer
Author URI: http://www.ranveer.info
*/
function fgt_share_style() {
	$myStyleUrl  = plugin_dir_url (__FILE__).'style.css';
	$myStyleFile = plugin_dir_path(__FILE__).'style.css';
	if ( file_exists($myStyleFile) ) {
	    wp_register_style('really_simple_share_style', $myStyleUrl);
	    wp_enqueue_style ('really_simple_share_style');
	}
}
function fgt_share_add_hook($content) {
	$permalink = get_permalink($post->ID);
	$title 	   = get_the_title($ID);
	$imagepath = plugins_url().'/facebook-google-twitter-share/images/';
	$content .= '<div class="sharelinks" style="">
	<a title="'.$title.'" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u='.$permalink.'"><img width="56" height="20" alt="facebook" src="'.$imagepath.'facebook.png"></a>
	<a title="'.$title.'" rel="nofollow" target="_blank" href="https://plus.google.com/share?url='.$permalink.'"><img width="60" height="20" alt="google plus" src="'.$imagepath.'googleplus.png"></a>
	<a title="'.$title.'" Nagar" rel="nofollow" target="_blank" href="http://twitter.com/home?status='.$title.' '.$permalink.'"><img width="70" height="20" alt="twitter" src="'.$imagepath.'twitter.png"></a>
	</div>';
    return $content;
}

add_action('wp_print_styles', 'fgt_share_style');
add_filter('the_content', 'fgt_share_add_hook');

?>