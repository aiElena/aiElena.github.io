<?php
/**
 * woo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woo
 */
/*seo*/
/* Мета-поля для категорий товаров */
add_action("product_cat_edit_form_fields", 'mayak_meta_product_cat');
function mayak_meta_product_cat($term){
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label>Заголовок (title)</label></th>
        <td>
            <input type="text" name="mayak[title]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'title', 1 ) ) ?>"><br />
            <p class="description">Заголовок (title)</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label>Краткое описание (description)</label></th>
        <td>
            <input type="text" name="mayak[description]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'description', 1 ) ) ?>"><br />
            <p class="description">Краткое описание (description)</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label>Subject</label></th>
        <td>
            <input type="text" name="mayak[subject]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'subject', 1 ) ) ?>"><br />
            <p class="description">Subject</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label>Ключевые слова</label></th>
        <td>
            <input type="text" name="mayak[keywords]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'keywords', 1 ) ) ?>"><br />
            <p class="description">Ключевые слова (keywords)</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label>abstract</label></th>
        <td>
            <input type="text" name="mayak[abstract]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'abstract', 1 ) ) ?>"><br />
            <p class="description">Abstract</p>
        </td>
    </tr>
    <?php
}

/* Сохранение данных в БД */
add_action('edited_product_cat', 'mayak_save_meta_product_cat');
add_action('create_product_cat', 'mayak_save_meta_product_cat');
function mayak_save_meta_product_cat($term_id){
    if (!isset($_POST['mayak']))
        return;
    $mayak = array_map('trim', $_POST['mayak']);
    foreach($mayak as $key => $value){
        if(empty($value)){
            delete_term_meta($term_id, $key);
            continue;
        }
        update_term_meta($term_id, $key, $value);
    }
    return $term_id;
}

/* Вывод title для категорий товаров */
add_action('wp_head', 'mayak_title_product_cat', 1, 1);
function mayak_title_product_cat(){
    if(is_product_category()){
        $pct = get_term_meta (get_queried_object()->term_id, 'title', true );
        $aut = '<meta name="title" content="'.$pct.'">'."\n";
    }
    echo $aut;
}
/* Вывод description для категорий товаров */
add_action('wp_head', 'mayak_description_product_cat', 1, 1);
function mayak_description_product_cat(){
    if(is_product_category()){
        $pcd = get_term_meta (get_queried_object()->term_id, 'description', true);
        if(!empty($pcd)){
            $meta = '<meta name="description"  content="'.$pcd.'"/>'."\n";
        }
        else {
            $pcd = wp_filter_nohtml_kses(substr(category_description(), 0, 280));
            $meta = '<meta name="description"  content="'.$pcd.'"/>'."\n";
        }
        echo $meta;
    }
}
/* Вывод keywords для категорий товаров */
add_action('wp_head', 'mayak_keywords_product_cat', 1, 1);
function mayak_keywords_product_cat(){
    if(is_product_category()){
        $pck = get_term_meta (get_queried_object()->term_id, 'keywords', true );
        $auk = '<meta name="keywords" content="'.$pck.'">'."\n";
    }
    echo $auk;
}
/* Вывод subject для категорий товаров */
add_action('wp_head', 'mayak_subject_product_cat', 1, 1);
function mayak_subject_product_cat(){
    if(is_product_category()){
        $pcs = get_term_meta (get_queried_object()->term_id, 'subject', true );
        $aus = '<meta name="subject" content="'.$pcs.'">'."\n";
    }
    echo $aus;
}
/* Вывод abstract для категорий товаров */
add_action('wp_head', 'mayak_abstract_product_cat', 1, 1);
function mayak_abstract_product_cat(){
    if(is_product_category()){
        $pca = get_term_meta (get_queried_object()->term_id, 'abstract', true );
        $aua = '<meta name="abstract" content="'.$pca.'">'."\n";
    }
    echo $aua;
}


