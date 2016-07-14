<?php

namespace MT4;

class SSHModel {

    public static $instance = null;
    private static $isConnected = false;

    protected function __construct(){}
    protected function __clone(){}

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new SSHModel();
        }

        return self::$instance;
    }

    protected function setIsConnected($value){
        self::$isConnected = $value;
    }

    public static function isConnected(){
        return self::$isConnected;
    }


}