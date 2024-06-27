<?php
if(isset($_POST["submit"])){
    $dName=$_POST["dName"];

    require_once 'conn.php';
    require_once 'func-inc.php';


    if(dnameexist($cnn, $dName)!==false){
      header("location: ../create.php?error=nameexists");
      exit();
  }

    if(emptyReg($dName)!==false){
      header("location: ../create.php?error=emptyinput");
        exit();
      }

    createDept($cnn, $dName);

}else{
    header("location: ../create.php");
    exit();
}
?>