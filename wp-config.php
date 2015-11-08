<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
#define('AUTH_KEY',         'put your unique phrase here');
#define('SECURE_AUTH_KEY',  'put your unique phrase here');
#define('LOGGED_IN_KEY',    'put your unique phrase here');
#define('NONCE_KEY',        'put your unique phrase here');
#define('AUTH_SALT',        'put your unique phrase here');
#define('SECURE_AUTH_SALT', 'put your unique phrase here');
#define('LOGGED_IN_SALT',   'put your unique phrase here');
#define('NONCE_SALT',       'put your unique phrase here');

define('AUTH_KEY',         '/h(~Y#K!5RBX|s(*b;5v{i(c( H:t+,oD^2<Yd*]${no#h|KTD+!2R5s=~V7+Hj&');
define('SECURE_AUTH_KEY',  '`ncO|F<I%D91<f;z+q $jte:Pwmd!Paf40g_OHUZ*>_9->B&Tu[|NQ.M;|hy-pqk');
define('LOGGED_IN_KEY',    'IY(c_r4a_94.F-;2QqR{z+RvF(,M-`J=J+8Jo%+8Qt&q&h-omf`,?Q?y.J-P<)e(');
define('NONCE_KEY',        '3Y:a}ar})aCgj#{AYH42|fuI6PQ8MR(Z]TWB|;{{A+*={xpb nVXKcMn&$C(y=:@');
define('AUTH_SALT',        'vcd@9]&Xk4UOX;mvb(XT,nF8PVYut9Kj[rDWLJ-n@+>.eES]T)=|{zp;@->F=mH/');
define('SECURE_AUTH_SALT', '%+^Z=3:,P8l-l5*dvd|_|M#>Y>;3F.V.zZQ,%Q:HaU&`*7<kNf^jM<8ur+Z]1oSw');
define('LOGGED_IN_SALT',   ')#Hey-O)&j&`{$edU2,~^Y;Cj8?p[Bh+p3`]S_U~$:,e|-KoJCN{0p(=G<A+z^v&');
define('NONCE_SALT',       '8VLt|{^~uab^@kZsdRB <c/fDVAb4)^S_EG|nC~ MA3B+%b)S<eWS&4C,jQ!YO+V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_MEMORY_LIMIT', '64M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
