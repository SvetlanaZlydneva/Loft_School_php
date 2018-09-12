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
define('DB_NAME', 'vp3');

/** MySQL database username */
define('DB_USER', 'vp3');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         'QL_2e~*TYJ?}Y^h&=p5 OVQX#^8wuL&APbK6b2W+%G4/U(OIMrm=DKGj#l3YVT0{');
define('SECURE_AUTH_KEY',  'u$cCcd/.;j{}os3vt{b}pLnDVB&UcR=oJSUw>]::c`g?Cf6ztfKx{e5I>^9L=Qm&');
define('LOGGED_IN_KEY',    'U_{:RtkFt^:1(I[]9Z9L{z}k$k2U>u+Z^Wt+u$tF7eM$.@CFh?sV)ikW1MTMUESZ');
define('NONCE_KEY',        '2M<*q2Q67qIW5c5u#){ES2X6W+)9gjS:wske(z]Npm.Mb2y)K8@N83-)mPiov*&b');
define('AUTH_SALT',        'lzr;B Q1@@i>?[ku1*.gCq;,%iUnVtgq7z8|1&zNX}6CR9*_FpoCzt<;)E;4VsM#');
define('SECURE_AUTH_SALT', 'a~>HU4JzS]+g~RGyP{/GU`k+tYKG/8;Z_j@~+9c![#8A3y}ffbl@|(rnRzG,F7*i');
define('LOGGED_IN_SALT',   'P2LjQkb{QtL!},8oKUBx@X[+E[U |uP@fg.ZQ1QLq~A&mpmG*p{yiP`E-cQCYKUs');
define('NONCE_SALT',       'Y JXMWDWTa{4I8U}b_y][cdi~e/FG7EErc4tKIc6!Z7E6R1p,F6r`CG-clIYs^~W');

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
