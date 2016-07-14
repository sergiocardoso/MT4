<?php

/**
 * SERVICE SSH COMMANDS
 */

require_once 'Autoload.php';

$sc = new \MT4\SaltCriptModel();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$publicKey = $request->key;
$data['decrypeData'] = $sc->decrypt($request->text, $publicKey);

var_dump($data);

