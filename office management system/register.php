<?php
session_start();
?>
        <form action="inc/reg-inc.php" method="POST">
        <a href='emp.php'>EMPLOYEE LIST</a>
  <h2>REGISTER EMPLOYEE</h2>
            <input type="text" name="name" placeholder="Name...">

            <input type="text" name="email" placeholder="Email...">

            <input type="tel" name="fone" placeholder="Phone Number...">

            <input type="password" name="pwd" placeholder="Password...">

            <input type="password" name="pwdRep" placeholder="Repeat Password...">

            <select name="did">
            <option value="">--DEPARTMENT--</option>
              <option value="ADMIN">ADMIN</option>
              <option value="SECRETARY">SECRETARY</option>
              <option value="MARKETER">MARKETER</option>
              <option value="MANAGER">MANAGER</option>
              <option value="ACCOUNTANT">ACCOUNTANT</option>
              <option value="OTHERS">OTHERS</option>
            </select>

         <button type="submit" name="submit">Register</button>
         </br>
</br></br>
</br>
  </form>

    <?php
    if(isset($_GET["error"])){
      if($_GET["error"]=="registered"){
        echo "<p> USER REGISTERED! </p>";
      }
    }
    ?>
  
</body></html>