/*meta property="og:"*/
function insert_fb_in_head() {
    global $post;
    if(is_product_category('38')):
        echo
            '<meta property="og:title" content="Снять квартиру в Харькове Киеве - долгосрочная аренда квартир. Харьков - аренда квартир. Снять квартиру долгосрочно | Rubicon Рубикон " />
<meta property="og:description" content="Долгосрочная аренда квартир Харьков Киев: снять одно-, двух-, трехкомнатную квартиру, пентхаус на нашем сайте. Аренда квартир в Харькове и Киеве Украина. Снять квартиру " />
<meta property="og:url" content="/product-category/allobjects/rent/flats-rent" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('33')):
        echo
            '<meta property="og:title" content="Аренда торговых помещений магазина в Киеве и Харькове. Снять помещение под магазин, аренда торговой недвижимости, арендовать торговую площадь, снять магазин в аренду в торговом центре Rubicon" />
<meta property="og:description" content="Торговые помещения в аренду для размещения магазина в Киеве и Харькове. Объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость. Снять, арендовать помещение под магазин в торговом центре, ритейл парке" />
<meta property="og:url" content="/product-category/allobjects/rent/retail-rent" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('32')):
        echo
            '<meta property="og:title" content=" Аренда офисов в Киеве и Харькове частных офисов и офисов в бизнес центрах, снять офис, арендовать помещение под офис, все офисы в Киеве и Харькове - Rubicon Рубикон " />
<meta property="og:description" content="Аренда офиса, аренда помещение под офис Киев Харьков Украина офис и офисы бизнес центр. Объект коммерческой недвижимости, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Снять, арендовать помещение под офис" />
<meta property="og:url" content="/product-category/allobjects/rent/offices-rent/" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('26')):
        echo
            '<meta property="og:title" content="Продажа магазина, торговое помещение Киев Харьков. Купить, продать помещение под магазин в торговом центре, ритейл парке. Коммерческая недвижимость Харьков, помещение под производство, коммерческое помещение | АН Рубикон " />
<meta property="og:description" content="Продажа торговых помещений для размещения магазина в Киеве и Харькове. Только объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость в Киеве и Харькове. Купить, продать помещение под магазин в торговом центре, ритейл парке" />
<meta property="og:url" content="/product-category/allobjects/sale/retail" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('25')):
        echo
            '<meta property="og:title" content="Продажа офиса Киев Харьков Украина. Продам офис, покупка офиса офиса бизнес центр, купить помещение под офис, все офисы в Киеве и Харькове Рубикон Rubicon " />
<meta property="og:description" content="Продажа офиса, купить помещение под офис в Киеве и Харькове, офис бизнес центр. Объекты коммерческая недвижимость, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Купить, продажа помещений под офис " />
<meta property="og:url" content="https://xn--90aogmeiv.com.ua/product-category/allobjects/sale/offices " />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('30')):
        echo
            '<meta property="og:title" content="Купить квартиру в Харькове и Киеве. Продажа квартир жилья Харьков - Киев. Недвижимость продажа квартиры в многоквартирных домах  в Харькове и Киеве | Rubicon.com.ua Рубикон " />
<meta property="og:description" content="Купить продать жилье в многоквартирных домах Харьков Киев: квартиры и недвижимость приобретайте с помощью Рубикон консалтинговое агенство Харьков. Покупайте жилье на сервисе Rubicon.com.ua Харьков Киев. Предложения продажи квартир на вторичном рынке недвижимости с актуальной ценой" />
<meta property="og:url" content="/product-category/allobjects/sale/flats" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('31')):
        echo
            '<meta property="og:title" content=" Купить частный дом в Харькове Киеве и области, продажа домов | Рубикон Rubicon.com.ua" />
<meta property="og:description" content="Все объявления о продаже домов в Харькове и Киеве с подробным описанием и фото. Агенство недвижимости &quot;Рубикон&quot; " />
<meta property="og:url" content="/product-category/allobjects/sale/houses " />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('29')):
        echo
            '<meta property="og:title" content="Купить земельный участок в Харькове и Киеве, продажа земли и продажа земельных участков | Рубикон.com.ua" />
