<?php
namespace App\Model;

class Model{
	use ConnectionFactory;

	protected static $class 		= null;
	//Informa dados de conexão
	protected $mode 		= array("driver" 	=> "mysql:",
									"host"		=> "138.97.220.69",
									"dbname"	=> "aetub",
									"user"		=> "root",
									"pass"		=> "guilbritto",
								);
	
	public function save(){
		
		$con = ConnectionFactory::getInstance(array("driver" 	=> "mysql:",
													"host"		=> "127.0.0.1",
													"dbname"	=> "aetub",
													"user"		=> "root",
													"pass"		=> "guilbritto",
								));
		$con->prepare(self::$slq);
		$line = $con->execute();
		return $line;
	}	
}