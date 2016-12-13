<?php get_header(); ?>
<div id="content">
    <div id="mainContainer">
        <div id="leftColumn">
            <div class="box photoDetails">
                <div class="photoInfo">
                    <h3><?php the_title(); ?></h3>

                    <div class="stats">
                        <span class="views">Xem: <span class="number"><?php the_views() ;?></span></span>
                        <span class="comments">Bình luận: <span class="number"><fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count></span></span>
                    </div>

                    <div class="source">
                        <span class="source">Nguồn:
                            <span class="text">
                                <?php if ( get_post_meta($post->ID, 'source', true) ) : ?>
                                    <?php echo get_post_meta($post->ID, 'source', true) ?>
                                <?php else: ?>Chưa rõ nguồn<?php endif; ?>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="uploader">
                        <abbr style="font-size: 15px;" title="<?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>"><?php echo 'Đăng '. human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' trước', 'chiasewp.com'); ?></abbr>

                    </div>

                    <div class="clear"></div>

                    <div class="fixedScrollDetector" data-fixedtop="43"></div>
                    <div class="likeButton fixedScroll">

                        <div class="text">
                            Like và chia sẻ video nếu thấy hay!
                        </div>

                        <div class="fbLikeButton" style="margin-right: 4px;">
                          <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                      </div>
                      <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ;?>" data-via="hayVL.net" data-lang="en">Tweet</a>

                      <?php
                      $pagelist = query_posts($posts->ID);
                      $pages = array();
                      foreach ($pagelist as $page) {
                       $pages[] += $page->ID;
                   }
                   $current = array_search(get_the_ID(), $pages);
                   $prevID = $pages[$current-1];
                   $nextID = $pages[$current+1];
                   ?>

                   <div class="navButtons">
                    <?php if (!empty($prevID)) { ?>
                    <a class="prev" href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">Video trước</a>
                    <?php } if (!empty($nextID)) { ?>
                    <a class="next" href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">Video sau</a>
                    <?php } ?>
                </div><!-- .navigation -->

            </div>

            <div class="clear"></div>

            <div class="photoImg">
                <?php
                $post_id = get_the_id();
                $post = get_post($post_id);
                $video_id = substr($post->post_content,strpos($post->post_content, 'v') + 2, 11).'?autoplay=1';
                ?>
                <iframe width="100%" height="370" src="http://www.youtube.com/embed/<?php echo $video_id ;?>" frameborder="0" allowfullscreen></iframe>

            </div>

            <div class="featuredFanPage">
                <h4>Like <a href="https://www.facebook.com/hayvl" target="_blank">hayVL trên Facebook</a> để cười nhiều hơn</h4>
                <div class="fb-like" data-href="https://www.facebook.com" data-send="false" data-width="400" data-show-faces="false"></div>
            </div>

            <div class="commentContainer">
                <div class="fb-comments" data-href="<?php the_permalink() ;?>" data-num-posts="10" data-width="655"></div>
            </div>
        </div>

        <div id="footer">
            <ul class="left">Power by <a href="http://chiasewp.com" target="_blank">hayVL.net</a></ul>

            <ul class="right">
                <li><a href="#">contact</a></li>
                <li>·<a href="#">Info</a></li>
                <li>·<a href="http://www.facebook.com/" target="_blank">Facebook</a></li>
            </ul>

            <div class="clear"></div>
        </div>
    </div>
    <?php get_sidebar(); ?>
    <div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>
