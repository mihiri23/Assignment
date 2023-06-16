<?php

class production {

    function addproduction($arr){
        global $con;
        $r=$con->prepare("INSERT INTO production (item_id,color_id,size_id,quantity,`cement(50kg_bag)`,`sand(cube)`,`bss(cube)`,`pop(kg)`,`limestone(kg)`,`glue(bottle)`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['item_id'],$arr['color_id'],$arr['size_id'],$arr['quan'],$arr['cement'],$arr['sand'],$arr['bss'],$arr['pop'],$arr['limestone'],$arr['glue']));
      
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r; 
        
        
    } 
    public function checkProduction($pro_id){
        global $con;
        $r=$con->prepare("SELECT * FROM production_new WHERE pro_id=? ");
        $r->execute(array($pro_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     } 
    function new_production($arra){
        global $con;
        $r=$con->prepare("INSERT INTO production_new (item_id,color_id,size_id,quan,rquan) VALUES (?,?,?,?,?)");
        $r->execute(array($arra['item_id'],$arra['color_id'],$arra['size_id'],$arra['qua'],$arra['rqua']));
        $pro_id=$con->lastinsertId();
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $pro_id; 
        
    } 
   public function viewRM($item_id,$color_id,$size_id){
        global $con;
        $r=$con->prepare("SELECT * FROM production WHERE item_id=? AND color_id=? AND size_id=?");
        $r->execute(array($item_id,$color_id,$size_id));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     } 
     
     public function viewAvailableRM($a){
        global $con;
        $r=$con->prepare("SELECT * FROM raw_balance WHERE item_id=?");
        $r->execute(array($a));
        
        if($r->errorCode()!= 0){
                $errors = $r->errorInfo();
                echo $errors[2];
        }
        return $r;
         
     } 
     
    
}

?>
<!--,color_id,size,id,cement(50kg_bag),sand(cube),bss(cube),pop(kg),limestone(kg),glue(bottle
?,?,?,?,?,?,?,?
,$arr['color_id'],$arr['size,id'],$arr['cement'],$arr['sand'],$arr['bss'],$arr['pop'],$arr['limestone'],$arr['glue']-->