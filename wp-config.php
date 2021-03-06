<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_3');

/** MySQL database username */
define('DB_USER', 'wordpress_8');

/** MySQL database password */
define('DB_PASSWORD', '7cP9tH!J4w');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'dc9wOXp@bDXNfh*k9eiG3*CCsI3*Fx(DUCPuz35alwg4iI%cO&12o%W9ZSGEGDi!');
define('SECURE_AUTH_KEY',  'emS)Y2Mm&m9gHg8Go7Txl3g1!Una^49IK#6agGz(^f(bzXiBh&In@jfaQDtzK^@D');
define('LOGGED_IN_KEY',    'Tv66wPKGX9qRDxcHKzgQbDX%FivOJTn7vSlxbY)kxhVeIKIUhwGWEZjjqwyt9lFM');
define('NONCE_KEY',        'yV@C7eI@HBeq*tozZRIqCr%ErSPJjj&OMZ3kB27E1QdD68uoIx@Tylpmr(&P^@ls');
define('AUTH_SALT',        'vK&RrubEF8TkEZkgM3ZWn1a7NaplUJjOeMAFDn83574Lp(p8jp5i%X6(bdc#D3O4');
define('SECURE_AUTH_SALT', 'qAVVl%c4GKuOuG3Iqbar50d8!x@2ec9fZ^SYBtcZHfSZkgVMOLqrJMgrKLMWG@t&');
define('LOGGED_IN_SALT',   'g)iyfxBCwiaG#9q^A*4RwOI*8Qb60YqeMlUTSha0A90rkkW)Sq*(8MeJl#9^i2SB');
define('NONCE_SALT',       'lutpdCYqtQDqje4Oifa(mLrXHWemlVgLaJ4aatJh8yEnBgh7Pg!AD6aas3jzx93V');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

define('VP_ENVIRONMENT', 'default');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
