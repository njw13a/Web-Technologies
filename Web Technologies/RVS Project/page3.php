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
  <style>
  #title {
    margin-top: 25px;
    margin-bottom: 25px;
    vertical-align: baseline;
  }
  .username {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .container {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #sortable1:empty:before, #sortable:empty:before {
    content: "\200b";
  }
  #sortable1, #sortable2 {
    list-style-type: none;
    margin: 0; float: left; margin-right: 10px; margin-left: 10px;
    background: #eee;
    padding: 5px; width: 200px;
  }
  #sortable1 li:empty:before, #sortable li:empty:before {
    content: "\200b";
  }
  #sortable1 li, #sortable2 li {
    display: table;
    text-align: center;
    list-style-position: inside;
    border: 1px solid black;
    margin: 5px;
    padding: 5px;
    font-size: 1em;
    width: 180px; }
  .button {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>
  <?php

  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  date_default_timezone_set("America/Chicago");

  $third_date=date("M d Y h:i:sa");

  $username = $_POST["acuusername"];
  $first_date = $_POST["first_date"];

  console_log($username);
  console_log($first_date);

  $value0 = $_POST["val0"];
  $value1 = $_POST["val1"];
  $value2 = $_POST["val2"];
  $value3 = $_POST["val3"];
  $value4 = $_POST["val4"];
  $value5 = $_POST["val5"];
  $value6 = $_POST["val6"];
  $value7 = $_POST["val7"];
  $value8 = $_POST["val8"];
  $value9 = $_POST["val9"];
  $value10 = $_POST["val10"];
  $value11 = $_POST["val11"];
  $value12 = $_POST["val12"];
  $value13 = $_POST["val13"];
  $value14 = $_POST["val14"];
  $value15 = $_POST["val15"];
  $value16 = $_POST["val16"];
  $value17 = $_POST["val17"];

  $a = array();

  $servername="localhost";
  $dbname="survey";
  $dbUsername="bookorama";
  $dbPassword="bookorama123";

  try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE r_values SET third_time='" . $third_date . "', nineteenth_value='" . $value0 . "', twentieth_value='" . $value1 . "', twenty_first_value='" . $value2 . "', twenty_second_value='" . $value3 . "', twenty_third_value='" . $value4 . "', twenty_fourth_value='" . $value5 . "', twenty_fifth_value='" . $value6 . "', twenty_sixth_value='" . $value7 . "', twenty_seventh_value='" . $value8 . "', twenty_eighth_value='" . $value9 . "', twenty_ninth_value='" . $value10 . "', thirtieth_value='" . $value11 . "', thirty_first_value='" . $value12 . "', thirty_second_value='" . $value13 . "', thirty_third_value='" . $value14 . "', thirty_fourth_value='" . $value15 . "', thirty_fifth_value='" . $value16 . "', thirty_sixth_value='" . $value17 . "' WHERE username='" . $username . "' AND start_time='" . $first_date . "'");
    $stmt->execute();

    console_log("Data was entered successfully");

   }
  catch(PDOException $e)
  {
    console_log("Error: " . $e->getMessage());
  }
  ?>
  <script>
    function setList() {
      var items = <?php
      $servername="localhost";
      $dbname="survey";
      $dbUsername="bookorama";
      $dbPassword="bookorama123";

      $a = array();

      try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM r_values WHERE start_time=?");
        if ($stmt->execute(array($_POST['first_date']))) {
          while ($row = $stmt->fetch()) {
            array_push($a, $row);
          }
        }

        echo json_encode($a[0]);
       }
      catch(PDOException $e)
      {
        //echo json_encode($a);
      }
      //echo json_encode($a);
      ?>;
      console.log(items);
      document.getElementById("terminal1").innerHTML=items[4];
      document.getElementById("terminal2").innerHTML=items[5];
      document.getElementById("terminal3").innerHTML=items[6];
      document.getElementById("terminal4").innerHTML=items[7];
      document.getElementById("terminal5").innerHTML=items[8];
      document.getElementById("terminal6").innerHTML=items[9];
      document.getElementById("terminal7").innerHTML=items[10];
      document.getElementById("terminal8").innerHTML=items[11];
      document.getElementById("terminal9").innerHTML=items[12];
      document.getElementById("terminal10").innerHTML=items[13];
      document.getElementById("terminal11").innerHTML=items[14];
      document.getElementById("terminal12").innerHTML=items[15];
      document.getElementById("terminal13").innerHTML=items[16];
      document.getElementById("terminal14").innerHTML=items[17];
      document.getElementById("terminal15").innerHTML=items[18];
      document.getElementById("terminal16").innerHTML=items[19];
      document.getElementById("terminal17").innerHTML=items[20];
      document.getElementById("terminal18").innerHTML=items[21];

      document.getElementById("instrumental1").innerHTML=items[22];
      document.getElementById("instrumental2").innerHTML=items[23];
      document.getElementById("instrumental3").innerHTML=items[24];
      document.getElementById("instrumental4").innerHTML=items[25];
      document.getElementById("instrumental5").innerHTML=items[26];
      document.getElementById("instrumental6").innerHTML=items[27];
      document.getElementById("instrumental7").innerHTML=items[28];
      document.getElementById("instrumental8").innerHTML=items[29];
      document.getElementById("instrumental9").innerHTML=items[30];
      document.getElementById("instrumental10").innerHTML=items[31];
      document.getElementById("instrumental11").innerHTML=items[32];
      document.getElementById("instrumental12").innerHTML=items[33];
      document.getElementById("instrumental13").innerHTML=items[34];
      document.getElementById("instrumental14").innerHTML=items[35];
      document.getElementById("instrumental15").innerHTML=items[36];
      document.getElementById("instrumental16").innerHTML=items[37];
      document.getElementById("instrumental17").innerHTML=items[38];
      document.getElementById("instrumental18").innerHTML=items[39];
    }
  </script>
