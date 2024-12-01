
<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
?>
<div class="container single-product-container">

    <?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action('woocommerce_before_main_content');
    ?>

    <?php
    $metas = explode(',', get_post_meta($post->ID, '_product_image_gallery')[0]); // картинки из стандартной галереи товара
    $video_product = get_field('video_product', $post->ID); // ccылки на ютую видео acf
    $galegy = array(); // создаем массив и добавляем в него главную картинку товара
    $galegy[] = array(
        'thumb' => wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id')[0], 'slide_product_thumb')[0],
        'full' => wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id')[0], 'slide_product_full')[0],
        'type' => 'photo',
        'url' => ''
    );
    if ($metas != ['']) {// добавляем картинки из галереи
        foreach ($metas as $key) {
            $galegy[] = array(
                'thumb' => wp_get_attachment_image_src($key, 'slide_product_thumb')[0],
                'full' => wp_get_attachment_image_src($key, 'slide_product_full')[0],
                'type' => 'photo'
            );
        }
    }
    if ($video_product != ['']) {// банально проверяем не пустой ли массив добавиляем в основной масив ссылки на видео
        foreach ($video_product as $keys ) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $keys['url_video'], $match);
            $galegy[] =	array(
                'thumb' =>  '//img.youtube.com/vi/'.$match[1].'/mqdefault.jpg',
                'full' => '//img.youtube.com/vi/'.$match[1].'/maxresdefault.jpg',
                'type'=> 'video',
                'url'=> $keys['url_video'],
                'id' => $match[1]

            );
        }
    }
    //$galegy - массив с картинками и видео
    echo '<div class="demo" style="max-width: 700px;">';
    echo '<ul id="lightSlider">';
    foreach ($galegy as $key) {
        if ($key['type'] == 'photo') {
            echo '<li data-thumb="' . $key['thumb'] . '" data-src="' . $key['full'] . '" >';
            echo '<img src="' . $key['full'] . '" />';
            echo ' </li>';
        }
        if ($key['type'] == 'video') {
            echo '<a href="' . $key['url'] . '" data-thumb="' . $key['thumb'] . '" class="video-f">';
            echo '<div style="background-image:url(' . $key['full'] . ');background-size: cover;">';
            echo '<img class="play_y" src="/new_img/play_y.png">';
            echo '/new_img/opacity.png" />';
            echo '</div>';
            echo '</a>';
        }
    }
    echo ' </ul>';
    echo '</div>';
    ?>

</div>

<div class="price d-flex">
    <span>Стоимость:&nbsp;</span>
    <span><?php echo do_shortcode('[iconic_product_price id="' . get_the_ID() . '"]'); ?>&nbsp;</span>
    <?php echo "<p class='article'>Код объекта:&nbsp;" . get_the_ID() . "</p>"; ?>


    <!--?php
/*
$price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_price', true);

if (!empty($sale)){
  echo $sale;
} else {
  echo $price;
}
*/
?-->
    <?php
    if (have_posts()) :
        while ( have_posts() ) : the_post();
            ?>

        <?php
        endwhile;
    else :
        ?>
        <p>Sorry no posts matched your criteria.</p>
    <?php
    endif;
    ?>
    <div class="manager_contacts">
        <?php
        if (empty( $my_field = get_post_meta( $post->ID, 'name', 1) )) {
            echo the_author_meta('first_name'); ?>
            <a href=" tel:<?php the_author_meta('phone_number'); ?>"><?php the_author_meta('phone_number'); ?>
            </a>
            <?php
        }
        else {
            echo $my_field; ?>
            <a href=" tel:<?php if(get_field("phone")) echo get_field("phone"); ?>">
                <?php if(get_field("phone")) echo get_field("phone") ?>
            </a>
            <?php
        }
        ?>
    </div>

</div>

<?php $my_query = new WP_Query( 'category_name=special_cat&posts_per_page=10' ); ?>

<?php

$fields = get_fields();

