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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lymcoin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0]zdmP.,@ilP6z4ZyKeil;j_zi`p9gh!vQIx,`!MWAZJgK:gvV#${-e6qh;V`/mv' );
define( 'SECURE_AUTH_KEY',  'vJ$-^&WE$0tOzaL`]R&8H^>2/2y;kJR9^#TSvsF>+fkwX~;bBuG4/kM8_0JXLWsy' );
define( 'LOGGED_IN_KEY',    'LP`W:V+^MCM!|n#awg.d~0YDa>@xcCVw>&JPSQLq6c>Hw,`u(4,A]>9Z<hdE&WY^' );
define( 'NONCE_KEY',        'Uwy-4#HU1&4ph%V,}v^_ra.Bi@`q`fo!@jQN9K&e$pt/bNZ#_=$q12jGbd:8!kxj' );
define( 'AUTH_SALT',        '=7?>_4vE3:x~Ba)7D6by5`:Ts+,453dnucsz38M$SWi_;MwI$-ZeU?P(t)?k.JTZ' );
define( 'SECURE_AUTH_SALT', 'i<otn.1>-EKiK]`+[HUY(X,%K5i}6b?rj7?M c9{etJ$Ba7&YY(l:+[Reks=,G?N' );
define( 'LOGGED_IN_SALT',   '{q4z;IoE6|!!:lyb~-=%pyWX Wx;9@4]9YY${(b=gGy}^O~yI]qMx5=,QY:`m.p{' );
define( 'NONCE_SALT',       '`_ig!&VhlK1Mdt|n<yu.$x1Bemcut^L^+#E49h}5*EAT$c4,`ktz[x3@?I~=fP20' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
