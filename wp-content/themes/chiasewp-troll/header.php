<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope="itemscope" itemtype="http://schema.org/NewsArticle">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta vary="User-Agent" />
    <title><?php wp_title();?></title>
    <script src="http://s.haivl.com/Scripts/jquery-1.6.2.min.js" type="text/javascript"></script>
    <link href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" rel="stylesheet" />
    <script src="<?php bloginfo('template_url'); ?>/js/vaitruyen.js" type="text/javascript"></script>
    <script type="text/javascript">
        Haivl.ListPhoto.init("new", 1);
    </script>
<?php wp_head() ;?>
</head>

<body>    
    <div id="header">
        <div id="headerContent">
            <a href="<?php bloginfo('url');?>" id="logo"><?php bloginfo('name');?></a>
            <ul id="menuBar">
                <li class="selected"><a href="/">Truyện mới</a></li>
                <!--<li><a class="upload" href="/upload">Upload</a></li>-->
            </ul>

            <div id="loginPanel">

                <?php if ( is_user_logged_in() ) : ?>
                <a href="blog/author/" class="profileButton">
                    admin<span class="notiCount"></span>
                </a>
                
                <ul>
                    <li><a href="#">Tải khoản</a></li>
                    <li><a href="#">Đổi mật khẩu</a></li>
                    <li><a href="#">Thoát</a></li>
                </ul>

                    <?php else : ?>
                        <a class="loginButton" href="/upload">Đăng nhập</a>
                    <?php endif; ?>

            </div>
      
            <div id="search">
                <form action="/" id="cse-search-box" method="get">
                    <div>
                        <input type="text" name="s" size="22" class="query" />
                        <input type="submit" value="Tìm" class="searchButton"/>
                    </div>
                </form>
            </div>
        <div class="clear"></div>
    </div>
</div>