</head>
<body onload="setList()">
  <div class="container">
  <div class="item">
  <ul id="sortable1">
    <li class="ui-state-default" id="terminal1"</li>
  	<li class="ui-state-default" id="terminal2"</li>
  	<li class="ui-state-default" id="terminal3"</li>
  	<li class="ui-state-default" id="terminal4"</li>
  	<li class="ui-state-default" id="terminal5"</li>
    <li class="ui-state-default" id="terminal6"</li>
    <li class="ui-state-default" id="terminal7"</li>
    <li class="ui-state-default" id="terminal8"</li>
    <li class="ui-state-default" id="terminal9"</li>
    <li class="ui-state-default" id="terminal10"</li>
    <li class="ui-state-default" id="terminal11"</li>
    <li class="ui-state-default" id="terminal12"</li>
    <li class="ui-state-default" id="terminal13"</li>
    <li class="ui-state-default" id="terminal14"</li>
    <li class="ui-state-default" id="terminal15"</li>
    <li class="ui-state-default" id="terminal16"</li>
    <li class="ui-state-default" id="terminal17"</li>
    <li class="ui-state-default" id="terminal18"</li>
  </ul>

  <ul id="sortable2">
    <li class="ui-state-default" id="instrumental1"</li>
  	<li class="ui-state-default" id="instrumental2"</li>
  	<li class="ui-state-default" id="instrumental3"</li>
  	<li class="ui-state-default" id="instrumental4"</li>
  	<li class="ui-state-default" id="instrumental5"</li>
    <li class="ui-state-default" id="instrumental6"</li>
    <li class="ui-state-default" id="instrumental8"</li>
    <li class="ui-state-default" id="instrumental9"</li>
    <li class="ui-state-default" id="instrumental7"</li>
    <li class="ui-state-default" id="instrumental10"</li>
    <li class="ui-state-default" id="instrumental11"</li>
    <li class="ui-state-default" id="instrumental12"</li>
    <li class="ui-state-default" id="instrumental13"</li>
    <li class="ui-state-default" id="instrumental14"</li>
    <li class="ui-state-default" id="instrumental15"</li>
    <li class="ui-state-default" id="instrumental16"</li>
    <li class="ui-state-default" id="instrumental17"</li>
    <li class="ui-state-default" id="instrumental18"</li>
  </ul></div>
  </div>
</body>
</html>
