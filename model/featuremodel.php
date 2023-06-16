<?php

class feature{    
    function displayFeature($fc_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feature WHERE fc_id=?");
        $r->execute(array($fc_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displayAFeature($f_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feature WHERE f_id=?");
        $r->execute(array($f_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displayFeatureItem($stock_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feature f,stock_feature sf,feature_category fc "
                . "WHERE f.f_id=sf.f_id AND fc.fc_id=f.fc_id AND stock_id=?");
        $r->execute(array($stock_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displayFeatures($item_id,$fc_id){
        global $con;
        $r=$con->prepare("SELECT f.f_id,f.f_name FROM feature f,stock_feature sf,stock s "
                . "WHERE f.f_id=sf.f_id AND s.stock_id=sf.stock_id AND s.item_id=? "
                . "AND f.fc_id=? GROUP BY f.f_id");
        $r->execute(array($item_id,$fc_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function displayColor($color_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feature WHERE f_id=?");
        $r->execute(array($color_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
}





?>
