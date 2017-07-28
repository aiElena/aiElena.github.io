<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wptest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|j_)lra G|Q)NR)g]87n1(0k+/E.0Y&9M*-+oGCK9YqlQTg:Er,Ed0dJp(s%*[=C');
define('SECURE_AUTH_KEY',  ':FhVf~yx,Gp*8T6N(#Vtt@|R$zG-i;b(gp[M3~6;lrgR~?BVgmGGCP&GIwi NdGB');
define('LOGGED_IN_KEY',    '7930J;CfIVbE|Ie=-o<-@Q%IE@IM6zLM2X}/wW9|YfcwLl|%BB6nDk0G?|f267|7');
define('NONCE_KEY',        'g.[Qv4_y7+^J?jFOE?+J [UqI-Mw?Db&x1O3{C^~pp(J#tm<U=$sWaj%{-]1_R![');
define('AUTH_SALT',        'Xa5[& 3yV^ByOFWxc{rG1<8xo-#-uUh{A 0&p]B/*|m:Hl#2qC?-Ic{=2XC2`m)1');
define('SECURE_AUTH_SALT', '{ctpGo{!.([|zbjz&;Yg079KIcFWSR^Y0g-g:OyTgt^=J{[ZxO4]em1pcJrs.+QY');
define('LOGGED_IN_SALT',   '*G$m|f-|FNpo+x7!Q|abJdU`,p0E#ODxu0+3rnxUU+l>^:XihT 3BOQH xK=I0NV');
define('NONCE_SALT',       'umajosG`;;_iV*3>BVQYc09oe(j0R{=NXyF,uYy=T$Td{+!%zwHK*(FH(>uRQ?4B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
