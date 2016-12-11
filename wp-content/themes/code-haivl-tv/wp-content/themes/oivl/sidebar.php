<?php
/*
 * Template haivl.tv cho wordpress
 * Author: Phan Hùng
 * Facebook author: http://fb.com/phanhungblog
 */
?>
	<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<script>
	$(function(){
    $treo=$('#rightColumn');
    $paddingTop=parseFloat($treo.css('padding-top'),10);
    $topDefault=$treo.offset().top+$paddingTop;//
    $leftDefault=$treo.offset().left;
    $(window).scroll(function(){
        $top=$(this).scrollTop();
        if($top>=$topDefault-$paddingTop){
            $treo.addClass('fixed').css({'left':$leftDefault});
        }else{
            $treo.removeClass('fixed');
        }
    });
	});
	</script>
    <div class="fixed">
		<div class="box darkBox socialBox">
			<?php //dynamic_sidebar( 'sidebar-1' ); ?>
			<h4>
				Like <a href="https://www.facebook.com/pages/C%E1%BB%99ng-%C4%90%E1%BB%93ng-B%E1%BB%B1a/1537384563143843" target="_blank" class="colorful">Oivl.Mobi trên Facebook</a> để được cập nhật những clip hay nhất
			</h4>
			<div class="media facebook">
				<div class="fb-like" data-href="https://www.facebook.com/pages/C%E1%BB%99ng-%C4%90%E1%BB%93ng-B%E1%BB%B1a/1537384563143843" data-send="false"
					data-width="270" data-show-faces="false">
				</div>
			</div>
			<div class="media google" style="border-bottom: none">
				<div class="g-plusone" data-href="http://oivl.mobi">
				</div>
				<script type="text/javascript">
					(function () {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					})();
				</script>
			</div>
		</div>
	<?php xem_nhieu(); ?></div>

	<?php// endif; ?>