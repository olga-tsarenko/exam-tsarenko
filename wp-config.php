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
define('DB_NAME', 'tsarenko');

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
define('AUTH_KEY',         '#wDGLvnQIs6oO0KO}DFL4]mrTQ*gG?l`S 3-Lp26oJSF=?aorm,_z !L2.GcH<Az');
define('SECURE_AUTH_KEY',  'bv%!j?[~>W>sE@dlf5uz7l/6+-tZ Q-QUDgiX#s5nW-rnK>Z4V+bzY/ao! &|n<S');
define('LOGGED_IN_KEY',    ')yQ#tKZrkm>li-Xv6R8BDwfDdn8.ad.p37I>^an[M{mgH?oE)Da(k.(o[ B0j$C8');
define('NONCE_KEY',        '{Jg{FpNpo=-6o(>w<{x%k|o({pki]Gd2WVXuV}1j}e?wz*#&b*T:8D%Ny4trB~+p');
define('AUTH_SALT',        '6[(~HWR@F7k))H&+:WWm^|%b|2^z=mD.1,@]gU/+vNgPMx;ZH81T$})USm27+3_(');
define('SECURE_AUTH_SALT', 'c41+@|{liq+u%:d+,GH5b9^E;h3kHZ_$QGR[Im-Ma/Lz{3TNA*&}s5)>OHB8^KBP');
define('LOGGED_IN_SALT',   'WBY;CBs}hX<[wNLy-ip?!y.ivew(-tQ?E/MgEuKa%sX|rI48R1_$_GS&Y05h!#2*');
define('NONCE_SALT',       '5qlr$I.X`s3-3$gH/[T{t96O]WP.+OT~GTC^-xw`t:-+>t{r;F++(_H_=hPrid`-');

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
