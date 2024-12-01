<?php
class currencyWcu extends moduleWcu {

	public $currencyTabSlug = 'wcu_currency';
	// it is better to use wp_options because woocommerce hooks need to already created table to try to get Currency Tab content
	public $currencyDbOpt = 'wcu_currencies';
	public $currencyDbOptGeo = 'wcu_currencies_geo';
	public $optionsDbOpt = 'wcu_options';
	public $optionsDbOptPro = 'wcu_options_pro';
	public $currencyCookieName = 'wcu_current_currency';

	public $defaultCurrency = WCU_DEFAULT_CURRENCY;
	public $currentCurrency = WCU_DEFAULT_CURRENCY;

	public $currencyNames = array();
	public $currencyPositions = array();
	public $currencySymbols = array();
	public $currencyUserSymbols = array();

	public $decimalSep = '.';
	public $thousandsSep = ',';
	public $priceNumDecimals = 2;
	public $priceNumDecimalsCrypto = 8;
	public $optionsPro;
	public $convertByCheckout = false;

	public function init() {
		parent::init();

		$this->initCurrency();

		if ($optionsProModule = frameWcu::_()->getModule('options_pro')) {
			$this->optionsPro = $optionsProModule->getModel()->getOptionsPro();
		}

		$options = $this->getModel()->getOptions();
		if(isset($options['options']['convert_checkout']) && $options['options']['convert_checkout'] == '1') {
			$this->convertByCheckout = true;
		}

		//dispatcherWcu::addFilter('currencyTabs', array($this, 'currenciesTab'));

		add_filter('wp_head', array($this, 'headerActions'), 9999);
		add_filter('woocommerce_get_settings_general', array($this, 'updateGeneralTabContent'), 9999);
		add_action('woocommerce_settings_tabs_array', array($this, 'updateSettingsTabs'), 9999);
		add_action('woocommerce_settings_tabs_wcu_currency', array($this, 'getCurrencyTabContent'), 9999);

		add_filter('woocommerce_currency', array($this, 'getCurrentCurrency'), 9999);
		add_filter('woocommerce_currency_symbol', array($this, 'getCurrencySymbol'), 9999);

		//add_filter('pre_option_woocommerce_price_num_decimals', array($this, 'getPriceDecimalsCount'));
		add_filter('wc_get_price_decimals', array($this, 'getPriceDecimalsCount'));

		add_filter('raw_woocommerce_price', array($this, 'getCurrencyPrice'), 9999);

		add_filter('woocommerce_order_get_total', array($this, 'getTotalCurrencyPrice'), 9999);
		add_action('woocommerce_email_header', array($this, 'removeConvertTotalPrice'), 10);

		if(isset($_GET['startcheckout'])) {
			add_filter('woocommerce_calculated_total', array($this, 'getCurrencyPrice'), 9999);
		}
		if($this->convertByCheckout) {
			add_filter('woocommerce_paypal_express_checkout_get_details', array($this, 'recalcPaypalExpressAmounts'), 9999);
			add_action('woocommerce_checkout_order_processed', array($this, 'controlPayPalSupportedCurrencies'), 9999);
		}
		add_filter('wpg_request_param', array($this, 'recalcWpgAmounts'), 9999);

		add_filter('woocommerce_price_format', array($this, 'getCurrencyPriceFormat'), 9999);
		add_filter('woocommerce_get_variation_regular_price', array($this, 'getCurrencyPrice'), 9999, 4);
		add_filter('woocommerce_get_variation_sale_price', array($this, 'getCurrencyPrice'), 9999, 4);
		add_filter('woocommerce_variation_prices', array($this, 'getCurrencyVariationPrices'), 9999, 3);
		add_filter('woocommerce_before_add_to_cart_form', array($this, 'getCurrencyVariationPrices'), 9999, 3);

		add_filter('woocommerce_admin_order_preview_line_items', array($this, 'setCorrectOrderCurrency'), 9999, 2);

		add_filter('wc_get_template', array($this, 'updateCurrencyForEmailTemplateOrder'), 9999, 5);				// from woocommerce 2.7 it is necessary for new order email
		add_action('wpo_wcpdf_process_template_order', array($this, 'updateCurrencyForPdfTemplateOrder'), 1, 2);	// compatibility for https://wordpress.org/plugins/woocommerce-pdf-invoices-packing-slips/
		add_action('woocommerce_order_get_currency', array($this, 'getOrderCurrency'), 1, 2);						// callback for woocommerce get_order_currency() function
		add_filter('woocommerce_checkout_update_order_review', array($this, 'updateCheckoutOrderReview'), 9999);	// callback for ajax recalc of order review on checkout

      add_filter('woocommerce_get_formatted_order_total', array($this, 'getCurrencyOrderTotal'));	// callback for ajax recalc of order review on checkout

      add_filter('woocommerce_before_resend_order_emails', array($this, 'woocommerceBeforeResendOrderEmails'), 1);
      add_filter('woocommerce_email_actions', array($this, 'checkWoocommerceEmailActions'), 10);

      add_action('the_post', array($this, 'checkThePostOrder'), 1);
      add_action('load-post.php', array($this, 'checkAdminActionPostOrder'), 1);

		//add_filter('woocommerce_add_to_cart_hash', array($this, 'addToCartHash'));

		dispatcherWcu::addAction('getChildrenMultipleTab', array($this->getView(), 'getChildrenMultipleTab'), 10, 1);
		dispatcherWcu::addAction('getChildrenOneTab', array($this->getView(), 'getChildrenOneTab'), 10, 1);
	}
	function removeConvertTotalPrice() {
		remove_filter('woocommerce_order_get_total', array($this, 'getTotalCurrencyPrice'), 9999);
	}

