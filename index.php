<?php
define('ENVIRONMENT', 'development');
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
define('APP_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('EXTENSION_PATH', 'extensions'); //extension目录文件夹
define('EXTENSION_DIR', APP_ROOT . EXTENSION_PATH . DIRECTORY_SEPARATOR);  	//extension目录的路径

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			// error_reporting(E_ALL);
		error_reporting(3);
		break;

		case 'testing':
		case 'production':
			// error_reporting(0);
		error_reporting(3);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

$system_path = 'system';

//判断是否属手机 
function is_mobile()
{

	if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
	{
		return true;
		exit;
	}
 	$user_agent = $_SERVER['HTTP_USER_AGENT']; 
 	$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte"); 
	 $is_mobile = false; 
	 foreach ($mobile_agents as $device) 
	 { 
		 if (stristr($user_agent, $device)) 
		 { 
		 	$is_mobile = true; break; 
		 } 
	 }
  	return $is_mobile; 
} 
if(is_mobile())
{ 
		//跳转至wap分组 
	$application_folder = 'application/mobile';
}
else
{
	$application_folder = 'application/home';
} 

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