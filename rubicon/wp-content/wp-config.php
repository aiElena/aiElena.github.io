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
define('DB_NAME', 'hooqucny_rubicon');

/** Имя пользователя MySQL */
define('DB_USER', 'hooqucny_rubicon');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '2wsx@WSX2wsx@WSX');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost:3306');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q<}L]k!`,*?[kPT%Up4[x6{j9yhcRf-hJ=d>rdLw3XRPww;!2jbwn0&zQLyhLihb' );
define( 'SECURE_AUTH_KEY',  ' Y~F;;EcGQ|73!.JF,./<9lY0=(*x9d<I3y.d+imSapcJ1g(akMEg3p$kE;faeAU' );
define( 'LOGGED_IN_KEY',    'l+*(?c!PH1~!+>95,!N@S3=[Ss<3IOx-gC<plx]>ZE9c3Z5ir-c?z8uT+}6)WW?M' );
define( 'NONCE_KEY',        '3mW/3!{O&Dq;G!Rq;RX>e&Y|FbRy *i30y#B*22oFNj$ GM_ &pfTW8(nwqjK] j' );
define( 'AUTH_SALT',        '/@u05xY5BzA3&LAV|l{=R{L4|l%v~RAp`-tB1!W[YC){WS7NgyKa4D0;0BK=<ZsG' );
define( 'SECURE_AUTH_SALT', '/Q-Iv!5pNbW(TYGk1)sz}b{z,`Smt6fE_YZptIv)jm43C2Z(X|p3`BP#Q!@q3vaZ' );
define( 'LOGGED_IN_SALT',   '6?-Qm}BbG}7lNQ~A>vT8$p|H++Q`{~icEg*4>hPzV:5u.:>@02+!H0zS`k4D2Gp)' );
define( 'NONCE_SALT',       '*n$!3[ds*Et3E,@cP-v$l=V{GiBw{RlMng, <~A*Hnd`Mx4$PelGUNF&ghDz]wgq' );

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
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
define('FS_METHOD', 'direct');  