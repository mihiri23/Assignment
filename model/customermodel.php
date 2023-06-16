<?php
 class customer{
     
     public function checkCusLoging($cus_email,$cus_pwd){
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE cus_email=? and cus_pwd=?");
        $r->execute(array($cus_email,$cus_pwd));
        return $r;
         
     }
     
     public function checkCusEmail($cus_email){
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE cus_email=?");
        $r->execute(array($cus_email));
        return $r;
         
     }
    
     public function addCustomer($arr){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO customer (cus_name,cus_pwd,cus_email,cus_address,cus_tel,pro_id,dis_id,city_id) VALUES (?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['cus_name'],$arr['cus_pwd'],$arr['cus_email'],$arr['cus_address'],$arr['cus_tel'],$arr['pro_id'],$arr['dis_id'],$arr['city_id']));
        $cus_id=$con->lastinsertId();
        return $cus_id;
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
     }
     
    public function  viewCustomer($cus_id){
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE cus_id=?");
        $r->execute(array($cus_id));
        return $r;
    
    } 
 }
 ?>