<meta property="og:description" content="На Рубикон.com.ua легко продать и купить земельный участок в Харькове и в Киеве без посредников или с помощью агентства. Удобный поиск, много вариантов купли-продажи земельных участков в Харькове и Киеве " />
<meta property="og:url" content=" /product-category/allobjects/sale/lands " />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('114')):
        echo
            '<meta property="og:title" content="Аренда кафе, ресторана, бара, Общепит коммерческая недвижимость в Харькове и Киеве | Рубикон.com.ua " />
<meta property="og:description" content="Объекты общепита в долгосрочную аренду. Аренда кафе и ресторанов. Лучшие предложения по Харькову и Киеву. Юбилей, корпоратив, свадьба? Выбор помещений под любое мероприятие. Фото, описание и предложения об аренде помещений под кафе Рубикон.com.ua лучшие предложения" />
<meta property="og:url" content="/product-category/allobjects/rent/cafe-restaurants-rent " />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_product_category('116')):
        echo
            '<meta property="og:title" content="Харьков Киев - Продажа кафе и ресторанов в городе Харькове и Киеве. Купить ресторан, бар - продажа кафе, продажа ресторана Rubicon | Рубикон.com.ua "/>
<meta property="og:description" content="Продажа Ресторанов в городе Харьков и Киев. Огромная база с удобным поиском ресторанов Продажа в городе Харьков Киев. Поиск Ресторанов  кафе на карте. Заходите и найдете продажу ресторана в городе Харьков" />
<meta property="og:url" content="/product-category/allobjects/sale/cafe-restaurants" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_home()):
        echo
            '<title>консалтинговая компания Рубикон | Агенство недвижимости Харьков Киев | АН Rubicon - поиск, продажа, купить квартиру, аренда нежилой и жилой недвижимости в Украине</title>
<meta name="Keywords" content="недвижимость в Харькове, агентство недвижимости Харьков, АН Харьков, продажа недвижимости в Харькове, купить недвижимость Харьков, сайты недвижимости Харьков квартиры харьков, купить квартиру, дом, участок, продажа, недвижимость">
<meta name="Description" content="Покупка и продажа недвижимости в Харькове и Харьковской области. Недвижимость Харькова, купить квартиру, продажа квартир, дома, участок, недвижимость, харькове, недорого ">
<meta name="subject" content="агентства недвижимости харьков консалтинговая компания Рубикон">
<meta name="abstract" content="Полный спектр услуг на рынке недвижимости. Покупка и продажа недвижимости Харьков Киев Украина">
<meta property="og:title" content="консалтинговая компания Рубикон | Агенство недвижимости Харьков Киев | АН Rubicon - поиск, продажа, купить квартиру, аренда нежилой и жилой недвижимости в Украине" />
<meta property="og:description" content="Покупка и продажа недвижимости в Харькове и Харьковской области. Недвижимость Харькова, купить квартиру, продажа квартир, дома, участок, недвижимость, харькове, недорого" />
<meta property="og:url" content="https://xn--90aogmeiv.com.ua" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('69')):
        echo
            '<title>Аренда торговых помещений магазина в Киеве и Харькове. Снять помещение под магазин, аренда торговой недвижимости, арендовать торговую площадь, снять магазин в аренду в торговом центре Rubicon</title>
