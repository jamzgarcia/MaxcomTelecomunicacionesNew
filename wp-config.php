<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
define( 'DB_NAME', 'wp932' );

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
define( 'AUTH_KEY',         'oaczrzhfk7ja3iu2pwtvr4mut8wnyl0aspp1hhvi0bfv722kjl5x4v8fzvvs3jft' );
define( 'SECURE_AUTH_KEY',  'wx8ytpzflehq1vn6bwi42pklbvdkmvnof5jdnaehusr41dahotmvwi27rwwihiba' );
define( 'LOGGED_IN_KEY',    'b9swy6lrafr8gekfqwqhexts9lysfgtxegwprrpy4oa2ymyfsy3veaponlw8q6lz' );
define( 'NONCE_KEY',        'jzmquk4xffvtgpxewktitdvuet5v41bnqrmpsoelepouxgw1kcatejlx0wm976qi' );
define( 'AUTH_SALT',        'ft3rbsnvpb450jbfuqprnwkdbm2my8apputx2qo4ehnta5yfxhh4sm8r1jywjiqk' );
define( 'SECURE_AUTH_SALT', 'io53n5rffzq6duxxe3dgjb2fkbzd7ynxbc4lsf8kcqrdmp4kjojxlvgfsqtegf6c' );
define( 'LOGGED_IN_SALT',   'kx35vb43zawgm32ke9b6qiv0tz1sf2vaq3ewxahnvgonu8lot1nbpt6xg9z0lknu' );
define( 'NONCE_SALT',       'dfhttxq2q9pypytokvapqfbq4heljqaqrftmne8uugcdectzgxmasn3iixntuj9c' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpqj_';

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
