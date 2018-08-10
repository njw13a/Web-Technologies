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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
	$( function() {
		$( "ul.droptrue" ).sortable({
			connectWith: "ul"
		});

		$( "ul.dropfalse" ).sortable({
			connectWith: "ul",
			dropOnEmpty: false
		});

		$( "#sortable1, #sortable2" ).disableSelection();
	} );
	</script>
  <script>
  function btnFunction(){
    var array = [];
    var ul = document.getElementById("sortable1");
    var items = ul.getElementsByTagName("li");
    for (var i  = 0; i < items.length; ++i) {
      array.push(items[i].id);
    }
    console.log(array);
    document.getElementById("acuusername").value=getUsername();
    document.getElementById("first_date").value=getDate();
    document.getElementById("val0").value=items[0].id;
    document.getElementById("val1").value=items[1].id;
    document.getElementById("val2").value=items[2].id;
    document.getElementById("val3").value=items[3].id;
    document.getElementById("val4").value=items[4].id;
    document.getElementById("val5").value=items[5].id;
    document.getElementById("val6").value=items[6].id;
    document.getElementById("val7").value=items[7].id;
    document.getElementById("val8").value=items[8].id;
    document.getElementById("val9").value=items[9].id;
    document.getElementById("val10").value=items[10].id;
    document.getElementById("val11").value=items[11].id;
    document.getElementById("val12").value=items[12].id;
    document.getElementById("val13").value=items[13].id;
    document.getElementById("val14").value=items[14].id;
    document.getElementById("val15").value=items[15].id;
    document.getElementById("val16").value=items[16].id;
    document.getElementById("val17").value=items[17].id;
    form1.submit();
  }

  function getUsername() {
    var username = "<?php giveUsername() ?>";
    document.getElementById("username").innerHTML = username;
    console.log("getUsername ran: " + username);
    return username;
  }

  function getDate() {
    console.log("getDate ran: " + phpDate);
    var phpDate = "<?php giveDate() ?>";
    return phpDate;
  }
  </script>
  <?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    date_default_timezone_set("America/Chicago");

    $username = $_POST['acuusername'];
    $first_date = $_POST['first_date'];
    $second_date=date("M d Y h:i:sa");

    console_log("username from POST: " . $username);
    console_log("first_date from POST: " . $first_date);
    console_log("second_date from POST: " . $second_date);

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

    $servername="localhost";
    $dbname="survey";
    $dbUsername="bookorama";
    $dbPassword="bookorama123";

    try {

      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO r_values (username, start_time, second_time, first_value, second_value, third_value, fourth_value, fifth_value, sixth_value, seventh_value, eighth_value, ninth_value, tenth_value, eleventh_value, twelfth_value, thirteenth_value, fourteenth_value, fifteenth_value, sixteenth_value, seventeenth_value, eighteenth_value ) VALUES (:username, :first_date, :second_date, :first_value, :second_value, :third_value, :fourth_value, :fifth_value, :sixth_value, :seventh_value, :eighth_value, :ninth_value, :tenth_value, :eleventh_value, :twelfth_value, :thirteenth_value, :fourteenth_value, :fifteenth_value, :sixteenth_value, :seventeenth_value, :eighteenth_value )");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':first_date', $first_date);
      $stmt->bindParam(':second_date', $second_date);
      $stmt->bindParam(':first_value', $value0);
      $stmt->bindParam(':second_value', $value1);
      $stmt->bindParam(':third_value', $value2);
      $stmt->bindParam(':fourth_value', $value3);
      $stmt->bindParam(':fifth_value', $value4);
      $stmt->bindParam(':sixth_value', $value5);
      $stmt->bindParam(':seventh_value', $value6);
      $stmt->bindParam(':eighth_value', $value7);
      $stmt->bindParam(':ninth_value', $value8);
      $stmt->bindParam(':tenth_value', $value9);
      $stmt->bindParam(':eleventh_value', $value10);
      $stmt->bindParam(':twelfth_value', $value11);
      $stmt->bindParam(':thirteenth_value', $value12);
      $stmt->bindParam(':fourteenth_value', $value13);
      $stmt->bindParam(':fifteenth_value', $value14);
      $stmt->bindParam(':sixteenth_value', $value15);
      $stmt->bindParam(':seventeenth_value', $value16);
      $stmt->bindParam(':eighteenth_value', $value17);
      $stmt->execute();

      console_log("Data was entered successfully");

     }
    catch(PDOException $e)
    {
      console_log("Error: " . $e->getMessage());
    }

    $conn = null;

    function giveUsername() {
      echo $_POST['acuusername'];
    }

    function giveDate() {
      echo $_POST['first_date'];
    }
  ?>
</head>
<body onload="getUsername();">

  <h2 id="title" class="text-center">Instrumental Values</h2>

  <h6 id="username" class="username">Placeholder</h6>

  <div class="container">
  <div class="item">
  <ul id="sortable1" class="droptrue"></ul>

  <ul id="sortable2" class="droptrue">
    <li class="ui-state-default" id="Cheerfulness">Cheerfulness</li>
  	<li class="ui-state-default" id="Ambition">Ambition</li>
  	<li class="ui-state-default" id="Love">Love</li>
  	<li class="ui-state-default" id="Cleanliness">Cleanliness</li>
  	<li class="ui-state-default" id="Self-Control">Self-Control</li>
    <li class="ui-state-default" id="Capability">Capability</li>
    <li class="ui-state-default" id="Courage">Courage</li>
    <li class="ui-state-default" id="Politeness">Politeness</li>
    <li class="ui-state-default" id="Honesty">Honesty</li>
    <li class="ui-state-default" id="Imagination">Imagination</li>
    <li class="ui-state-default" id="Independence">Independence</li>
    <li class="ui-state-default" id="Intellect">Intellect</li>
    <li class="ui-state-default" id="Broad-Mindedness">Broad-Mindedness</li>
    <li class="ui-state-default" id="Logic">Logic</li>
    <li class="ui-state-default" id="Obedience">Obedience</li>
    <li class="ui-state-default" id="Helpfulness">Helpfulness</li>
    <li class="ui-state-default" id="Responsibility">Responsibility</li>
    <li class="ui-state-default" id="Forgiveness">Forgiveness</li>
  </ul></div>
  </div>

  <form id="form1" method="POST" action="page3.php">
  <input type="hidden" id="acuusername" name="acuusername" value="">
  <input type="hidden" id="first_date" name="first_date" value="">
  <input type="hidden" id="val0" name="val0" value="">
  <input type="hidden" id="val1" name="val1" value="">
  <input type="hidden" id="val2" name="val2" value="">
  <input type="hidden" id="val3" name="val3" value="">
  <input type="hidden" id="val4" name="val4" value="">
  <input type="hidden" id="val5" name="val5" value="">
  <input type="hidden" id="val6" name="val6" value="">
  <input type="hidden" id="val7" name="val7" value="">
  <input type="hidden" id="val8" name="val8" value="">
  <input type="hidden" id="val9" name="val9" value="">
  <input type="hidden" id="val10" name="val10" value="">
  <input type="hidden" id="val11" name="val11" value="">
  <input type="hidden" id="val12" name="val12" value="">
  <input type="hidden" id="val13" name="val13" value="">
  <input type="hidden" id="val14" name="val14" value="">
  <input type="hidden" id="val15" name="val15" value="">
  <input type="hidden" id="val16" name="val16" value="">
  <input type="hidden" id="val17" name="val17" value="">

  <br style="clear:both">

  <div class = "button" ><button onclick="btnFunction()">Continue</button></div>
</body>
</html>
