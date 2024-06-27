<?php 
session_start();
require_once '../inc/conn.php';
     $sql = "SELECT * FROM employees WHERE deptId = '".$_SESSION['deptId']."'";
     $result = mysqli_query($cnn, $sql);
     if($result && mysqli_num_rows($result) == 0){
         die('There are no records to display');
     }
     echo"<a href='../index.php'>HOME</a>";
             echo"<center>";
             echo"<h2>PROFILE</h2>";
             echo '<table border="2" cellspacing="7">';
             echo '<tr><th>DEPARTMENT</th><th>EMPLOYEE NAME</th><th>EMPLOYEE EMAIL</th>
             <th>PHONE NO</th><th>SALARY</th><th>TASK NAME</th><th>TASK DESCRIPTION</th><th>PROGRESS</th>
             <th>PRIORITY</th><th>DUE</th></tr>';
     
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
     {
         echo '<tr>';
         echo '<td>'.$row['deptId'].'</td>';
         echo '<td>'.$row['userName'].'</td>';
         echo '<td>'.$row['email'].'</td>';
         echo '<td>'.$row['phoneNo'].'</td>';
         echo '<td>'.$row['empSal'].'</td>';
         echo '<td>'.$row['tName'].'</td>';
         echo '<td>'.$row['tDesc'].'</td>';
         echo '<td>'.$row['tProg'].'</td>';
         echo '<td>'.$row['priority'].'</td>';
         echo '<td>'.$row['ddate'].'</td>';
         echo '</tr>';
     }
     echo '</table>';
     echo"</center>";

     mysqli_close($cnn);
?>