<meta name="Keywords" content=" аренда помещение, яндекс недвижимость , аренда торговый помещение, аренда помещение под магазин, сдача в аренду коммерческой недвижимости , коммерческий недвижимость ">
<meta name="Description" content="Торговые помещения в аренду для размещения магазина в Киеве и Харькове. Объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость. Снять, арендовать помещение под магазин в торговом центре, ритейл парке">
<meta name="subject" content="Аренда торговых помещений снимать помещение Харьков Киев Украина ">
<meta name="abstract" content="аренда помещение, коммерческий недвижимость, недвижимость аренда ">
<meta property="og:title" content="Аренда торговых помещений магазина в Киеве и Харькове. Снять помещение под магазин, аренда торговой недвижимости, арендовать торговую площадь, снять магазин в аренду в торговом центре Rubicon" />
<meta property="og:description" content="Торговые помещения в аренду для размещения магазина в Киеве и Харькове. Объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость. Снять, арендовать помещение под магазин в торговом центре, ритейл парке" />
<meta property="og:url" content="/product-category/allobjects/rent/retail-rent" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('52')):
        echo
            '<title> Продажа магазина, торговое помещение Киев Харьков. Купить, продать помещение под магазин в торговом центре, ритейл парке. Коммерческая недвижимость Харьков, помещение под производство, коммерческое помещение | АН Рубикон </title>
<meta name="Keywords" content="продажа квартир харьков, квартира харьков, купить квартиру харьков, премьер харьков объявления, участок Харьков, дачи харьков, дома в харьковской области, квартиры в харьковской области, купить магазин харьков, продажа участок харьков, куплю производство харьков, куплю склад харьков, квартиры харьков, дом в пригороде харькова, дом харьков, недвижимость в харькове, дача в харькове, куплю квартиру в харькове, продажа квартир в харькове, харьков агентства недвижимости, объявления премьер харьков, газета премьер харьков объявления, участок в харькове">
<meta name="Description" content="Продажа торговых помещений для размещения магазина в Киеве и Харькове. Только объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость в Киеве и Харькове. Купить, продать помещение под магазин в торговом центре, ритейл парке">
<meta name="subject" content="Продажа торговых помещений Харьков Киев Украина">
<meta name="abstract" content="продажа торгового помещения, помещение под аренду аренда помещение под ">
<meta property="og:title" content="Продажа магазина, торговое помещение Киев Харьков. Купить, продать помещение под магазин в торговом центре, ритейл парке. Коммерческая недвижимость Харьков, помещение под производство, коммерческое помещение | АН Рубикон " />
<meta property="og:description" content="Продажа торговых помещений для размещения магазина в Киеве и Харькове. Только объекты коммерческой недвижимости, магазин, торговая площадь, помещение под магазин, торговая недвижимость в Киеве и Харькове. Купить, продать помещение под магазин в торговом центре, ритейл парке" />
<meta property="og:url" content="https://xn--90aogmeiv.com.ua/product-category/allobjects/sale/retail" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('67')):
        echo
            '<title>Аренда офисов в Киеве и Харькове частных офисов и офисов в бизнес центрах, снять офис, арендовать помещение под офис, все офисы в Киеве и Харькове - Rubicon Рубикон</title>
<meta name="Keywords" content="аренда офиса   аренда офисов районам, аренда под офис, аренда помещения офис, снять офис в аренду, аренда помещений под офис, офис м аренда офиса, договор аренды офиса, аренда офиса в центре, аренда офиса от собственника, аренда бизнес офисов, аренда офиса улица, аренда офиса стоимость">
<meta name="description" content="Аренда офиса, аренда помещение под офис Киев Харьков Украина офис и офисы бизнес центр. Объект коммерческой недвижимости, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Снять, арендовать помещение под офис" />
<meta name="subject" content="Аренда офисов в Киеве и Харькове Украина Rubicon Рубикон">
<meta name="abstract" content="аренда офиса Харьков Киев Украина аренда офисов районам аренда помещения">
<meta property="og:title" content=" Аренда офисов в Киеве и Харькове частных офисов и офисов в бизнес центрах, снять офис, арендовать помещение под офис, все офисы в Киеве и Харькове - Rubicon Рубикон " />
<meta property="og:description" content="Аренда офиса, аренда помещение под офис Киев Харьков Украина офис и офисы бизнес центр. Объект коммерческой недвижимости, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Снять, арендовать помещение под офис" />
<meta property="og:url" content="https://xn--90aogmeiv.com.ua/product-category/allobjects/rent/offices-rent/" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('49')):
        echo
            '<title>Продажа офиса Киев Харьков Украина. Продам офис, покупка офиса офиса бизнес центр, купить помещение под офис, все офисы в Киеве и Харькове Рубикон Rubicon</title>
