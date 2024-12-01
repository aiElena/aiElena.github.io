<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
<?php if (!is_page(101)) { ?>

<?php } else { ?>



<button class="accordion"><h2>Офис класса А, В и С чем отличаются?</h2></button>
<div class="accordion-panel">
<p>
    Самое главное отличие классов данных помещение - это их цена. Стоимость базируется на таких факторах - как <strong>состояние здания</strong>, <strong>ремонт помещения</strong>, месторасположение, удаленность от метро, пешеходный и транспортный трафик.
</p>
<p>
Офисные помещения класса А — это новые, а не отреставрированные здания, расположенные в деловых локациях города. Имеют удобную планировку, <strong>дизайнерский ремонт</strong>, современную технику, систему кондиционирования и вентиляции, система видео наблюдения, <strong>система контроля доступа по ключ-картам</strong> и качественное обслуживание придомовой территории. Также обязательно в наличии удобная парковка и все предусмотренные <strong>средства связи</strong>.
</p>
<p>
<strong>Офисное помещение</strong> класса В - немного уступают классу А, по всем критерия очень похожи, только могут иметь более <strong>старый фонд</strong>, не удобную парковку, и не настолько преимущественное месторасположение для ведения бизнеса.
</p>
<p>
Офисы класса С - значительно уступают классу А и В. Такое офисное помещение обычно располагается на территории завода, института или предприятия построенного при Советском Союзе. Иногда требуется в этих помещения ремонт, замена коммуникаций, отсутствие парковки и не удобное месторасположение.
</p>
</div>

<button class="accordion"><h2>Возможна ли продажа офиса, который находиться в аренде?</h2></button>
<div class="accordion-panel">
<p>
<strong>Продажа офиса</strong> возможна, если при этом предварительно уведомить арендатора. В этом случае все права и обязанности по договору аренды перейдут к новому собственнику. Поэтому очень важно ознакомиться с договором заранее. Если по каким, либо пунктам <strong>договор аренды</strong> не подходит, его следует расторгнуть заранее или перезаключить с условиями нового владельца.
</p>
</div>

<button class="accordion"><h2>Какая недвижимость считается коммерческой?</h2></button>
<div class="accordion-panel">
  <p><strong>Коммерческая недвижимость</strong> -  это помещения, сооружения, <strong>земельные участки</strong>, которые используются для ведения <strong>коммерческой деятельности</strong>. Используются для получения прибыли и вложения инвестиций. Объекты коммерческой недвижимости - это офисные здания, <strong>торговые помещения</strong>, <strong>магазины</strong>, <strong>кафе</strong>, <strong>рестораны</strong>, склады и гаражи.</p>
</div>
<button class="accordion"><h2>Как много вариантов помещений может предложить консалтинговая компания Рубикон если обратиться?</h2></button>
<div class="accordion-panel">
  <p><strong>Консалтинговая компания Рубикон</strong> подбирает именно то <strong>помещение</strong>, которое соответствуют вашим параметрам и требованиям. В день может быть 3-5 предложений. Если <strong>недвижимость в Харькове</strong>, <strong>Киеве и других городах</strong> не привязывается к определенному району города, то предложений может быть и больше.</p>
</div>
<button class="accordion"><h2>Можно ли оставить заявку на сайте Рубикон.com.ua?</h2></button>
<div class="accordion-panel">
  <p>Заполните форму на сайте или позвоните нам по телефону <a href="tel:+380 (67) 560 98 00">+380 (67) 560 98 00</a></p>
</div>
<div class="text-center form-title">
  <h2>Задать вопрос</h2>  
</div>
<?php } ?>

<?php if (!is_page(1495)) { ?>

<?php } else { ?>

<?php
    $postId = 1510;	$post = get_post($postId);
    echo '<h2>'.$post->post_title.'</h2>';
    echo '<div>'.$post->post_content.'</div>';

?>

<?php } ?>




	<?php woo_post_thumbnail(); ?>

	<div class="entry-content">
	    
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'woo' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'woo' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
