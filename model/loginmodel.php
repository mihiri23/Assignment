<?php

class login{    
    function userlogin($user_email,$user_pwd){
        global $con;
        $r=$con->prepare("SELECT * FROM login l,user u,role r WHERE l.user_id=u.user_id AND u.role_id=r.role_id AND l.user_email=? AND l.user_pwd=?");
        $r->execute(array($user_email,$user_pwd));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function addLogin($user_email,$user_pwd,$user_id){
        global $con;
        $r=$con->prepare("INSERT INTO login VALUES(?,?,?)");
        $r->execute(array($user_email,$user_pwd,$user_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function checkEmail($user_email){
        global $con;
        $r=$con->prepare("SELECT * FROM login WHERE user_email=?");
        $r->execute(array($user_email));
        $n=$r->rowCount();
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $n; 
        
    } 
    
    
}





?>