<meta name="Keywords" content="продажа офиса, офис продаж жк, продажа помещение, арендный бизнес, купить офис, нежилой помещение продажа, офис продаж квартир, новый офис продаж ">
<meta name="description" content="Продажа офиса, купить помещение под офис в Киеве и Харькове, офис бизнес центр. Объекты коммерческая недвижимость, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Купить, продажа помещений под офис" />
<meta name="subject" content=" продажа офисов помещение Харьков Киев Украина Rubicon Рубикон">
<meta name="abstract" content="продажа офисов продажа помещение Рубикон Rubicon ">
<meta property="og:title" content="Продажа офиса Киев Харьков Украина. Продам офис, покупка офиса офиса бизнес центр, купить помещение под офис, все офисы в Киеве и Харькове Рубикон Rubicon " />
<meta property="og:description" content="Продажа офиса, купить помещение под офис в Киеве и Харькове, офис бизнес центр. Объекты коммерческая недвижимость, офис, помещение под офис, офисная недвижимость в Киеве и Харькове. Купить, продажа помещений под офис " />
<meta property="og:url" content="https://xn--90aogmeiv.com.ua/product-category/allobjects/sale/offices " />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('103')):
        echo
            '<title>Контакты | Rubicon - Недвижимость в Харькове и области |Рубикон</title>
<meta name="Keywords" content="аренда помещение, яндекс недвижимость, офис аренда, снимать помещение, аренда помещение под, аренда коммерческой недвижимости, склад аренда, аренда торговый помещение, коммерческий недвижимость продажа, аренда помещение под магазин, аренда помещения, коммерческий недвижимость, недвижимость аренда, офис аренда, снимать помещение, аренда коммерческий недвижимость, аренда помещение, коммерческий недвижимость, продажа домов в районе, продажа домов в области, недвижимость продажа домов">
<meta name="Description" content="Аренда, покупка и продажа офисов, магазинов и прочей коммерческой недвижимости в Киеве и Харькове. Консалтинговое агентство недвижимости &quot; Рубикон &quot;. Харьков Киев Наши контакты "> 
<meta name="subject" content=" Контакты консалтинговое агентство недвижимости Рубикон ">
<meta name="abstract" content="Консалтинговое агентство недвижимости Харьков Киев Наши контакты Рубикон Rubicon ">
<meta property="og:title" content="Контакты | Rubicon - Недвижимость в Харькове и области |Рубикон" />
<meta property="og:description" content="Консалтинговое агентство недвижимости &quot; Рубикон &quot;. Харьков Киев Наши контакты" />
<meta property="og:url" content="/контакты/" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('101')):
        echo
            '<title>Задать вопрос - получить ответ - Рубикон | Rubicon</title>
	<meta name="Keywords" content="квартира снимать, квартира недорогой, новостройка купить,
