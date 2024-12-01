<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woo
 */
get_header();
?>


<!-- Classic tabs -->
<div class="container popular-objects-container">
    <h2>Популярные типы недвижимости и объекты</h2>
    <div class="classic-tabs nav-justified mx-2">
        <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist">
            <li class="nav-item">
                <a class="nav-link waves-light active show" id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange" role="tab" aria-controls="profile-classic-orange" aria-selected="true">
                    <div class="popular-objects-bacg-block"></div> 
                    <p>Магазины</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange" role="tab" aria-controls="follow-classic-orange" aria-selected="false">
                    <div class="popular-objects-bacg-block"></div>
                    <p>Офисы</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-light" id="cafe-tab-classic-orange" data-toggle="tab" href="#cafe-classic-orange" role="tab" aria-controls="cafe-classic-orange" aria-selected="false">
                    <div class="popular-objects-bacg-block"></div>
                    <p>Кафе/Рестораны</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange" role="tab" aria-controls="contact-classic-orange" aria-selected="false">
                    <div class="popular-objects-bacg-block"></div>
                    <p>Квартиры</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange" role="tab" aria-controls="awesome-classic-orange" aria-selected="false">
                    <div class="popular-objects-bacg-block"></div>
                    <p>Дома</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-light" id="good-tab-classic-orange" data-toggle="tab" href="#good-classic-orange" role="tab" aria-controls="good-classic-orange" aria-selected="false">
                    <div class="popular-objects-bacg-block"></div>
                    <p>Участки</p>
                </a>
            </li>
        </ul>

        <div class="tab-content card" id="myClassicTabContentOrange">
            <div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
            <h2>Популярные магазины</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="retail-rent,retail"]'); ?>
            </div>
            <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
            <h2>Популярные офисы</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="offices-rent,offices"]'); ?>
            </div>
            <div class="tab-pane fade" id="cafe-classic-orange" role="tabpanel" aria-labelledby="cafe-tab-classic-orange">
            <h2>Популярные кафе/рестораны</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="rent,sale"]'); ?>
            </div>
            <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
            <h2>Популярные квартиры</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="flats-rent,flats"]'); ?>
            </div>
            <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
            <h2>Популярные дома</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="houses-rent,houses"]'); ?>
            </div>
            <div class="tab-pane fade" id="good-classic-orange" role="tabpanel" aria-labelledby="good-tab-classic-orange">
            <h2>Популярные участки</h2>
            <?php echo do_shortcode('[featured_products product_category per_page="" orderby="" order="" category="lands,lands-rent"]'); ?>
            </div>
        </div>

    </div>
</div>
<!-- Classic tabs -->
<!--Наши Преимущества-->
<div class="container advantages-container">
    <h2>Наши Преимущества</h2>
    <div class="row">
        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Обширная база проверенных объектов</p>
        </div>
        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Калькулятор стоимости объектов недвижимости</p>
        </div>
        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Правовое сопровождение сделки</p>
        </div>
        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Персональный менеджер</p>
        </div>
        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Помощь в оформлении документации</p>
        </div>
		<div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2">
            <div class="advantages-backg-block"></div>
            <p>Быстрый и гарантированный результат</p>
        </div>
    </div>
</div>

<h2><?php the_field('Район'); ?></h2>

<div class="container about-rubicon-container">
    <h2>О РУБИКОН</h2>

    <div class="row">
        <div class="about-rubicon-image col-12 col-sm-12 col-md-12 col-lg-5">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-image.jpg" alt="#">
        </div>
        <div class="about-text col-12 col-sm-12 col-md-12 col-lg-7">
            <p>
                Компания "Рубикон" уже более 10 лет успешно занимается продажей, арендой нежилой и частично жилой недвижимости в Украине, а так же управлением коммерческой недвижимостью. Если вы в поисках подходящего объекта для вашего офиса, магазина, салона красоты, склада, дома или садового участка – мы вам поможем!
            </p>
            <p>
                Честность, порядочность и ответственность перед клиентом - вот три кита, на которых стоит фундамент нашей компании.
            </p>
           
            <ul>
                Наши преимущества:
                <li>Индивидуальный подход к каждому клиенту</li>
                <li>Качественный подбор вариантов с учётом всех ваших пожеланий</li>
                <li>Быстрый и гарантированный результат</li>
                <li>Обширная база проверенных объектов</li>
                <li>Юридическое сопровождение на всех этапах сделки</li>
                <li>Профессиональные и креативные сотрудники, умеющие найти решение любой, даже самой нестандартной ситуации</li>
                <li>Оперативный просчёт реальной стоимости объекта, без дополнительных затрат и "подводных камней" в дальнейшем</li>
            </ul>
            
        </div>
        <p>"Рубикон" - стремительно развивающаяся команда опытных специалистов на рынке недвижимости. За время работы компании мы провели тысячи успешных сделок, тщательно изучили все тенденции на рынке и постоянно совершенствуемся для вас!</p>
        <p>
                Главной задачей компании "Рубикон" является создание максимально комфортных и выгодных для клиента условий проведения сделки, с чем наша команда успешно справляется на самом высоком уровне.
            </p>
    </div>
</div>
<div class="container text-center about-rubicon-container">
    


</div>


<?php
get_sidebar();
get_footer();
