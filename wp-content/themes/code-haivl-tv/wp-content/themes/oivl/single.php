<?php
/*
 * Template haivl.tv cho wordpress
 * Author: Phan Hùng
 * Facebook author: http://fb.com/phanhungblog
 */
get_header(); ?>
<div id="content">
<div id="mainContainer">			    
<?php while (have_posts()) : the_post(); global $post;
?>
<?php wpb_set_post_views (get_the_ID ()); ?>
<div id="leftColumn">

    <div class="videoDetails">
        <div class="video">
		<iframe allowfullscreen="1" frameborder="0" height="410" src="http://www.youtube.com/embed/<?php idvideo(); ?>?rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;nologo=1&amp;vq=large&amp;autoplay=0&amp;ps=docs" width="728"></iframe>
        </div>
        <h1><?php echo the_title(); ?></h1>
        <div class="stats">
            <div class="statsContent">
                <div class="numbers">
                    <span class="views"><?php echo wpb_get_post_views (get_the_ID ()); ?></span> 
                    <span class="comments">
					<fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count>
					</span>
                </div>               
                <div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count"
                        data-width="90" data-show-faces="false" data-share="true">
                </div>
                
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="fp">
            <h4>
                <img src="http://s.haivl.tv/content/images/emo/static/thumbsup.png" />
                Like <a href="https://www.facebook.com/pages/C%E1%BB%99ng-%C4%90%E1%BB%93ng-B%E1%BB%B1a/1537384563143843" target="_blank" class="colorful">Oivl.Mobi trên Facebook</a> để được cập nhật những clip hay nhất</h4>
            <div class="fb-like" data-href="https://www.facebook.com/pages/C%E1%BB%99ng-%C4%90%E1%BB%93ng-B%E1%BB%B1a/1537384563143843" data-send="false"
                 data-width="500" data-show-faces="false">
            </div>
        </div>

        <div class="commentContainer">
            <h3>
                Ch&#233;m gi&#243;</h3>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="10" data-width="728">
            </div>
        </div>
    </div>
	<?php endwhile; ?>
    <div id="footer">	
    <div>
        <b class="copyright"><?php get_footer(); ?></b>
    </div>
    <div class="clear">
    </div>
</div>
</div>
<?php include('sidebar-singer.php'); ?>