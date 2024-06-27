<HTML>
 <HEAD>
  <TITLE> 316 project </TITLE>
  <link rel="stylesheet" href="css/resetstyle.css">
  <style>
    body{
  background-color: black;
  background-image: url("img/offwall.jpg");
  height: 100%; 
  background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.navmain-right a:hover {
    transform: translateY(-2px);
   color: white;
   }
  
  .navmain-right {
    float: left;
  }
  
  .navmain-right a{
  padding: 0 10px;
  text-transform: uppercase;
  text-decoration: none;
  color: black;
  font-size: 20px;
  text-shadow: 0 0 3px white, 0 0 5px black;
  }

  .nav-main {
  overflow: hidden;
  background-color: grey;
  padding: 10px 5px;
}

.nav-main a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.nav-main a.logo {
  font-size: 25px;
  font-weight: bold;
}

.nav-main a:hover {
 transform: translateY(-2px);
color: white;
}
    </style>
 </HEAD>
 <body>
 <nav class="nav-main">
 <div class="navmain-right">
   <?php
   session_start();
   require_once 'inc/conn.php';
   if(isset($_SESSION["deptId"])){
            if($_SESSION["deptId"]=="admin"){
                    echo"<a href='nav/dept.php'>DEPARTMENTS</a>";
                    echo"<a href='emp.php'>EMPLOYEES</a>";
                    echo"<a href='nav/task.php'>TASKS</a>";
                    echo"<a href='nav/visit.php'>VISITATION</a>";
                    echo"<a href='nav/sal.php'>PAYROLL</a>";
                    echo"<a href='nav/prof.php'>PROFILE</a>";
                    echo"<a href='inc/logout.php'>LOG OUT</a>";
             }else if($_SESSION["deptId"]=="manager"){
                echo"<a href='task.php'>TASKS</a>";
                echo"<a href='nav/visit.php'>VISITATION</a>";
                echo"<a href='nav/prof.php'>PROFILE</a>";
               echo"<a href='inc/logout.php'>LOG OUT</a>";
             }else if($_SESSION["deptId"]=="secretary"){
              echo"<a href='nav/visit.php'>VISITATION</a>";
              echo"<a href='nav/prof.php'>PROFILE</a>";
             echo"<a href='inc/logout.php'>LOG OUT</a>";
           }else if($_SESSION["deptId"]=="marketer"){
            echo"<a href='task.php'>TASKS</a>";
            echo"<a href='nav/visit.php'>VISITATION</a>";
            echo"<a href='nav/prof.php'>PROFILE</a>";
           echo"<a href='inc/logout.php'>LOG OUT</a>";
         }else if($_SESSION["deptId"]=="accountant"){
          echo"<a href='nav/visit.php'>VISITATION</a>";
          echo"<a href='nav/sal.php'>PAYROLL</a>";
          echo"<a href='nav/log.php'>COMPANY LOG</a>";
          echo"<a href='nav/prof.php'>PROFILE</a>";
         echo"<a href='inc/logout.php'>LOG OUT</a>";
       }else if($_SESSION["deptId"]=="others"){
        echo"<a href='nav/visit.php'>VISITATION</a>";
       echo"<a href='inc/logout.php'>LOG OUT</a>";
     }
     echo"<h2>WELCOME ".$_SESSION['deptId']."</h2>";
    }else{
               echo"<a href='login.php'>Log In</a>";
            }
            ?> 
            </div>
          </nav>
</body>
</HTML>


