<?php
session_start();
require_once 'inc/conn.php';

    if(count($_POST)>0) {
        mysqli_query($cnn,"UPDATE employees set userName='".$_POST['userName']."', deptId='".$_POST['deptId']."',
        phoneNo='".$_POST['phoneNo']."', email='".$_POST['email']."', tName='".$_POST['tName']."', tDesc='".$_POST['tDesc']."',
        tProg='".$_POST['tProg']."', priority='".$_POST['priority']."', ddate='".$_POST['ddate']."' WHERE userId='".$_POST['userId']."'");
        header("location: emp.php?rowUpdated");
        }
        $result = mysqli_query($cnn,"SELECT * FROM employees WHERE userId='".$_GET['udt']."'");
        $row= mysqli_fetch_array($result);
        ?>
        <html>
        <head><title></title></head>
        <body>
        <a href='emp.php'>EMPLOYEE LIST</a>
        <form method="post" action="">
        <input type="hidden" name="userId" value="<?php echo $row['userId']; ?>">
        <br>
        Employee Name: <br>
        <input type="text" name="userName" value="<?php echo $row['userName']; ?>">
        <br><br>
        Employee Department: <br>
        <select name="deptId">
            <option value="<?php echo $row['deptId']; ?>">--dept--</option>
              <option value="ADMIN">ADMIN</option>
              <option value="SECRETARY">SECRETARY</option>
              <option value="MARKETER">MARKETER</option>
              <option value="MANAGER">MANAGER</option>
              <option value="ACCOUNTANT">ACCOUNTANT</option>
              <option value="OTHERS">OTHERS</option>
            </select>
            <br><br>
            Employee Phone Number:<br>
        <input type="tel" name="phoneNo" value="<?php echo $row['phoneNo']; ?>">
        <br><br>
        Employee Email:<br>
        <input type="text" name="email" value="<?php echo $row['email']; ?>">
        <br><br>
Task Name: <br>
<input type="text" name="tName" value="<?php echo $row['tName']; ?>"><br><br>
Task Description: <br>
<input type="text" name="tDesc" value="<?php echo $row['tDesc']; ?>"><br><br>
Task Progress:<br>
<select name="tProg">
          <option value="<?php echo $row['tProg']; ?>">--prog--</option>
            <option value="todo">TO DO</option>
            <option value="doing">DOING</option>
            <option value="done">DONE</option>
          </select><br><br>
Task Priority:<br>
          <select name="priority">
          <option value="<?php echo $row['priority']; ?>">--priority--</option>
            <option value="high">HIGH</option>
            <option value="med">MEDIUM</option>
            <option value="low">LOW</option>
          </select><br><br>
          Task Due Date: <br>
          <input type="date" name="ddate" value="<?php echo $row['ddate']; ?>">
          <br>
          <br>
        <input type="submit" name="submit" value="UPDATE">
        </form>
        </body>
        </html>