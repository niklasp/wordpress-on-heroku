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


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define("DB_NAME", trim($url["path"], "/"));
// define("DB_NAME", "heroku_4eed1f5663e035f");

/** MySQL database username */
define("DB_USER", trim($url["user"]));
// define("DB_USER", "b7cfc877a785ae");

/** MySQL database password */
define("DB_PASSWORD", trim($url["pass"]));
// define("DB_PASSWORD", "db3717c2");

/** MySQL hostname */
define("DB_HOST", trim($url["host"]));
// define("DB_HOST", "us-cdbr-east-03.cleardb.com");

/** MySQL database port  */
// define("DB_PORT", trim($url["port"]));

/** Database Charset to use in creating database tables. */
define("DB_CHARSET", "utf8");

/** Allows both foobar.com and foobar.herokuapp.com to load media assets correctly. */
define("WP_SITEURL", "http://" . $_SERVER["HTTP_HOST"]);

/** WP_HOME is your Blog Address (URL). */
// define('WP_HOME', "http://" . $_SERVER["HTTP_HOST"]);

define("FORCE_SSL_LOGIN", getenv("FORCE_SSL_LOGIN") == "true");
define("FORCE_SSL_ADMIN", getenv("FORCE_SSL_ADMIN") == "true");
if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https")
  $_SERVER["HTTPS"] = "on";

/** The Database Collate type. Don't change this if in doubt. */
define("DB_COLLATE", "");

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y_c-H&2R=ScvC:Mls+GqI/8thmW!$0c;yR&pcONCo8F<,*+6&*?;Cq@PQ@fdO#]k');
define('SECURE_AUTH_KEY',  'w?)!oN1`ZDB,7!bk,?~}7jE!Iw-GNK+}kNnJ7QQ;2bs.?NJB<|}@UQ|w%s)0unH$');
define('LOGGED_IN_KEY',    '=utc01=L73~<?@BzDC)U19=wnr|B+>Mo0?#1?P<:>khjh4d#RQgS*TWJDr!<G9@D');
define('NONCE_KEY',        '+f1+Jpo}KES1JmJSjjAftFaS*t,h.|8aJ[eW#+-q4}<`UTQ: J9=Q-pguCXU&@^@');
define('AUTH_SALT',        '-u[X2z2vXP?/`E:G3%J20#:++dF?:`MZz|cc`[~q8ygN:Q3u-|1c0&^y(O{~^-&a');
define('SECURE_AUTH_SALT', '%o0-p<M.bIps|Jk]Xf-U@dUVJiF<-[f*7oNVsmI$Du[74-NR5Y$QA<YapeJ-+jY8');
define('LOGGED_IN_SALT',   'A^`|yXY&-XQXCq#RZ)H|~@28RG%Cx/P+}SFmw%XcZhV,.cs8?98/hKv6&]6_O0*d');
define('NONCE_SALT',       'R!hS^3F|alR(=4#0~1>z_@t$>`o(}{+rEg?]NumM0&Wo X-JE|k@ui</|mI@VJGB');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = "wp_";

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to "de_DE" to enable German
 * language support.
 */
define("WPLANG", "");

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define("WP_DEBUG", false);

/**
 * Enable the WordPress Object Cache
 */
define("WP_CACHE", getenv("WP_CACHE") == "true");

/**
 * Disable the built-in cron job
 */
define("DISABLE_WP_CRON", getenv("DISABLE_WP_CRON") == "true");

/**
 * Disable automatic updates, they won't survive restarting and scaling dynos
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/* That"s all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined("ABSPATH") )
  define("ABSPATH", dirname(__FILE__) . "/");

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . "wp-settings.php");
