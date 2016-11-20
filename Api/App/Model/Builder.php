<?php
namespace App\Model;

trait Builder{
	protected $select	= "SELECT * FROM";
	protected $insert	= "INSERT INTO "
	private $tabela		= null;
	protected $where	= "WHERE ";
	private $sql 		= null;
	// Gera o SQL da classe carregada na Model
	public function makeSql(){
		$array 	= self::$class->toArray();
        $size 	= count($array);
        $i 		= 0;
    	$chave 	= "("; // irá receber o campo
        $valor 	= "("; // irá receber o valor do campo
        
        foreach ($array as $key => $value) {
            if($i < ($size - 1) ){
                $chave  .= $key.", ";
                $valor  .= "'".$value."', ";
            }else{
                $chave  .= $key.") ";
                $valor  .= "'".$value."') ";
            }
        	$i++;
        }
        $retorno = ["key" => $chave, "value" => $valor ];
    	$this->sql = $retorno;
    }

}