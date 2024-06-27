<?php
session_start();
require_once '../inc/conn.php';

$qry="SELECT * FROM departments";
        $result=mysqli_query($cnn, $qry);
        if(mysqli_num_rows($result) == 0){
            die('There are no records to display');
        }

        echo"<a href='../index.php'>HOME</a>";
        echo"<center>";
       echo" <h2>DEPARTMENT LIST</h2>";
echo '<table border="2">';
echo '<tr><th>DEPARTMENT NAME</th><th>EMPLOYEES</th>';

while($row=mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>'.$row['deptName'].'</td>';
    echo '<td>'.'</td>';
    echo '</tr>';
}
echo '</table>';
echo"<a href='create.php'>CREATE DEPARTMENT</a>";

echo"</center>";

 mysqli_close($cnn);
?>



