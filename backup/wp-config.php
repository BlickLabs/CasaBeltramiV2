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
define('DB_NAME', 'casabelt_dbcb');

/** MySQL database username */
define('DB_USER', 'casabelt_dbcb');

/** MySQL database password */
define('DB_PASSWORD', 'P880Y[P-Sx');

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
define('AUTH_KEY',         'wbuyeifprrw4yrtja9qv5q8ufks6ixmobqelsmf6kvrxktz7vdffev9c7w7k3rpm');
define('SECURE_AUTH_KEY',  'ogkhgzd1bvd7no3bxsmvx5e6ndbvniqowh8cra5wuz8qnn8dhcivmf4ttstzfijy');
define('LOGGED_IN_KEY',    'rfdfl73u3ap9eaua439tadragdwsuyuz2hosgmsngflhtibfnmic49lp3q2ycsp1');
define('NONCE_KEY',        'tfix3b1ogh9idkcgo3qy7iactku9qyqc5mhdlnnvcn9zdvdjicbg0yi8mnsdngkn');
define('AUTH_SALT',        'jijl6zmsn6x70bli7eujjetftsx808rfp66u7pvqyssrusaf5cphpbpnjwmj2mv4');
define('SECURE_AUTH_SALT', 'wpoqvig8dmyugj4xvw01a7tpcwxsw7vyzxv0miqkywiwwvdgpytzkqp0oueialrg');
define('LOGGED_IN_SALT',   'vpp8y23eoh1flxayhwkgavaujvmxrhbmfyo7pqjvvflcp0pjhjaetksm7jtpsbcb');
define('NONCE_SALT',       'cyb9tpfcg9qpsojqcuwxs220vl0eijpdftjmte4sbq5edodlzb8vmfhijw4hneam');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp9l_';

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
