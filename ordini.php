<!DOCTYPE html>
<head>
<title>gestione</title>
<link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<?php
include 'connect.php';
?>

<META HTTP-EQUIV="Refresh" CONTENT="1"; url="./ordini.php�>
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<center>
<br>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home Page </button>
</center>
</div>
<br>
<hr align=�left� size=�1? width=�300? color=�#000000�>
<br>
<b><center>Ordini tavoli</center></b>
<br><br>

<?php

echo '<br><table border=0px style="width:100%; text-align:center"> <tr>';
for($i=1;$i<=$ntavoli;$i++){
	echo "<td style=\"padding: 20px\"> Tavolo ".$i."<br><br>";
	$q = "SELECT * FROM $table3 WHERE tavolo=$i";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['occupato']==0){
		$temp = "'./cambiaordine.php?tavolo=".$i."'";
		echo '<button class="button button4" onclick="javascript:location.href='.$temp.'"> crea ordine </button>';
	}else if($aaa['occupato']==1){
		$temp = "'./cambiaordine.php?tavolo=".$i."'";
		echo '<button class="button button4" onclick="javascript:location.href='.$temp.'"> cambia,aggiungi </button>';
	}
	echo "</td>";
	if($i%5==0){
		echo "</tr><tr>";
	}
}
echo "</tr><table>";

?>
<script type="text/javascript">
<!�
setTimeout('location.href="./ordini.php"',1000);
�>
</script>
</body>
</html>
