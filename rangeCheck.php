<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/program-08.css">
	<title>Welcome to RANGE CHECK</title>
</head>
<body>


<?php
$int = $_POST["numberInt"];
$min = 33;
$max = 77;

if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Variable value is not within the legal range<br>");
} else {
    echo("Variable value is within the legal range<br>");
}



function checkNum($number,$min,$max) {
  if (filter_var($number, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    throw new Exception("Value must be between 33 and 77!!!!");
  }
  return true;
}

try {
  checkNum($int,$min,$max);
  echo 'Number IS in Range <br>';
  echo 'Your Number: ';
  echo $int;
  echo '<br>';
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
echo "<br>";
echo "<br>";
echo '<h3><a href="index.php">BACK TO INDEX</a></h3>';


?>


</body>
</html>