<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LfxIsYUAAAAAHhMgwitsRz3JyPZlyPugi0jMDvw', {action: 'homepage'});
});
</script>
<meta name="google-site-verification" content="6LfxIsYUAAAAAHhMgwitsRz3JyPZlyPugi0jMDvw" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'woo' ); ?></a>

	<header id="masthead" class="site-header">
		
<?php require_once('components/navbar.inc.php');?>
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        <li data-target="#carousel-example-1z" data-slide-to="3"></li>
        <li data-target="#carousel-example-1z" data-slide-to="4"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-slider-images/header-slider-image5.jpeg" alt="First slide">
            <div class="carousel-caption ">
                <h2>
                    <p>Консалтинговая компания</p>
                    <p> Рубикон</p>
                </h2>
                
            </div>
        </div>
        <!--/First slide-->
        <!--Second slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-slider-images/header-slider-image2.webp" alt="Second slide">
            <div class="carousel-caption ">
                <h2>
                    <p>Консалтинговая компания</p>
                    <p> Рубикон</p>
                </h2>
            </div>
        </div>
        <!--/Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-slider-images/header-slider-image3.webp" alt="Third slide">
            <div class="carousel-caption ">
                <h2>
                    <p>Консалтинговая компания</p>
                    <p> Рубикон</p>
                </h2>
                
            </div>
        </div>
        <!--/Third slide-->
        <!--Fourth slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-slider-images/header-slider-image4.webp" alt="Fourth slide">
            <div class="carousel-caption ">
                <h2>
                    <p>Консалтинговая компания</p>
                    <p> Рубикон</p>
                </h2>
                
            </div>
        </div>
        <!--/Fourth slide-->
        <!--Fifth slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-slider-images/header-slider-image1.jpg" alt="Fifth slide">
            <div class="carousel-caption ">
                <h2>
                    <p>Консалтинговая компания</p>
                    <p> Рубикон</p>
                </h2>
                
            </div>
        </div>
        <!--/Fifth slide-->
    </div>
    <!--/.Slides-->
    
</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