   function getCurrencyOrderTotal($order_total)
   {
      return $order_total;
   }
	function recalcPaypalExpressAmounts($details)
	{
		$settings = wc_gateway_ppec()->settings;
		$decimals = $settings->get_number_of_decimal_digits();

		$total = 0;
		$model = $this->getModel();
		if(!empty($details['items'])) {
			foreach($details['items'] as $i => $values) {
				$v = $model->getCurrencyPrice($values['amount']);
				$details['items'][$i]['amount'] = round($v, $decimals);
				$total += $v * $values['quantity'];
			}
		}
		$details['total_item_amount'] = round($total, $decimals);
		$tax = $model->getCurrencyPrice($details['order_tax']);
		$details['order_tax'] = round($tax, $decimals);
		$ship = $model->getCurrencyPrice($details['shipping']);
		$details['shipping'] = round($ship, $decimals);
		$details['order_total'] = round($total + $tax + $ship, $decimals);

		return $details;
	}

	function recalcWpgAmounts($params) {
		$model = $this->getModel();
		$total = 0;
		foreach($params as $key => $value) {
			if(substr($key, -3) == 'AMT') {
				$params[$key] = wpg_number_format($model->getCurrencyPrice($value));
			} else if(stripos($key, 'L_PAYMENTREQUEST_0_AMT') === 0) {
				$v = wpg_number_format($model->getCurrencyPrice($value));
				$params[$key] = $v;
				$k = 'L_PAYMENTREQUEST_0_QTY'.str_replace('L_PAYMENTREQUEST_0_AMT', '', $key);
				if(isset($params[$k])) {
					$total += $v * $params[$k];
				}
			}
		}
		$params['PAYMENTREQUEST_0_ITEMAMT'] = wpg_number_format($total);
		$params['PAYMENTREQUEST_0_AMT'] = wpg_number_format($total + $params['PAYMENTREQUEST_0_SHIPPINGAMT'] + $params['PAYMENTREQUEST_0_TAXAMT']);
		//Woo_PayPal_Gateway_Express_Checkout_NVP::log('test'.print_r($params, true));
		return $params;
	}

	public function controlPayPalSupportedCurrencies($id)
	{
		$method = wc_get_order($id)->get_payment_method();
		if($method == 'nmwoo_2co') {
			add_filter('woocommerce_twoco_args', array($this, 'recalcPricesFor2CO'), 99999);
		}
		if($method == 'nmwoo_2co' || strpos($method, 'paypal') !== false) {
			if(class_exists('WC_Gateway_Paypal')) {
				$pp = new WC_Gateway_Paypal();
				if(!$pp->is_valid_for_use()) $this->resetCurrentCurrency();
			}
		}
	}

	public function recalcPricesFor2CO($twoco_args)
	{
		$model = $this->getModel();
		foreach($twoco_args as $key => $value) {
			if(strpos($key, 'li_') === 0 && strpos($key, '_price') == strlen($key) - 6) {
				$twoco_args[$key] = $model->getCurrencyPrice($value);
			}
		}
		return $twoco_args;
	}
	// public function currenciesTab($tabs) {
	// 	$tabs[ $this->getCode(). '_currencies' ] = array(
	// 		'label' => __('Currencies', WCU_LANG_CODE), 'callback' => array($this, 'getCurrenciesTabContent'));
	// 	$tabs[ $this->getCode(). '_options' ] = array(
	// 		'label' => __('Options', WCU_LANG_CODE), 'callback' => array($this, 'getOptionsContent'));
	// 	$tabs[ $this->getCode(). '_design' ] = array(
	// 		'label' => __('Design', WCU_LANG_CODE), 'callback' => array($this, 'getDesignContent'));
	// 	$tabs[ $this->getCode(). '_geoIpRules' ] = array(
	// 		'label' => __('Geo Ip rules', WCU_LANG_CODE), 'callback' => array($this, 'getGeoIpRulesTabContent'));
	// 	return $tabs;
	// }
	//
	// public function getCurrenciesTabContent() {
	// 	$this->getView()->getCurrenciesTabContent();
	// }
	//
	// public function getOptionsContent() {
	// 	$this->getView()->getOptionsContent();
	// }
	//
	// public function getDesignContent() {
	// 	$this->getView()->getDesignContent();
	// }
	//
	// public function getGeoIpRulesTabContent() {
	// 	dispatcherWcu::doAction('geo-ip-rules');
	// }
	public function wcuIsWcfmPage() {
			global $post;
			if (!empty($post)) {
				$currentPageId = $post->ID;
				$pages = get_option("wcfm_page_options");
				$pages['wc_frontend_manager_page_id'] = isset($pages['wc_frontend_manager_page_id']) ? $pages['wc_frontend_manager_page_id'] : 999999;
				$wcpage = $pages['wc_frontend_manager_page_id'];
				if ($wcpage == $currentPageId) {
					return true;
				}
			}
			return false;
	}
	public function headerActions() {
		if (!class_exists('WooCommerce')) {
			return;
		}
		if (!$this->convertByCheckout && (is_checkout() || is_checkout_pay_page() || isset($_GET['startcheckout']))) {
			$this->resetCurrentCurrency();
		}
	}
	public function initCurrency() {
		$currencies = $this->getCurrencies();

		foreach ($currencies as $key => $currency) {
			if(!empty($currency['etalon'])) {
				$this->defaultCurrency = $key;
				break;
			}
		}
		$this->currentCurrency = $this->defaultCurrency;

		if(!is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) {
			if(isset($_COOKIE[$this->currencyCookieName])) {
				$this->setCurrentCurrency($_COOKIE[$this->currencyCookieName]);
			}
			if(!empty($_GET['currency']) && array_key_exists(strtoupper($_GET['currency']), $currencies)) {
				$this->setCurrentCurrency(strtoupper(utilsWcu::escape($_GET['currency'])));
			}
		}

		$this->priceNumDecimals = get_option('woocommerce_price_num_decimals', $this->priceNumDecimals);
	}

