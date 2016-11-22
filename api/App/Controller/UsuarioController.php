<?php
namespace App\Controller;
use \App\Model\Entity\Usuario;
class UsuarioController{

	public function SalvaUsuario($post){
		$usuario = new Usuario($post);
		$usuario->createAt = $_SERVER['REQUEST_TIME'];
		return $usuario->save();
	}
	public function EditaUsuario($post){
		$usuario = new Usuario($post);
		$usuario->update();
	}


}