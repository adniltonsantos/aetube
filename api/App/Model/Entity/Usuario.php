<?php
namespace App\Model\Entity;
/**
*	Classe que representa uma entidade do banco de dados
*
*@author Guilherme Brito <guilhermebritto.prof@gmail.com>
*@package Entity
*/
class Usuario extends \App\Model\Model{
	private $id;
	private $cpf;
	private $senha;
	private $nome;
	private $createAt;
	private $updateAt;
	private $status;

	/*
	*	Metodo construtor onde passa a propria instancia para classe pai
	*
	*/
	public function __construct($data){
		isset($data['id']) 	?	$this->id 	= $data['id']		: 	$this->id = null ;
		isset($data['cpf']) 		? 	$this->cpf 			= $data['cpf']				:	$this->cpf = null 		;
		isset($data['senha']) 		? 	$this->senha 		= sha1($data['senha'])		:	$this->senha = null 	;
		isset($data['nome']) 		? 	$this->nome 		= $data['nome']				:	$this->nome = null 		;
		isset($data['createAt'])	?	$this->createAt 	= $data['createAt']			:	$this->createAt = null 	;
		isset($data['updateAt'])	?	$this->updateAt 	= $data['updateAt']			:	$this->updateAt = null 	;
		isset($data['status'])	?	$this->status 	= $data['status']			:	$this->status = null 	;
		$this->class = $this;
	}

	public function toArray(){ 
		return array("id"	=>	$this->id,
					 "cpf"			=>	$this->cpf,
					 "senha"		=>	$this->senha,
					 "nome"			=>	$this->nome,
					 "createAt"		=>	$this->createAt,
					 "updateAt" 	=>	$this->updateAt,
					 "status"		=>	$this->status
			);
	} 

	// Metodo magico __get
	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
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
			case 'createAt':
				return $this->createAt;
				break;
			case 'updateAt':
				return $this->updateAt;
				break;
			case 'status':
				return $this->status;
				break;
		}
	}
	// Metodo magico __set
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
				$this->id = $value;
				break;
			case 'cpf':
				$this->cpf = $value;
				break;
			case 'senha':
				$this->senha = sha1($value);
				break;
			case 'nome':
				$this->nome = $value;
				break;
			case 'createAt':
				 $this->createAt = $value; 
				break;
			case 'updateAt':
				$this->updateAt = $value; 
				break;
			case 'status':
				$this->status = $value; 
				break;
		}
	}
	
}