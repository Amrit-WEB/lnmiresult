<?php
  include('includes/config.php');

  if(isset($_REQUEST['search-btn'])){

    if(($_REQUEST['semester']=="") || ($_REQUEST['course']=="") || ($_REQUEST['rollno']=="") ){
      $msg = '<div class="after-msg">Required Fields are blank,Try Again..</div>';
      
    }
    
  }

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LNMI-Patna || SEMESTER RESULT</title>
    <link rel="stylesheet" href="./css/home.css" />
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
    .main{
      width:90%;
      height: 60%;
    
    }
    .form_box{
      flex-direction:column;
      align-items: baseline;
    flex-direction: column;
    justify-content: space-around;
    height: 100%;
    width: 98%;
    }
   
    .info-content{
      margin: 1px 0;
      color:#1a2b28;
    }
    tr{
      background-color:#78bbb0;
    }
    td{
      padding:2px;
    }
    .remark{
      background-color:#589087;
      color: white;
    padding: 5px;
    border-radius: 8px;
      
    }
    .after-msg{
    padding: 2px 7px;
    width: fit-content;
    border-radius: 20px;
    margin: 0 auto;
    background: red;
}
b,#text{
  display:none;
}
    
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <header class="logo_name">
          <img src="./css/img/lnmi-logo.png" alt="lnmi_logo" />
        </header>
        <nav class="navigation">
          <a href="https://lnmipat.ac.in/"
            ><i class="fas fa-home"></i><span> Home</span></a
          >
          <a href="./index.php"
            ><i class="fas fa-user"></i><span> Search Result</span></a
          >
        </nav>
      </div>
      <div class="main">
        <div class="form_box" id="exampl">
          <div class="st-detail">
          <?php
              if(isset($msg)){
                echo $msg;
              }
              $sem = $_REQUEST['semester'];
              $cor = $_REQUEST['course'];
              $roll = $_REQUEST['rollno'];

              $sql1 = "SELECT * FROM course WHERE course = '$cor' AND semester ='$sem'";
              $result1 = $dbh->query($sql1);
              $sql2 = "SELECT * FROM studenttable WHERE rollno =$roll ";
              $result2 = $dbh->query($sql2);
              $sql3 = "SELECT * FROM resulttable WHERE rollno = $roll AND semester ='$sem' AND course='$cor'";
              $result3 = $dbh->query($sql3);

              if($result3->rowcount() > 0){
          ?>
            
          <?php while($row2 =$result2->fetch(PDO::FETCH_ASSOC)){
              echo '<div class="info">';
                echo '<div class="name info-content">Student Name : '.$row2['studentName'].'</div>';
                echo '<div class="cor info-content">Course : '.$row2['course'].'</div>';
                echo '<div class="roll info-content">Roll No. : '.$row2['rollno'].'</div>';
                echo '<div class="sem info-content">Semseter : '.$sem.'</div>';
                echo '<div class="sess info-content">Session :'.$row2['fromSession'].'-'.$row2['toSession'].'</div>';
              echo '</div>';
          }?>
          </div>
          <table>
            <thead>
              <?php while($row1 = $result1->fetch(PDO::FETCH_ASSOC)){
                
              echo '<tr style="background-color:#589087; color: white;">';
                echo '<td>Subjects</td>';
                echo '<td>'.$row1['subject1'].'</td>';
                echo '<td>'.$row1['subject2'].'</td>';
                echo '<td>'.$row1['subject3'].'</td>';
                echo '<td>'.$row1['subject4'].'</td>';
                echo '<td>'.$row1['subject5'].'</td>';
                echo '<td>'.$row1['subject6'].'</td>';
                echo '<td>Total</td>';
              echo '</tr>';
              }?>
              <tr>
              <td style="background-color:#589087; color: white;">Total Marks</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>600</td>
              </tr>
              <tr>
              <td style="background-color:#589087; color: white;">Pass Marks</td>
              <td>40</td>
              <td>40</td>
              <td>40</td>
              <td>40</td>
              <td>40</td>
              <td>40</td>
              <td>270</td>
              </tr>

            </thead>
            <tbody>
              <?php while($row3 = $result3->fetch(PDO::FETCH_ASSOC)){
                $totalmarks = $row3['subone']+$row3['subtwo']+$row3['subthree']+$row3['subfour']+$row3['subfive']+$row3['subsix'];

              echo'<tr>';
              echo '<td style="background-color:#589087; color: white;">Obtained Marks</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subone'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subtwo'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subthree'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subfour'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subfive'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$row3['subsix'].'</td>';
              echo '<td style="color:white; font-size: larger;
                            font-weight: 900">'.$totalmarks.'</td>';
              echo '</tr>';
              }?>
          
            </tbody>
            
          </table>
          <?php
              if($totalmarks>=360){
                $division = 'Excellent, First Division';
              }else{
                if($totalmarks>=270 && $totalmarks<360){
                  $division = 'Very Good, Second Division';
                }else{
                  if($totalmarks>=180 && $totalmarks<270){
                    $division = 'Good, Third Division';
                  }else{
                    $division = 'Needs Improvement, Fail';
                  }
                }
              }
              echo '<div class="remark">'.$division.'</div>';
              echo '<hr style="color:#589087; width:100%;">';
              echo'<div style="margin: 0 auto;"><i class="fa fa-print" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></div>';
              
          ?>
          

          <?php }else{
            echo '<div style=" background-color:#5eaaa8; width: fit-content; border-radius: 20px; font-size: xxx-large;">No Result Found</div>';
          }?>
            
        
        </div> 
      </div>
        
      <footer class="footer">
        <div class="copyright">
          © 2021 LNMI Patna | Proudly Designed By S.A.R Group
        </div>
      </footer>
    </div>
    <script>
    function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
}
    </script>
    
  </body>
</html>
        