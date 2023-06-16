<?php

class customerin {

    public function viewAllCustomer() {
        global $con;
        $r=$con->prepare("SELECT * FROM customerin  ORDER BY cus_id DESC");
        $r->execute();
        return $r;             
   } 
   public function viewAllOCustomer() {
        global $con;
        $r=$con->prepare("SELECT * FROM customer  ORDER BY cus_id DESC");
        $r->execute();
        return $r;             
   } 
   
    public function viewSearchCustomer($search){
        global $con;
        $r=$con->prepare("SELECT * FROM customerin WHERE (cus_name LIKE '$search%' OR cus_city LIKE '$search%' OR cus_add LIKE '$search%' OR cus_tel LIKE '$search%')");
        $r->execute();
        return $r;
    }
     public function viewSearchOCustomer($search){
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE (cus_name LIKE '$search%' OR cus_email LIKE '$search%' OR cus_address LIKE '$search%' OR cus_tel LIKE '$search%' OR pro_id LIKE '$search%' OR dis_id LIKE '$search%' OR city_id LIKE '$search%')");
        $r->execute();
        return $r;
    }
    
    
    public function viewSearchCustomerLimited($search,$start, $limit){
        global $con;
        $r=$con->prepare("SELECT * FROM customerin WHERE (cus_name LIKE '$search%' OR cus_city LIKE '$search%' OR cus_add LIKE '$search%' OR cus_tel LIKE '$search%') ORDER BY cus_id DESC LIMIT $start,$limit");
        $r->execute();
        return $r;
    }
    public function viewSearchOCustomerLimited($search,$start, $limit){
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE (cus_name LIKE '$search%' OR cus_email LIKE '$search%' OR cus_address LIKE '$search%' OR cus_tel LIKE '$search%' OR pro_id LIKE '$search%' OR dis_id LIKE '$search%' OR city_id LIKE '$search%') ORDER BY cus_id DESC LIMIT $start,$limit");
        $r->execute();
        return $r;
    }
    
    
    public function viewACustomer($cus_id){ //to select a particular user
        global $con;
        $r=$con->prepare("SELECT * FROM customerin WHERE cus_id=?");
        $r->execute(array($cus_id));
        return $r;
    }
    public function viewAOCustomer($cus_id){ //to select a particular user
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE cus_id=?");
        $r->execute(array($cus_id));
        return $r;
    }
   
     public function viewUserByStatus($status){
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE user_status=?");
        $r->execute(array($status));
        return $r;
         
     }
   
    public function viewCustomerLimited($start,$limit) {
        global $con;
        $r=$con->prepare("SELECT * FROM customerin ORDER BY cus_id DESC LIMIT $start, $limit");
        $r->execute();
        return $r;             
   } 
    public function viewCustomerOLimited($start,$limit) {
        global $con;
        $r=$con->prepare("SELECT * FROM customer ORDER BY cus_id DESC LIMIT $start, $limit");
        $r->execute();
        return $r;             
   } 
   
    public function addCustomer($arr) {
      // print_r($arr[]);
       global $con;
       $r=$con->prepare("INSERT INTO customerin (cus_name,cus_city,cus_add,cus_tel) VALUES (?,?,?,?)"); //here the names in the database are used
       $r->execute(array($arr['cus_name'],$arr['cus_city'],$arr['cus_add'],$arr['cus_tel'])); //here the names of the form are used
       $cus_id=$con->lastinsertId(); //lastinsertId can be used only when its auto increment
       
       
       if ($r->errorCode()!=0){
           $errors = $r->errorInfo();
           echo $errors[2];
       }
       return $cus_id;
   }
   
   public function updateCustomer($arr,$cus_id) {
        global $con;
        
        $r=$con->prepare("UPDATE  customerin SET cus_name=?,cus_city=?,cus_add=?,cus_tel=? WHERE cus_id=?");
        $r->execute(array($arr['cus_name'],$arr['cus_city'],$arr['cus_add'],$arr['cus_tel'],$cus_id));
       // $user_id=$con->lastinsertId();
       
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
         return $r;
    }
   
    
     public function updateUserStatus($user_status,$user_id) {
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE  user SET user_status=? WHERE user_id=?");
        $r->execute(array($user_status,$user_id));
       // $user_id=$con->lastinsertId();
       
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
         return $r;
    }
    
    
   public function updateUserImage($user_id,$user_image_new,$user_tmp){
       global $con;
       $r=$con->prepare("UPDATE user SET user_image=? WHERE user_id=?");
       $r->execute(array($user_image_new,$user_id));
       if ($r){
           $path="../images/user_images/".$user_image_new;
           move_uploaded_file($user_tmp, $path);           
       }
       return $r;
   }
   
   public function viewUserLog() {
        global $con;
        $r=$con->prepare("SELECT * FROM user u, log l WHERE  u.user_id=l.user_id ORDER BY u.user_id DESC");
        $r->execute();
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