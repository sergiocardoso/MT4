<?php

/**
 * SERVICE SSH COMMANDS
 */

require_once 'Autoload.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$ssh = new \MT4\SSHFacade();

if($ssh->connect($request->ssh->ip, $request->ssh->username, $request->ssh->password)){
	$ssh->command($request->ssh->command);
};