новостройка застройщик, однокомнатный квартира, квартира ремонт, вторичный жилье, квартира вторичка, купить 2 комнатную квартиру, купить 3 квартиру, купить двухкомнатную квартиру, купить квартиру +в новостройке, купить квартиру без, недвижимость купить квартиру, купить квартиру посредников, купить квартиру без посредников, купить квартиру, купить вторичную квартиру, купить квартиру вторичка, купить 1 квартиру, купить жилье квартиру, купить квартиру вторичное жилье">
<meta name="Description" content="Перепланировка в арендованном офисе, расторжение договора аренды, офисы open-space , аренда магазина и другой коммерческой недвижимости. Договор куплю продажи квартиры, купить 2х комнатную квартиру, купить квартиру свежие объявления"> 
<meta name="subject" content="вопрос - ответ - Рубикон | Rubicon ">
<meta name="abstract" content="Перепланировка в арендованном офисе, расторжение договора аренды, офисы, аренда магазина и другой коммерческой недвижимости. Договор куплю продажи квартиры, купить дом, квартира продажа, застройщик квартира, квартира новостройка, квартира снимать">
<meta property="og:title" content="Задать вопрос - получить ответ - Рубикон | Rubicon " />
<meta property="og:description" content="Перепланировка в арендованном офисе, расторжение договора аренды, офисы open-space , аренда магазина и другой коммерческой недвижимости. Договор куплю продажи квартиры, купить 2х комнатную квартиру, купить квартиру свежие объявления" />
<meta property="og:url" content="/вопрос-ответ-рубикон-rubicon/" />
<meta property="og:locale" content="ua_UA" />
'."\n";
    elseif(is_page('97')):
        echo
            '<title> Рубикон - О компании, о нас знают, нам доверяют - Rubicon - Недвижимость в Харькове и Киеве и области </title> 
<meta name="Keywords" content="аренда помещения образец, сдам помещение в аренду, аренда помещения под магазин, договор аренды помещения образец, сдача помещений в аренду, аренда производственных помещений, аренда помещений район, аренда жилого помещения, авито аренда помещения, образец аренды нежилого помещения, договор аренды нежилого помещения образец, аренда коммерческих помещений, договор аренды жилого помещения">
<meta name="Description" content="История компании, миссия, основные направления деятельности, Рубикон - крупное агентство недвижимости Харькова. Миссия агентства недвижимости Rubicon. Награды и достижения агентства"> 
<meta name="subject" content="О компании Рубикон - Rubicon. Коммерческая недвижимости и жилая недвижимость в Харькове и Киеве">
<meta name="abstract" content="Недвижимость нежилая и жилая, миссия, основные направления деятельности, Рубикон - крупное агентство недвижимости Харькова. Миссия агентства недвижимости Rubicon. Награды и достижения агентства ">
<meta property="og:title" content="Рубикон - О компании, о нас знают, нам доверяют - Rubicon - Недвижимость в Харькове и Киеве и области " />
<meta property="og:description" content="История компании, миссия, основные направления деятельности, Рубикон - крупное агентство недвижимости Харькова. Миссия агентства недвижимости Rubicon. Награды и достижения агентства" />
<meta property="og:url" content="/о-компании/" />
<meta property="og:locale" content="ua_UA" />
'."\n";



    elseif('is_page'):
        echo '';

    else:
        echo '';
    endif;
}

add_action( 'wp_head', 'insert_fb_in_head', 4 );
/*meta property and*/


add_filter('show_admin_bar', '__return_false'); // отключить
//add_filter('show_admin_bar', '__return_true');

if ( ! function_exists( 'woo_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function woo_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on woo, use a find and replace
         * to change 'woo' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'woo', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'woo' ),
            'menu-2' => esc_html__( 'Footer', 'woo' ),
            'menu-f1' => esc_html__( 'Footer1', 'woo' ),
            'menu-f2' => esc_html__( 'Footer2', 'woo' ),
            'menu-f3' => esc_html__( 'Footer3', 'woo' ),
            'menu-f4' => esc_html__( 'Footer4', 'woo' ),
            'menu-f5' => esc_html__( 'Footer5', 'woo' ),
        ) );
        //menu bootstrap


// Include custom navwalker
        require_once('bs4navwalker.php');

