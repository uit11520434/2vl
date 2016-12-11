<?php
/*
 * Template haivl.tv cho wordpress
 * Author: Phan Hùng
 * Facebook author: http://fb.com/phanhungblog
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta content='Clip HOT' name='author'/>
<link href='https://plus.google.com/112760955650560292139' rel='publisher'/>
<link href='https://plus.google.com/112760955650560292139' rel='author'/>
<meta content="559815264149051" property='fb:app_id'/>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37498333-1']);
  _gaq.push(['_setDomainName', 'clipcuoi.vn']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body <?php body_class(); ?>>
<div id="main" class="wrapper">
		<div id="header">
			<div id="headerContent">
				<a href="/" id="logo">
						<img src="https://lh6.googleusercontent.com/-MarI8gh_JGg/VE-dVuGAobI/AAAAAAAABwI/ZlZL3XVyTsg/s0/544f9d561e7ad.png"/>
				</a>
				<ul id="menuBar">
					<li class="selected"><a href="/">M&#7899;i Nh&#7845;t</a></li>		
				</ul>
				<div class="slogan">Oivl.Mobi - Tuyển Tập Clip Hot Nhất Trên Mạng</div>
				<div class="clear">
				</div>
			</div>
		</div>