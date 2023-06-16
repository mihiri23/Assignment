<?php

class payment{    
    function addPayment($cus_id,$order_id,$totp,$dis){
        global $con;
        $r=$con->prepare("INSERT INTO pay (pay_date,cus_id,order_id,pay_amount,discount) VALUES(now(),?,?,?,?)");
        $r->execute(array($cus_id,$order_id,$totp,$dis));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $pay_id; 
        
    } 
    
    function addPaymentIn($order_id,$cus_id,$totp,$dis){
        global $con;
        $r=$con->prepare("INSERT INTO payment (pay_date,order_id,cus_id,pay_amount,discount) VALUES(now(),?,?,?,?)");
        $r->execute(array($order_id,$cus_id,$totp,$dis));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function viewPayment($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM  pay WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    function viewPaymentIn($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM  payment WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
}





?>
