<?php
namespace App\Model\Entity;
/**
*	Classe que representa uma entidade do banco de dados
*
*@author Guilherme Brito <guilhermebritto.prof@gmail.com>
*@package Entity
*/
class Usuario extends \App\Model\Model{
	private $idUsuario;
	private $cpf;
	private $senha;
	private $nome;

	/*
	*	Metodo construtor onde passa a propria instancia para classe pai
	*
	*/
	public function __construct($data){
		isset($data['idUsuario']) 	?	$this->idUsuario = $data['idUsuario']	: 	$this->idUsuario = null ;
		isset($data['cpf']) 		? 	$this->cpf = $data['cpf']				:	$this->cpf = null 		;
		isset($data['senha']) 		? 	$this->senha = $data['senha']			:	$this->senha = null 	;
		isset($data['nome']) 		? 	$this->nome = $data['nome']				:	$this->nome = null 		;
		parent::$class = $this;
	}

	public function toArray(){ 
		return array("idUsuario"	=>	$this->idUsuario,
					 "cpf"			=>	$this->cpf,
					 "senha"		=>	$this->senha,
					 "nome"			=>	$this->nome
			);
	} 

	// Metodo magico __get
	public function __get($attr){
		switch ($attr) {
			case 'idUsuario':
				return $this->idUsuario;
				break;
			case 'cpf':
				return $this->cpf;
				break;
			case 'senha':
				return $this->senha;
				break;
			case 'nome':
				return $this->nome;
				break;
		}
	}
	// Metodo magico __set
	public function __set($attr, $value){
		switch ($attr) {
			case 'idUsuario':
				$this->idUsuario = $value;
				break;
			case 'cpf':
				$this->cpf = $value;
				break;
			case 'senha':
				$this->senha = md5($value);
				break;
			case 'nome':
				$this->nome = $value;
				break;
		}
	}

}