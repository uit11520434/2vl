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
define('DB_NAME', '2vl');

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
define('AUTH_KEY',         'R_p]%O;lwy*vMxk.[Pj<1-uoAGSI?#lX@+Ohsca1iN5qx[_`y$j/n8L30y@AS@ZC');
define('SECURE_AUTH_KEY',  '^PTS%Ye@9wIE{rPR)K)&r(aOWBVd;J~%}kjjVCVqk.`a)YuQ 5cP6Uoc7$|pI4b:');
define('LOGGED_IN_KEY',    'j75siv*G.3[&KxWc)1imt8ePf`a3EU:@;w0~t7Qs^e,-BP{bB/PI>$9PHI~=<QB&');
define('NONCE_KEY',        '8&>PkY,K=`KUWHo:yB@laA}H9ls=n}-i&!~/cI{l}66X|Dr=d-OW[=Sp,pp(A`4X');
define('AUTH_SALT',        '7k2#7`l}W,@KG1NohL %>sIp!$J>ro=989&uMov,%8>}`8%B,ZpkpQF>0p*KFqkb');
define('SECURE_AUTH_SALT', 'idPY[gw4$kJ7AP^@FfcrHPAhUEQ[:jIuxM%,@IrhOv5)KIh,Oj%lQ>^~z,?S!4G]');
define('LOGGED_IN_SALT',   ')QbCs`IIQQ.Zbu-g@lhWCP~&n0sWv1Mmdy>)XZ G/{bvP-tMResszIQtJeRDs0AP');
define('NONCE_SALT',       '#c7)gWqWK^P1k+Tpm,AP!]!pJeZv*a11vztN`d44 {D@;U*Y)1w)mMjn5dvRxRD#');

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