// Register WordPress nav menu
        register_nav_menu('top', 'Top menu');


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'woo_custom_background_args', array(
            'default-color' => 'fff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'woo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woo_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'woo_content_width', 640 );
}
add_action( 'after_setup_theme', 'woo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woo_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'woo' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'woo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'woo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woo_scripts() {
    wp_enqueue_style( 'woo-style', get_stylesheet_uri() );

    wp_enqueue_script( 'woo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'woo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'woo_scripts' );

function theme_enqueue_scripts() {
    wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
    wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'MDB', get_template_directory_uri() . '/assets/css/mdb.min.css' );
    wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/lightslider-master/src/css/lightslider.css' );
    wp_enqueue_style( 'Style', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array(), '3.4.1', true );
    wp_enqueue_script( 'Tether', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'MDB', get_template_directory_uri() . '/assets/js/mdb.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/lightslider-master/src/js/lightslider.js', array(), '1.0.0', true );
    wp_enqueue_script( 'lightslider1', get_template_directory_uri() . '/assets/lightslider-master/src/js/lightslider1.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Script', get_template_directory_uri() . '/assets/js/scripts.js', array(), '5.3', true  );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}





//========


add_action('form_search', 'header_form_search', 15);

function header_form_search() {
    get_template_part('woocommerce/product-searchform');
}

//acf maps
function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyDubzSKVlBye9tVxy2huOy046M2BOx1fR4';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

///---
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

    unset($tabs['reviews']);

    return $tabs;
}
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action('woocommerce_before_main_content', 'woocommerce_template_single_title', 30);


//remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20); // img

//--menu--
//add_action( 'admin_menu', 'myRenamedPlugin' );
//
//function myRenamedPlugin() {
//    global $menu;
//    print_r($menu);
//}
//function edit_admin_menus() {
//    global $menu;
//        global $submenu;
//// здесь будут пункты меню, которые нужно менять
//    $menu[26][0] = 'Объект недвижемости'; // Изменить название
//    $menu[26][1] = 'Объект'; // Изменить название
//    $submenu[26][1] = 'Все';
//}
//add_action( 'admin_menu', 'edit_admin_menus' );

add_filter('user_contactmethods', 'my_user_contactmethods');

function my_user_contactmethods($user_contactmethods){

    $user_contactmethods['phone_number'] = 'Номер телефона';

    return $user_contactmethods;
}

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated) {
    $translated = str_ireplace('Товаров', 'Объектов', $translated);
    $translated = str_ireplace('Товары', 'Объекты', $translated);
    $translated = str_ireplace('Категории товаров', 'Все объекты недвижимости', $translated);
    $translated = str_ireplace('Метки товаров', 'Города', $translated);
    $translated = str_ireplace('Continue reading', 'Читать полностью »', $translated);
    return $translated;
}


function iconic_woo_product_price_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'id' => null
    ), $atts, 'iconic_product_price' );
    if ( empty( $atts[ 'id' ] ) ) {
        return '';
    }
    $product = wc_get_product( $atts['id'] );
    //var_dump($product);
    if ( ! $product ) {
        return '';
    }
    return $product->get_price_html();
}
add_shortcode('iconic_product_price', 'iconic_woo_product_price_shortcode');

/*Редирект на результат поиска*/
add_action('template_redirect', 'redirect_single_post');
function redirect_single_post() {
    if (is_search()) {
        global $wp_query;
        if ($wp_query->post_count == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        }
    }
}

/*--------articles-----------*/


add_action('init', 'my_custom_init');
function my_custom_init(){
    register_post_type('articles', [
        'labels'             => [
            'name'               => 'Статьи',
            'singular_name'      => 'Статья',
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую статью',
            'edit_item'          => 'Редактировать статью',
            'new_item'           => 'Новая статья',
            'view_item'          => 'Посмотреть статью',
            'search_items'       => 'Найти статью',
            'not_found'          =>  'Статей не найдено',
            'not_found_in_trash' => 'В корзине статей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Статьи'

        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 140,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments', 'post-formats', 'custom-fields')
    ] );
}





/*--------paginate-----------*/

function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}


/*---------prohibiting updates------------*/
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

function remove_theme_updates($value) {
    return null;
}
add_filter('site_transient_update_themes', 'remove_theme_updates');

function remove_core_updates() {
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');










