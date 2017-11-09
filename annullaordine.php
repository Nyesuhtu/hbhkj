<!DOCTYPE html>
<head>
<title>gestione</title>
<link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<?php
include 'connect.php';
?>
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home </button>
</div>

<?php

$l=$_GET['l'];
$t=$_GET['t'];

for($i=0;$i<=$l;$i++){
	$q = "DELETE FROM ordini WHERE id_ordine=$i AND tavolo=$t AND aperto=1";
	$qu = $cn->query($q);
}
?>

<p id='p2'>Ordine annullato </p>



</body>
</html>
