<?php
class dbconnection{
  function dbcon(){
  //To connect database 
        $host="localhost";
        $un="root";//username
        $pd="";//password
        $db="desha";//database name
               
        $con = new PDO("mysql:host=$host;dbname=$db","$un","$pd");
        return $con;        
    }
}
$ob=new dbconnection();
$con=$ob->dbcon();
