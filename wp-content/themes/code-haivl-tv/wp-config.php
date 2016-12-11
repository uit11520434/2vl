<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'm9do?)5cnqGC1+<gDz,H/w*-eJGy>axqkAtU!Tsr1]&!a?>F_WM~*4Xuw/:v >hY');
define('SECURE_AUTH_KEY',  'u`P-q-YG,DMB|n+gYSr6#koch@vw|0q4G&gjYxy3l;A:+!)}v_Q>qyJWP|@&#B`1');
define('LOGGED_IN_KEY',    '4Elz%b[gYOb?@PRMrb.0y5F`|~&qk=l{:0kb@ o_/fSojj2/+Dz-m!a+jNfnjVdT');
define('NONCE_KEY',        'l0W]XE q1aL<CSH>jWS]O6c/l+j6CC%O)  k!VZB!BR-RuB:nB(pV;]s;-|WU[N_');
define('AUTH_SALT',        ')/mKclA .R[ @fva94#2;VnG{bmRYp{rg-O}@{l -)yG _J6qnN)H#)5OA<:`YO7');
define('SECURE_AUTH_SALT', 'MO[(p*!^O>;Zfb(=Y)QF-^mklN.RZcQ@#tjr%|43zGz:L9Ek3xLw6pOM6!ftU1|Z');
define('LOGGED_IN_SALT',   'iMj&-;)?!W*ixD$e(Dl-B13/8lx&v+;~luU 0}Yb&A+lzt| Q,mW8Fre23iLEQ,{');
define('NONCE_SALT',       'vah>%HeDr_#-ab+WK%<D5ChjOkw7,OY+Y,>kG+A*dI!1g@67@MWU:S2k,/+rtu&e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hai_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
