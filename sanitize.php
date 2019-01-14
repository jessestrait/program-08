<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/program-08.css">
	<title>Welcome to Filter Sanitizer and Validator</title>
</head>
<body>

<?php
echo "<h1>Sanitizer and Validator</h1>";

$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}

echo "<br>";

$url = $_POST["urlSite"];

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo("$url is a valid URL");
} else {
    echo("$url is not a valid URL");
}


echo "<br>";

echo '<h3><a href="index.php">BACK TO INDEX</a></h3>';

?>
</body>
</html>