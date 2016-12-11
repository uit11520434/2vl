<?php get_header(); ?>
<h1 style="display: none">chiaseWP.com - Thu thuat WordPress‏</h1>
<div id="content">
    <div id="mainContainer">
        <div id="leftColumn">
            <div class="box">
                <h3>chiaseWP.com</h3>

                <div class="tips1">
                    <b>Chuyên trang truyện tranh bựa, truyện tranh hài - chiaseWP.com</b>
                </div>

                <div class="photoList">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post-<?php the_ID() ;?> post type-post status-publish format-standard hentry category-uncategorized" id="post-<?php the_ID() ;?>">
                        <div class="photoListItem">
                        <div class="listItemSeparator"></div>
                        <div class="thumbnail">
                            <a href="<?php the_permalink() ;?>" target="_blank">
                                <?php if ( get_post_meta($post->ID, 'youtube_url', true) ) { ?>
                                <img src="<?php echo youtube_thumb(get_post_meta($post->ID, 'youtube_url', true)); ?>" class="thumbImg" alt="<?php the_title(); ?>">
                                <img src="<?php bloginfo('template_url'); ?>/images/play_icon.png" class="videoIndicator" alt="play icon">
                                <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo get_img_post(); ?>&amp;w=400&amp&amp;zc=1&amp;q=80" width="400px" class="thumbImg" alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </a>
                        </div>
    
                        <div class="info">
                            <h2><a target="_blank" href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h2>
                            <div class="uploader">Đăng bởi <?php the_author_posts_link(); ?> <abbr title="<?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'chiasewp.com'); ?></abbr></div>
                            <div class="stats">
                                <span class="views" title="Lượt xem"><?php the_views();?></span>
                                <span class="comments" title="Lượt bình luận"> <fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count></span>
                                <div>
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ;?>" data-via="vaitruyen" data-lang="en">Tweet</a>
                                    <div style="margin:-23px; margin-left:90px">
                                        <div class="fb-like" data-href="<?php the_permalink() ;?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </article>
                    <?php endwhile; ?>

                    <?php wp_pagenavi(); ?>

                </div>
                <div class="clear"></div>
            </div>

            <div id="footer">
                <div>Power by <a href="http://chiasewp.com" title="thủ thuật wordpress, theme & plugin wordpress" target="_blank">chiaseWP.com</a> / chiaseWP-troll</div>
                <div class="clear"></div>
            </div>

        </div>
       <?php get_sidebar() ;?>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer() ;?>