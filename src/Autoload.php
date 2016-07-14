<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib1.0.2');
require_once ('Net/SSH2.php');
require_once ('Math/BigInteger.php');
require_once ('Crypt/Hash.php');
require_once ('Crypt/Base.php');
require_once ('Crypt/RC4.php');

spl_autoload_register(function($class){

	$path_root = '/home/storage/2/a4/7d/sergiocardoso2/public_html/mt4/src/';
	$file = $path_root.str_replace('\\', '/', $class.'.php');

	if(file_exists($file)){
		require_once($file);
    }

    else {

		echo "{$class} <br> {$file} - Arquivo nao encontrado!";
	}

});