	public function disableWcuByCurrentUrl() {
		$options = $this->getModel()->getOptions();
		$links = !empty($options['options']['disable_uris']) ? $options['options']['disable_uris'] : '';
		if (!empty($links)) {
			$links = preg_split('/[\n\r]+/', $links);

			$curLink = $_SERVER['REQUEST_URI'];
			$curLink = explode('/?', $_SERVER['REQUEST_URI']);
			$curLink = $curLink[0];

			if (substr($curLink,-1) !== '/') {
				$curLinkWithSlash = $curLink.'/';
				$curLinkWithoutSlash = $curLink;
			} else {
				$curLinkWithSlash = $curLink;
				$curLinkWithoutSlash = substr($curLink, 0, -1);
			}

			if ( in_array($curLinkWithSlash, $links) || in_array($curLinkWithoutSlash, $links) ) {
				return true;
			}
		}
		return false;
	}

	public function getDefaultCurrency() {
		return $this->defaultCurrency;
	}

	public function getCurrentCurrency() {
		if(!$this->convertByCheckout && ($this->wcuIsWcfmPage() || is_checkout() || is_checkout_pay_page()
			 || isset($_GET['startcheckout']) || (isset($_GET['wc-ajax']) && strpos($_GET['wc-ajax'], 'checkout') !== false))) {
			//return $this->defaultCurrency;
			$this->setCurrentCurrency($this->defaultCurrency);
		}
		return $this->currentCurrency;
	}

	public function getCurrencyCodes() {

		$currencies = $this->getCurrencies();
		$currenciesCodeArray = array();
		foreach ($currencies as $currency) {
			if ($currency['name'] === $this->currentCurrency) continue;
			$currenciesCodeArray[$currency['name']] = $currency['name'];
		}
		return $currenciesCodeArray;
	}

	public function setCurrentCurrency($currency = '') {
		if(empty($currency)) {
			$currency = $this->defaultCurrency;
		}
		if(!isset($_COOKIE[$this->currencyCookieName]) || (isset($_COOKIE[$this->currencyCookieName]) && $_COOKIE[$this->currencyCookieName] != $currency)) {
			setcookie('wcu_current_currency', $currency, time() + 1 * 24 * 3600, '/'); //1 day
		}
		$this->currentCurrency = $currency;

        // update currency for Gravity Forms
        if (class_exists('GFForms')) {
            update_option('rg_gforms_currency', $currency);
        }
	}
	public function resetCurrentCurrency() {
		$this->setCurrentCurrency();
	}
	public function getCurrencySymbol($symbol) {
		/*if(is_order_received_page() || is_account_page()) {
			return $symbol;
		}*/
		$currencies = $this->getCurrencies();
		$currencySymbols = $this->getCurrencySymbolsList();

		if(!isset($currencies[$this->currentCurrency])) {
			$this->resetCurrentCurrency();
		}
		return isset($currencies[$this->currentCurrency]) && isset($currencySymbols[$currencies[$this->currentCurrency]['symbol']])
			? $currencySymbols[$currencies[$this->currentCurrency]['symbol']]
			: $symbol;
	}
	public function getPriceDecimalsCount($default) {
		$this->priceNumDecimals = $this->getModel()->_getPriceDecimalsCount($this->currentCurrency);
		if ( array_key_exists( $this->currentCurrency, $this->getCryptoCurrencyList() ) ) {
			return $this->priceNumDecimalsCrypto;
		}
		if ( ($this->currentCurrency === $this->defaultCurrency) && !$default) {
			return $default;
		}
		if ($this->priceNumDecimals === 0) {
			return 0;
		} else {
			return $default;
		}
	}
	public function getCurrencyPriceFormat($format) {
		return $this->getModel()->getCurrencyPriceFormat($format);
	}
	public function getTotalCurrencyPrice($price, $product = null) {
		if (is_order_received_page() || is_account_page() || is_admin()) {
			return $price;
		}
		return $this->getModel()->getCurrencyPrice($price, $product);
		//return $price;
	}
	public function getCurrencyPrice($price, $product = null) {
		// if (is_order_received_page() || is_account_page()) {
		// 	return $price;
		// }
      if (is_checkout_pay_page()) {
         return $price;
      }
		$tooltipModule = frameWcu::_()->getModule('currency_tooltip');
		if ( isset($tooltipModule) ) {
			$tooltipModule->addTooltipHiddenField($price);
		}
		return $this->getModel()->getCurrencyPrice($price, $product);
	}
	public function getCurrencyVariationPrices($pricesArr) {
		return $this->getModel()->getCurrencyVariationPrices($pricesArr);
	}
	public function getOrderCurrency($orderCurrency, $order) {
		if (!is_ajax() && !is_admin() && is_object($order)) {
			$orderId = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
			$currency = get_post_meta($orderId, '_order_currency', true);

			if(!empty($currency)) {
				$this->currentCurrency = $currency;
			}
		}
		return $orderCurrency;
	}
	public function updateCheckoutOrderReview() {
		if(!$this->convertByCheckout) {
			$this->resetCurrentCurrency();
		}
	}
    public function woocommerceBeforeResendOrderEmails($order) {
        $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;

        $currency = get_post_meta($order_id, '_order_currency', true);
        if (!empty($currency)) {
            $this->setCurrentCurrency($currency);
        }
    }
    public function checkWoocommerceEmailActions($email_actions) {
        global $post;
        if (is_object($post) AND $post->post_type == 'shop_order') {
            $currency = get_post_meta($post->ID, '_order_currency', true);
            if (!empty($currency)) {
                $this->setCurrentCurrency($currency);
            }
        } else {
            if (isset($_POST['order_status']) AND isset($_POST['post_ID'])) {
                $currency = get_post_meta((int) $_POST['post_ID'], '_order_currency', true);
                if (!empty($currency)) {
                    $this->setCurrentCurrency($currency);
                }
            }
        }

        return $email_actions;
    }
    public function setCorrectOrderCurrency($order_items, $order) {
    	$this->setCurrentCurrency($order->get_currency());
        return $order_items;
    }

