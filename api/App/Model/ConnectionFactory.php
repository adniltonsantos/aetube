<?php
namespace App\Model;
use PDO;
class ConnectionFactory{

	private static $driver	=	null;
	private static $host	=	null;
	private static $dbname	=	null;
	private static $user	=	null;
	private static $pass	=	null;
	private static $instance;

	public function __construct($data){
		self::$driver 	= $data['driver'];
		self::$host 	= $data['host'];
		self::$dbname 	= $data['dbname'];
		self::$user 	= $data['user'];
		self::$pass 	= $data['pass'];
		return $this->getInstance();
	}
	/**
	*	Retorna a conexão com banco de dados
	*/
	public function getInstance(){
		if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=138.97.220.69; dbname=aetub", "root", "guilbritto", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }      
}
