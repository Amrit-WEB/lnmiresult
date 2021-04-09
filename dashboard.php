<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result Dashboard || LNMI Patna</title>
    <link rel="stylesheet" href="./css/dashboard.css" />
    <link
      rel="shortcut icon"
      href="./css/img/favicon_io/favicon.ico"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <div class="headtitle">
          <img src="./css/img/lnmi-logo.png" alt="LNMI_ADMIN_PORTAL" />
        </div>
        <div class="logout">
          <a href="logout.php"><i class="fas fa-sign-out-alt"> LogOut</i></a>
        </div>
      </div>
      <div class="main">
        <div class="left_panel">
          <a href="dashboard.php" class="nav-a nav_active"
            ><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
          <a href="manage-students.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Student Details</span></a
          >

          <a href="add-result.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Add Result</span></a
          >
          
          <a href="manage-results.php" class="nav-a"
            ><i class="fa fa fa-server"></i> <span>Result Details</span></a
          >

          <a href="change-password.php" class="nav-a"
            ><i class="fa fa fa-server"></i>
            <span> Change Admin Password</span></a
          >
        </div>
        <div class="working_panel">
          <div class="working_title">
            <h3>DASHBOARD</h3>
          </div>
          <div class="working_area">

            <!--no.of students-->
            <div class="dash-1 dash-box">
                                        <a class="working-a" href="manage-students.php">

                                            <span class="bg-icon"><i class="fas fa-users"></i></span>
                                            <?php 
$sql1 ="SELECT rollno   from studenttable ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalstudents=$query1->rowCount();
?> 
                                            <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                                            <span class="box_span_name">No. Of Students</span>

                                        </a>
                                        
              </div>

            <!--No.of Result Declared-->  
            <div class="dash-2 dash-box">
                                        <a class="working-a" href="manage-results.php">
                                        
                                            <span class="bg-icon"><i class="fas fa-graduation-cap"></i></span>
                                            <?php 
$sql3="SELECT  rollno from  resulttable ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totalresults=$query3->rowCount();
?> 
                                            <span class="number counter"><?php echo htmlentities($totalresults);?></span>
                                            <span class="box_span_name">Results Declared</span>
                                            
                                        </a>
                                
              </div>

          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="copyright">
          © 2021 LNMI Patna | Proudly Designed By S.A.R Group
        </div>
      </footer>
    </div>
  </body>
</html>
<?php } ?>
