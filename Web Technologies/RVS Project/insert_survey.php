<!DOCTYPE html>
<html>
<head>
	<title>RVS Project</title>
</head>
<body>
  <?php
    date_default_timezone_set("America/Chicago");

    $username=$_POST['inputUsername'];
    $firstName=$_POST['inputFirstName'];
    $lastName=$_POST['inputLastName'];
    $email=$_POST['inputEmail'];
    $date=date("h:i:sa");

    @ $conn = new mysqli("localhost", "bookorama", "bookorama123", "survey");

    if (mysqli_connect_errno())
    {
       echo 'Error: Could not connect to database.  Please try again later.';
       exit;
    }

    $query = "insert into users ( username, first_name, last_name, email, time) values
              ('$username', '$firstName', '$lastName', '$email', '$date')";

    $result = $conn->query($query);
    if ($result)
      echo $db->affected_rows.' user inserted into database.';

    $conn->close();
   ?>
</body>
</html>
