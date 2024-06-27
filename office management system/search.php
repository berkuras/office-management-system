<?php
session_start();
require_once 'inc/conn.php';

$mail=$_POST['email'];
$qry="select * from employees where email='$mail'";

$res=mysqli_query($cnn,$qry) or die('Query failed. '.mysqli_error($cnn));

if (mysqli_num_rows($res)==0)
{
    echo"<a href='emp.php'>BACK</a><br/>";
	echo "There is no such record to display with email specified as $mail<br/>";
}
else
{
    echo"<a href='emp.php'>BACK</a>";
    echo"<center>";
        echo"<h2>EMPLOYEE INFO</h2>";
        echo '<table border="2" cellspacing="7">';
        echo '<tr><th>USER ID</th><th>DEPARTMENT</th><th>EMPLOYEE NAME</th><th>EMPLOYEE EMAIL</th>
        <th>PHONE NO</th><th>SALARY</th><th>TASK</th><th colspan = "2" >ACTIONS</th></tr>';
 while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
 {
 echo '<tr>';
    echo '<td>'.$row['userId'].'</td>';
    echo '<td>'.$row['deptId'].'</td>';
    echo '<td>'.$row['userName'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['phoneNo'].'</td>';
    echo '<td>'.$row['empSal'].'</td>';
    echo '<td>'.$row['tName'].'</td>';
    echo "<td><a href=\"update.php?udt=".$row['userId']."\">Edit</a></td>";
    echo "<td><a href=\"del.php?id=".$row['userId']."\">Delete</a></td>";
    echo '</tr>';
 }
 echo '</table>';
 echo"</center>";
}
 mysqli_close($cnn);
?>