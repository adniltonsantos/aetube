<?php
namespace App\Model;

trait Builder
{
	private static $select	= "SELECT * FROM";
	private static $insert	= "INSERT INTO ";
	private static $where	= " WHERE ";
    private static $update  = "UPDATE ";
    private static $set     = " SET ";
    
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
    *   Gera SQL para select com ou sem Where
    */
    public function makeSelect($class){
        $class = $class->toArray();
        $temp = null;
        if (is_null(self::$condition)){
            self::$sql = self::$select." ".self::$table;
        }else{
            foreach (self::$condition as $key => $value) {
                if ($value == "AND"|| $value == "OR"){
                    $temp .= " ".$value." ";
                }else{
                
                    $temp .= $value."=". "'".$class[$value]."'";
                }
            }
            self::$sql = self::$select." ".self::$table.self::$where.$temp;
        }
    }

    public function makeUpdate($class){
        $class = $class->toArray();
        $temp = null;
        $id = $class['id'];
        unset($class['id']);
        foreach ($class as $key => $value) {
            if (empty($value)){

            }else{
                if($key == "id"){

                }else{

                }
                $temp .= " $key=$value";
            }
        }
        self::$sql = self::$update.self::$table.self::$set.$temp.self::$where." id=".$id;
        echo self::$sql;
    }
    
    

}
/*
*
*/
