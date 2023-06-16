<?php

class subCategory{    
    function displaySCPerCat($cat_id){
        global $con;
        $r=$con->prepare("SELECT * FROM sub_category WHERE cat_id=?");
        $r->execute(array($cat_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displaySC($sc_id){
        global $con;
        $r=$con->prepare("SELECT * FROM sub_category WHERE sc_id=?");
        $r->execute(array($sc_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displayFSC($sc_id){
        global $con;
        $r=$con->prepare("SELECT * FROM sub_category ORDER BY sc_id ASC");
        $r->execute(array($sc_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displaySubcategory($sc_id){
        global $con;
        $r=$con->prepare("SELECT * FROM sub_category WHERE sc_id=$sc_id");
        $r->execute(array($sc_id)); 
       
        return $r; 
        
    } 
   
     function viewSC($sc_id){
        global $con;
        $r=$con->prepare("SELECT c.cat_id as cat_id,s.sc_name as sc_name,c.cat_name as cat_name FROM sub_category s, category c WHERE c.cat_id=s.cat_id AND s.sc_id=?");        
        //$r=$con->prepare("SELECT s.sc_id as sc_id,s.sc_name as sc_name FROM sub_category s WHERE s.sc_id=?");
        $r->execute(array($sc_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
}
}



?>
