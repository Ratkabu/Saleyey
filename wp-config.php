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
define('DB_NAME', 'slydb');

/** MySQL database username */
define('DB_USER', 'slydb');

/** MySQL database password */
define('DB_PASSWORD', 'vtoW2rlr51GfdjS4');

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
define('AUTH_KEY',         '=1H7TY^a~CF@%^b h`hv_U3Tb[)Hfo{Axh4:_$2xMmIzi7UE<Is(=(S<3GYp<9=!');
define('SECURE_AUTH_KEY',  '(ML!{t]Sw?qgSgKl00~7|?>:ER=DsIwbkW.%ZL|5)!Ic`HB^ixJwwo~Bf@EQA%}(');
define('LOGGED_IN_KEY',    'FG(&%INIC;mly*-:MAozvhkN%=d6R(P//~hoUKFRugYO6$ox^|zJ<cJcwGun`(Oh');
define('NONCE_KEY',        'ezD>z!$.#4LhxQFNsbEmdat@&M?Qu$11+hbN]Va_p8LSq=U6vy:`vbZjk_H988`0');
define('AUTH_SALT',        'fGPxHQ-@_$F:0Nc2t=pTgl`g]1aGbJh0`4?X<G_hF|k6%!qRYvj4fZnV%}jl3/T6');
define('SECURE_AUTH_SALT', 'QiIP*Y/~X7wEeh.V Q>68IZM-o?e(cG(BeafXAMJ-WQC52=$`YjW.UUas5Rb$Wp{');
define('LOGGED_IN_SALT',   'k-sq.eQR()i/Le-T*eX:0mD,UUFYT_L{2U|z+$BTf]K]Ngs=;[zgPg8JvcsXs`#n');
define('NONCE_SALT',       'hjo@)zHG;lSj}O!V|q+(f+.%Q*51zzNe- H4.XkMhcJc1>L&>.0lvYe|OD6Xs?w+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'slydb_';

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
