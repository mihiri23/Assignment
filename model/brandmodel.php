<?php

class brand{    
    function displayAllBrand(){
        global $con;
        $r=$con->prepare("SELECT * FROM brand ORDER BY brand_id");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
}





?>
