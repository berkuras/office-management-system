<?php
require_once '../inc/conn.php';
require_once '../inc/func-inc.php';
$daysWork=0;
$rate=0;
$sal=0;
$ot=3;
$gp=0;

calcSal($rate);

$query = "SELECT * FROM employees WHERE empSal = '$rate' limit 1";
$result = mysqli_query($cnn, $query);
if($result){
    if(isset($_GET['email'])){
        if(isset($_POST['calc'])){
            $daysWork=$_POST['days'];
            $rate=$_POST['rate'];
            $sal=$daysWork*$rate;
            $gp=$ot*$sal;
        }
    }
}
?>
        <form action="" method="POST">
  <h2>PAYROLL</h2>
            <p>Employee Username: <input type="text" name="email">
            <p>Number of Days Worked: <input type="text" name="days"></p>
            <p>Rate per Day: <input type="text" name="rate"></p>

         <button type="submit" name="calc">Calculate Salary</button>
         </br>
</br></br>
</br>
  </form>
  
</body></html>