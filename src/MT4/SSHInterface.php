<?php

namespace MT4;

Interface SSHInterface {
	public function connect($ip, $user, $password);
	public function command($command);
	public function output($message, $type);
}