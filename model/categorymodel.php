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
    function displayCategory($cat_id){
        global $con;
        $r=$con->prepare("SELECT * FROM category WHERE cat_id=$cat_id");
        $r->execute(array($cat_id)); 
       
        return $r; 
        
    } 
        
    function viewCategory($cat_id){
        global $con;
        //$r=$con->prepare("SELECT c.cat_id as cat_id,s.sc_name as sc_name,c.cat_name as cat_name FROM sub_category s, category c WHERE c.cat_id=s.cat_id AND s.sc_id=?");
        $r=$con->prepare("SELECT c.cat_id as cat_id,c.cat_name as cat_name FROM category c WHERE c.cat_id=?");
        $r->execute(array($cat_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }  
}





?>
