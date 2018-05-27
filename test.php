<!DOCTYPE html>
<html>
<head>
	<title>TEST FORM</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form action="insert.php" method="post">
	Dia: <select name="day">
		<option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="5">5</option>
  </select><br><br>
	Mes: <select name="month">
		<option value="Enero">Enero</option>
    <option value="Febrero">Febrero</option>
    <option value="Marzo">Marzo</option>
    <option value="Abril">Abril</option>
  </select><br><br>
	Descripcion: <input type="text" name="description" /><br><br>
	Fecha de Entrega: <select name="dueday">
		<option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="5">5</option>
  </select><br><br>
  Due Month: <select name="duemonth">
		<option value="Enero">Enero</option>
    <option value="Febrero">Febrero</option>
    <option value="Marzo">Marzo</option>
    <option value="Abril">Abril</option>
  </select><br><br>

	<input type="submit" />
</form>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "school";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM homework WHERE display=''";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "DAY: " . $row["day"] . " - MONTH: " . $row["month"]. " - DESCRIPTION: " . $row["description"] . " - DUE DAY: " . $row["dueday"] . " - DUE MONTH: " . $row["duemonth"] . "

	        <form action='button.php' method='post'>
	<input type='text' class='hide' name='display' value='". $row["description"] . "' /> 
	<input type='submit' />
</form>


	        " . "<br>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
?>

</body>
</html>