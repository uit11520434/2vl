<?php get_header(); ?>
<h1 style="display: none">hayVL.net - Thu thuat WordPress‏</h1>
<div id="content">
    <div id="mainContainer">
        <div id="leftColumn">
            <div class="box">

                <div class="tips1">
                    <b>Mẹo: Dùng phím trái(←) và phải(→) để lướt chatvl nhanh hơn. Gặp bài hay hãy "like" động viên tác giả nhé </b>
                    <img src="<?php echo bloginfo('url').'/wp-content/themes/chiasewp-troll/images/4.gif';?>">
                </div>

                <div class="photoList">
                    <?php $i = 1; while ( have_posts() ) : the_post(); ?>

                    <?php if($i==1) { ?>
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
                            <h2><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="uploader">Đăng bởi <?php the_author_posts_link(); ?> <abbr title="<?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'chiasewp.com'); ?></abbr></div>
                            <div class="stats">
                                <span class="views" title="Lượt xem"><?php the_views(); ?></span>
                                <span class="comments" title="Lượt bình luận"> <fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count></span>
                                <div style="padding-top: 10px">
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ;?>" data-via="hayVL.net" data-lang="en">Tweet</a>
                                    <div style="margin:-23px; margin-left:65px">
                                      <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="featuredFanPage">
                        <h4>Like <a href="https://www.facebook.com/hayvl" target="_blank">hayVL trên Facebook</a> để cười nhiều hơn</h4>
                        <div class="fb-like" data-href="https://www.facebook.com" data-send="false" data-width="400" data-show-faces="false"></div>
                    </div>

                    <?php } else { ?>

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
                                <div style="padding-top: 10px">
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ;?>" data-via="hayVL.net" data-lang="en">Tweet</a>
                                    <div style="margin:-23px; margin-left:65px">
                                      <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </article>
                    <?php } $i++; endwhile; ?>

                    <?php wp_pagenavi(); ?>

                </div>
                <div class="clear"></div>
            </div>

            <div id="footer">
                <div>Power by <a href="http://hayVL.net" title="" target="_blank">hayVL.net</a></div>
                <div class="clear"></div>
            </div>

        </div>
       <?php get_sidebar() ;?>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer() ;?>
