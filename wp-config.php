<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'maxcomtele2022' );

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
define( 'AUTH_KEY',         '.J vHw?Wj%W0ZheI]-795uL_e$.O8`wq)OK+TfB9;X4&(zf(ouL7!Vx&J1m;d*dG' );
define( 'SECURE_AUTH_KEY',  'I[-1M>?ZXwg4~k1lL.s1YD&TQVhz<9`w3 o2b9+S>B9fLA.;Y.dL]-3|i_,FS+1b' );
define( 'LOGGED_IN_KEY',    'kUEAZNmt4YRo:$8.A&4ob_I; u7IGosEpcNhQ#ie.pU`}uW9~?@8|5FghjyYrcA@' );
define( 'NONCE_KEY',        'mBH_`x~F+:}}e+@h?u{(2^Qe|9@X^oTd9izK&F4gtTI0drtSnF?-rOpad*rb3>8M' );
define( 'AUTH_SALT',        'FX,|h5BHgT.2c2awElu};l#Kf<k}I_pB4CCFP+BL>CXvQ:#Pl(-GcN97n3{C:WqU' );
define( 'SECURE_AUTH_SALT', 'KkB1BMgzS]Iop8AHJ],#$=Iomd^(O}C4|,*<>U}{;7-&NwX)8@Xm>=de02yMHOxm' );
define( 'LOGGED_IN_SALT',   'R%1R6l}!wz]_9sbReq{=jv|u1GhZ,AA9i:?!7xWumYq(4]c ,Nq~$dD;enhpa}q4' );
define( 'NONCE_SALT',       'e.SrWo SOt&Pg$rEZPG]O[=x1}bAJ_g?O&B;Qnk71=Oc%xONdAYYzdykJ@j:<!)R' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
