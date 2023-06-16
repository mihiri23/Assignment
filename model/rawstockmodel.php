<?php

class rawstock{  
    
    public function addItem($arr){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO rawitem (item_name,item_des) VALUES (?,?)");
        $r->execute(array($arr['item_name'],$arr['item_des']));
        $cus_id=$con->lastinsertId();
        return $item_id;
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
     }
     public function viewAllItem(){
        global $con;
        $r=$con->prepare("SELECT * FROM rawitem ORDER BY item_id DESC");
        $r->execute();
        return $r;
         
     }
    
    function addstock($arr,$user_id,$textfile){
        global $con;
        $r=$con->prepare("INSERT INTO rawstock (stock_date,item_id,stock_status,user_id,stock_uprice,stock_price,stock_quantity,textfile) VALUES (now(),?,?,?,?,?,?,?)");
        $r->execute(array($arr['item_id'],"added",$user_id,$arr['uprice'],$arr['price'],$arr['quan'],$textfile));
        $stock_id=$con->lastinsertId();
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $stock_id; 
        
    } 
    
    public function viewAnItem($item_id){ //to select a particular item
        global $con;
        $r=$con->prepare("SELECT * FROM rawitem WHERE item_id=?");
        $r->execute(array($item_id));
        return $r;
    }
    
    function addstockfeature($stock_id,$f_id){
        global $con;
        $r=$con->prepare("INSERT INTO stock_feature (stock_id,f_id) VALUES (?,?)");
        $r->execute(array($stock_id,$f_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function checkstockbalance($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM raw_balance WHERE item_id=? ");
        $r->execute(array($item_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    
    function getStockQuantity($item_id){
        global $con;
        $r=$con->prepare("SELECT SUM(s.stock_quantity) as sq FROM rawstock s WHERE s.item_id=?");
        $r->execute(array($item_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function viewallstockbalance(){
        global $con;
        $r=$con->prepare("SELECT * FROM raw_balance ORDER BY qua ASC");
        $r->execute();
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    
    function addstockbalance($item_id,$quan){
        global $con;
        $r=$con->prepare("INSERT INTO raw_balance (lastmodified,item_id,qua) VALUES (now(),?,?)");
        $r->execute(array($item_id,$quan));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function updatestockbalance($item_id,$quan){
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua+? "
                . "WHERE item_id=?");
        $r->execute(array($quan,$item_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    
    function updatestockbalanceSub($item_id,$quan,$color_id,$size_id) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE stock_balance SET lastmodified=now(),qua=qua-? WHERE item_id=? AND color_id=? AND size_id=?"); //here the names in the database are used
        $r->execute(array($quan,$item_id,$color_id,$size_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    
    
    public function viewStockItem($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,sub_category b,category c,stock s "
                . "WHERE i.sc_id=b.sc_id AND i.cat_id=c.cat_id "
                . "AND s.item_id=i.item_id AND i.item_id=?");
        $r->execute(array($item_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     }
     
     public function viewStockItems(){
        global $con;
        $r=$con->prepare("SELECT distinct item_id FROM stock");
        $r->execute();
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     }
    
     public function viewStockQuantity($item_id,$color,$size){
        global $con;
        $r=$con->prepare("SELECT * FROM stock_balance WHERE item_id=? AND color_id=? AND size_id=?");
        $r->execute(array($item_id,$color,$size));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     }
     
     public function viewStockPrice($item_id,$color,$size){
        global $con;
        $r=$con->prepare("SELECT * FROM stock WHERE item_id=? AND stock_id IN (SELECT stock_id FROM stock_feature WHERE f_id=? OR f_id=?)");
        $r->execute(array($item_id,$color,$size));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     }
    
    
}





?>
