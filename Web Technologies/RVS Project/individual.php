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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['indButton']))
    {
      oneSearch();
    }
    else {
      header('Location: ' . "http://150.252.118.210", false, 302);
      exit;
    }

    function oneSearch() {
      try {

        //$term = echo 'document.getElementById("individualQuery").value;';

        $term = $_POST["Individual_Query"];

        console_log($term);

        $servername="localhost";
        $dbname="survey";
        $dbUsername="bookorama";
        $dbPassword="bookorama123";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT username, start_time FROM r_values WHERE first_value=:term or second_value=:term");
        $stmt->bindParam(':term', $term);
        $stmt->execute();

        $results = $stmt->fetchAll();
        for($x = 0; $x < count($results); $x++) {
          echo $results[$x][0] . ', ' . $results[$x][1];
          echo '<br>';
        }
        console_log(count($results));
      }
      catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
   ?>
</head>
<body>
</body>
</html>
