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
                            <div class="col-lg col-md-6 col-sm-6 col-12 footer-menu-blocks">
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
                            <div class="col-lg col-md-6 col-sm-6 col-12 footer-menu-blocks">
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
                            <div class="col-lg col-md-6 col-sm-6 col-12 footer-menu-blocks">
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
                            <div class="col-lg col-md-6 col-sm-6 col-12 footer-menu-blocks">
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
                            <div class="col-lg col-md-6 col-sm-6 col-12 footer-menu-blocks">
                                <div class="footer-block footer-block-5">
                                    <div class="footer-block-img"></div>
                                    <?php
                                    wp_nav_menu([
                                        'menu' => 'Footer5',
                                        'theme_location' => 'menu-f5',
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
                    <div>
                    <a id="footer-logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" alt="#"></a>
                    <span class="copyright">© Rubicon, <a href="https://pinofran.com/" target="_blank">2019 - Pinofran.com</a></span>
                    </div>
                    <div class="social">
 				
                    <a rel="nofollow" target="_blank" class="in icon" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/in.png" alt=""></a>
				

 				
                    <a rel="nofollow" target="_blank" class="f icon img-circle" href="https://www.facebook.com/rubikon_kharkiv-108351787400101/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/f.png" alt=""></a>
			
 				
                    <a rel="nofollow" target="_blank" class="video icon" href="https://www.youtube.com/channel/UCXe9Xmz0r3LecQ5xFU6H_ZA"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/video.png" alt=""></a>
			
				
                    <a rel="nofollow" target="_blank" class="instagram icon" href="https://instagram.com/rubikon_kharkiv?r=nametag"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png" alt=""></a>
				
                    </div>
                </div>
                
            </div>
            <div class="container text-center counters">
                <!--LiveInternet counter--><script type="text/javascript">
                document.write('<a href="//www.liveinternet.ru/click" '+
                'target="_blank"><img src="//counter.yadro.ru/hit?t19.5;r'+
                escape(document.referrer)+((typeof(screen)=='undefined')?'':
                ';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
                screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
                ';h'+escape(document.title.substring(0,150))+';'+Math.random()+
                '" alt="" title="LiveInternet: показано число просмотров за 24'+
                ' часа, посетителей за 24 часа и за сегодня" '+
                'border="0" width="88" height="31"><\/a>')
                </script><!--/LiveInternet-->
                
                <!-- I.UA counter --><a href="https://www.i.ua/" target="_blank" onclick="this.href='https://i.ua/r.php?229020';" title="Rated by I.UA">
                <script type="text/javascript"><!--
                iS='http'+(window.location.protocol=='https:'?'s':'')+
                '://r.i.ua/s?u229020&p105&n'+Math.random();
                iD=document;if(!iD.cookie)iD.cookie="b=b; path=/";if(iD.cookie)iS+='&c1';
                try{iHP=document.body.firstChild;
                iHP.style.behavior="url('#default#homePage')";
                iHP.addBehavior('#default#homePage');
                if (iHP.isHomePage(window.location.href))iS+='&o1';
                } catch (e) { }
                iS+='&d'+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)
                +"&w"+screen.width+'&h'+screen.height;
                iT=iR=iD.referrer.replace(iP=/^[a-z]*:\/\//,'');iH=window.location.href.replace(iP,'');
                ((iI=iT.indexOf('/'))!=-1)?(iT=iT.substring(0,iI)):(iI=iT.length);
                if(iT!=iH.substring(0,iI))iS+='&f'+escape(iR);
                iS+='&r'+escape(iH);
                iD.write('<img src="'+iS+'" border="0" width="88" height="31" />');
                //--></script></a><!-- End of I.UA counter -->
                
<a target="_blank" href="https://www.aspo.biz/" title="Автопубликация объявлений сразу на все ТОП-сайты!" style="display: inline-block; border: solid 1px #F0A314; padding: 7px 10px; border-radius: 2px; vertical-align: top; background-color: white;">
<img src="https://aspo.biz/i/aspo_logo.png" alt="aspo.biz" style="max-height: 20px; width: 48px;">
</a>

<a href="http://uaport.net" target="_blank"><img src="http://uaport.net/banners/88x31-1.gif" width="88" height="31" border="0" title="UAport - объединяя лучшее, найти главное">
</a>

<!-- Ukr-Net.Net start -->
<a href="http://www.ukr-net.net" target="_blank" title="UkrNET - Весь Украинский интернет"><img src="http://ukr-net.net/images/banners/88x31_grey.gif" border="0" width="88" height="31"></a>
<!-- Ukr-Net.Net end -->
            </div>

    </footer><!-- #colophon -->

</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">

function searchByNumber() {
	var value = $('#search-by-number').val();
	
	if (value.length > 0) {
		//window.location.href="%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82/" + value;
		window.location.href="%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82/?p=" + value;
	}
}

$(document).ready(function(e){
	$('#search-by-number').keydown(function (e) {
		if (e.which == 13) {
			searchByNumber()
		}
	});
	
	$('#searchsubmit').click(function(){
		searchByNumber()
	});
});
</script>
<!-- <script>
    $("a.chosen-single span").innerHTML = "Категории недвижимости";
</script> -->
</body>
</html>
