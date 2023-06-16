<?php
 class item{
     
     public function viewAllItem(){
        global $con;
        $r=$con->prepare("SELECT * FROM item ORDER BY item_id ASC");
        $r->execute();
        return $r;
         
     }
     public function viewAllItems() {
        global $con;
        $r=$con->prepare("SELECT * FROM item i, sub_category s, category c WHERE  i.sc_id=s.sc_id AND i.cat_id=c.cat_id ORDER BY i.item_id DESC");
        $r->execute();
        return $r;             
   } 
   
     public function viewAnItem($item_id){ //to select a particular item
        global $con;
        $r=$con->prepare("SELECT * FROM item i, sub_category s, category c WHERE  i.sc_id=s.sc_id AND i.cat_id=c.cat_id AND i.item_id=?");
        $r->execute(array($item_id));
        return $r;
    }
     
    
      public function viewCat(){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,sub_category s,category c WHERE i.sc_id=s.sc_id AND i.cat_id=c.cat_id ORDER BY i.item_id DESC");
         $r->execute(array($item_id));
        return $r;
         
     }
     public function viewItemImage($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item_image WHERE item_id=? LIMIT 1");
        $r->execute(array($item_id));
        return $r;
         
     }
     
     
      public function viewSearchUserLimited($search,$start,$limit){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id AND (u.user_fname LIKE '$search%' OR u.user_lname LIKE '$search%' OR u.user_gender LIKE '$search%' OR r.role_name LIKE '%$search%' OR u.user_status LIKE '$search%') ORDER BY u.user_id DESC LIMIT $start,$limit");
        $r->execute();
        return $r;
         
     }
     
    public function viewAItem($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item WHERE item_id=?");
        $r->execute(array($item_id));
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
     
     public function addItem($arr){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO item (item_name,sc_id,cat_id,item_colours,item_des,item_height,item_width,item_length,base_area,diameter,item_face,item_size,item_price,item_height_m,item_width_m,item_length_m,base_area_m,diameter_m,item_face_m,item_size_m,item_price_m,item_height_s,item_width_s,item_length_s,base_area_s,diameter_s,item_face_s,item_size_s,item_price_s,item_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['item_name'],$arr['sc_id'],$arr['cat_id'],$arr['item_colours'],$arr['item_des'],$arr['item_height'],$arr['item_width'],$arr['item_length'],$arr['base_area'],$arr['diameter'],$arr['item_face'],$arr['item_size'],$arr['item_price'],$arr['item_height_m'],$arr['item_width_m'],$arr['item_length_m'],$arr['base_area_m'],$arr['diameter_m'],$arr['item_face_m'],$arr['item_size_m'],$arr['item_price_m'],$arr['item_height_s'],$arr['item_width_s'],$arr['item_length_s'],$arr['base_area_s'],$arr['diameter_s'],$arr['item_face_s'],$arr['item_size_s'],$arr['item_price_s'],"Active"));
        $item_id=$con->lastinsertId();
        
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        
        return $item_id;
     }
     
     
     
      public function addImage($ii_name,$item_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO item_image (ii_name,ii_status,item_id) VALUES (?,?,?)");
        $r->execute(array($ii_name,"Active",$item_id));
             
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
     }
     
     public function updateItem($arr,$item_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE item SET item_name=?,cat_id=?,sc_id=?,item_price=?,item_height=?,item_width=?,item_length=?,base_area=?,diameter=?,item_face=?,item_size=?,item_des=? WHERE item_id=?");
        $r->execute(array($arr['item_name'],$arr['cat_id'],$arr['sc_id'],$arr['item_price'],$arr['item_height'],$arr['item_width'],$arr['item_length'],$arr['base_area'],$arr['diameter'],$arr['item_face'],$arr['item_size'],$arr['item_des'],$item_id));
        
       
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
         return $r;
     }
     
     public function deleteAnItem($item_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("DELETE FROM item WHERE item_id=?");
        $r->execute(array($item_id));
        
       
        
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
    
    public function getItemsField1($field,$id){
        global $con;
        $r=$con->prepare("SELECT * FROM item WHERE $field='$id'");
        $r->execute();
        return $r;
         
     } 
      public function getItemsField2($field1,$id1,$field2,$id2){
        global $con;
        $r=$con->prepare("SELECT * FROM item WHERE $field1='$id1' AND $field2='$id2'");
        $r->execute();
        return $r;
         
     } 
     public function getItemCatBrand($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c, sub_category s WHERE item_id=? AND i.sc_id=s.sc_id AND c.cat_id=i.cat_id");
        $r->execute(array($item_id));
        return $r;
         
     } 
      public function getItemByCat ($cat_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c, sub_category s WHERE cat_id=? AND i.sc_id=s.sc_id AND c.cat_id=i.cat_id ");
        $r->execute(array($cat_id));
        return $r;
         
     } 
     public function getLatestItems() {
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c, sub_category s WHERE i.sc_id=s.sc_id AND c.cat_id=i.cat_id ORDER BY i.item_id DESC LIMIT 0,9");
        $r->execute();
        return $r;             
   }
   public function getLatestViewedItems() {
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c, sub_category s catt a WHERE i.sc_id=s.sc_id AND c.cat_id=i.cat_id i.item_id=a.item_id ORDER BY a.order_id DESC ");
        $r->execute();
        return $r;             
   }
  public function getItemByCat1 ($cat_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item  WHERE cat_id=?  ");
        $r->execute(array($cat_id));
        return $r;
         
     } 
   
    public function getItemBySC($sc_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item  WHERE sc_id=?  ");
        $r->execute(array($sc_id));
        return $r;
         
     } 
 }
?>


