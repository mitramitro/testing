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
define('DB_NAME', 'casino');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         'VWk(lEv`H/5lzvtJ$N%:gmc*B=o8Db5tw^$;3o5a_>^ T1ws$4b%aSiRSo@`EoL0');
define('SECURE_AUTH_KEY',  'u>AKE$+-6>B1*#u/seJEfdPDML,SjYGV=,_|JUq_U0$W_Zj}vhxU5bN+vYjoq%|{');
define('LOGGED_IN_KEY',    'gW9N|JgeNF !0D>]L|[&]7kpMS(L[3n/jc,]W?&1(xWy=D1o=:571]2`cZRQS?n+');
define('NONCE_KEY',        '(LVS_mBkI9=N%tbnOKu<%KiNwt?%)vr#P157;j;#P@RI^R;Y2NADAV6+3(i>2haQ');
define('AUTH_SALT',        'voK&sJ;QOLaIe9E9X;>SBKa9)$x5-_VZ+cR]X}[)xgO|k`M+m}:>>}<R>&sqkLx6');
define('SECURE_AUTH_SALT', '[f&r@*qD[cdBquec+T4MpJAvxtdQ}q/^4yo!{RE`p1M{0mF+}Oe*,,wha>*$^6K!');
define('LOGGED_IN_SALT',   'J/E|;cZ2LpTFHg&Dyb$/i#8y5 03^XX5<UL.$>iVx-F(!r^Z]JH[B93*Xw,us1lq');
define('NONCE_SALT',       '~;OM4#)O!v]MC[i`;r[iqA2O+OueLO<|qRP@{*T]r9hH/}(|[d|J1w/.[j=?K3I(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
