<?php
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $fone=$_POST["fone"];
    $pwd=$_POST["pwd"];
    $pwdRep=$_POST["pwdRep"];
    $did=$_POST["did"];

    require_once 'conn.php';
    require_once 'func-inc.php';


    if(uidexist($cnn, $email)!==false){
      header("location: ../assign.php?error=usernameexists");
      exit();
  }

    if(emptySignup($name, $email, $fone, $pwd, $pwdRep)!==false){
      header("location: ../assign.php?error=emptyinput");
        exit();
      }
      
      if(checkpwd($pwd, $pwdRep)!==false){
        header("location: ../assign.php?error=checkpwd");
        exit();
      }

    createUser($cnn, $name, $email, $fone, $pwd, $did);

}else{
    header("location: ../login.php");
    exit();
}
?>