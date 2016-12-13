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
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('UPLOAD_PATH', 'uploads');

//******** database table *********//
defined('ADMIN') ? null : define('ADMIN', 'admin');
defined('PARTNER') ? null : define('PARTNER', 'sft_partner');
defined('LANGUAGE') ? null : define('LANGUAGE', 'sft_language');

defined('WELLNESS_TYPE') ? null : define('WELLNESS_TYPE', 'sft_wellness_type');
defined('WELLNESS_TYPE_LANG') ? null : define('WELLNESS_TYPE_LANG', 'sft_wellness_type_lang');

defined('WELLNESS_PROGRAM') ? null : define('WELLNESS_PROGRAM', 'sft_wellness_program');
defined('WELLNESS_PROGRAM_LANG') ? null : define('WELLNESS_PROGRAM_LANG', 'sft_wellness_program_lang');

defined('WOW') ? null : define('CMS_PAGE', 'sft_cms_page');
defined('WOW_LANG') ? null : define('CMS_LANG', 'sft_cms_language');

defined('COUNTRY') ? null : define('COUNTRY', 'sft_country');
defined('COUNTRY_LANG') ? null : define('COUNTRY_LANG', 'sft_country_language');

defined('CONTINENT') ? null : define('CONTINENT', 'continent');
defined('CONTINENT_LANG') ? null : define('CONTINENT_LANG', 'continent_lang');

defined('WELLNESS') ? null : define('WELLNESS', 'sft_wellness');
defined('WELLNESS_LANG') ? null : define('WELLNESS_LANG', 'sft_wellness_lang');
defined('WELLNESS_IMAGE') ? null : define('WELLNESS_IMAGE', 'sft_wellness_image');


defined('ITINERARY') ? null : define('ITINERARY', 'sft_itinerary');


defined('AWARD') ? null : define('AWARD', 'sft_award');
defined('AWARD_PARTNER') ? null : define('AWARD_PARTNER', 'sft_award_partner');
defined('PARTNER_AWARD') ? null : define('PARTNER_AWARD', 'sft_partner_award');


defined('ROOM') ? null : define('ROOM', 'stf_room');
defined('ROOM_LANG') ? null : define('ROOM_LANG', 'sft_room_lang');
defined('ROOM_IMAGE') ? null : define('ROOM_IMAGE', 'sft_room_image');


defined('UPLOAD_PATH') ? null : define('UPLOAD_PATH', 'uploads/');

defined('HOME_PAGE_SETTINGS') ? null : define('HOME_PAGE_SETTINGS', 'sft_home_page_settings');
defined('HOME_PAGE_SETTINGS_LANG') ? null : define('HOME_PAGE_SETTINGS_LANG', 'sft_home_page_settings_lang');

defined('BASIC_SETTINGS') ? null : define('BASIC_SETTINGS', 'sft_basic_settings');
defined('BASIC_SETTINGS_LANG') ? null : define('BASIC_SETTINGS_LANG', 'sft_basic_settings_lang');
