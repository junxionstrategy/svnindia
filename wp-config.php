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
define('DB_NAME', 'svnindia');

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
define('AUTH_KEY',         'UeldAoxvrh*7yphJ_aWn%7Qzn>n9w>=>S2xt-[@`s`Bf;CPc=)a|oCg&S$s/eOF*');
define('SECURE_AUTH_KEY',  ';~?~YY?eldC.&$$p86s-j/?E2 Qkr^c FaK]X)09^+1}K[4E:1>Hs(1r291k3HJs');
define('LOGGED_IN_KEY',    '5Z|K}cxB+@<G3z[rM-/zH-Nsg;& Q:a#X1O63vJFj1 T?:#s?I$VccYUxe+c8C`j');
define('NONCE_KEY',        '$`4q/Ci%q3u&k)9Pb<21]>o@n<*sn-MXpe**R7;) ;Se.EoI:/&P1@m4+[47`{{:');
define('AUTH_SALT',        'aJ_L2yNmgAQ.^d8ao?@D2=b+HuEO-^m%c.ZD]sZI MhLA&Z&&T(*4puCm%-P7V&c');
define('SECURE_AUTH_SALT', '{CKMs^;,^{J^#}[aiWGEyK+++#Zl8C95W]laoZ#M5-A_BaW40kqK>6&=u|{!1>C]');
define('LOGGED_IN_SALT',   '$(rb.^=uf2#Y X@|R}fg:H@YZCFn|_c%l3a-Pzh,=9~$6b]J+A!ck+U-+|UXA-lx');
define('NONCE_SALT',       '4J,Q%S;3r?%^z>:/3qm x=0YzwTwv:64wb f44J^TrA%Z$s|#d:?PFpXj+s7zG~J');

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
