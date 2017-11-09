<!DOCTYPE html>
<head>
<title>gestione</title>
<link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<META HTTP-EQUIV="Refresh" CONTENT="5"; url="./cassa.php�>
<?php
include 'connect.php';
?>
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<center>
<br>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home Page </button>
<br><br>
<hr align=�left� size=�1? width=�300? color=�#000000�>
<br>
</center>
</div>
<br><br>
<?php

echo '<br><table style="width:100%; text-align:center"> <tr>';
for($i=1;$i<=$ntavoli;$i++){
	echo "<td style=\"padding: 20px\"><b> Tavolo </b><font color='#FF0000'>".$i."</font><br>";
	$q = "SELECT * FROM $table3 WHERE tavolo=$i";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['occupato']==0){
		$temp = "'./cambiaordine.php?tavolo=".$i."'";
		echo "<font size='5' color='#00FF00'><b>LIBERO</b></font><br><br>";
	}else if($aaa['occupato']==1){
		$temp = "'./cambiaordine.php?tavolo=".$i."'";
		$totale=0.0;
		for($a=1;$a<$lun_ordini+1;$a++){
			$q = "SELECT money FROM $table1 WHERE tavolo=$i AND aperto=1 AND id_ordine=$a";
			$qu = $cn->query($q);
			$bbb = $qu->fetch_assoc();
			$totale += $bbb['money'];
		}
		$q = "SELECT totale FROM $table3 WHERE tavolo=$i";
		$qu = $cn->query($q);
		$bbb = $qu->fetch_assoc();
		//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
		$temp = "./pagamento.php?tot=".$totale."&t=".$i."&tot2=".$bbb['totale'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo ($totale/100)." euro   <br><br>";
		echo "<button class='button button3' onclick='".$temp."'> paga </button>";
	}
	echo "</td>";
	if($i%5==0){
		echo "</tr><tr>";
	}
}
echo "</tr><table><hr align=�left� size=�1? width=�300? color=�#000000�><br>";

// al posto di $aaa ho usato due diversi array per raccolgiere i dati di risposta dal database perch� ho dovuto gestire due array contemporaneamente
for($i=1;$i<=$ntavoli;$i++){
	$q = "SELECT * FROM $table1 WHERE tavolo=$i ORDER BY id_ordine DESC";
	$qu = $cn->query($q);
	$ccc = $qu->fetch_assoc();
	$q = "SELECT count(aperto) as aaa FROM $table1 WHERE aperto=1 AND tavolo=$i AND pronto=1 ";
	$qu = $cn->query($q);
	$bbb = $qu->fetch_assoc();
	if($bbb['aaa']>0){
		echo "<table>";
		if($ccc['aperto']==1 && $ccc['pronto']==1 && $ccc['tavolo']!=0){
			$tavolo=$i;
			echo "<tr><td>Tavolo".$tavolo."    -";
			$totale=0.0;
			for($a=1;$a<$lun_ordini+1;$a++){
				$q = "SELECT money FROM $table1 WHERE tavolo=$i AND aperto=1 AND id_ordine=$a";
				$qu = $cn->query($q);
				$bbb = $qu->fetch_assoc();
				$totale += $bbb['money'];
			}
			$q = "SELECT totale FROM $table3 WHERE tavolo=$tavolo";
			$qu = $cn->query($q);
			$bbb = $qu->fetch_assoc();
			//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
			$temp = "./pagamento.php?tot=".$totale."&t=".$tavolo."&tot2=".$bbb['totale'];
			$temp = 'javascript:location.href="'.$temp.'"';
			echo ($totale/100)." euro   </td><td>";
			echo "<button class='button button3' onclick='".$temp."'> paga </button></td></tr>";
		}
		echo "</table><br>";
	}
}
?>

<script type="text/javascript">
<!�
setTimeout('location.href="./cassa.php"',1000);
�>
</script>
</body>
</html>
