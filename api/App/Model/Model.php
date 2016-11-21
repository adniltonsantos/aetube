<?php
namespace App\Model;
use PDO;
class Model{
	use Builder;

	protected  	$class;
	private 	$mode 		= array(
		"driver" 	=> "mysql:",
		"host"		=> "138.97.220.69",
		"dbname"	=> "aetub",
		"user"		=> "root",
		"pass"		=> "guilbritto"
		);

	public function save(){
		$this->loadTable();
		$sql = Builder::makeInsert($this->class);
		$con = new ConnectionFactory($this->mode);
		$db = $con->getInstance();
		$stmt = $db->prepare(Builder::$sql);
		return $stmt->execute();
	}	

	public function select($arr){
		$this->loadTable();
		Builder::$condition = $arr;
		Builder::makeSelect($this->class);
		$con = new ConnectionFactory($this->mode);
		$db = $con->getInstance();
		$linha = $db->query(Builder::$sql);
		$r = $linha->fetch(PDO::FETCH_ASSOC);
		return $r;
	}
	public function loadTable(){
		Builder::$table = str_replace("\\", "/", strtolower(get_called_class()));
		Builder::$table = split('/', Builder::$table);
		Builder::$table = Builder::$table[3];	
	}
}