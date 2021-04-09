<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    elseif(isset($_POST['submit']))
        {
                $password=md5($_POST['password']);
                $newpassword=md5($_POST['newpassword']);
                //$username=$_SESSION['alogin'];
                $username=$_POST['user'];
                $sql ="SELECT Password FROM admin WHERE Password=:password AND UserName='$username'";
                $query= $dbh -> prepare($sql);
                // $query-> bindParam(':username', $username, PDO::PARAM_STR);
                $query-> bindParam(':password', $password, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                if($query -> rowCount() > 0)
                {
                $con="UPDATE admin SET Password=:newpassword where UserName=:username";
                $chngpwd1 = $dbh->prepare($con);
                $chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
                $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
                $chngpwd1->execute();
                $msg="Your Password succesfully changed";
                }
                else {
                $error="Your current password is wrong";    
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

    <script>
            function valid()
            {
            if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
            {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
            }
            return true;
            }
    </script>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); 
        }
        .working_area{
          display:flex;
          flex-direction:column;
          align-items: center;
        }
        form{
  background-color: cadetblue;
  padding:2%;
  margin:7% auto;
  border-bottom: 1px solid gainsboro;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.form-group{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
  margin: 6% 10px;
  color:white;
  font-size:20px;
}
.form-group > input{
  border:none;
  background:none;
  border-bottom: 1px solid gainsboro;
}
.form-group > button{
    background: #5eaaa8;
    margin-top: 20px;
    padding: 10px;
    border: 2px solid #f8f1f1;
    border-radius: 3px;
    color: #f8f1f1;
    letter-spacing: 2px;
    box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ;
    


}
.after-msg{
    padding: 2px 7px;
    width: fit-content;
    border-radius: 20px;
}
.unsuccess-msg{
    background-color: #ff9e2f;
    color: #8b1a00;
    
}
.success-msg{
  background-color: greenyellow;
    color: darkcyan;
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
          <a href="manage-results.php" class="nav-a"
            ><i class="fa fa fa-server"></i> <span>Result Details</span></a
          >

          <a href="change-password.php" class="nav-a nav_active"
            ><i class="fa fa fa-server"></i>
            <span> Change Admin Password</span></a
          >
        </div>
        <div class="working_panel">
          <div class="working_title">
            <h3>Change Admin Password</h3>
          </div>
          <div class="working_area">
              <?php if($msg){?>
                    <div class="after-msg success-msg left-icon-alert" role="alert">
                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                    </div><?php }elseif($error){?>
                                      <div class="after-msg unsuccess-msg left-icon-alert" role="alert">
                                      <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                      </div>
              <?php } ?>

              <div class="panel-body">
                  <form  name="chngpwd" method="post" \ onSubmit="return valid();">
                      <div class="form-group has-success">
                            <label for="success" class="control-label">Admin Name</label>
                            <input type="text" name="user" class="form-control" required="required" id="success">
                      </div>
                      <div class="form-group has-success">
                            <label for="success" class="control-label">Current Password</label>
                            <input type="password" name="password" class="form-control" required="required" id="success">
                      </div>
                      <div class="form-group has-success">
                            <label for="success" class="control-label">New Password</label>
                            <input type="password" name="newpassword" required="required" class="form-control" id="success">
                      </div>
                      <div class="form-group has-success">
                            <label for="success" class="control-label">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" required="required" id="success">
                      </div>
                      <div class="form-group has-success">
                            <button type="submit" name="submit" class="btn btn-success btn-labeled">Change<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                      </div>
                  </form>
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
