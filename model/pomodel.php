<?php

class po{    
   function checkOrderIn($uni_id){
        global $con;
        $r=$con->prepare("SELECT * FROM po WHERE uni_id=?");
        $r->execute(array($uni_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    function checkrqua($uni_id){
        global $con;
        $r=$con->prepare("SELECT * FROM po_rqua WHERE uni_id=?");
        $r->execute(array($uni_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
     public function addOrderIn($status,$uni_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO po(po_date,po_status,uni_id) VALUES (NOW(),?,?)");
        $r->execute(array($status,$uni_id));
             $po_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $po_id;
     }
      public function addTempCartIn($po_id, $item_id,$color_id, $size_id,$rquan,$cement,$sand,$bss,$pop,$limestone,$glue){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO po_cart (po_id,item_id,color_id,size_id,quantity,cement,sand,bss,pop,limestone,glue) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $r->execute(array($po_id, $item_id,$color_id, $size_id,$rquan,$cement,$sand,$bss,$pop,$limestone,$glue));
           
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
     }
     public function addAvailable($po_id,$cementa,$sanda,$bssa,$popa,$limestonea,$gluea){
        global $con;
        //print_r($arr);
        $r=$con->prepare("INSERT INTO po_rqua (po_id,cement,sand,bss,pop,limestone,glue) VALUES (?,?,?,?,?,?,?)");
        $r->execute(array($po_id,$cementa,$sanda,$bssa,$popa,$limestonea,$gluea));
           
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
     }
     function viewCartIn($po_id){
        global $con;
        $r=$con->prepare("SELECT *,SUM(quantity) as qsum,SUM(cement) as csum,SUM(sand) as ssum,SUM(bss) as bsum,SUM(pop) as psum,SUM(limestone) as lsum,SUM(glue) as gsum FROM po_cart WHERE po_id=? GROUP BY item_id,color_id,size_id");
        $r->execute(array($po_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    function getTotal($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cement) as totc,SUM(sand) as tots,SUM(bss) as totb,SUM(pop) as totp,SUM(limestone) as totl,SUM(glue) as totg FROM po_cart WHERE po_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    function getTotalAvailable($order_id){
        global $con;
        $r=$con->prepare("SELECT SUM(cement) as totc,SUM(sand) as tots,SUM(bss) as totb,SUM(pop) as totp,SUM(limestone) as totl,SUM(glue) as totg FROM po_rqua WHERE po_id=?");
        $r->execute(array($order_id));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    }
    
    function addTotalPO($order_id, $totc,$tots,$totb,$totp,$totl,$totg){
        global $con;
        $r=$con->prepare("INSERT INTO po_total (po_date,po_id,totc,tots,totb,totp,totl,totg) VALUES(now(),?,?,?,?,?,?,?)");
        $r->execute(array($order_id, $totc,$tots,$totb,$totp,$totl,$totg));  
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
    } 
    public function updateOrderIn($order_status,$order_id){
        global $con;
        //print_r($arr);
        $r=$con->prepare("UPDATE  po SET po_status=? WHERE po_id=?");
        $r->execute(array($order_status,$order_id));
             $order_id=$con->lastinsertId();
                     
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $order_id;
     }
     
     function updatestockbalanceSubc($totca) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=1"); //here the names in the database are used
        $r->execute(array($totca)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    function updatestockbalanceSubs($totsa) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=2"); //here the names in the database are used
        $r->execute(array($totsa)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    
    function updatestockbalanceSubb($totba) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=3"); //here the names in the database are used
        $r->execute(array($totba)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    function updatestockbalanceSubp($totpa) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=4"); //here the names in the database are used
        $r->execute(array($totpa)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    function updatestockbalanceSubl($totla) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=5"); //here the names in the database are used
        $r->execute(array($totla)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
    function updatestockbalanceSubg($totga) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE raw_balance SET lastmodified=now(),qua=qua-? WHERE item_id=6"); //here the names in the database are used
        $r->execute(array($totga)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
}





?>
