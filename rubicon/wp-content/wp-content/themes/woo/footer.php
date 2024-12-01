<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woo
 */
?>

</div><!-- #content -->
<div class="container-fluid px-0">
    <footer class="page-footer">
       
            <div id="footer-top">
                <div class="container">
                    <div id="footer-top-menu-objects">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-menu-blocks">
                                <div class="footer-block footer-block-1">
                                    <div class="footer-block-img"></div>
                                    
                                    <?php
                                    wp_nav_menu([
                                        'menu' => 'Footer1',
                                        'theme_location' => 'menu-f1',
//                                      'container' => 'div',
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-menu-blocks">
                                <div class="footer-block footer-block-2">
                                    <div class="footer-block-img"></div>
                                    
                                    <?php
                                    wp_nav_menu([
                                        'menu' => 'Footer2',
                                        'theme_location' => 'menu-f2',
//                                      'container' => 'div',
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-menu-blocks">
                                <div class="footer-block footer-block-3">
                                    <div class="footer-block-img"></div>
                                
                                    <?php
                                    wp_nav_menu([
                                        'menu' => 'Footer3',
                                        'theme_location' => 'menu-f3',
//                                      'container' => 'div',
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-menu-blocks">
                                <div class="footer-block footer-block-4">
                                    <div class="footer-block-img"></div>
                                    <?php
                                    wp_nav_menu([
                                        'menu' => 'Footer4',
                                        'theme_location' => 'menu-f4',
//                                      'container' => 'div',
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div id="footer-top-menu-sitelinks">
                        <div class="row">
                            <?php
                                wp_nav_menu([
                                    'menu' => 'Footer',
                                    'theme_location' => 'menu-f',
//                                      'container' => 'div',
                                ]);
                            ?>
                           
                        </div>
                    </div>

                </div>
            </div>
            <div id="footer-bottom">
                <div class="container">
                    <a id="footer-logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" alt="#"></a>
                    <span class="copyright">© 2019 Rubicon. Все права защищены.</span>
                </div>
            </div>
         

    </footer><!-- #colophon -->

</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- <script>
    $("a.chosen-single span").innerHTML = "Категории недвижимости";
</script> -->
</body>
</html>
