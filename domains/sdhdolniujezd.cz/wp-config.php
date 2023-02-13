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
define( 'DB_NAME', 'd314059_kdk8ju' );

/** MySQL database username */
define( 'DB_USER', 'a314059_kdk8ju' );

/** MySQL database password */
define( 'DB_PASSWORD', 'AMCcQfFR' );

/** MySQL hostname */
define( 'DB_HOST', 'md367.wedos.net' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '9vl44ZaSJSAasK1xHLjki5Wm6tMsnFdxc4rNhHOAo2HArD9EA6622rroUrlZAmyv');
define('SECURE_AUTH_KEY',  'T43xLMzWZlIo977Gvm1fKKzU9Y8071Ni3F0OKi0bgYESxEbGh9TV5kMwToVu974H');
define('LOGGED_IN_KEY',    'hjszkvbgkSaMiFSRqKeedqa6OGGk7e7rAf9eMuAxPdmBf8vGmYmI9i7LrOXVcaEG');
define('NONCE_KEY',        'VGXiYcMATnIk0Y5UDeWhpXMofUumU6RoNNZxxnLiaUTCcdYcSe9qbBY7rb9ymhna');
define('AUTH_SALT',        '5WdRD8x2n8swTXIQ55fxfpWtsdZrEcHf1IeiRduwDGtbVfrEY5OFOsuiDjkk1RGJ');
define('SECURE_AUTH_SALT', 'bp8g0ze0j6A9zwrXZ3JbAbS7aMymIE5BfKR0HBq2aPejoLZ8fGCwKiRJrZjU5rSK');
define('LOGGED_IN_SALT',   'gy71leqCQcySLWAVXB7c15BW5K4bKcnSo9o5dlIaw8Aqx7O6i2GcXeDbB9Ra1bFU');
define('NONCE_SALT',       'f544N99XvAWBDcHbowLW5dt2EaW36aIEP9wNRf6Kg5Kf3ML9ChfddTEZTz4tn9yC');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'viiw_';

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
