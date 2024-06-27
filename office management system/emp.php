<?php
session_start();
require_once 'inc/conn.php';

$query="SELECT * FROM departments INNER JOIN employees ON employees.deptId = departments.deptName ORDER BY userId";
        $result=mysqli_query($cnn, $query);
        if($result && mysqli_num_rows($result) == 0){
            die('There are no records to display');
        }
        echo"<a href='index.php'>HOME</a>";

        
echo"<center>";



        echo"<h2>EMPLOYEE LIST</h2>";
        echo '<table border="2" cellspacing="7">';
        echo '<tr><th>USER ID</th><th>DEPARTMENT</th><th>EMPLOYEE NAME</th><th>EMPLOYEE EMAIL</th>
        <th>PHONE NO</th><th>SALARY</th><th>TASK</th><th colspan = "2" >ACTIONS</th></tr>';

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
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

echo"<a href='register.php'>REGISTER EMPLOYEE</a>";
echo"</center>";

echo"<form name='frm' method='post' action='search.php'>";
  echo"Find Employee: <input type='text' name='email'><br/>";
  echo"<button type='submit' name='search'>SEARCH<br/>";
  echo"</form>";

 mysqli_close($cnn);
?>

