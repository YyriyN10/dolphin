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
define( 'DB_NAME', 'dolphin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '31a+:qOk#{)[E/pntkf%?k~%9O$O}|wa>5c#WSa6<<u<i2s;kd5MYh]|Qo|-rE#=' );
define( 'SECURE_AUTH_KEY',  'DBh}V~R`];vF{ro.8)CMQvHSQv<g40izXyQWM %%T<)IU$8BU4*d0 pC#CUi^Lr1' );
define( 'LOGGED_IN_KEY',    'O]>t!%E:C|&t9YGkZrk`8Vq190-W:U2OlwSpp[k(a<{i3?OTRt]Q*/PfbS5zex(&' );
define( 'NONCE_KEY',        ';iZk!V}C<7bjD97?,UiADO?qkO5gZI5(D4.MJFL<6[, 9$?*r=QR1{gmV6Ld]%LW' );
define( 'AUTH_SALT',        '(cgd_ZYaBH1HdTfY!NKB,.c.ux{!lJ#uA_fPykOf%HfO_H.30 .8ZqfI0y`<8Mq~' );
define( 'SECURE_AUTH_SALT', '{+Hk}%?rDG-(J{#XC#WD0p,JiJvT[<nzgXM>vVAnM;ZO4v2>}d>rG<4sOrUTWbb9' );
define( 'LOGGED_IN_SALT',   'CL1gjF_uf)eIt~p->%k%gn97{2O:d:;lv].xFmq0|bFQv|MGjHpJFF]2x&*a(4`5' );
define( 'NONCE_SALT',       'Cf4xvW58aE7B>}#- fd-NJQNs?^I3]BF#|^t9{?aR?L>&WK>8b4kSmcVDKPXgNzv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'yudoca_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

	/** Загрузка плагинов и обновлений без FTP. */
	define('FS_METHOD', 'direct');

	/* Отключение редактирования файлов в админке WP */
	define('DISALLOW_FILE_EDIT', true);