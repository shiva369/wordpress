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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'tco?*IOO$r_&#U[9A^aL_srWy}@r3Gu,whK~qketdsk|-p)3s_kE}y*Z7Frc2{<M');
define('SECURE_AUTH_KEY',  'O<;s!$:iGYiy9at2_{Ojs?1lev)za:)`7n}/.[92DOP]3Uu~n*tCs%*z4^}r}Jom');
define('LOGGED_IN_KEY',    'd>yR|fKGY9Ygmis}r}8dvfoeUBR -9wFkY+=~+y4O_O{!({x5g{CpPf_/~Mauzll');
define('NONCE_KEY',        'z?bXKLf(Ri,Z;@bB{{fi#TuJI@F#j6;bG6D,Za;_#j<G2BV}<TLj4Vp`DF:`vuEk');
define('AUTH_SALT',        '.n[N/o[>1FK<IDVKMsC&vJ U9XDo6ZA?;[8$^n24Dq>h]KIc%Y9Bkoax? J0o?N2');
define('SECURE_AUTH_SALT', '!@@mQUl,=|yc%p^5TAnez,[QX=fuS@tnim-l>PI=3.k0`C+5)yE=t3ec2ii[jZ4}');
define('LOGGED_IN_SALT',   'Rr&( @#,|0GYXVv9MqQ{j`9wEA?88bHzzND>H$|R$8he8eaN+A&C_?+,{w{I~dnl');
define('NONCE_SALT',       '^HNRk(Zpf3g|SWQ[ckcA9ft%Dt+zhk6(7O6[Z&)6E1[ChB5iPVFSvPw4-)XmL<rp');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
