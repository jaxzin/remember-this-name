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

if (isset($_SERVER["DATABASE_URL"])) {
	$db = parse_url($_SERVER["DATABASE_URL"]);
	define("DB_NAME", trim($db["path"],"/"));
	define("DB_USER", $db["user"]);
	define("DB_PASSWORD", $db["pass"]);
	define("DB_HOST", $db["host"]);
}
else {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'callgoo1_rememberthisname');

	/** MySQL database username */
	define('DB_USER', 'callgoo1_webuser');

	/** MySQL database password */
	define('DB_PASSWORD', 'W3bus3r!');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');

	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~Cs._{g(nQ6iMqRoSX/K1p*T+573|f!kZ`-Kw:r]0=v>a]-|3/<8jK|D9/(gmfqg');
define('SECURE_AUTH_KEY',  '+z^?eU4cY}fP*|)D^AymsMX~A!<+[~D4ahPJH?^@eVk5jLd:Gs:q)YP9Gz7l02K+');
define('LOGGED_IN_KEY',    'Je#:}v+{.u0BPxY_T.2v<>WI9/+~umT1d^ExRKM4 {rx*g3rHCcrZ:%1bXi?K-/J');
define('NONCE_KEY',        '4da7=B+4:tk%#DtP9UUY__7mU@k|.>N(M9&9>cFH)Z|*R4.EOPqfaz}9ZVdE-DVU');
define('AUTH_SALT',        'u>-|.6@jE..AZ[o~(U5<odmq<#=q]nzBBPX}Q@LeLt/k5KKTcM&qK)e_|:lSnE@%');
define('SECURE_AUTH_SALT', '<`a,e)Q,-Z`%aJS]!n kc9`;r*::f?1w=.Ent?b]a4O<aze^t^[S]]L0di@9U&=w');
define('LOGGED_IN_SALT',   'v[E~fE<B7-|7tR6qzz!E&u1oKJW1yrW(2,jW0>b3M7MX}mCQ}z}.l9P>pG%m|{h|');
define('NONCE_SALT',       'G/;H1&Zj}r+VLlV?3C+OAAF{KW~M~/W=4 KO1ZEjp@JW7sJpWzo~6a1.|.+}ljbY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rtn_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
