<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */



// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'rubicon' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );
define('WPLANG', 'ru_RU');
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1 (u@NTGdNW7_fPzY8N/9LZERSQP}m2eEZRKT-NISP+0u@3R#`<FM[.MJ;n:0qj.' );
define( 'SECURE_AUTH_KEY',  'ncF[CdB7fxO:DP~tfPj#AnYR,&R9NcymN{e_ eD<^pG~[Eo`z <42T~B>|[oMnHJ' );
define( 'LOGGED_IN_KEY',    'ldilOqvmJ[$xs@2%Uk6J{[k82BotE.niF>9F0W0yQC cJt<pbe9*ySo7!0X5FSb;' );
define( 'NONCE_KEY',        '@Zu:t^%s2vSL~[2w}@?o(VSV;7_T#VP=lH~@2}b.9D%CoGAd5~~mZ1X4p5?U7!DR' );
define( 'AUTH_SALT',        '@tHh,L0`&Y&iM.L0MC1[j( fZ7d:<1T=d5uC77GK|c74G[R0P6@TOgdsP_Giu3)l' );
define( 'SECURE_AUTH_SALT', 'b=s5MQ,V {NGs!xaAAazvK8fNepz,mm4>#[g![cmVfmX6`-WvAYz6C.hqbma.1u;' );
define( 'LOGGED_IN_SALT',   'pC2l4,d~$bU2}Fpc-D}Qh9y VA|hOS4HZg(Rzmec.1x~+$r*(UM[Zr,F8b7>s/q8' );
define( 'NONCE_SALT',       '!G_7A%~BOE3;n?^|Lc.qAE=$xJ18%Tpb)]aJNhg#YIXIHn,h]W;$.p&U/Go}HBf ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}



/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
