<?php
namespace App\Controller;
use \App\Model\Entity\Usuario;
class Auth
{

	public static $token;
	private $encrypt;
	private $auth;

	public function login($data){
		$usuario = new Usuario($data);
		$usuario->status = true;
		$this->auth = $usuario->select(array("cpf", "AND", "senha", "AND", "status"));
		$this->encrypt = sha1($usuario->cpf.$usuario->senha);
		$this->loadToken();
		$this->auth['token'] = $this->encrypt;
		return $this->auth;
	}

	public function loadToken(){
		$this->getToken();
		self::$token[$this->encrypt] = $this->auth;
		$file = fopen(__DIR__."/tmp/serial", "w");
		fwrite($file, json_encode(self::$token));
		fclose($file);
	}

	public function getToken(){
		$array = file(__DIR__."/tmp/serial");
		self::$token = json_decode($array[0], true);
	}
	

}