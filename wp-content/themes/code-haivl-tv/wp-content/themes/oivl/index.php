<?php
/*
 * Template haivl.tv cho wordpress
 * Author: Phan Hùng
 * Facebook author: http://fb.com/phanhungblog
 */
get_header(); ?>
<div id="content">
	<div id="mainContainer">			      
		<div id="leftColumn">
				<div class="videoList">
                <?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<?php 
				$url = get_the_content();
				preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
				if(!empty($id)) {
				   $id = $id[0];
				}
				?>
					<div class="videoListItem">
						<h2>
							<a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="stats">
							<div class="numbers">
								<span class="views"><?php echo wpb_get_post_views (get_the_ID ()); ?></span> 
								<span class="comments">
									<fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count>
								</span>
							</div>						
							<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-share="true">
							</div>
							<div class="clear">
							</div>
						</div>
						<div class="thumb">
							<a class="play" data-id="6119" data-youtubeid="<?php idvideo(); ?>" href="<?php the_permalink(); ?>" target="_blank">
								<img src="http://img.youtube.com/vi/<?php idvideo(); ?>/0.jpg" width="730px">
								<span class="playIcon"></span>
								<div class="duration">
									<?php timevideo($id);?>
								</div>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php xemthem( 'nav-below' ); ?>
				 <?php else : ?>
                 <h2><?php _e('Chưa có bài viết nào'); ?></h2>
				<?php endif; ?>
				</div>
			<div class="clear">
			</div>
			<?php get_footer(); ?>
		</div>
		<div id="rightColumn">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
</body>
</html>

