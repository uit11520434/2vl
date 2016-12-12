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
define( 'WPCACHEHOME', '/opt/lampp/htdocs/2vl/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'hayvl');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '<qxzZOeX9H+YUE-QlF-}:jgC$u9E> ]9?:W(ei]}f$Lvk!%M@+isWBJV6mslo#:5');
define('SECURE_AUTH_KEY',  's}-D|Pn-P})NK>7vCQr?@9(4Z^NLH/LGV*<4JB%f:W2dwPc#;J(p;@-C+tco Mc6');
define('LOGGED_IN_KEY',    '=r|CIkg%.tg^ Uec!_F(Jzw=-B6xRvZx-3XnHD-/_L}cMn{hWux1*hlzQiZw]:Vj');
define('NONCE_KEY',        'spNB3DSuI#fdA0v.|03[4_o9H2zuM[BWU1^+:$nY=x0f?Gr</xIfEn%w(H ikeb>');
define('AUTH_SALT',        '|w@[o3V]Cn/M9jA.}vI~-<AR,rImBDU,7[K,S:nkZ$,9 3<+]r5QErSOlx+hY]E8');
define('SECURE_AUTH_SALT', 'MIC|p&RksRL8)t@(SLJ,h~E&M6^QSTbGtL,DS+K@W@p#GcfNcO,DT+^`$|4$f#|=');
define('LOGGED_IN_SALT',   '@vA)ty$lHXml#e&c::Xf_^K_iT@.ysSx#<nj+8]+R?+cQ8;qoq@?bcvrptT4>R@Q');
define('NONCE_SALT',       '%myc_FkkY/ MQ66DKERf&qB>XiC#_7XcU182C:4q~^J:aeD7E :9V#aZ<7!zT[kj');

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

