<?php

class notification {

    function addNoticationAuto($not_msg,$not_type,$user_id,$not_status) {
       
        global $con;


        $r=$con->prepare("INSERT INTO notification (not_date,not_msg,not_type,user_id,not_status) "
                . "VALUES(NOW(),?,?,?,?)");
        $r->execute(array($not_msg,$not_type,$user_id,$not_status));
          $not_id=$con->lastinsertId();
        
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $not_id;

}

function addNoticationUser($not_id,$user_id,$cus_id,$m,$er) {
       
        global $con;


        $r=$con->prepare("INSERT INTO notification_user (not_id,user_id,cus_id,nu_status,nu_error) VALUES(?,?,?,?,?)");
        $r->execute(array($not_id,$user_id,$cus_id,$m,$er));
       
        
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

}
function viewNotification() {
       
        global $con;


        $r=$con->prepare("SELECT * from notification ORDER BY not_id DESC");
               
        $r->execute(array());
       
        
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

}

function viewNoticationUsers($not_id) {
       
        global $con;


        $r=$con->prepare("SELECT * from notification_user WHERE not_id=?");
               
        $r->execute(array($not_id));
       
        
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

}

      public function getUsersBaseonRole($role_id) {
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE role_id=? AND user_status=?");
        $r->execute(array($role_id,"Active"));
        return $r;             
   } 
}

?>

