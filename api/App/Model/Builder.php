<?php
namespace App\Model;

trait Builder
{
	private static $select	= "SELECT * FROM";
	private static $insert	= "INSERT INTO ";
	private static $where	= " WHERE ";
    public static  $condition;
    public static  $table;
    public static  $sql;

    // Gera o SQL da classe carregada na Model
	public function makeInsert($class){
        $array = $class->toArray();
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
    	
        self::$sql = self::$insert.self::$table." ".$retorno['key']." values ".$retorno['value'];
    }
    /**
    *   Gera SQL para selec com ou sem Where
    */
    public function makeSelect($class){
        $class = $class->toArray();
        
        foreach (self::$condition as $key => $value) {
            if ($value == "AND"|| $value == "OR"){
                $a .= " ".$value." ";
            }else{
            
                $a .= $value."=". "'".$class[$value]."'";
            }
        }
        self::$sql = self::$select." ".self::$table.self::$where.$a;
    }

}