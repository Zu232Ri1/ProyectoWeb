<?php 

include('ModeloLogin.php');
class ControlerLogin{
    private $modelo;



    public static function login($pass,$email,$tipo){

    	$modelo=new ModeloLogin();

    	/*try {
    		$modelo->getLogin($pass,$email,$tipo);
    	} catch (Exception $e) {
    		echo $e;
    	}*/
    	return $modelo->getLogin($pass,$email,$tipo);

    }

     public static function Userlogin($id,$tipo,$pass_cifrada){

        $modelo=new ModeloLogin();
        $o=$modelo->getUserlogin($id,$tipo);

        if($o!=null){
            //echo var_dump($o);
            if(hash_equals($pass_cifrada,crypt($o->getPass(),$pass_cifrada))){
                   // echo "OK";
                return true;
            }



        }
        
        return false;

    }

}





 ?>