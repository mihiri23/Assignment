<?php

class backup {

    function viewBackup() {
       
        global $con;


        $r=$con->prepare("SELECT * FROM backup");
        $r->execute();
        
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

}

}

?>

