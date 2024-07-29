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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'event_db' );

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
define( 'AUTH_KEY',         '#=C9izH(|MoaUA}quDGoz`a#yhw^!FgnX*qaE_FhR$XC&)`X_RRW@hm[pKHEbGss' );
define( 'SECURE_AUTH_KEY',  '_7#%E/w/;Ps%t]X9zt.1wf6LfQ^*$~tNAALoENd``yW4i&XfFF%xb?cPAI,Jom4/' );
define( 'LOGGED_IN_KEY',    'GU*{1B%AA:qq#{vN`]R~fHc}oont&|b1@?x*7Q0,_Z)a+C<TF;zT<:=*aW^z.,v]' );
define( 'NONCE_KEY',        'Mx@%;,zjvyc5JX:HEp-[Xbq-U8:c;Wdy40uuI0bTL9nb&J=R8qFW|l`8jaaaS]e$' );
define( 'AUTH_SALT',        ' 4S5F6wHE*3ky,eJDBQ*aPxA&`2N/jPX&wSR3.}e]eDJznz,y3!qrW)o&gQ`])]k' );
define( 'SECURE_AUTH_SALT', 'OjVh|y&kj2sm1V,;(JzbUEoq)|>+#grh>xmZ<gu46#<a?[{{ol{kj5zHra:D3<sk' );
define( 'LOGGED_IN_SALT',   'IMCxbg8CxuR@$3i2uukF_)XL1yrC^E)f9!&*/3m7sO09{h5_<l-dyAsPVqsq0l3<' );
define( 'NONCE_SALT',       'E/27+]5 f&mmgU;kxClBmUINNBx5SBsZZFMD3)u3zEu/?7I1m`GyM3)|agNwdfWD' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';