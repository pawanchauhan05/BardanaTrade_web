<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/********  custom constents ********/
define("BASE_URL",				"http://bardanatrade.tk/");
//define("BASE_URL",				"http://localhost/BardanaTrade_web/");
define("BAGS_URL",				BASE_URL."index.php/products/Bags");
define("TWINE_URL",				BASE_URL."index.php/products/TwineAndYarn");
define("MACHINES_URL",			BASE_URL."index.php/products/Machines");
define("OTHERS_URL",			BASE_URL."index.php/products/Others");
define("ALL_PRODUCT_URL",		BASE_URL."index.php/products");
define("PRODUCT_BUY_FORM_URL",	BASE_URL."index.php/product-buy-form");
define("PRODUCT_SELL_FORM_URL",	BASE_URL."index.php/product-sell-form");
define("BENEFITS_URL",			BASE_URL."index.php/benefits");
define("QUALITY_URL",			BASE_URL."index.php/quality");
define("ABOUT_URL",				BASE_URL."index.php/about");
define("VISION_MISSION_URL",	BASE_URL."index.php/vision-mission");
define("CONTACT_URL",			BASE_URL."index.php/contact");
define("FAQ_URL",				BASE_URL."index.php/faq");
define("FEEDBACK_URL",			BASE_URL."index.php/feedback");
define("LOGIN_URL",				BASE_URL."index.php/login");
define("USER_LOGOUT_URL",		BASE_URL."index.php/user-logout");
define("PROFILE_URL",			BASE_URL."index.php/profile");
define("IMAGE_PATH",			BASE_URL."images/");
define("UPDATE_PRODUCT_URL",	BASE_URL."index.php/update-product/");
define("LOAD_PRODUCT_URL",		BASE_URL."index.php/load-products");
define("LOAD_MORE_PRODUCT_URL",	BASE_URL."index.php/load-more-products");

/******* Admin Constants **************/
define("ADMIN_LOGIN_URL",				BASE_URL."index.php/admin/login");
define("ADMIN_LOGOUT_URL",				BASE_URL."index.php/admin/logout");
define("ADMIN_HOME_URL",				BASE_URL."index.php/admin/");
define("ADMIN_USERS_URL",				BASE_URL."index.php/admin/users");
define("ADMIN_SLIDER_URL",				BASE_URL."index.php/admin/slider");
define("ADMIN_SELL_PRODUCTS_URL",				BASE_URL."index.php/admin/sell-products");
define("ADMIN_BUY_PRODUCTS_URL",				BASE_URL."index.php/admin/buy-products");
define("ADMIN_LATEST_BAGS_URL",				BASE_URL."index.php/admin/latest-bags");
define("ADMIN_LATEST_TWINES_URL",				BASE_URL."index.php/admin/latest-twines");
define("ADMIN_LATEST_MACHINES_URL",				BASE_URL."index.php/admin/latest-machines");
define("ADMIN_SELL_PRODUCTS_REQUEST_URL",				BASE_URL."index.php/admin/sell-products-request");
define("ADMIN_BUY_PRODUCTS_REQUEST_URL",				BASE_URL."index.php/admin/buy-products-request");
define("ADMIN_LATEST_PRODUCT_DETAILS_URL",				BASE_URL."index.php/admin/latest-product-details/");
define("ADMIN_PRODUCT_REQUEST_DETAILS_URL",				BASE_URL."index.php/admin/product-request-details/");
define("ADMIN_USER_INFO_URL",				BASE_URL."index.php/admin/user-info/");
define("WATERMARK",				'Copyright 2016 - BardanaTrade');


