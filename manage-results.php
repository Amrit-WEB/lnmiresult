<?php
  include('includes/config.php');
  if(isset($_REQUEST['delete'])){
  
    $sql = "DELETE FROM resulttable WHERE semroll = '{$_REQUEST['semroll']}' ";
    if(($dbh->query($sql))==TRUE){
      $msg = '<div id="alert" class="after-msg sucsess-msg"><i class="fas fa-check-circle"></i> Delete Successfully.</div>';
    }else{
      $msg = '<div id="alert" class="after-msg sucsess-msg"><i class="fas fa-times-circle"></i> Something is Wrong.</div>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result Dashboard || LNMI Patna</title>
    <link rel="stylesheet" href="./css/dashboard.css" />
    <link rel="stylesheet" href="./css/manage-students.css" />
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
    <style>
      .working_area{
        align-items: center;
      }
      .sucsess-msg{
    background-color: greenyellow;
    color: darkcyan;
    padding: 2px 7px;
    width: fit-content;
    border-radius: 20px;
}
      </style>
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
          <a href="dashboard.php" class="nav-a"
            ><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
          <a href="manage-students.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Student Details</span></a
          >

          <a href="add-result.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Add Result</span></a
          >
          <a href="manage-results.php" class="nav-a nav_active"
            ><i class="fa fa fa-server"></i> <span>Result Details</span></a
          >

          <a href="change-password.php" class="nav-a"
            ><i class="fa fa fa-server"></i>
            <span> Change Admin Password</span></a
          >
        </div>
        <div class="working_panel">
          <div class="working_title">
            <h3>Result Details</h3>
          </div>
          <div class="working_area">
          <?php
                  if(isset($msg)){
                    echo $msg;
                  }
              ?>
              <?php
                    $sql = "SELECT * FROM resulttable";
                    $result = $dbh->query($sql);

                    if($result->rowcount() > 0){
              ?>        
              <table>
                <thead>
                  <tr>
                    <td>Roll No.</td>
                    <td>Course</td>
                    <td>Semester</td>
                    <td>Paper 1</td>
                    <td>Paper 2</td>
                    <td>Paper 3</td>
                    <td>Paper 4</td>
                    <td>Paper 5</td>
                    <td>Paper 6</td>
                    <td>Delete</td>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){

                  echo '<tr>';
                    echo '<td>'.$row['rollno'].'</td>';
                    echo '<td>'.$row['course'].'</td>';
                    echo '<td>'.$row['semester'].'</td>';
                    echo '<td>'.$row['subone'].'</td>';
                    echo '<td>'.$row['subtwo'].'</td>';
                    echo '<td>'.$row['subthree'].'</td>';
                    echo '<td>'.$row['subfour'].'</td>';
                    echo '<td>'.$row['subfive'].'</td>';
                    echo '<td>'.$row['subsix'].'</td>';
                    
                    echo '<td>';
                      /*echo '
                        <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="specific_roll" value='.$row["rollno"].'>
                        <button type="submit" class="action-btn edit-btn" name ="view" value="View"><i class="fas fas-action fa-edit"></i></button>
                        </form>';*/                     
                        echo '<form method="POST" style="display:inline;">
                      <input type="hidden" name="semroll" value='.$row["semester"].''.$row["rollno"].'>
                      <button type="submit" class="action-btn delete-btn" name ="delete" value="Delete"><i class="fas fas-action fa-trash"></i></button>
                      </form>';
                    echo '</td>';
                  echo '</tr>';
                  }?>
                </tbody>
              </table> 

              
            <?php } else{
             echo '<div class="no_student">No Any Result Declared Here.</div>'; 
            }?> 
                
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