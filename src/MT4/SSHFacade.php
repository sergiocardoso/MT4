<?php

namespace MT4;
use Net_SSH2;

class SSHFacade extends SSHModel implements SSHInterface{

	private $ssh;

	public function __construct(){}

	public function connect($ip, $user, $password){

		if(isset($ip) && isset($user) && isset($password)){

			$this->ssh = new Net_SSH2($ip);

			if(@!$this->ssh->login($user, $password)){
				$data['user'] = $user;
				$data['password'] = $password;
				$data['message'] = 'Acesso negado!';
				self::output($data, 'json');
			}

			else {
				parent::setIsConnected(true);
				return true;
			}
		}

		else {
			$data['user'] = $user;
			$data['password'] = $password;
			$data['message'] = 'Dados incorretos ou vazios! Por favor preencha corretamente.';
			self::output($data, 'json');
		}


	}

	public function command($command){
		if(parent::isConnected()){
			echo $this->ssh->exec($command);
		}

		else {
			self::output("Você não esta conectado ao Servidor!", 'txt');
			die();
		}

	}

	public function output($message, $type){

		switch($type){
			case 'json':
				echo json_encode($message);
				break;

			case 'txt':
				echo $message;
		}
	}
}