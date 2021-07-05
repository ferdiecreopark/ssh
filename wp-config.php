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
define( 'FS_METHOD', 'direct' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define( 'DB_NAME', 'ssh-dev' );
define( 'DB_NAME', 'kfzttgre' );

/** MySQL database username */
//define( 'DB_USER', 'root' );
define( 'DB_USER', 'kfzttgre' );

/** MySQL database password */
//define( 'DB_PASSWORD', '' );
define( 'DB_PASSWORD', 'iplU-Z)Y46nD74' );

/** MySQL hostname */
//define( 'DB_HOST', 'localhost' );
define( 'DB_HOST', 'lamp109' );

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
define( 'AUTH_KEY',         '30m! @mxQ^!Lvy]<.yX;M5w36r |IEPx9#OOlk)++22wMNtA:XRV-H;vyJ*bfd4v' );
define( 'SECURE_AUTH_KEY',  '0yW~/>-Y*XKAPU o&BgsYT&N%inxpbh!}v%k#GjZ?qkX-]>!?,Kg+(_VSQh[&}r4' );
define( 'LOGGED_IN_KEY',    'v7:L(dGf0G(BZE9Cn^+[q2X+o>{u_r+>5gq{ClX_*aoh[yxB{Z`1P?]NTPT_`7RB' );
define( 'NONCE_KEY',        '.S],V.}_vT4`~POMj|:xqqZoUdu!jUzPzEb[t`TowjQg6K,M/R[[dAU]amroycP#' );
define( 'AUTH_SALT',        'e0Sygaoy7E%bUquge;^>fj{W^AQ=#8!N!y%`@1EJCJ7a.9n!GY[]n(vz+AoQ4Zg@' );
define( 'SECURE_AUTH_SALT', '4IJ^%gV/s1E>f7-=~6Xga:6{mC}KP9[dDkkVfn98cb!.4d}fw<,y&OHj!TRZACD2' );
define( 'LOGGED_IN_SALT',   'w`>2V<4IC@:lMJ]/)B>+<y[^aKF[;-[O7T[i&sO8)%(]rFKL4|U]O-*EgF=j_MjR' );
define( 'NONCE_SALT',       'l7GGuI{Z0hyEj1MwK4s*ztHw*_-;.R>Dlo]_M30HZ!<WLO;~^z~0}q*6;AT5TSmB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ssh_';

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
