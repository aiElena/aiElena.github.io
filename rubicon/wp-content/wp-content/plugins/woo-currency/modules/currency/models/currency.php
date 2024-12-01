<?php

class currencyModelWcu extends modelWcu {

	public function saveCurrencies($data) {
		$currencies = array();

		if(!empty($data['name'])) {
			foreach($data['name'] as $key => $name) {
				$currencies[$name] = array('index' => $key,);
			}

			foreach($data as $key => $item) {
				foreach($currencies as $index => $cur) {
					$currencies[$index][$key] = isset($item[$currencies[$index]['index']]) ? $item[$currencies[$index]['index']] : '';
				}
			}

			foreach($currencies as $key => $c) {
				$currencies[$key]['title'] = utilsWcu::escape($currencies[$key]['title']);
				if($currencies[$key]['rate'] == 1) {
					update_option('woocommerce_currency', $currencies[$key]['name']);
				}
			}
		}
		return update_option($this->getModule()->currencyDbOpt, $currencies);
	}

	public function getCurrencies() {
		$currencies = get_option($this->getModule()->currencyDbOpt, array());
		if(empty($currencies) || !is_array($currencies)) {
			$currencies = $this->getDefaultCurrency();
		}
		foreach ($currencies as $key => $value) {
			$currencies[$key]['rate'] = !empty($currencies[$key]['rate_custom']) ? $currencies[$key]['rate_custom'] : $currencies[$key]['rate'];
		}

		return $currencies;
	}



	public function getDefaultCurrency() {
		$wcCurrency = get_option('woocommerce_currency', 'USD');
		$wcCurrencyPos = get_option('woocommerce_currency_pos', 'left');
		$currencies = array();

		$currencies[$wcCurrency] = array(
			'name' => $wcCurrency,
			'title' => $wcCurrency,
			'symbol' => $this->getCurrencySymbol($wcCurrency),
			'show_cents' => $wcCurrency,
			'position' => $wcCurrencyPos,
			'etalon' => 1,
			'rate' => 1,
			'rate_custom' => '',
			'sort_order' => 1,
		);
		return $currencies;
	}
	public function getCurrencySymbol($currency) {
		$currencySymbols = $this->getModule()->getCurrencySymbols();

		return isset($currencySymbols[$currency]) ? $currencySymbols[$currency] : $currencySymbols['USD'];
	}
	public function getCurrencyPriceFormat($format) {
		$currencies = $this->getCurrencies();
		$currentCurrency = $this->getModule()->currentCurrency;

		if(isset($currencies[$currentCurrency])) {
			switch($currencies[$currentCurrency]['position']) {
				case 'left':
					$format = '%1$s%2$s';
					break;
				case 'right':
					$format = '%2$s%1$s';
					break;
				case 'left_space':
					$format = '%1$s&nbsp;%2$s';
					break;
				case 'right_space':
					$format = '%2$s&nbsp;%1$s';
					break;
				default:
					break;
			}
		}
		return $format;
	}
	public function getCurrencyPrice($price, $product = null) {
		$module = $this->getModule();
		$currencies = $this->getCurrencies();
		$defaultCurrency = $module->getDefaultCurrency();
		$currentCurrency = $module->getCurrentCurrency();
		$cryptoCurrencies = $module->getCryptoCurrencyList();
		$decimalSep = $module->decimalSep;
		$priceNumDecimals = $module->priceNumDecimals;
		$precision = $currentCurrency != $defaultCurrency
			? $this->_getPriceDecimalsCount($currentCurrency, $priceNumDecimals, $currencies)
			: $this->_getPriceDecimalsCount($defaultCurrency, $priceNumDecimals, $currencies);

		if($currentCurrency != $defaultCurrency) {
			//Rewrite manual rate
			$currencies[$currentCurrency]['rate'] = !empty($currencies[$currentCurrency]['rate_custom']) ? $currencies[$currentCurrency]['rate_custom'] : $currencies[$currentCurrency]['rate'];

			//Edited this line to set default converting of currency
			if ( !array_key_exists( $currentCurrency, $cryptoCurrencies ) ) {
			$price = isset($currencies[$currentCurrency]) && $currencies[$currentCurrency] != null
				? number_format(floatval((float) $price * (float) $currencies[$currentCurrency]['rate']), $precision, $decimalSep, '')
				: number_format(floatval((float) $price * (float) $currencies[$defaultCurrency]['rate']), $precision, $decimalSep, '');
			} else {
				$price = isset($currencies[$currentCurrency]) && $currencies[$currentCurrency] != null
				? floatval((float) $price * (float) $currencies[$currentCurrency]['rate'])
				: floatval((float) $price * (float) $currencies[$currentCurrency]['rate']);
			}
		}

		return $price;
		//some hints for price rounding
		//http://stackoverflow.com/questions/11692770/rounding-to-nearest-50-cents
		//$price = round($price * 2, 0) / 2;
		//return round ( $price , 0 ,PHP_ROUND_HALF_EVEN );
		//return number_format ($price, $priceNumDecimals, $decimalSep, $this->thousands_sep);
	}
	public function getCurrencyVariationPrices($pricesArr) {
		// lets sort arrays by values to avoid wrong price displaying on the front
		if(!empty($pricesArr) && is_array($pricesArr)) {
			foreach($pricesArr as $key => $arrvals) {
				asort($arrvals);
				$pricesArr[$key] = $arrvals;
			}
		}
		//another way displaying of price range is not correct
		if(empty($pricesArr['sale_price'])) {
			if(isset($pricesArr['regular_price'])) {
				$pricesArr['price'] = $pricesArr['regular_price'];
			}
		}
		return $pricesArr;
	}

