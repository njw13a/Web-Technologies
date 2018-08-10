<!DOCTYPE html>
<html>
<head>
  <meta name="IP" content = "150.252.118.210">
  <meta name="Author" content = "Nick Weg"/>
  <meta name="Date" content = "April 5, 2018"/>
  <meta name="Assignment" content = "RVS Phase 1"/>
  <meta name="Username" content = "njw13a"/>
  <meta name="Major" content = "Computer Science"/>
  <meta name="Completion Time" content = "5 hours"/>
  <title>RVS Project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <style>
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .label {
      width: 400px !important;
    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['secure-login']))
    {
      phpFun();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['reset']))
    {
      resetPassword();
    }
    function phpFun() {
      try {

        $url='http://150.252.118.210';
        $message="Username or password was entered incorrectly.";

        $servername="localhost";
        $dbname="survey";
        $dbUsername="bookorama";
        $dbPassword="bookorama123";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM admin WHERE username=?");
        $stmt->execute([$_POST['inputUsername']]);
        $password_hash = $stmt->fetchColumn();
        if(password_verify($_POST['inputPassword'], $password_hash)) {
          console_log("You are an admin");
          echo '<script>';
          echo 'document.getElementById("admin-check").value="TRUE";';
          echo '</script>';
          //document.getElementById("admin-check").value="TRUE";
        }
        else {
          /*console_log("The username or password is incorrect.");
          alert("The username or password was entered incorrectly.")
          //header('Location: ' . $url, false, 302);
          exit;*/
          echo '<script>';
          echo 'document.getElementById("admin-check").value="FALSE";';
          echo '</script>';
          //document.getElementById("val0").value="FALSE";
        }
      }
      catch(PDOException $e) {
        console_log("Error: " . $e->getMessage());
      }
    }

    function resetPassword() {

    }
   ?>
</head>
<body>
  <div class="container">
  <div class="item">
  <form action="query.php" method="post">
    <div class="mx-auto form-group row">
      <label for="inputUsername" class="col-sm-2 col-form-label">Admin Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control label" name="inputUsername" placeholder="abc12a">
      </div>
    </div>

    <div class="mx-auto form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control label" name="inputPassword" placeholder="Password">
      </div>
    </div>
    <div class="mx-auto">
      <div class="col-sm-10">
        <input type="hidden" id="admin-check" name="admin-check" value="">
        <input type="submit" class="btn btn-primary" name="secure-login" value="Login"></button>
      </div>
      <div class="col-sm-10">
        <input type="submit" class="btn btn-secondary" name="reset" value="Reset"></button>
    </div>
  </form>
</div>
</div>
</body>
</html>
