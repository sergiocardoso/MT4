<?php

/**
 * SERVICE SSH COMMANDS
 */

require_once 'Autoload.php';

$sc = new \MT4\SaltCriptModel();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$publicKey = $sc->genRandString(32);
$data['encrypeData'] = $sc->encrypt($request->text, $publicKey);
$data['decrypeData'] = $sc->decrypt($data['encrypeData'] , $publicKey);
$data['key'] = $publicKey;

var_dump($data);

