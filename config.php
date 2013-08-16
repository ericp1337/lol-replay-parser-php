<?php

// get an api key from https://www.mashape.com/dylziez/league-of-legends#!documentation
define ('API_KEY', '');

error_reporting(0);

set_time_limit(0);

/**
 * Basic class with system's configuration data
 */
class config {
    /**
     * Configuration data
     * @access private
     * @static
     * @var array
     */
    private static $_data = array(
        'db_user' => 'root',
        'db_pass' => '',
        'db_host' => 'localhost',
        'db_name' => 'test',
        'db_table_prefix' => ''
    );

    /**
     * Private construct to avoid object initializing
     * @access private
     */
    private function __construct() {}
    public static function init() {
    	//include unirest-php library
    	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib/unirest-php/lib/Unirest.php');
		
        self::$_data['base_path'] = dirname(__FILE__).DIRECTORY_SEPARATOR.'includes';
        $db = db::obtain(self::get('db_host'), self::get('db_user'), self::get('db_pass'), self::get('db_name'), self::get('db_table_prefix'));
        if (!$db->connect_pdo()) {
            die('Could Not Connect To Database!');
        };
    }
    /**
     * Get configuration parameter by key
     * @param string $key data-array key
     * @return null
     */
    public static function get($key) {
        if(isset(self::$_data[$key])) {
            return self::$_data[$key];
        }
        return null;
    }
}

config::init();

function __autoload($class) {
    scan(config::get('base_path'), $class);
}

function scan($path = '.', $class) {
    $ignore = array('.', '..');
    $dh = opendir($path);
    while(false !== ($file = readdir($dh))){
        if(!in_array($file, $ignore)) {
            if(is_dir($path.DIRECTORY_SEPARATOR.$file)) {
                scan($path.DIRECTORY_SEPARATOR.$file, $class);
            }
            else {
                if ($file === 'class.'.$class.'.php') {
                    require_once($path.DIRECTORY_SEPARATOR.$file);
                    return;
                }
            }
        }
    }
    closedir($dh);
}
?>