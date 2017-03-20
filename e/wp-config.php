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
define('DB_NAME', 'newezoehunt');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ' L(l2X/Ta?6-s8rqm,N<M{b2J5CP%[/?%j%!2IHHPO&#V[,:U8++Ll)<[fDqq)8W');
define('SECURE_AUTH_KEY',  '}?R.r7D1&6+?ut7Xk6)4FpFAfm^! fx#k6mi14|.MuO$7^&<%z7muo;8cC&C_a_l');
define('LOGGED_IN_KEY',    'yWB8e0W%[}Ob]kBnH<5kzdHf2WZ2!l.;#U-DbldX7uCZ]w`L{3:>cC4=p]/;C`}7');
define('NONCE_KEY',        'yNR7Gh3r>H+S/%$#bwHkQbvu-u;hG6y@v!eE%ROU~5ZV2ht`>(E}n^@,U6Dsec:A');
define('AUTH_SALT',        '8;7aSQb|x|VJ&XbqmJ?oY@kfAnN%q>VLvO.y81 N.`[A6MehyQr[ft@cu9enaz,U');
define('SECURE_AUTH_SALT', ' WU rVC^s,uYP@Nmic99pccQLrv,vyN54juV;.6/gX#]A[P?[1(x;xOnP@X!Z*u#');
define('LOGGED_IN_SALT',   '2}{C-w%^uGqVEn+!A<|*QNz~]uNp`wDhtM&p%=W$i@/pswy uY1*cKOn:88|*`Cw');
define('NONCE_SALT',       'E:rOv^;sUwq,L9JJu@jj2h?Mr|JeV|~t,}zJ;gt6doqj|Tj[i,7[g@wTKy*/Yww7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'q3_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
