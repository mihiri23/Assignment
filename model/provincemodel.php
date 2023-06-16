<?php

class province{    
    function displayProvinces(){
        global $con;
        $r=$con->prepare("SELECT * FROM province");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
}





?>
