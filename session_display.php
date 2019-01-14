<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Session City Variable is  " . $_SESSION["city"] . ".<br>";
echo "Session State Variable is  " . $_SESSION["state"] . ".";
echo '<h3><a href="index.php">BACK TO INDEX</a></h3>';
?>

</body>
</html>