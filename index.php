<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LNMI-Patna || SEMESTER RESULT</title>
    <link rel="stylesheet" type="text/css" href="./css/home.css" />
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
        .form-group{
          display:flex;
          flex-direction: row;
          justify-content:space-between;
          margin: 10% 0;
        }
        input{
          width:auto;
          margin:0;
          padding:0px 0px 0px 3px;
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
          <a href="./adminlogin.php"
            ><i class="fas fa-user"></i><span> Administration Login</span></a
          >
        </nav>
      </div>
      <div class="main">
        <div class="result_title">
          <i class="fas fa-lock-open"></i>
          <span>View Result</span>
        </div>
        <div class="form_box">
          <div class="result_icon">
            <img src="./css/img/result.png" alt="result_icon" />
          </div>
          <div class="form_input">
            <form action="show-result.php" method="POST">
              <div class="form-group">
              <label for="registration_label">Roll No:</label>
              <input
                type="text"
                class="registration_input"
                placeholder="Enter RollNo."
                name ="rollno"
              />
              </div>
              <div class="form-group">
              <label for="date_of_birth_label">Course -</label>
              
              <select name="course">
                                <option value="">Select</option>
                                <option value="BCA">BCA</option>
                                <option value="BBA">BBA</option>
              </select>
              </div>
              <div class="form-group">
              <label for="semester_label">Semester -</label>
              
              <select name="semester" class="semeter_input">
                                <option value="">Select</option>
                                <option value="First">1st</option>
                                <option value="Second">2nd</option>
                                <option value="Third">3rd</option>
                                <option value="Fourth">4th</option>
                                <option value="Fifth">5th</option>
                                <option value="Sixth">6th</option>
                </select>
              </div>
              <div class="button_box form-group">
                <button class="button" name="search-btn">
                  <i class="fas fa-search"> Search</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="copyright">
          © 2021 LNMI Patna | Proudly Designed By S.A.R Group
        </div>
      </footer>
    </div>
    <script src="./js/Controller.js"></script>
  </body>
</html>
