<?php

$file = "./files/".$_POST["fileName"];




if (file_exists($file)) {
	echo "FILE FOUND!!!<br>";
	echo "This is the contents of your file: <br>";
	echo readfile($file);
}else {
	echo "FILE NOT FOUND!!!<br>";
}
echo "<br>";
echo "<br>";
echo '<h3><a href="index.php">BACK TO INDEX</a></h3>';

?>
