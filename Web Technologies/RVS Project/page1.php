
<!doctype html>
<html lang="en">
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
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">-->
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

  function getDate() {
    var phpDate = "<?php echo date("M d Y h:i:sa"); ?>";
    document.getElementById("first_date").value=phpDate;
    return phpDate;
  }

  function getUsername() {
    var username = "<?php giveUsername() ?>";
    document.getElementById("username").innerHTML = username;
    return username;
  }
  </script>
  <?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    date_default_timezone_set("America/Chicago");

    // old variables for non-PDO database query
    /*$username=$_POST['inputUsername'];
    $firstName=$_POST['inputFirstName'];
    $lastName=$_POST['inputLastName'];
    $email=$_POST['inputEmail'];*/
    $date=date("M d Y h:i:sa");

    $servername="localhost";
    $dbname="survey";
    $dbUsername="bookorama";
    $dbPassword="bookorama123";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO users VALUES (:username, :firstname, :lastname, :email)");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':firstname', $firstName);
      $stmt->bindParam(':lastname', $lastName);
      $stmt->bindParam(':email', $email);

      // insert a rows
      $username = $_POST['inputUsername'];
      $firstName = $_POST['inputFirstName'];
      $lastName = $_POST['inputLastName'];
      $email = $_POST['inputEmail'];
      $stmt->execute();

      console_log("Data entered successfully");
    }
    catch(PDOException $e)
      {
        console_log("Error: " . $e->getMessage());
      }

    /*try {

      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO r_values (username, start_time) VALUES (:username, :first_date)");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':first_date', $date);

      $username = $_POST['inputUsername'];
      $stmt->execute();

      console_log("Data entered successfully");
    }
    catch(PDOException $e)
    {
      console_log("Error: " . $e->getMessage());
    }*/

    $conn = null;

    function giveDate() {
      echo $date;
    }

    function giveUsername() {
      echo $_POST['inputUsername'];
    }
   ?>
</head>
<body onload="getUsername();">

<h2 id="title" class="text-center">Terminal Values</h2>

<h6 id="username" class="username">Placeholder</h6>

<div class="container">
<div class="item">
<ul id="sortable1" class="droptrue"></ul>

<ul id="sortable2" class="droptrue">
  <li class="ui-state-default" id="True Friendship">True Friendship</li>
	<li class="ui-state-default" id="Mature Love">Mature Love</li>
	<li class="ui-state-default" id="Self-Respect">Self-Respect</li>
	<li class="ui-state-default" id="Happiness">Happiness</li>
	<li class="ui-state-default" id="Inner Harmony">Inner Harmony</li>
  <li class="ui-state-default" id="Equality">Equality</li>
  <li class="ui-state-default" id="Freedom">Freedom</li>
  <li class="ui-state-default" id="Pleasure">Pleasure</li>
  <li class="ui-state-default" id="Social Recognition">Social Recognition</li>
  <li class="ui-state-default" id="Wisdom">Wisdom</li>
  <li class="ui-state-default" id="Salvation">Salvation</li>
  <li class="ui-state-default" id="Family Security">Family Security</li>
  <li class="ui-state-default" id="National Security">National Security</li>
  <li class="ui-state-default" id="A Sense of Accomplishment">A Sense of Accomplishment</li>
  <li class="ui-state-default" id="A World of Beauty">A World of Beauty</li>
  <li class="ui-state-default" id="A World at Peace">A World at Peace</li>
  <li class="ui-state-default" id="A Comfortable Life">A Comfortable Life</li>
  <li class="ui-state-default" id="An Exciting Life">An Exciting Life</li>
</ul></div>
</div>

<form id="form1" method="POST" action="page2.php">
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

<div class="button" ><button onclick="btnFunction()">Continue</button></div>

</body>
</html>
