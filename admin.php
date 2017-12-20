<?php
define('ENVIRONMENT', 'development');
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
define('APP_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('EXTENSION_PATH', 'extensions'); //extension目录文件夹
define('EXTENSION_DIR', APP_ROOT . EXTENSION_PATH . DIRECTORY_SEPARATOR);  	//extension目录的路径
define ('PHP_EOL', "\n");
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			//error_reporting(E_ALL);
			error_reporting(0);
		break;

		case 'testing':
		case 'production':
			//error_reporting(0);
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

$system_path = 'system';

$application_folder = 'application/admin';


	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}


	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}


function __autoload($class) {
    if (strpos($class, 'CI_') !== 0) {
        @include_once( APPPATH . 'common/' . $class . EXT );
    }
}
require_once BASEPATH.'core/CodeIgniter.php';