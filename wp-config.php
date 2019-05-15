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
define( 'DB_NAME', 'revised_demo' );

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
define( 'AUTH_KEY',         'CV0v=5W0e>$!_&sv)a~b$G.g4;qRLL>96]zwgDb]iMcHy/.c1fQpCJy,> uABe2Y' );
define( 'SECURE_AUTH_KEY',  'T=@Es-0jf$*kRMFEQp6F<ZE%nh#N~=11,1e~)q;>DTK.dB?H| 56`V$qUXrZ:W+:' );
define( 'LOGGED_IN_KEY',    '9~7U% 6})exk/s`1Z%.w8U$?CTR,wve~y :zt#b@h4z>t$H>hVtNP~T:rSW#S?(w' );
define( 'NONCE_KEY',        't/[Ly*o-z9qhKu`=_*i-BZ];WP*1Uk]3dzdaNx@LEbG}$C]nLUTc,_J{B@si>4=k' );
define( 'AUTH_SALT',        'c-s/WLzGEKm=pLDl7BKQW+*1e/mpSWCK;BB!;0?MCY -bw)Lx&i79ShjY/N0Sh4q' );
define( 'SECURE_AUTH_SALT', 'w4kFK@[W0Z|U;lQo!G*Q9??&:W{Ue}[:!uAXE`[)Hc:h0))>Nnc|<P&|.]uwf+3M' );
define( 'LOGGED_IN_SALT',   '8TaS]QJ[KBU*r p]tuZ$R^6^8d]s?]c|Yci~Rv$#$=:%VLR)O>:]*fo]lnR(pApp' );
define( 'NONCE_SALT',       'Jc+-/]*rmfWY5[Y`p~t#@[Em=(~ciLqu;#ed@r)}{_gV@CN,tkdlUZg%NiWM&*<=' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
