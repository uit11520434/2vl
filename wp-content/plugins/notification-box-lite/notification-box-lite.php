<?php
/**
 * @package Notification Box Lite Plugin
 * @version 1.0
 */
/*
Plugin Name: Notification Box Lite Version
Plugin URI: http://www.notificationbox.com
Description: Display an awesome notification box on either the bottom right or bottom left corner of your website. The Lite version allows you to display which pages/posts have been visited. The Premium version gives the ability to display the latest products / posts / pages / Buddy Press activity log and even a custom message (it can be a video, text, images, or even a shortcode). Compatible with Woocommerce and BuddyPress
Version: 1.0
Author: Notification Box Lite Version
Author URI: http://www.notificationbox.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//avoid remote access

defined('ABSPATH') or die('');

define('DANW_PLUGIN_PREFIX', 'danw_');

include_once('notification-box-admin.php');

add_action('wp_head', 'danw_update_view_post');
add_action('admin_menu', 'danw_notification_box_admin_actions');
add_action('wp_enqueue_scripts', 'danw_notification_wc_front_end_ajax');

//if(is_admin()) {
add_action('wp_ajax_danw_notification_wc_ajax', 'danw_notification_wc_ajax_callback');
add_action('wp_ajax_nopriv_danw_notification_wc_ajax', 'danw_notification_wc_ajax_callback');
//} 

register_activation_hook(__FILE__, 'danw_notification_woocommerce_activation');
register_deactivation_hook(__FILE__, 'danw_notification_woocommerce_deactivation');
register_uninstall_hook(__FILE__, 'danw_notification_woocommerce_uninstall');

define('DANW_POWERED_TEXT', 'Powered by Notification Box');
define('DANW_POWERED_LINK', 'http://www.notificationbox.com');


function danw_update_view_post() {
    if (is_singular()) {
        global $post;
        
        $sTime = intval(current_time('timestamp'));
        $sPostType = get_post_type($post);
        //$aValues = array('timestamp' => $sTime, 'post_type' => $sPostType, 'count_view' => $iCount);
        if($sPostType === 'post'){
            $iCounterItem = get_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'count_viewed_post', true);
            $iCount = 1;
            if(isset($iCounterItem) && is_numeric($iCounterItem)){
                $iCount = intval($iCounterItem) + 1;
            }
            update_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'time_viewed_post', $sTime);
            update_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'count_viewed_post', $iCount);
        }
        
        if($sPostType === 'page'){
            $iCounterItem = get_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'count_viewed_page', true);
            $iCount = 1;
            if(isset($iCounterItem) && is_numeric($iCounterItem)){
                $iCount = intval($iCounterItem) + 1;
            }
            update_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'time_viewed_page', $sTime);
            update_post_meta($post->ID, DANW_PLUGIN_PREFIX . 'count_viewed_page', $iCount);
        }
    }
    danw_clear_older_notifications();
}

function danw_notification_woocommerce_activation() {
    
}

function danw_notification_woocommerce_deactivation() {
   
}

function danw_notification_woocommerce_uninstall(){
    delete_option('danw_show_powered_by');
    delete_option('danw_first_time_notifcation');
    delete_option('danw_time_notifcation');
    delete_option('danw_day_notification');
    delete_option('danw_text_notifcation_view');
    delete_option('danw_display_notification');
    delete_option('danw_duration_notification');
    delete_option('danw_viewed_post');
    delete_option('danw_viewed_page');
    delete_option('danw_viewed_product');
    delete_post_meta_by_key('danw_time_viewed_post');
    delete_post_meta_by_key('danw_count_viewed_post');
    delete_post_meta_by_key('danw_time_viewed_page');
    delete_post_meta_by_key('danw_count_viewed_page');
}
 
function danw_notification_box_admin_actions() {
    add_options_page('Notification Box Lite', 'Notification Box Lite', 'administrator', 'notification_box_settings', 'danw_settings_handler');
}

function danw_notification_wc_front_end_ajax(){
    $aJavascriptValues = array();
    $aJavascriptValues['ajaxurl'] = admin_url('admin-ajax.php');
    $aJavascriptValues['danw_first_time_notifcation'] = get_option('danw_first_time_notifcation');
    $aJavascriptValues['danw_time_notifcation'] = get_option('danw_time_notifcation');
    $aJavascriptValues['danw_text_notifcation_view'] = stripslashes(get_option('danw_text_notifcation_view'));
    $aJavascriptValues['danw_display_notification'] = get_option('danw_display_notification');
    $aJavascriptValues['danw_duration_notification'] = get_option('danw_duration_notification');
       
    wp_enqueue_style('danw_notification_wc_css', plugins_url( '/css/notification-box.css', __FILE__ ), false, '1.0', 'all');
    wp_enqueue_script('danw_notification_wc_js', plugins_url( '/js/notification-box.js', __FILE__ ),  array('jquery'), '1.0', true);
    wp_localize_script('danw_notification_wc_js', 'danw_notification_wc_ajax', $aJavascriptValues);
}

function danw_notification_wc_ajax_callback() {
    $mSessionId = session_id();
    if (empty($mSessionId)) {
        session_start();
    }
    
    $iNewTimer = intval(current_time('timestamp'));
    if(!isset($_SESSION['danw_time_newer'])){
        $_SESSION['danw_time_newer'] = $iNewTimer;
    }
    if(!isset($_SESSION['danw_time_older'])){
        $_SESSION['danw_time_older'] = $iNewTimer;
    }
    
    $aWhereClause = array();
    if(get_option('danw_viewed_post') == '1'){
        array_push($aWhereClause, 'danw_time_viewed_post');
    }
    if(get_option('danw_viewed_page') == '1'){
        array_push($aWhereClause, 'danw_time_viewed_page');
    }

    
    // Don't show notification newer than one minute
    $iTimerTemp = intval(current_time('timestamp') - 60);
	$iDownTimeNewer = intval($_SESSION['danw_time_newer']);
    
    global $wpdb;
    $sWhereQuery = "meta_key = '" . implode("' OR meta_key = '", esc_sql($aWhereClause)) . "'";
    $aNotifications = $wpdb->get_results($wpdb->prepare("SELECT post_id, meta_value, meta_key FROM $wpdb->postmeta WHERE ($sWhereQuery) AND meta_value > %d AND meta_value < %d  ORDER BY meta_value DESC LIMIT 1", $iDownTimeNewer, $iTimerTemp));
    
    if(!isset($aNotifications[0])){
		$iDownTimeOlder = $_SESSION['danw_time_older'];
        $aNotifications = $wpdb->get_results($wpdb->prepare("SELECT post_id, meta_value, meta_key FROM $wpdb->postmeta WHERE ($sWhereQuery) AND meta_value < %d AND meta_value < %d  ORDER BY meta_value DESC LIMIT 1", $iDownTimeOlder, $iTimerTemp));
    }
    
    if(isset($aNotifications[0])){
        $oNotification = $aNotifications[0];
        $iItemID = $oNotification->post_id;
        $iTime = $oNotification->meta_value;
        
        $oPost = get_post($iItemID);
        $sImage = get_the_post_thumbnail($iItemID, array(90,60));
        $sNotificationName = $oPost->post_title;
        $sItemUr = $oPost->guid;
        $sTimeAgo = danw_time_since(intval(current_time('timestamp')) - $iTime);
        
        $sTextNotification = stripslashes(get_option('danw_text_notifcation_view'));
        
        $sNotificationContentHtml = '<p>' . $sTextNotification .' <a href="' . $sItemUr .'">' . $sNotificationName . '</a></p>';
               
        if($iTime > $_SESSION['danw_time_newer']){
            $_SESSION['danw_time_newer'] = $iTime;
        }
        
        if($iTime < $_SESSION['danw_time_older']){
            $_SESSION['danw_time_older'] = $iTime;
        }
        
        $sPositionClass = 'danw-bottom-left';
        if(get_option('danw_display_notification') === 'danw_btm_right'){
            $sPositionClass = 'danw-bottom-right';
        }
        
        
        
        $iPoweredStatus = get_option('danw_show_powered_by');
        $sPoweredHtml = '';
        if($iPoweredStatus == 1){
            $sPoweredHtml = '<div class="dawn-powered"><a href="' . DANW_POWERED_LINK . '">' . DANW_POWERED_TEXT . '</a></div>';
        }
        $sHtml = '
            <div class="danw-wrapper danw-wrapper-box ' . $sPositionClass . '" style="height:' . $iNotificationHeight . 'px; min-width:' . $iNotificationWidth . 'px; border-left:6px solid ' . $iNotificationColor . '; ' . $sStyleBg . '">
                <div class="dawn-container" style="padding-right:24px;">
                    ' . (!empty($sImage) ? '<div class="dawn-img-wrapper">' . $sImage . '</div>' : '') . '
                    ' . $sNotificationContentHtml . '
                    <div class="dawn-time-ago">' . $sTimeAgo . ' ago</div>
                    <a href="#" class="dawn-close-btn">X</a>
                </div>
					' . $sPoweredHtml . '
            </div>
        ';
        echo $sHtml;
    }
    
    // Looped through all the items, reset the timer 
    if(!isset($aNotifications[0])){
        $iNewTimer = intval(current_time('timestamp'));
        $_SESSION['danw_time_newer'] = $iNewTimer;
        $_SESSION['danw_time_older'] = $iNewTimer;
        //danw_notification_wc_ajax_callback();
    }
    exit();
}

function danw_time_since($since){
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}

function danw_clear_older_notifications() {
    $iFromDaysAgo = get_option('danw_day_notification');
    if(!isset($iFromDaysAgo) || $iFromDaysAgo < 1){
        $iFromDaysAgo = 1;
    }
    $iTimeStampDaysAgo = strtotime("-" . $iFromDaysAgo . " day");
    
    global $wpdb;
    $wpdb->query($wpdb->prepare("DELETE a, b FROM $wpdb->postmeta AS a LEFT JOIN $wpdb->postmeta AS b ON a.post_id = b.post_id AND (b.meta_key = 'danw_count_viewed_page' || b.meta_key = 'danw_count_ordered_product' || b.meta_key = 'danw_count_viewed_post' || b.meta_key = 'danw_count_viewed_product') WHERE (a.meta_value <= %d AND (a.meta_key = 'danw_time_viewed_page' || a.meta_key = 'danw_time_ordered_product' || a.meta_key = 'danw_time_viewed_post' || a.meta_key = 'danw_time_viewed_product'))", $iTimeStampDaysAgo));
}?>