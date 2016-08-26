<?php
/**
 * Production environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment 
 * in this file.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */
  

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'trepebilvard_se');

/** MySQL database username */
define('DB_USER', 'trepebilvard_se');

/** MySQL database password */
define('DB_PASSWORD', 'ETi3ySLN');

/** MySQL hostname */
define('DB_HOST', 'trepebilvard.se.mysql');

$table_prefix  = 'wp_';

define('WP_SITEURL', 'http://trepebilvard.se/');
define('WP_HOME', 'http://trepebilvard.se/');

define('DB_CHARSET', 'utf8');

define( 'DB_COLLATE', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
