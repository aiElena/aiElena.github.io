<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Basic Page Needs
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="bg">

  						
<!--  <?php wp_nav_menu( array(
                          'theme_location'  => 'header-menu',
                          'menu'            => 'top menu ', 
                          'container'       => 'div', 
                          'container_class' => '', 
                          'container_id'    => '',
                          'menu_class'      => 'menu nav navbar-nav', 
                          'menu_id'         => '',
                          'echo'            => true,
                          'fallback_cb'     => 'wp_page_menu',
                          'before'          => '',
                          'after'           => '',
                          'link_before'     => '',
                          'link_after'      => '',
                          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'depth'           => 0,
                          'walker'          => ''
                          )
                        ); ?>
						
			-->
						


	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header col-md-1">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="col-md-12" href="/">
					<img src="<?php echo get_template_directory_uri(); ?>\img\logo.png" alt="">
				</a>
			</div>
			<div class="col-md-10 collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Курсы</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="html">HTML</a></li>
							<li><a href="javascript">JavaScript</a></li>
							<li><a href="php">PHP</a></li>
							<li><a href="java">Java</a></li>
							<li><a href="qa">QA</a></li>
							<li><a href="android">Разработка для android</a></li>
							<li><a href="ios">IOS</a></li>
							<li><a href="pm">PM</a></li>
							<li><a href="ruby">Ruby on rails</a></li>
							<li><a href="wordpress">Wordpress</a></li>
							<li><a href="seo">SEO</a></li>
							<li><a href="automation">Автоматизация QA</a></li>
							<!--<li><a href="management">Management</a></li>
							<li><a href="hr">HR</a></li>
							<li><a href="design">Web Design</a></li>
							<li><a href="python">Python</a></li>
							<li><a href="3Dx">3DsMAX</a></li>
							<li><a href="design">Графический дизайн</a></li>
							<li><a href="foundation">Основы IT</a></li>
							<li><a href="accounting">Бухгалтерия в IT</a></li>
							<li><a href="marketing">Social media marketing</a></li>-->	
						</ul>
					</li>
					<li><a href="http://brightidea.com.ua/#1">Почему мы? <span class="sr-only">(current)</span></a></li>
					<li><a href="http://brightidea.com.ua/#2">Bright Idea</a></li>
					<li><a href="http://brightidea.com.ua/#3">Отзывы</a></li>
					<li><a href="http://brightidea.com.ua/#4">Контакты</a></li>
				</ul>
			</div>
			<div class="col-md-1 phone">
				<a href="#" class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>\img\phone.png" alt=""></a>
			</div>
		</div>
	</nav>

