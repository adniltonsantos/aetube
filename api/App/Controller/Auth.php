<?php
namespace App\Controller;
use \App\Model\Entity\Usuario;
class Auth
{

	private static $token;
	private static $instance;

	public function __construct(){
	}

	public function login($data){
		$usuario = new Usuario($data);
		$auth = $usuario->select(array("cpf", "AND", "senha"));
		var_dump($auth);
	}



}