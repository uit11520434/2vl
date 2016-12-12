<?php

/*
 * Post Thumbnails
 * Mặc định lấy ảnh trong Post Thumbnails
 * Nếu Post Thumbnails ko có ảnh thì tự động get ảnh đầu tiên của bài
 * Nếu cả 2 ko có thì lấy 1 ảnh mặc định
 */
function get_first_image_post() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){ //Nếu bài viết ko có ảnh thì nó sẽ lấy ảnh mặc định
        $first_img = get_bloginfo('template_directory')."/images/no-image.png"; //Thay link ảnh mặc định ở đây
    }
    return $first_img;
}
function get_img_post() {
    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    echo $featured_image[0];
    if($featured_image == "") {
        echo get_first_image_post();
    }
}

// Get thumb & id youtube
function youtube_thumb($url){
    $image_url = parse_url($url);
    if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
        $array = explode("&", $image_url['query']);
        $full_size_thumbnail_image = "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg";
	return $full_size_thumbnail_image;
    }
}
function youtube_id($url){
    $video_url = parse_url($url);
    if($video_url['host'] == 'www.youtube.com' || $video_url['host'] == 'youtube.com'){
        $array = explode("&", $video_url['query']);
        $id_video = substr($array[0], 2);
        return $id_video;
    }
}

add_theme_support( 'post-thumbnails' ); 

//an admin bar
add_filter('show_admin_bar', '__return_false');

?>