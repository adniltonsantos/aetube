<?php
namespace App\Controller;
use \App\Model\Entity\Usuario;
class UsuarioController{

	/*
	*	$post => usuario ['nome', 'cpf']
	*/
	public function SalvaUsuario($post){
		$usuario           = new Usuario($post);
		$usuario->createAt = $_SERVER['REQUEST_TIME'];
		return $usuario->save();
	}
	public function EditaUsuario($post){
		$usuario           = new Usuario($post);
		return $usuario->update();
	}
	public function InativaUsuario($id){
		$usuario           = new Usuario();
		$usuario->status   = "INATIVO";
		$usuario->id       = $id;
		return $usuario->update();
	}
	public function AtivaUsuario(){
		$usuario           = new Usuario();
		$usuario->status   = "ATIVO";
		$usuario->id       = $id;
		return $usuario->update();
	}
	public function ListaUsuario(){
		$usuario           = new Usuario();
		return $usuario->select();
	}


}