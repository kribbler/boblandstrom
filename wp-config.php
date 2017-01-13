<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'XaA9.T;Ed50~2]:0=NXlg|vOk]O?@HwkR*c@j6P~+%?1Ic.4pBYl.scWz0?x]I-Q');
define('SECURE_AUTH_KEY',  'EhNpLQ|NWY,brpgKqIQ/ZUw^n=-(~2-v#ug*4D2m)_&mzgY!o`iGvBBc+F$hxTJ<');
define('LOGGED_IN_KEY',    'gns{zdeY$r!~_wc6pnu~ts^bAfXQZ]m)4%%=<@r`:NG1a|00W[Ene,q(BC k^M^n');
define('NONCE_KEY',        'h0GQ^7a3~!XW3.)${|f#-x`5NC$?qzl]8jO`J|`6+wvX8DK(+ycZqZ=O[sDF4Ows');
define('AUTH_SALT',        'gCGSks4}kl~E/o-r`7J?)4}^=`/d,Q30fW|j{cv-d]V?bcn=O|hXJ<+<I~w%r({0');
define('SECURE_AUTH_SALT', '4Ts%iesfhjhuo-}53!t%xD0p+gEI.oDuof ?8@=Z0Z}G)A)cjc@~T$fK>0xv%Cog');
define('LOGGED_IN_SALT',   '-X+/[V Zom?h^|5NawBuT+7bC--QpgPK87g?-@{KHLP(+OQ2+dFX|/-QgG=$Gz`m');
define('NONCE_SALT',       '-h|*6~&wkderx~+E1ji5PrBrSzcy/--->_8gB%h[vZ9Sb`=V/j0#PeQ@)a1|v$%n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