if( $fields ): ?>
    <div class="object_characteristics">
        <h3>Характеристики объекта недвижимости</h3>

        <div class="row">
            <?php foreach( $fields as $name => $value ): ?>

                <?php if ( get_field($name) && get_field($name) !== 'Расположение на карте' && get_field($name) !== 'name') { ?>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 characteristics_wrapper">
                        <div class="characteristics_name"><?php echo $name; ?>&nbsp;
                        </div>
                        <div class="characteristics_value"><?php echo $value; ?></div>
                    </div>

                <?php } ?>

            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action('woocommerce_sidebar');
?>
<div class="row">
<div>
    <!--div class="descr-similar-obj col-xl-6 order-xl-1 col-lg-6 order-lg-1 col-sm-12 order-sm-2 col-xs-12 order-xs-2 col-12 order-2"-->
    <div class="descr-similar-obj col-sm-12 order-sm-2 col-xs-12 order-xs-2 col-12 order-2">

        <?php while (have_posts()) : the_post(); ?>

            <?php wc_get_template_part('content', 'single-product'); ?>

        <?php endwhile; // end of the loop.  ?>

    </div>

</div>
    <!-- MAP START -->
    <!--div class="map_right col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-sm-12 order-sm-1 col-xs-12 order-xs-1 col-12 order-1"-->
    <div class="map_right order-xl-2 col-sm-12 order-sm-1 col-xs-12 order-xs-1 col-12 order-1">
        <?php

        $location = get_field('Расположение на карте');


        if( !empty($location) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>
        <style type="text/css">

            .acf-map {
                width: 100%;
                height: 400px;
                border: #ccc solid 1px;
                margin: 20px 0;
            }

            /* fixes potential theme css conflict */
            .acf-map img {
                max-width: inherit !important;
            }

        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDubzSKVlBye9tVxy2huOy046M2BOx1fR4"></script>
        <script type="text/javascript">
            (function($) {

                /*
                *  new_map
                *
                *  This function will render a Google Map onto the selected jQuery element
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	$el (jQuery element)
                *  @return	n/a
                */

                function new_map( $el ) {

                    // var
                    var $markers = $el.find('.marker');


                    // vars
                    var args = {
                        zoom		: 16,
                        center		: new google.maps.LatLng(0, 0),
                        mapTypeId	: google.maps.MapTypeId.ROADMAP
                    };


                    // create map
                    var map = new google.maps.Map( $el[0], args);


                    // add a markers reference
                    map.markers = [];


                    // add markers
                    $markers.each(function(){

                        add_marker( $(this), map );

                    });


                    // center map
                    center_map( map );


                    // return
                    return map;

                }

                /*
                *  add_marker
                *
                *  This function will add a marker to the selected Google Map
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	$marker (jQuery element)
                *  @param	map (Google Map object)
                *  @return	n/a
                */

                function add_marker( $marker, map ) {

                    // var
                    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                    // create marker
                    var marker = new google.maps.Marker({
                        position	: latlng,
                        map			: map
                    });

                    // add to array
                    map.markers.push( marker );

                    // if marker contains HTML, add it to an infoWindow
                    if( $marker.html() )
                    {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content		: $marker.html()
                        });

                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function() {

                            infowindow.open( map, marker );

                        });
                    }

                }

                /*
                *  center_map
                *
                *  This function will center the map, showing all markers attached to this map
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	map (Google Map object)
                *  @return	n/a
                */

                function center_map( map ) {

                    // vars
                    var bounds = new google.maps.LatLngBounds();

                    // loop through all markers and create bounds
                    $.each( map.markers, function( i, marker ){

                        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                        bounds.extend( latlng );

                    });

                    // only 1 marker?
                    if( map.markers.length == 1 )
                    {
                        // set center of map
                        map.setCenter( bounds.getCenter() );
                        map.setZoom( 16 );
                    }
                    else
                    {
                        // fit to bounds
                        map.fitBounds( bounds );
                    }

                }

                /*
                *  document ready
                *
                *  This function will render each map when the document is ready (page has loaded)
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	5.0.0
                *
                *  @param	n/a
                *  @return	n/a
                */
                // global var
                var map = null;

                $(document).ready(function(){

                    $('.acf-map').each(function(){

                        // create map
                        map = new_map( $(this) );

                    });

                });

            })(jQuery);
        </script>
    </div>
    <!-- MAP END -->
</div>




<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//    do_action('woocommerce_after_main_content');
?>



<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
