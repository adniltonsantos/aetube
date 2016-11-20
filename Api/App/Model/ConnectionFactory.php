<?php
namespace App\Model;
use PDO;
trait ConnectionFactory{

	private static $driver	=	null;
	private static $host	=	null;
	private static $dbname	=	null;
	private static $user	=	null;
	private static $pass	=	null;
	private static $instance;

	/**
	*	Retorna a conexão com banco de dados
	*/
	public function getInstance($data){
		self::$driver 	= $data['driver'];
		self::$host 	= $data['host'];
		self::$dbname 	= $data['dbname'];
		self::$user 	= $data['user'];
		self::$pass 	= $data['pass'];
		if (!isset(self::$instance)) {
                self::$instance = new PDO(self::$driver . "host=".self::$host." ; dbname=".self::$dbname.", ".self::$user." , ".self::$pass." , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')");
                      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
          }

          return self::$instance;
    }      
}