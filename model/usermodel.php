<?php
 class user{
     
     public function viewAllUser(){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id ORDER BY user_id DESC");
        $r->execute();
        return $r;
         
     }
     
     public function viewSearchUser($search){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id AND (u.user_fname LIKE '$search%' OR u.user_lname LIKE '$search%' OR u.user_gender LIKE '$search%' OR r.role_name LIKE '%$search%' OR u.user_status LIKE '$search%')");
        $r->execute();
        return $r;
         
     }
      public function viewSearchUserLimited($search,$start,$limit){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id AND (u.user_fname LIKE '$search%' OR u.user_lname LIKE '$search%' OR u.user_gender LIKE '$search%' OR r.role_name LIKE '%$search%' OR u.user_status LIKE '$search%') ORDER BY u.user_id DESC LIMIT $start,$limit");
        $r->execute();
        return $r;
         
     }
     
    public function viewAUser($user_id){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r,login l WHERE u.role_id=r.role_id AND u.user_id=l.user_id AND u.user_id=?");
        $r->execute(array($user_id));
        return $r;
         
     }
     
     public function viewUserByStatus($status){
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE user_status=?");
        $r->execute(array($status));
        return $r;
         
     }
     
     public function viewUserLimited($start,$limit){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r "
                . "WHERE u.role_id=r.role_id ORDER BY user_id DESC LIMIT $start,$limit");
        //$r->execute(array((int)$start,(int)$limit));
        //$r->bindValue(':start', $start);
        //$r->bindValue(':limit', $limit);
        $r->execute();
        return $r;
         
     }
     
     public function addUser($arr){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO user (user_doj,user_fname,user_lname,user_dob,user_gender,role_id,user_tel,user_nic,dis_id,user_add,user_status) VALUES (now(),?,?,?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['user_fname'],$arr['user_lname'],$arr['user_dob'],$arr['user_gender'],$arr['role_id'],$arr['user_tel'],$arr['user_nic'],$arr['dis_id'],$arr['user_address'],"Active"));
        $user_id=$con->lastinsertId();
        return $user_id;
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
     }
     
     public function updateUser($arr,$user_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE user SET user_fname=?,user_lname=?,user_dob=?,user_gender=?,role_id=?,user_tel=?,user_nic=?,dis_id=?,user_add=? WHERE user_id=?");
        $r->execute(array($arr['user_fname'],$arr['user_lname'],$arr['user_dob'],$arr['user_gender'],$arr['role_id'],$arr['user_tel'],$arr['user_nic'],$arr['dis_id'],$arr['user_address'],$user_id));
        
       
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
         return $r;
     }
     
      public function updateUserStatus($user_status,$user_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE user SET user_status=? WHERE user_id=?");
        $r->execute(array($user_status,$user_id));
        
       
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
         return $r;
     }
     
     
     public function updateUserImage($user_id,$user_image_new,$user_tmp){
        global $con;
        $r=$con->prepare("UPDATE user SET user_image=? WHERE user_id=?");
        $r->execute(array($user_image_new,$user_id));
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        if($r){
            $path="../images/user_images/".$user_image_new;
            move_uploaded_file($user_tmp, $path);            
        }
        return $r;
         
     }
     
 

    public function  viewUserRole($role){
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE role_id=?");
        $r->execute(array($role));
        return $r;
    
    }
    
     public function DisplayNewUsers() {
       global $con;
        $r=$con->prepare("SELECT * FROM user WHERE user_doj >= DATE(NOW())- INTERVAL 7 Day ");
        $r->execute();
        return $r;
    }
    
     public function ViewNewUsers() {
       global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id AND user_doj >= DATE(NOW())- INTERVAL 7 Day ORDER BY user_id DESC");
        $r->execute();
        return $r;
    }
    
    public function ViewUserByRole($role) {
       global $con;
        $r=$con->prepare("SELECT * FROM user WHERE role_id=? ORDER BY user_id DESC");
        $r->execute(array($role));
        return $r;
    }
    
    
    public function viewUserRoleLimited($start,$limit,$role){
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE role_id=? ORDER BY user_id DESC LIMIT $start,$limit");
       $r->execute(array($role));
        return $r;
        
    }
     public function viewUserLog(){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,log l WHERE u.user_id=l.user_id ORDER BY l.log_id DESC");
        $r->execute();
        return $r;
         
     }
    
 }
?>


