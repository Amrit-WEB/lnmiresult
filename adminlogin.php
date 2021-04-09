<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['authenticate']))
{
$uname=$_POST['adminname'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('‼ Wrong Credential ');</script>";

}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login || LNMI PATNA</title>
    <link rel="stylesheet" href="./css/adminlogin.css">
    <link rel="shortcut icon" href="./css/img/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    
    <div class="main_wrapper">
        <div class="header">
            <div class="logo">
                <img src="./css/img/lnmi-logo.png" alt="lnmi_logo">
            </div>
            <div class="nav_box">
                    <a href="https://lnmipat.ac.in/"><i class="fas fa-home"></i><span> Home  </span></a>
                    <a href="./index.php" style="margin: 0 10px;"
            ><i class="fas fa-user"></i><span> Search Result</span></a
          >
             </div>
        </div>
        
        <div class="login_wrapper">
            <div class="admin_logo">
                <img src="./css/img/admin.png" alt="admin_logo">
            </div>
            <div class="login_box">
                <form  method="POST" action="">
                    <div class="adminid">
                        <i class="fas fa-user"></i>
                        <input type="text" name="adminname" placeholder="Enter Admin ID" required>
                    </div>
                    <div class="adminpassword">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="adminbutton">
                        <button class="adminbtn" name="authenticate">Authenticate</button>
                    </div>
                </form>
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