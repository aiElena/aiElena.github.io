<?php
/**
 * Plugin Name: WooCommerce Currency Switcher by WooBeWoo
 * Description: WooCommerce Currency Switcher allows the customers switch products prices to any currencies. Get rates converted in the real time with dynamic currency switcher
 * Version: 1.2.5
 * Author: woobewoo
 * Author URI: https://woobewoo.com
 * WC requires at least: 3.4.0
 * WC tested up to: 3.8.1
 * Text Domain: woo-currency
 * Domain Path: /languages
 **/
	/**
	 * Base config constants and functions
	 */
    require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'config.php');
    require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'functions.php');
	/**
	 * Connect all required core classes
	 */
    importClassWcu('dbWcu');
    importClassWcu('installerWcu');
    importClassWcu('baseObjectWcu');
    importClassWcu('moduleWcu');
    importClassWcu('modelWcu');
    importClassWcu('viewWcu');
    importClassWcu('controllerWcu');
    importClassWcu('helperWcu');
    importClassWcu('dispatcherWcu');
    importClassWcu('fieldWcu');
    importClassWcu('tableWcu');
    importClassWcu('frameWcu');
	/**
	 * @deprecated since version 1.0.1
	 */
    importClassWcu('langWcu');
    importClassWcu('reqWcu');
    importClassWcu('uriWcu');
    importClassWcu('htmlWcu');
    importClassWcu('responseWcu');
    importClassWcu('fieldAdapterWcu');
    importClassWcu('validatorWcu');
    importClassWcu('errorsWcu');
    importClassWcu('utilsWcu');
    importClassWcu('modInstallerWcu');
	importClassWcu('installerDbUpdaterWcu');
	importClassWcu('dateWcu');
	/**
	 * Check plugin version - maybe we need to update database, and check global errors in request
	 */
    installerWcu::update();
    errorsWcu::init();
    /**
	 * Start application
	 */
    frameWcu::_()->parseRoute();
    frameWcu::_()->init();
    frameWcu::_()->exec();

	//var_dump(frameWcu::_()->getActivationErrors()); exit();
