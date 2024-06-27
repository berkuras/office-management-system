<?php
session_start();

function check_login($cnn){
    if(isset($_SESSION['email'])){
        $id= $_SESSION['email'];
        $query="SELECT * FROM users WHERE email='$id' limit 1";
        $result=mysqli_query($cnn, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
}

function createUser($cnn, $name, $email,$fone, $pwd, $did){
    $sql = "INSERT INTO employees (userName, email, phoneNo, userPwd, deptId) VALUES(?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($cnn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../emp.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $fone, $hashedPwd, $did);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../emp.php?registered");
        exit();
}

function createDept($cnn, $dName){
    $sql = "INSERT INTO departments (deptName) VALUES(?);";

    $stmt = mysqli_stmt_init($cnn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../create.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $dName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../nav/dept.php");
        exit();
}

function checkPwd($pwd, $pwdRep){
    $result;
    if($pwd!==$pwdRep){
        $result = true; 
    }else{
        $result = false;
    }
    return $result;
}

function uidexist($cnn, $email){
    $sql = "SELECT * FROM employees WHERE email = ?;";
    $stmt = mysqli_stmt_init($cnn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row; 
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function dnameexist($cnn, $dName){
    $sql = "SELECT * FROM departments WHERE deptName = ?;";
    $stmt = mysqli_stmt_init($cnn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../create.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $dName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row; 
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);  
}

function emptySignup($name, $email, $fone, $pwd, $pwdRep){
    $result;
    if(empty($name) || empty($email) || empty($fone) || empty($pwd) || empty($pwdRep)){
        $result = true; 
    }else{
        $result = false;
    }
    return $result;
}

function emptyLogin($uname, $pwd){
    $result;
    if(empty($uname) || empty($pwd)){
        $result = true; 
    }else{
        $result = false;
    }
    return $result;
}

function emptyReg($dName){
    $result;
    if(empty($dName)){
        $result = true; 
    }else{
        $result = false;
    }
    return $result;
}

function userlogin($cnn, $email, $pwd){
    $uidExists=uidexist($cnn, $email);
    if($uidExists===false){
        header("location: ../login.php?error=checkuser");
        exit();
    }
    $pwdHashed=$uidExists["userPwd"];
    $checkPwd=password_verify($pwd, $pwdHashed);
    if($checkPwd===false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }else if($checkPwd===true){
        $_SESSION["emails"]=$uidExists["email"];
        $_SESSION["usersName"]=$uidExists["userName"];
                
        header("location: ../index.php?loggedin");
        exit();
    }
}

function display($cnn){
    $query = "SELECT * FROM employees WHERE email =".$_SESSION["email"] ;
      
    $result=mysqli_query($cnn, $query);
    if($result && mysqli_num_rows($result) > 0){
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
header("location: ../list.php?success");
exit();

echo '<table border="1">';
echo '<tr><th>Student Number</th><th>Name</th><th>Surname</th></tr>';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
echo '<tr>';
echo '<td>'.$row['empId'].'</td>';
echo '<td>'.$row['userName'].'</td>';
echo '<td>'.$row['did'].'</td>';
echo '</tr>';
}
echo '</table>';
mysqli_close($cnn);
}
?>



   