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
define('DB_NAME', 'wordpress_onlinelearning');

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
define('AUTH_KEY',         '_wz7>A.ws4h NF_h@u+ Q0{Rx><AZiW!r`=d?ef3O]>|rgtL[$C;.;tgGRKyA&:c');
define('SECURE_AUTH_KEY',  'sc}]];zkU3uPt||,ic^kFZ_=Jw;WKwi:Ma?@DfM2#,f%8&.1 Aw7iU)iH_e>)(za');
define('LOGGED_IN_KEY',    '[Flq$}S%Y7TLmY0KiD&u13bHRp$lR|lD+^; avb`/EYyl>,D.}^Pre*Y##)t1d+}');
define('NONCE_KEY',        'Kn1*cIeMnA{&[L%g#_fZ3XQQbxe(ncn[v)ct!/mB-}=Q#i&%Xg,eQ_yVE0nfh,T5');
define('AUTH_SALT',        '6ZR@uW}dqIhn?Y/&q,.A#8U2%F|TwTqAfhl}?4FhT%eeFB,99,oVnqHirriEA%oH');
define('SECURE_AUTH_SALT', '?ZfElNtU;$FdNJ~Nh+V5@SXrg>7>(7_{u5H<UmFfgta/YT2JfybNmwC1IWPlQ:@6');
define('LOGGED_IN_SALT',   'SonDVj-f=nXRh2oL;5>|kswdw,P(CkFNs+W~K;KSOv@yEBcX{pD=vK<4Jm$l.2d.');
define('NONCE_SALT',       'HG:bkiJr`NF`gf3M~IT!ewJ`XNB,oTK^ECP)44Ffj!=O ]4Q;FdOg_3!7TpA% .0');

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
