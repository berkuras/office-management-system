<?php
session_start();
require_once 'inc/conn.php';


    $id=$_GET['id'];
    $del=mysqli_query($cnn,"DELETE FROM employees WHERE userId='".$id."'");
    if($del==true){
        mysqli_close($cnn);
        header("location: emp.php");
    }else{
        echo("The row has not been deleted.");
    }

?>