	public function updateCurrencyForEmailTemplateOrder($located, $template_name, $args, $template_path, $default_path) {
		if(isset($args['order'])) {
			if(is_object($args['order']) && !is_null($args['order'])) {
				$order = $args['order'];

				if(substr($template_name, 0, 6) === 'emails') {
					if(method_exists($order, 'get_currency')) {
						$this->setCurrentCurrency($order->get_currency());
					}
				}
			}
		}
		return $located;
	}
	public function updateCurrencyForPdfTemplateOrder($templateType, $orderId) {
		if(!empty($orderId) && is_numeric($orderId)) {
			$currency = get_post_meta($orderId, '_order_currency', true);

			if(!empty($currency)) {
				$this->currentCurrency = $currency;
			}
		}
	}
	public function addToCartHash($hash) {
		//for normal shipping update if to change currency
		return '';
	}
    public function checkThePostOrder($post) {
        if (is_object($post) AND $post->post_type == 'shop_order') {
            $currency = get_post_meta($post->ID, '_order_currency', true);
            if (!empty($currency)) {
                $this->setCurrentCurrency($currency);
            }
        }

        return $post;
    }
    public function checkAdminActionPostOrder() {
        if (isset($_GET['post'])) {
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            if (is_object($post) AND $post->post_type == 'shop_order') {
                $currency = get_post_meta($post->ID, '_order_currency', true);
                if (!empty($currency)) {
                    $this->setCurrentCurrency($currency);
                }
            }
        }
    }
	public function updateGeneralTabContent($settings) {
		// remove currency options from general woocommerce tab: woocommerce_currency, woocommerce_currency_pos
		foreach($settings as $k => $s) {
			if($settings[$k]['id'] == 'woocommerce_currency' || $settings[$k]['id'] == 'woocommerce_currency_pos') {
				unset($settings[$k]);
			}
		}
		$settings = array_values($settings);
		return $settings;
	}
	public function updateSettingsTabs($tabs) {
		$tabs[$this->getCurrencyTabSlug()] = __('Currency', WCU_LANG_CODE);
		return $tabs;
	}
	public function getCurrencyTabContent() {
		// Just make little notices here
		frameWcu::_()->getModule('promo')->getModel()->bigStatAdd('Welcome Show');
		if(!installerWcu::isUsed()) {
			installerWcu::setUsed();	// Show this welcome page - only one time
			frameWcu::_()->getModule('promo')->getModel()->bigStatAdd('Welcome Show');
			frameWcu::_()->getModule('options')->getModel()->save('plug_welcome_show', time());	// Remember this
		}
		$this->getView()->getCurrencyTabContent();
	}
	public function getCurrencies() {
		return $this->getModel()->getCurrencies();
	}
	public function getCurrencyTabSlug() {
		return $this->currencyTabSlug;
	}
	public function getCurrencyTabUrl() {
		return admin_url('admin.php?page=wc-settings&tab=wcu_currency#wcuCurrenciesTab');
	}
	public function getCurrencyNames() {
		if(empty($this->currencyNames)) {
			$this->currencyNames = array_combine(array_keys($this->getCurrencySymbolsList(false)), array_keys($this->getCurrencySymbolsList(false)));
		}
		return $this->currencyNames;
	}
	public function getCurrencyPositions() {
		if(empty($this->currencyPositions)) {
			$this->currencyPositions = array(
				'left' => __('left', WCU_LANG_CODE),
				'right' => __('right', WCU_LANG_CODE),
				'left_space' => __('left space', WCU_LANG_CODE),
				'right_space' => __('right space', WCU_LANG_CODE),
			);
		}
		return $this->currencyPositions;
	}
	public function getCurrencySymbols() {
		if(empty($this->currencySymbols)) {
			$this->currencySymbols = $this->getCurrencySymbolsList();
		}
		return $this->currencySymbols;
	}
	public function getAllPagesListForSelect() {
        global $wpdb;
        // We are not using wp methods here - as list can be very large - and it can take too much memory
        $postTypesForPostsList = array('page', 'post', 'product', 'blog', 'grp_pages', 'documentation');
        $allPages = dbWcu::get("SELECT ID, post_title FROM $wpdb->posts WHERE post_type IN ('". implode("','", $postTypesForPostsList). "') AND post_status IN ('publish','draft') ORDER BY post_title");
        $array = array( WCU_HOME_PAGE_ID => __('Main Home page', WCU_LANG_CODE) );
        if (!empty($allPages)) {
            foreach ($allPages as $p) {
                $array[ $p['ID'] ] = $p['post_title'];
            }
        }
        return $array;
    }
    public function getAllPagesListForSelectByType($type) {
        global $wpdb;
        $postTypesForPostsList = array('page', 'post', 'product', 'blog', 'grp_pages', 'documentation');
        $allPages = dbWcu::get("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = '$type' AND post_status IN ('publish','draft') ORDER BY post_title");
        $array = array();
        if (!empty($allPages)) {
            foreach ($allPages as $p) {
                $array[ $p['ID'] ] = $p['post_title'];
            }
        }
        return $array;
    }
    public function getAllProductCategories() {
        global $wpdb;
        $orderby = 'name';
        $order = 'asc';
        $hide_empty = false;
        $cat_args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
        );
        $array = array();
        $product_categories = get_terms('product_cat', $cat_args);
        if (!empty($product_categories)) {
            foreach ($product_categories as $p) {
                $array[ $p->term_taxonomy_id ] = $p->name;
            }
        }
        return $array;
    }
    public function getAllPostTypes() {
        $post_types = get_post_types(array('publicly_queryable'=>1));
        $post_types['page'] = 'page';
        unset($post_types['attachment']);
        if (!empty($post_types)) {
            foreach ($post_types as $p) {
                $array[$p] = $p;
            }
        }
        return $array;
    }
	public function checkDisplayRules($options) {
        global $wp_query;
        $currentPageId = (int) isset($wp_query->post->ID) ? $wp_query->post->ID : 0;
        if( is_shop() ) {
            $currentPageId = get_option( 'woocommerce_shop_page_id' );
        } else if (is_product_category()) {
            $currentPageId = get_queried_object()->term_id;
        }
        $show = true;
        $displayMode = !empty($options['display_by_default']) ? $options['display_by_default'] : '';

		$pagesArr = !empty($options['pages_to_show']) ? $options['pages_to_show'] : '';
		$productCategoriesArr = !empty($options['product_categories_to_show']) ? $options['product_categories_to_show'] : '';
		$customPostArr = !empty($options['custom_post_types_to_show']) ? $options['custom_post_types_to_show'] : '';

		$pagesArrShow = !empty($options['pages_to_show_checkbox']) ? $options['pages_to_show_checkbox'] : '';
		$productCategoriesArrShow =  !empty($options['product_categories_to_show_checkbox']) ? $options['product_categories_to_show_checkbox'] : '';
		$customPostArrShow =  !empty($options['custom_post_types_to_show_checkbox']) ? $options['custom_post_types_to_show_checkbox'] : '';

		$show = false;

		if (!$show && !empty($pagesArrShow) && !empty($pagesArr)) {
			$show = in_array($currentPageId, $pagesArr);
		}
		if (!$show && !empty($productCategoriesArrShow) && !empty($productCategoriesArr)) {
			if (is_product_category()) {
				$show = in_array($currentPageId, $productCategoriesArr);
			}
			if (!$show && is_product()) {
				$productpage_id = get_queried_object()->ID;
				$terms = get_the_terms($productpage_id, 'product_cat');
				$show = in_array($terms[0]->term_id, $productCategoriesArr);
			}
		}
		if (!$show && !empty($customPostArrShow) && !empty($customPostArr)) {
			$show = in_array(get_post_type($currentPageId), $customPostArr);;
		}

		if ($displayMode === 'enable') {
			$show = (!$show) ? true : false;
		}

        return $show;
    }
	public function getShowModule($moduleName, $moduleIsPro = false) {
		if ( !empty($moduleIsPro) && $moduleIsPro && frameWcu::_()->getModule('options_pro') ) {
			$options = frameWcu::_()->getModule('options_pro')->getModel()->getOptionsPro();
		} else {
			$options = $this->getModel()->getOptions();
		}

		$show = false;
		if (!empty($options[$moduleName]['design_tab']['enable']) && ($options[$moduleName]['design_tab']['enable'] === '1') && $this->checkDisplayRules($options[$moduleName]['display_rules_tab'])) {
	            $show = false;
	            $showOn = !empty($options[$moduleName]['display_rules_tab']['show_on']) ? $options[$moduleName]['display_rules_tab']['show_on'] : 'both';

	            switch ($showOn) {
	                case 'both':
	                    $show = true;
	                    break;
	                case 'mobile':
	                    if (wp_is_mobile()) {
	                        $show = true;
	                    }
	                    break;
	                case 'desktops':
	                    if (!wp_is_mobile()) {
	                        $show = true;
	                    }
	                    break;
	         }
		}
		if ($this->disableWcuByCurrentUrl()) {
			$show = false;
		}
		return $show;
	}
	public function drawModuleAjax( $moduleName, $data, $isPro = false ) {
		$moduleName = isset( $moduleName ) ? $moduleName : '';
		$resHtml = '';
		if ( isset( $data ) ) {

			if ( $isPro ) {
				$data = $data[ 'wcu_options_pro' ];
			} else {
				$data = $data[ 'wcu_options' ];
			}

			if ($moduleName === 'currency_switcher') {
				$templateType = strtolower(isset( $data[ $moduleName ][ 'design_tab' ][ 'type' ] ) ? $data[ $moduleName ][ 'design_tab' ][ 'type' ] : '');
				$templateTypeDesign = '';
				$templateTypeStyle = '';
				if ($templateType === 'simple') {
					$templateTypeDesign = isset( $data[ $moduleName ][ 'design_tab' ][ 'design' ] ) ? $data[ $moduleName ][ 'design_tab' ][ 'design' ] : '';
					$templateTypeStyle = strtolower(isset( $data[ $moduleName ][ 'design_tab' ][ 'design' ] ) ? '.' . $data[ $moduleName ][ 'design_tab' ][ 'design' ] : '');
				}
				$styleLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'css/switcher.' . $templateType . $templateTypeStyle . '.css';
				$scriptLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'js/frontend.switcher.js';
			}

			if ($moduleName === 'currency_converter') {
				$styleLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'css/currency.converter.css';
				$scriptLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'js/frontend.currency.converter.js';
			}

			if ($moduleName === 'currency_rates') {
				$styleLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'css/currency.rates.css';
				$scriptLink = frameWcu::_()->getModule( $moduleName )->getModPath() . 'js/frontend.currency.rates.js';
			}

			$resHtml .= "<link rel='stylesheet' href='$styleLink' type='text/css' media='all' />";
			$resHtml .= "<script type='text/javascript' src='".$scriptLink."'></script>";

			$resHtml .= frameWcu::_()->getModule( $moduleName )->drawModule( $data );



		}
		return $resHtml;
	}

	public function getDefaultOptions() {

		$optionsProModule = frameWcu::_()->getModule('options_pro');
		if ($optionsProModule) {
			$optionsPro = $optionsProModule->getProModuleDefaultOptions();
		}
		$options = array(
			'currencies' => array(),
			'options' => array(
				'converter_type' => 'cryptocompare',
				'aur_freq' => 'disabled',
				'aur_email_notice' => 'disabled',
				'convert_checkout' => '',
				'free_converter_apikey' => '',
				'fixer_converter_apikey' => '',
				'flag_enabled' => '0',
				'disable_uris' => '',
			),
			'currency_switcher' => frameWcu::_()->getModule('currency_switcher')->getDefaultOptions(),
		);

		if (!empty($optionsPro) && $optionsPro) {
			$options = array_merge($options, $optionsPro);
		}

		return $options;
	}
	public function getOptionsParams() {
		// row_classes - specific classes for option row.
		// 1 - set row_parent param for child option
		// 2 - set custom class for child option (for example, 'row_classes' => 'wcuSwEnable')
		// 3 - add data attribute to element params of parent option (for example, 'data-target-toggle' => '.wcuSwEnable')
		// 4 - when you will toggle the parent option all its child options will be shown / hidden depending on value of parent option

		// options_attrs - show / hide some dropdown options of child option depending on parent option value (for dropdowns only)
		// 1 - set row_parent param for child option
		// 2 - put in options_attrs param the next array array('dropdown_value' => 'data-type="parent_opt_value_to_show_this_dropdown_value"')
		// 3 - write the custom js function for this dependence of params (could not be automatic for now) @see /modules/currency/js/admin.currency.js
		// 4 - when you will toggle the parent option some dropdown options of child option will be shown / hidden depending on parent option value

		// row_parent - parent option, visibility of current option is dependent on its value
		// row_show - the value of parent option, when child option will be visible
		// row_hide - the value of parent option, when child option will be hidden
		// row_hide_with_all - hide sub-option when currency switcher is disabled (it is useful for sub options of base switcher's options)

		$optionsProModule = frameWcu::_()->getModule('options_pro');
		if ($optionsProModule) {
			$optionsPro = $optionsProModule->getProModuleOptionsParams();
			if (method_exists($optionsProModule, 'getProCurrencyAgregator')) {
				$currencyAgregator = $optionsProModule->getProCurrencyAgregator();
			}
		}

		$updateRates = frameWcu::_()->getModule('update_rates');

		$options = array(
			'currencies' => array(),
			'options' => array(
				'converter_type' => array(
					'html' => 'selectbox',
					'row_classes' => '',
					'row_show' => 'all',
					'tooltip' => __('Select your preferred currency aggregator to get the exchange rate. If you use cryptocurrency for trading, it is recommended to use the "Cryptocompare" aggregator.', WCU_LANG_CODE),
					'label' => __('Currency Aggregator', WCU_LANG_CODE),
					'params' => array(
						'options' => !empty($currencyAgregator) ? $currencyAgregator : array(
							'free_converter' => 'Free Converter',
							'cryptocompare' => 'Cryptocompare',
							'ratesapipro' => 'RatesAPI (PRO)',
							'ecbpro' => 'European Central Bank (PRO)',
							//'xe' => 'Xe',
						),
						'attrs' => '',
						'data-target-toggle' => '.wcuSwEnableDesign',
					),
				),
				'free_converter_apikey' => array(
					'html' => 'input',
					'row_classes' => 'wcuOptionsFreeConverterApiKey wcuSwEnableDesign',
					'row_parent' => 'converter_type',
					'row_show' => 'free_converter',
					'row_hide' => '',
					'tooltip' => sprintf(__('Insert the free API key of the converter in this field. Read <a target="blank" href="%s"> instructions </a> on how to get a free API key for the converter. If the field is empty, Free Converter will use the default API key - this may create an error when getting the exchange rate.', WCU_LANG_CODE), 'https://free.currencyconverterapi.com/free-api-key'),
					'label' => __('Free Converter API key', WCU_LANG_CODE),
					'params' => array(
						'label_attrs' => 'class="wcuSwitcherInputLabel" ',
						'attrs' => 'class="wcuSwitcherInput" style="margin:0px; width:400px;"',
					),
				),
				'convert_checkout' => array(
					'html' => 'checkboxHiddenVal',
					'row_classes' => '',
					'row_show' => 'all',
					'row_hide' => '',
					'tooltip' => __('You can allow change currency at checkout. Please note, that some payment systems (like PayPal) could use only fixed currencies.', WCU_LANG_CODE),
					'label' => __('Change currency at checkout', WCU_LANG_CODE),
					'params' => array(
                        'value'=>'1',
                    ),
				),
				'aur_freq' => array(
					'html' => 'selectbox',
					'row_classes' => '',
					'row_show' => 'all',
					'tooltip' => __('Automatic update of exchange rates for the selected schedule.', WCU_LANG_CODE),
					'label' => ($updateRates) ? __('Automatic exchange rates updates', WCU_LANG_CODE) : __('Automatic exchange rates updates <sup class="pro-label">PRO</sup>', WCU_LANG_CODE),
					'params' => array(
						'options' => array(
							'disabled' => __('Enter Rates Manually', WCU_LANG_CODE),
							'one_min' => __('Update Every Minute', WCU_LANG_CODE),
							'one_hour' => __('Update Hourly', WCU_LANG_CODE),
							'half_day' => __('Update Twice Daily', WCU_LANG_CODE),
							'daily' => __('Update Daily', WCU_LANG_CODE),
							'weekly' => __('Update Weekly', WCU_LANG_CODE),
						),
						'attrs' => ($updateRates) ? '' : 'disabled',
					),
				),
				'aur_email_notice' => array(
					'html' => 'selectbox',
					'row_classes' => '',
					'row_show' => 'all',
					'tooltip' => __('Sends to admin email notice with result values of automatic exchange rates update.', WCU_LANG_CODE),
					'label' => ($updateRates) ? __('Automatic exchange rates updates (notice admin by email)', WCU_LANG_CODE) : __('Automatic exchange rates updates (notice admin by email) <sup class="pro-label">PRO</sup>', WCU_LANG_CODE),
					'params' => array(
						'options' => array(
							'disabled' => __('Disabled', WCU_LANG_CODE),
							'enabled' => __('Enabled', WCU_LANG_CODE),
						),
						'attrs' => ($updateRates) ? '' : 'disabled',
					),
				),
				'disable_uris' => array(
                    'html' => 'textarea',
                    'row_classes' => '',
                    'row_parent' => '',
                    'row_show' => '',
                    'row_hide' => '',
					'tooltip' => __('Type relative links, each from a new line, to disable the display of the currency converter on these pages.', WCU_LANG_CODE),
                    'label' => __('Disable URIs', WCU_LANG_CODE),
                ),
			),
			'currency_switcher' => frameWcu::_()->getModule('currency_switcher')->getOptionsParams(),
		);

		if (!empty($optionsPro) && $optionsPro) {
			$options = array_merge($options, $optionsPro);
		}

		return $options;

	}
	public function getCryptoCurrencyList() {
		return array (
			'BTC' => '&#3647;',
			'ETC' => 'ETC',
			'LTC' => 'LTC',
			'ETH' => 'ETH',
			'ZEC' => 'ZEC',
			'DASH' => 'DASH',
			'XRP' => 'XRP',
			'XMR' => 'XMR',
			'BCH' => 'BCH',
			'NEO' => 'NEO',
			'ADA' => 'ADA',
			'EOS' => 'EOS',
		);
	}
	public function getCurrencySymbolsList($isMerge = true) {
		$currencySymbols = array(
			'USD' => '&#36;',
			'EUR' => '&euro;',
			'GBP' => '&pound;',
			'JPY' => '&yen;',
			'INR' => '&#8377;',
			'UAH' => 'грн.',
			'RUB' => '₽',
			'AUD' => 'AU&#36;',
			'ARS' => 'ARS$',
			'AED' => '&#x62f;.&#x625;',
			'AFN' => '&#x60b;',
			'ALL' => 'L',
			'AMD' => 'AMD',
			'ANG' => '&fnof;',
			'AOA' => 'Kz',
			'AWG' => 'Afl.',
			'AZN' => 'AZN',
			'BAM' => 'KM',
			'BDT' => '&#2547;&nbsp;',
			'BGN' => '&#1083;&#1074;.',
			'BHD' => '.&#x62f;.&#x628;',
			'BIF' => 'Fr',
			'BOB' => 'Bs.',
			'BTN' => 'Nu.',
			'BRL' => 'R$',
			'BWP' => 'P',
			'BYR' => 'Br',
			'BYN' => 'Br',
			'CAD' => 'C$',
			'CDF' => 'Fr',
			'CHF' => '&#67;&#72;&#70;',
			'CNY' => '&yen;',
			'CRC' => '&#x20a1;',
			'CZK' => '&#75;&#269;',
			'CFP' => '₣',
			'CLP' => 'CLP',
			'DJF' => 'Fr',
			'DKK' => 'DKK',
			'DOP' => 'RD&#36;',
			'DZD' => '&#x62f;.&#x62c;',
			'EGP' => 'EGP',
			'ERN' => 'Nfk',
			'ETB' => 'Br',
			'FKP' => '&pound;',
			'FJD' => 'FJ$',
			'GEL' => '&#x10da;',
			'GGP' => '&pound;',
			'GHS' => '&#x20b5;',
			'GIP' => '&pound;',
			'GMD' => 'D',
			'GNF' => 'Fr',
			'GTQ' => 'Q',
			'HNL' => 'L',
			'HRK' => 'Kn',
			'HTG' => 'G',
			'HUF' => '&#70;&#116;',
			'HKD' => 'HK&#36;',
			'IDR' => 'Rp',
			'ILS' => '&#8362;',
			'IMP' => '&pound;',
			'IQD' => '&#x639;.&#x62f;',
			'IRR' => '&#xfdfc;',
			'IRT' => '&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;',
			'ISK' => 'kr.',
			'JEP' => '&pound;',
			'JOD' => '&#x62f;.&#x627;',
			'KES' => 'KSh',
			'KGS' => '&#x441;&#x43e;&#x43c;',
			'KHR' => '&#x17db;',
			'KMF' => 'Fr',
			'KPW' => '&#x20a9;',
			'KRW' => '&#8361;',
			'KWD' => '&#x62f;.&#x643;',
			'KZT' => 'KZT',
			'LAK' => '&#8365;',
			'LBP' => '&#x644;.&#x644;',
			'LKR' => '&#xdbb;&#xdd4;',
			'LSL' => 'L',
			'LYD' => '&#x644;.&#x62f;',
			'MAD' => '&#x62f;.&#x645;.',
			'MDL' => 'MDL',
			'MGA' => 'Ar',
			'MKD' => '&#x434;&#x435;&#x43d;',
			'MMK' => 'Ks',
			'MNT' => '&#x20ae;',
			'MOP' => 'P',
			'MRO' => 'UM',
			'MUR' => '&#x20a8;',
			'MVR' => '.&#x783;',
			'MWK' => 'MK',
			'MYR' => '&#82;&#77;',
			'MZN' => 'MT',
			'MXN' => 'MXN',
			'NGN' => '&#8358;',
			'NIO' => 'C&#36;',
			'NOK' => '&#107;&#114;',
			'NPR' => '&#8360;',
			'NZD' => 'NZ&#36;',
			'OMR' => '&#x631;.&#x639;.',
			'PAB' => 'B/.',
			'PEN' => 'S/.',
			'PGK' => 'K',
			'PHP' => '&#8369;',
			'PKR' => '&#8360;',
			'PLN' => '&#122;&#322;',
			'PRB' => '&#x440;.',
			'PYG' => '&#8370;',
			'QAR' => '&#x631;.&#x642;',
			'RMB' => '&yen;',
			'RON' => 'lei',
			'RSD' => '&#x434;&#x438;&#x43d;.',
			'RWF' => 'Fr',
			'SGD' => 'S$',
			'SAR' => '&#x631;.&#x633;',
			'SCR' => '&#x20a8;',
			'SDG' => '&#x62c;.&#x633;.',
			'SEK' => '&#107;&#114;',
			'SHP' => '&pound;',
			'SLL' => 'Le',
			'SOS' => 'Sh',
			'SSP' => '&pound;',
			'STD' => 'Db',
			'SYP' => '&#x644;.&#x633;',
			'SZL' => 'L',
			'THB' => '&#3647;',
			'TJS' => '&#x405;&#x41c;',
			'TMT' => 'm',
			'TND' => '&#x62f;.&#x62a;',
			'TOP' => 'T&#36;',
			'TRY' => '&#8378;',
			'TWD' => '&#78;&#84;&#36;',
			'TZS' => 'Sh',
			'TTD' => 'TT$',
			'UGX' => 'UGX',
			'UZS' => 'UZS',
			'UYU' => 'UYU',
			'VEF' => 'Bs F',
			'VND' => '&#8363;',
			'VUV' => 'Vt',
			'WST' => 'T',
			'XAF' => 'CFA',
			'XOF' => 'CFA',
			'XPF' => 'Fr',
			'YER' => '&#xfdfc;',
			'ZAR' => '&#82;',
			'ZMW' => 'ZK',
		);
		$cryptoCurrencyList = $this->getCryptoCurrencyList();
		$currencySymbols = array_merge( $currencySymbols, $cryptoCurrencyList);
		$customSymbols = frameWcu::_()->getModule('custom_symbols');
		if ( $customSymbols && $isMerge && $currencyUserSymbols = $customSymbols->getModel()->getCurrencyUserSymbols() ) {
					if (!empty($currencyUserSymbols) && $currencyUserSymbols) {
						$currencySymbols = array_merge($currencyUserSymbols, $currencySymbols);
					}
		}
		$customCurrenciesList = isset($this->optionsPro['custom_currency']) ? $this->optionsPro['custom_currency'] : array();
		if ( $customCurrenciesList ) {
			$currencySymbols = array_merge($customCurrenciesList, $currencySymbols);
		}

		return $currencySymbols;
	}
	public function getCurrencyDecimalsList() {
		return array(
			'2' => 'show cents',
			'1' => 'round cents',
			'0' => 'hide cents',
		);
	}

	public function getFontFamilyList() {
		return array (
		  'Georgia' => 'Georgia',
		  'Palatino Linotype' => 'Palatino Linotype',
		  'Times New Roman' => 'Times New Roman',
		  'Arial' => 'Arial',
		  'Helvetica' => 'Helvetica',
		  'Arial Black' => 'Arial Black',
		  'Gadget' => 'Gadget',
		  'Comic Sans MS' => 'Comic Sans MS',
		  'Impact' => 'Impact',
		  'Charcoal' => 'Charcoal',
		  'Lucida Sans Unicode' => 'Lucida Sans Unicode',
		  'Lucida Grande' => 'Lucida Grande',
		  'Tahoma' => 'Tahoma',
		  'Geneva' => 'Geneva',
		  'Trebuchet MS' => 'Trebuchet MS',
		  'Verdana' => 'Verdana',
		  'Courier New' => 'Courier New',
		  'Courier' => 'Courier',
		  'Lucida Console' => 'Lucida Console',
		  'Monaco' => 'Monaco',
		);
	}
	public function wcuTranslit($str) {
		$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		return str_replace($rus, $lat, $str);
	}
}
