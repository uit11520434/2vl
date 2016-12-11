<?php
/*
 * Template haivl.tv cho wordpress
 * Author: Phan Hùng
 * Facebook author: http://fb.com/phanhungblog
 */
function clipcuoivn_setup() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'clipcuoivn' ) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
}
add_action( 'after_setup_theme', 'clipcuoivn_setup' );

function clipcuoivn_scripts_styles() {
	global $wp_styles;
	// Loads our main stylesheet.
	wp_enqueue_style( 'clipcuoivn-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'clipcuoivn_scripts_styles' );
/*Widget*/
function clipcuoivn_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'clipcuoivn' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'clipcuoivn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'clipcuoivn' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'clipcuoivn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'clipcuoivn' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'clipcuoivn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'clipcuoivn_widgets_init' );
/**************** ID Video ****************/
function idvideo(){
    $url = get_the_content();
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
    if(!empty($id)) {
        echo $id = $id[0];
    }
}
/*********** Thời gian video************/
function getTimeLength($inputSeconds)
 {
 $secondsInAMinute = 60;
 $secondsInAnHour = 60 * $secondsInAMinute;
 $secondsInADay = 24 * $secondsInAnHour;
 
 // extract days
 $days = floor($inputSeconds / $secondsInADay);
 // extract hours
 $hourSeconds = $inputSeconds % $secondsInADay;
 $hours = floor($hourSeconds / $secondsInAnHour);
 // extract minutes
 $minuteSeconds = $hourSeconds % $secondsInAnHour;
 $minutes = floor($minuteSeconds / $secondsInAMinute);
 // extract the remaining seconds
 $remainingSeconds = $minuteSeconds % $secondsInAMinute;
 $seconds = ceil($remainingSeconds);
 // DAYS
 if( (int)$days == 0 )
 $days = '';
 else
 $days = (int)$days . ':';
 // HOURS
 if( (int)$hours == 0 )
 $hours = '';
 else
 $hours = (int)$hours . ':';
 // MINUTES
 if( (int)$minutes == 0 )
 $minutes = '0:';
 else
 $minutes = (int)$minutes . ':';
 // SECONDS
 if( (int)$seconds == 0 )
 $seconds = '00';
 elseif( (int)$seconds < 10 )
 $seconds = '0' . (int)$seconds;
 return $days . $hours . $minutes . $seconds;
 }
 function timevideo($video_id){
 $data=@file_get_contents('http://gdata.youtube.com/feeds/api/videos/'.$video_id.'?v=2&alt=jsonc');
 $obj=json_decode($data);
 $times = getTimeLength($obj->data->duration);
 echo $times;
 }
/*********************** Lượt xem *********************/
function wpb_set_post_views($postID) {
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function wpb_get_post_views($postID){
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
 
function posts_column_views($defaults){
    $defaults['post_views'] = __( 'xem' , '' );
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if( $column_name === 'post_views' ) {
        echo wpb_get_post_views( get_the_ID() );
    }
}
/************ Lấy bài viết ngẫu nhiên ***********/
function xem_nn(){ 
$current = $post->ID;
query_posts(array('orderby' => 'rand', 'showposts' => 8,'exclude' => $current));
if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php 
$url = get_the_content();
preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
if(!empty($id)) {
   $id = $id[0];
}
?>
       <div class="recommmendItem">
                <a href="<?php the_permalink(); ?>">
                    <div class="thumb">
                        <img src="http://img.youtube.com/vi/<?php idvideo(); ?>/mqdefault.jpg" alt="<?php the_title(); ?>" width="120px" height="70px" />
                        <div class="duration"><?php timevideo($id); ?></div>
                    </div>
                    <div class="info">
                        <h4>
                            <?php the_title(); ?></h4>
                        <div class="stats">
                            <span class="views"><?php echo wpb_get_post_views (get_the_ID ()); ?></span> 
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </a>
            </div>

<?php 
	endwhile;
	endif;
} 
/************* Lấy bài viết mới nhất **************/
function xem_moi(){ 
$current = $post->ID;
query_posts(array('orderby' => 'id', 'showposts' => 2,'exclude' => $current));
if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php 
$url = get_the_content();
preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
if(!empty($id)) {
   $id = $id[0];
}
?>
       <div class="recommmendItem">
                <a href="<?php the_permalink(); ?>">
                    <div class="thumb">
                        <img src="http://img.youtube.com/vi/<?php idvideo(); ?>/mqdefault.jpg" alt="<?php the_title(); ?>" width="120px" height="70px" />
						<div class="new">Mới</div>
                        <div class="duration"><?php timevideo($id); ?></div>
                    </div>
                    <div class="info">
                        <h4>
                            <?php the_title(); ?></h4>
                        <div class="stats">
                            <span class="views"><?php echo wpb_get_post_views (get_the_ID ()); ?></span> 
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </a>
            </div>

<?php 
	endwhile;
	endif;
} 
/************ Bài viết xem nhiều ************/
function xem_nhieu(){ 
$popularpost = new WP_Query( array( 'posts_per_page' => 5, 
									'meta_key' => 'views', 
									'orderby' => 'meta_value_num', 
									'order' => 'DESC',
									'date_query' => array(array(
														'column' => 'post_date_gmt',
														'after' => '7 days ago',
														)
												  )
								  ) 
							);
while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
				<?php 
				$url = get_the_content();
				preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
				if(!empty($id)) {
				   $id = $id[0];
				}
				?>
			<div class="recommmendItem">
                <a href="<?php the_permalink(); ?>">
                    <div class="thumb">
                        <img src="http://img.youtube.com/vi/<?php idvideo(); ?>/mqdefault.jpg" alt="<?php the_title(); ?>" width="120px" height="70px" />
						<div class="hot">Hot</div>
                        <div class="duration"><?php timevideo($id); ?></div>
                    </div>
                    <div class="info">
                        <h4>
                            <?php the_title(); ?></h4>
                        <div class="stats">
                            <span class="views"><?php echo wpb_get_post_views (get_the_ID ()); ?></span> 
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </a>
            </div>
<?php
endwhile; 
}
/**************** Phân trang *****************/
if ( ! function_exists( 'xemthem' ) ) :
function xemthem( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="buttons nextListPage"><?php next_posts_link( __( 'Xem thêm, còn nhiều lắm', 'clipcuoivn' ) ); ?></div>	
	<?php endif;
}
endif;
?>
