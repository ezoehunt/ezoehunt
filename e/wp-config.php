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

// Setup for Environments
$environments = array(
  'local'       => 'ezoehunt.dev',
  'production'  => 'ezoehunt.com'
);

// Get hostname
$http_host = $_SERVER['HTTP_HOST'];

// Loop through $environments to see if there’s a match
foreach($environments as $environment => $hostname) {
  if (stripos($http_host, $hostname) !== FALSE) {
    define('ENVIRONMENT', $environment);
    break;
  }
}
if (!defined('ENVIRONMENT')) exit('No database configured for this host.');

if ( ENVIRONMENT == 'local' && file_exists( ABSPATH . '/env/local.php' ) ) {
  require_once( ABSPATH . '/env/local.php' );
}
elseif ( ENVIRONMENT == 'production' && file_exists( ABSPATH . '/env/production.php' ) )  {
  require_once( ABSPATH . '/env/production.php' );
}
else {
  exit('No database configuration found for this host.');
}

/** The name of the database for WordPress */
define('DB_NAME', $EH_DBNAME);

/** MySQL database username */
define('DB_USER', $EH_DBUSER);

/** MySQL database password */
define('DB_PASSWORD', $EH_DBPWD);

/** MySQL hostname */
define('DB_HOST', $EH_HOST);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * You can generate these at the following address: https://api.wordpress.org/secret-key/1.1/salt/
 * You can change these at any point in time to invalidate all existing cookies. This forces all users to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', $EH_AUTH_KEY);
define('SECURE_AUTH_KEY', $EH_SECURE_AUTH_KEY);
define('LOGGED_IN_KEY', $EH_LOGGED_IN_KEY);
define('NONCE_KEY', $EH_NONCE_KEY);
define('AUTH_SALT', $EH_AUTH_SALT);
define('SECURE_AUTH_SALT', $EH_SECURE_AUTH_SALT);
define('LOGGED_IN_SALT', $EH_LOGGED_IN_SALT);
define('NONCE_SALT', $EH_NONCE_SALT);

/**#@-*/

/**
 * WordPress Database Table prefix.
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $EH_TABLE_PREFIX;

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
define('WP_DEBUG', $EH_DEBUG);
define('WP_DEBUG_LOG', $EH_DEBUG_LOG);

// Revise revision schedule - in seconds
define('AUTOSAVE_INTERVAL', $EH_AUTOSAVE_INTERVAL );

// Only save certain number of revisions
define( ‘WP_POST_REVISIONS’, $EH_POST_REVISIONS );

// Completely disable revisions
//define('WP_POST_REVISIONS', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
