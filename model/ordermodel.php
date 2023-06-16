<?php

class order{    
    function checkOrder($session_id){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` WHERE session_id=?");
        $r->execute(array($session_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function checkOrderIn($uni_id){
        global $con;
        $r=$con->prepare("SELECT * FROM orderin WHERE uni_id=?");
        $r->execute(array($uni_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    public function addOrder($status,$session_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO `order` (order_date,order_status,session_id) VALUES (NOW(),?,?)");
        $r->execute(array($status,$session_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     public function addOrderIn($cus_id,$status,$uni_id,$user_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO orderin (order_date,cus_id,order_status,uni_id,user_id) VALUES (NOW(),?,?,?,?)");
        $r->execute(array($cus_id,$status,$uni_id,$user_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     public function addOrderInt($item_id,$quantity,$color_id,$size_id,$status,$totalprice,$user_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO orderin (order_date,item_id,quantity,color_id,size_id,order_status,total_price,user_id) VALUES (NOW(),?,?,?,?,?,?,?)");
        $r->execute(array($item_id,$quantity,$color_id,$size_id,$status,$totalprice,$user_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     
     
      public function updateOrder($order_status,$totalprice,$cus_id,$order_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE  `order` SET order_status=?,total_price=?, cus_id=? WHERE order_id=?");
        $r->execute(array($order_status,$totalprice,$cus_id,$order_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     public function updateOrderIn($order_status,$tot,$order_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE  orderin SET order_status=?,total_price=? WHERE order_id=?");
        $r->execute(array($order_status,$tot,$order_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     
     public function addTempCart($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO temp_cart (order_id,item_id,quantity,cart_price,color_id,size_id) VALUES (?,?,?,?,?,?)");
        $r->execute(array($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id));
           
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
     }
     
     public function UpdateTempCart($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE temp_cart SET quantity=?,cart_price=?,color_id=?,size_id=? WHERE item_id=? AND order_id=?");
        $r->execute(array($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id));
           
                     
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
     
     
     public function addTempCartIn($order_id,$item_id,$quantity,$totalprice,$color_id,$size_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO temp_cartin (order_id,item_id,quantity,cart_price,color_id,size_id) VALUES (?,?,?,?,?,?)");
        $r->execute(array($order_id,$item_id,$quantity,$totalprice,$color_id,$size_id));
           
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
     }
      public function addTCart($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id) {
      // print_r($arr[]);
       global $con;
       $r=$con->prepare("INSERT INTO cart (order_id,item_id,quantity,cart_price,color_id,size_id) VALUES(?,?,?,?,?,?)"); //here the names in the database are used
       $r->execute(array($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id));
       
      
       if ($r->errorCode()!=0){
           $errors = $r->errorInfo();
           echo $errors[2];
       }
       return $r;
   }
   public function addTCartIn($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id) {
      // print_r($arr[]);
       global $con;
       $r=$con->prepare("INSERT INTO cartin (order_id,item_id,quantity,cart_price,color_id,size_id) VALUES(?,?,?,?,?,?)"); //here the names in the database are used
       $r->execute(array($order_id,$item_id,$quantity,$cart_price,$color_id,$size_id));
       
      
       if ($r->errorCode()!=0){
           $errors = $r->errorInfo();
           echo $errors[2];
       }
       return $r;
   }
     
     function viewCart($order_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(cart_price) as cpsum FROM temp_cart WHERE order_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function viewCartIn($order_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(cart_price) as cpsum FROM temp_cartin WHERE order_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function viewCart1($order_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(cart_price) as cpsum FROM cart WHERE order_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function viewCartIn1($order_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(cart_price) as cpsum FROM cartin WHERE order_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function viewOrderIn($order_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(total_price) as cpsum FROM orderin WHERE order_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
    }
    
    function getTotalCartPrice($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cart_price) as tot FROM temp_cart "
                . "WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
     function getTotalCartPriceIn($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cart_price) as tot FROM temp_cartin "
                . "WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function getTotalCartPrice1($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cart_price) as tot FROM cart "
                . "WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    function getTotalCartPriceIn1($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cart_price) as tot FROM cartin "
                . "WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    
    function getTotalPrice($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(total_price) as tot FROM orderin WHERE order_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    
    function getOrderDetailsByDates($from,$to){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` a,customer c WHERE a.cus_id=c.cus_id  AND order_date between ? and ?");
        $r->execute(array($from,$to));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
   
     function getOrderDetailsByDatesIn($from,$to){
        global $con;
        $r=$con->prepare("SELECT * FROM orderin a,customerin c WHERE a.cus_id=c.cus_id  AND order_date between ? and ?");
        $r->execute(array($from,$to));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function getOrderDetailsByDate($from){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` a, customer c WHERE a.cus_id=c.cus_id AND order_date=?");
        $r->execute(array($from));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
  
    
    function getOrderDetailsByDateIn($from){
        global $con;
        $r=$con->prepare("SELECT * FROM orderin a,customerin c WHERE a.cus_id=c.cus_id AND order_date=?");
        $r->execute(array($from));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function getOrderByYear($year){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` a,customer c"
                . " WHERE a.cus_id=c.cus_id AND order_date LIKE '$year%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
        function getOrderByMonth($m){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` a,customer c"
                . " WHERE a.cus_id=c.cus_id AND order_date LIKE '$m%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function getItemByCategory($i){
        global $con;
        $r=$con->prepare("SELECT qua FROM  stock_balance c,item i,category t WHERE i.item_id=c.item_id AND i.cat_id=t.cat_id");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $qua; 
        
    }
    
    function getOrderinByMonth($m){
        global $con;
        $r=$con->prepare("SELECT * FROM orderin a,customerin c"
                . " WHERE a.cus_id=c.cus_id AND order_date LIKE '$m%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function getPayByMonth($m){
        global $con;
        $r=$con->prepare("SELECT SUM(total_price) as tot FROM `order` WHERE order_date LIKE '$m%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
  
    function deleteItemsFromTempCart($order_id) {
       
        global $con;


        $r=$con->prepare("DELETE FROM temp_cart WHERE order_id=?");
        $r->execute(array($order_id));     
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;
   
}

function deleteItemsFromTempCartIn($order_id) {
       
        global $con;


        $r=$con->prepare("DELETE FROM temp_cartin WHERE order_id=?");
        $r->execute(array($order_id));     
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;
   
}
public function OnlineOrderFrequency($date){
        global $con;
        $r=$con->prepare("SELECT * FROM `order` WHERE order_date LIKE '$date%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
        
    }
    public function OrderFrequency($date){
        global $con;
        $r=$con->prepare("SELECT * FROM orderin WHERE order_date LIKE '$date%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
        
    }

    public function getPayInDetails(){
        global $con;
        $r=$con->prepare("SELECT * FROM payment WHERE order_date LIKE '$date%'");
        $r->execute();  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
        
    }
    
}





?>