	public function getCurrencyRate($fromCurrency, $toCurrency) {

		$options = $this->getOptions();
		$mode = !empty($options['options']['converter_type']) ? $options['options']['converter_type'] : 'cryptocompare';
		$freeConverterApiKey = !empty($options['options']['free_converter_apikey']) ? $options['options']['free_converter_apikey'] : 'a4472cb452c8fb230db0';
		$fixerConverterApiKey = !empty($options['options']['fixer_converter_apikey']) ? $options['options']['fixer_converter_apikey'] : 'a2697855aaf0f03e3bf46d2215106ef0';
		$fromCurrency = urlencode($fromCurrency);
		$toCurrency = urlencode($toCurrency);
		if (!$fromCurrency) {
			$errorMsg = sprintf(__("set main currency", WCU_LANG_CODE), $fromCurrency);
		} else {
			$errorMsg = sprintf(__("no data for %s", WCU_LANG_CODE), $toCurrency);
		}
		$rate = '';

		switch ($mode) {
			case 'free_converter':
				//http://free.currencyconverterapi.com/api/v6/convert?apiKey=sample-api-key&q=EUR_USD&compact=y
				$queryStr = sprintf("%s_%s", $fromCurrency, $toCurrency);
				$url = "http://free.currencyconverterapi.com/api/v6/convert?apiKey={$freeConverterApiKey}&q={$queryStr}&compact=y";
				$res = function_exists('curl_init') ? $this->_fileGetContentsCurl($url) : file_get_contents($url);
				$currencyData = json_decode($res, true);
				$rate = !empty($currencyData[$queryStr]['val']) ? $currencyData[$queryStr]['val'] : $errorMsg;
				break;
			case 'ratesapi':
				$url = "https://api.ratesapi.io/api/latest?base={$fromCurrency}&symbols={$toCurrency}";
				$url_get = file_get_contents($url);
				$url_json =  json_decode($url_get,true);
				$rate = $url_json['rates'][$toCurrency];
				$rate = !empty($rate) ? $rate : $errorMsg;
				break;
			case 'ecb':
			   $url = "https://api.exchangeratesapi.io/latest?base={$fromCurrency}&symbols={$toCurrency}";
			   $url_get = file_get_contents($url);
			   $url_json =  json_decode($url_get,true);
			   $rate = $url_json['rates'][$toCurrency];
			   $rate = !empty($rate) ? $rate : $errorMsg;
			   break;
			case 'cryptocompare':
				//https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC
				$queryStr = sprintf("?fsym=%s&tsyms=%s", $fromCurrency, $toCurrency);
				$url = "https://min-api.cryptocompare.com/data/price" . $queryStr;
				$res = file_get_contents($url);
				$currencyData = json_decode($res, true);
				$rate = !empty($currencyData[$toCurrency]) ? $currencyData[$toCurrency] : $errorMsg;
				break;
			case 'xe':
				//http://www.xe.com/currencyconverter/convert/?Amount=1&From=ZWD&To=CUP
				//https://www.xe.com/currencyconverter/convert/?Amount=4&From=USD&To=EUR
				$queryStr = sprintf("?Amount=1&From=%s&To=%s", $fromCurrency, $toCurrency);
				$url = "https://www.xe.com/currencyconverter/convert/" . $queryStr;
				$html = file_get_contents($url);
				preg_match_all('/<span class=\'converterresult-toAmount\'>(.*?)<\/span>/s', $html, $matches);
				$rate = isset($matches[1][0]) ? floatval(str_replace(",", "", $matches[1][0])) : $errorMsg;
				break;
			default:
				break;
		}
		return $rate;
	}

	public function saveOptions($options) {
		return update_option($this->getModule()->optionsDbOpt, $options);
	}
	public function getOptions() {
		$options = get_option($this->getModule()->optionsDbOpt, array());
		if(empty($options) || !is_array($options)) {
			$options = $this->getModule()->getDefaultOptions();
		}
		return $options;
	}
	public function _getPriceDecimalsCount($currency, $val = 2, $currencies = array()) {
		$currencies = $this->getCurrencies();
		if( isset($currencies[$currency]['decimals']) && ($currencies[$currency]['decimals'] !== 0) ) {
			$val = $currencies[$currency]['decimals'];
			return intval($val);
		} else {
			$val = 0;
			return intval($val);
		}
	}
	private function _fileGetContentsCurl($url) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

		$data = curl_exec($ch);

		curl_close($ch);

		return $data;
	}

	public function changeSettingFlags($setting) {
		$field = $this->getModule()->settingFlags;
		update_option($field, $setting);
	}

}
