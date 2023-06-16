<?php

class category{    
    function displayAllCategory(){
        global $con;
        $r=$con->prepare("SELECT * FROM category ORDER BY cat_id");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
}





?>
