<?php

class city{    
    function displayCityPerDis($dis_id){
        global $con;
        $r=$con->prepare("SELECT * FROM cities WHERE district_id=?");
        $r->execute(array($dis_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
}





?>
