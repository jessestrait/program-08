<?php
 session_start();
 header('Content-Type: text/html; charset=iso-8859-1');
 include 'header.php';
 include 'menu.php';
 function displayFilters() {
  	foreach (filter_list() as $id =>$filter) {
      echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
   }
  }
 ?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/program-08.css">
		<title>
			ITSE 2302 Program-08: Jesse Strait
		</title>
	</head>


<body>
	<h2>#3. Top 5 foods by region</h2>
<?php
$_SESSION["city"] = "Austin";
$_SESSION["state"] = "Texas";
$regionFood = array
  (
  array("<strong>North</strong>","chop suey","baked beans","fried cheese","pepperoni balls","pork rolls"),
  array("<strong>South</strong>","biscuits and gravy","cheese straws","eggs sardou","BBQ","hamdog"),
  array("<strong>East</strong>","chili","city chicken","eggs benedict","garbage plate","goetta"),
  array("<strong>West</strong>","goulash","cheese soup","chili burger","cowboy beans","frito pie")
  );

for ($row = 0; $row < 4; $row++) {
  //echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 6; $col++) {
    echo "<li>".$regionFood[$row][$col]."</li>";
  }
  echo "</ul>";
}


?>
	<hr>
	<h2>#4. Austin Streets from 2 files</h2>
<?php
$file = fopen("./files/streetsAustin.txt","r");
$file2 = fopen("./files/streetsDesc.txt","r");
//echo readfile( "./files/streetsAustin.txt" );
echo "<ol type='a'>";
while(! feof($file))
  {
  echo "<li>";
  echo "<q>";
  echo fgets($file). " -";
  echo fgets($file2). "</q><br />";
  echo "</li>";
  }
echo "<ol>";
fclose($file);
?>
<hr>
<h2>#5. Submit form to file</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<p>Enter the names of 4 Austin landmarks</p>
    <input name="field1" type="text" /><br>
    <input name="field2" type="text" /><br>
    <input name="field3" type="text" /><br>
    <input name="field4" type="text" /><br>
    <input name="field5" type="text" /><br>
    <input type="submit" name="submit" value="Save Data">
</form>
<?php
if(isset($_POST['field1']) && isset($_POST['field2']) && isset($_POST['field3']) && isset($_POST['field4']) && isset($_POST['field5'])) {
    $data = $_POST['field1'] . '-' . $_POST['field2'] .'-' . $_POST['field3'] . '-' . $_POST['field4'] .'-' . $_POST['field5'] ."\r\n";
    $ret = file_put_contents('./files/mydata.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}

?>
<hr>
<h2>#6. Upload text file</h2>
<form action="uploader.php" method="post" enctype="multipart/form-data">
    Select text file upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload textfile" name="submit">
</form>
<hr>
<h2>#7. Cookie Info...</h2>
<?php
$cookie_name = "user";
$cookie_value = "Jesse Strait";
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
?>


<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
<hr>
<h2>#8. Display Session Variables, hit button!</h2>
<form action="session_display.php" method="post" enctype="multipart/form-data">
    <input type="submit" value="Activate" name="submit">
</form>
<hr>
<h2>#9. PHP filters on Display</h2>
<table align="center">
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
  <?php
  
  displayFilters();
  
  ?>
</table>
<hr>
<h2>#10. Sanitize email and URL using PHP filters</h2>
<form action="sanitize.php" method="post">
	
  	Enter an email address:
  	<input type="email" name="email" placeholder="name@name.com" required>
  	<br>
  	Enter a URL:
  	<input type="text" name="urlSite">
  	<br>
	<input type="submit" name="submit">
  	<br>
</form>
<hr>
<h2>#11. Enter a file name, and see its contents!</h2>
<p>Try mydata.txt...</p>
<form action="fileDisplay.php" method="post">
	Enter a file name:
  	<input type="text" name="fileName">
  	<br>
  	<input type="submit" name="submit">
  	<br>
</form>

<hr>
<h2>#12. Enter a Number between 33 and 77</h2>
<p></p>
<form action="rangeCheck.php" method="post">
	Enter a number:
  	<input type="number" name="numberInt">
  	<br>
  	<input type="submit" name="submit">
  	<br>
</form>

</body>
</html>

<?php
include 'footer.php';

//sleep(1);

 ?>