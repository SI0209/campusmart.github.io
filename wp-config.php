<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'websitedb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uVv^;0`.R%{1];;8!NuLRH&<SLss(yIta#<U{c$m{lbul80~4~W1T_qKtO1r/baP' );
define( 'SECURE_AUTH_KEY',  'iE2@8[qfELL-!%Ij rgIG5;qcq8nwS-sR^trX,G|&A}w0|F=gU~yXT++i@@8+q)X' );
define( 'LOGGED_IN_KEY',    ':#B gWV-Bh[5B:`R5&&Rqkp@PID2q;{*T!bDYl_DI{Ey.#}CV=g#=hq_95X<KQz[' );
define( 'NONCE_KEY',        '5-kVJ}<jryYn:]m~cV584g?96LxbK)OZq7aYpduB[lV#$NJ@E(OH@KMT(w+8$p;8' );
define( 'AUTH_SALT',        'z><:y5@%4}3 J.z+U(/,nQid3!C5!Hq8S@eJ_) _@%%h)2K,1Cy~}BU3;*Dkdzul' );
define( 'SECURE_AUTH_SALT', 'C^-5k%rIM9!<Fz&p)6=0uN$3nZ2a=b=+W)P4>DtYqA<,Zx+V:hUT<LX0MC0dxV(Y' );
define( 'LOGGED_IN_SALT',   'Uc9qXTcg}5NJOLar3|=,ch.p*;CAvKX<5ebX cJ59g,&:zv-6z{gp/boW5Vfl*%p' );
define( 'NONCE_SALT',       '0+NW:]IU>,?d$.(mlt5z[>tyv=>>r_O9nb4gn`rP[gN%-nL-;%24W5jYi;.Z3oxc' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'cpm_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

@ini_set( 'upload_max_filesize' , '700M' );
@ini_set( 'post_max_size', '700M');
@ini_set( 'memory_limit', '1024M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
