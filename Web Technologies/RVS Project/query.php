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
    .button {
      margin-bottom: 20px;
      margin-top: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

    function individual() {
      indQuery.submit();
    }
  </script>
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
    else {
      header('Location: ' . "http://150.252.118.210", false, 302);
      exit;
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
        }
        else {
          console_log("The username or password is incorrect.");
          header('Location: ' . "http://150.252.118.210", false, 302);
          exit;
        }
      }
      catch(PDOException $e) {
        console_log("Error: " . $e->getMessage());
      }
    }

    /*function oneSearch() {
      try {

        //$term = echo 'document.getElementById("individualQuery").value;';

        $term = "True Friendship";

        $servername="localhost";
        $dbname="survey";
        $dbUsername="bookorama";
        $dbPassword="bookorama123";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT username, start_time FROM r_values WHERE first_value=:term");
        $stmt->bindParam(':term', $term);
        $stmt->execute();

        $results = $stmt->fetch();
        echo json_encode($results);
      }
      catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }*/

   ?>
</head>
<body>
<div class="container">
<div class="item">
  <form method="POST" action="individual.php">
    <div id="ind" class="button">
      <input type="text" id="individualQuery" name="Individual Query">
      <input type="submit" name="indButton" value="Individual Query"></button>
    </div>
  </form>
  <form method="POST" action="priority.php">
    <div id="pri" class="button">
      <input type="text" id="priorityQuery" name="Priority Value">
      <input type="submit" name="priButton" value="Priority Value"></button>
    </div>
  </form>
</div>
</div>
</body>
</html>
