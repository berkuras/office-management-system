<?php
if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        require_once 'conn.php';
        require_once 'func-inc.php';

if(!empty($email) && !empty($pwd)){
    $query = "SELECT * FROM employees WHERE email = '$email' limit 1";
    $result = mysqli_query($cnn, $query);
    if($result){
        if($result && mysqli_num_rows($result) > 0){
            $udata = mysqli_fetch_assoc($result);
            if($udata['userPwd'] === $pwd){
                $_SESSION['email'] = $udata['email'];
                $_SESSION['deptId'] = $udata['deptId'];
                header("location:../index.php?welcome");
                exit();
            }
        }
    }
}

if(emptyLogin($email, $pwd)!==false){
    header("location: ../signin.php?error=emptyinput");
    exit();
}

userlogin($cnn, $email, $pwd);

}else{
    header("location:../signin.php?error=wronglogin");
    exit();
}

?>