<?php
session_start();
require_once '../inc/conn.php';
$query="SELECT * FROM employees WHERE tName != '' ORDER BY priority";
        $result=mysqli_query($cnn, $query);
        if($result && mysqli_num_rows($result) == 0){
            die('There are no tasks to display');
        }
        echo"<a href='../index.php'>HOME</a>";

        echo"<center>";
        echo"<h2>TASKS</h2>";
        echo '<table border="2" cellspacing="7">';
        echo '<tr><th>EMPLOYEE NAME</th><th>DEPARTMENT</th><th>TASK</th><th>DESCRIPTION</th><th>PROGRESS</th>
        <th>PRIORITY</th><th>EMPLOYEE EMAIL</th><th>DUE DATE</th><th>EDIT</th></tr>';

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    echo '<tr>';
    echo '<td>'.$row['userName'].'</td>';
    echo '<td>'.$row['deptId'].'</td>';
    echo '<td>'.$row['tName'].'</td>';
    echo '<td>'.$row['tDesc'].'</td>';
    echo '<td>'.$row['tProg'].'</td>';
    echo '<td>'.$row['priority'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['ddate'].'</td>';
    echo "<td><a href=\"../edit.php?udt=".$row['userId']."\">Edit</a></td>";
    echo '</tr>';
}
echo '</table>';
echo"</center>";
?>