<?php
/*
Template Name: Upload Video
*/
get_header();

if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == "new_post") {

    $title = $_POST['video_title'];
    //$content = $_POST['content'];
    $tags = $_POST['video_tags'];
    $url = $_POST['video_url'];
    $source = $_POST['video_source'];

    $new_post = array(
        'post_title' => $title,
        //'post_content' => $content,
        //'post_category' => array($_POST['cat']), // Usable for custom taxonomies too
        'tags_input' => array($tags),
        'post_status' => 'publish', // Choose: publish, preview, future, draft, etc.
        'post_type' => 'post'  //'post',page' or use a custom post type if you want to
    );

    //SAVE THE POST
    $pid = wp_insert_post($new_post);

    if ($pid != 0) {
        //neu insert post thanh cong
        update_post_meta($pid, 'youtube_url', $url);
        update_post_meta($pid, 'source', $source);

        //them tu khoa
        wp_set_post_tags($pid, $_POST['video_tags']);

        //REDIRECT TO THE NEW POST ON SAVE
        $link = get_permalink($pid);
        wp_redirect($link);
    }
}
do_action('wp_insert_post', 'wp_insert_post');


?>
<div id="content">
    <div id="mainContainer">
        <div id="leftColumn">
            <div class="box inputForm upload">
                <h3>Đăng video <a href="#"  onClick="alert('Đang xây dựng. Cập nhật ver mới tại chiasewp.com')" class="toggleMode">Đăng ảnh</a></h3>
                
                <?php if(is_user_logged_in()) { ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); { ?>
                <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

                    <p>
                        <label for="video_title">* Tiêu đề</label>
                        <input class="text largeWidth" id="video_title" name="video_title"  type="text" value="" />
                    </p>
                    
                    <p>
                        <label for="video_url">* Link youtube (VD: https://www.youtube.com/watch?v=nqr_kJnpJac)</label>
                        <input class="text largeWidth" id="video_url" name="video_url" type="text" value="" />
                    </p>
                    
                    <p>
                        <label for="video_source">* Nguồn
                            <!--<input class="checkBoxWidth" data-val="true" id="video_source_check" name="video_source_check" type="checkbox" value="Tạo bởi tôi" />
                            <label class="checkboxLabel" for="video_source_check">Tạo bởi tôi</label>-->
                        </label>
                        <input class="text largeWidth" id="video_source" name="video_source" type="text" value="" />
                    </p>
                    
                    <p>
                        <label for="video_tags">Từ khoá (Cách nhau bằng dấu "," tối đa 3 từ)</label>
                        <input class="text largeWidth" id="video_tags" name="video_tags" type="text" value="" />
                    </p>
                    
                    <p class="buttonSet">
                        <button class="buttons submitButton" type="submit" id="saveButton">Đăng video</button>
                        <a class="buttons cancelButtons" href="/">Huỷ</a>
                        <input type="hidden" name="action" value="new_post" />
			<?php wp_nonce_field('new-post'); ?>
                    </p>

                </form>
                <?php } endwhile; endif; ?>
                <?php } else { ?>
                Bạn chưa đăng nhập. Click <a href="/wp-login.php">vào đây</a> để đăng nhập
                <?php } ?>
            
            </div>
    
            <div id="footer">
                <ul class="left">
                    <li>Power by <a href="http://chiasewp.com" target="_blank">chiaseWP.com</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>

        <div id="rightColumn">

            <div class="box highlightBox">
                <h3>Upload Limit</h3>
                upload max  <b> two image per day </b><br/>
                Number image upload to day:  <b>0</b><br/>
                <i>(limit will raise when you have much like )</i>
            </div>
    
            <div class="box darkBox">
                <h3>Submission Rules</h3>
                <ul class="guidelines">
                    <li>Think of an original or descriptive title, instead of phrases like "LOL", "True", or "AMAZING!"....</li>
                    <li><span style="color:red">Respect originality and creativity. Try using Google Images to find the origin of the post. </span></li>
                </ul>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
    
<?php get_footer(); ?>