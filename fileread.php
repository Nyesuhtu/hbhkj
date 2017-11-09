<!DOCTYPE html>
<head>
<title>gestione</title>
<?php
include 'connect.php';
?>
</head>
<body>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home </button>
<hr>

<?php

//lo script l'ho preso da internet cambiando poche cose

$directory = "./files/";

echo "<table>";
if (is_dir($directory)) {
	if ($directory_handle = opendir($directory)) {
		while (($file = readdir($directory_handle)) !== false) {
			if((!is_dir($file))&($file!=".")&($file!="..")){
			//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
				echo "<tr><td>".$file . "</td><td>";
				$temp = "./download.php?ln=".$file;
				$temp = 'javascript:location.href="'.$temp.'"';
				echo "<button class='button button3' onclick='".$temp."'> download file </button></td><td>";
				$temp = "./download.php?de=".$file;
				$temp = 'javascript:location.href="'.$temp.'"';
				echo "<button class='button button3' onclick='".$temp."'> delete file </button></td></tr>";
			}
		}
		closedir($directory_handle);
	}
}
echo "</table>";

?>

</body>
</html>