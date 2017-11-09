<!DOCTYPE html>
<head>
<title>gestione</title>
<link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<?php
include 'connect.php';
?>
<META HTTP-EQUIV="Refresh" CONTENT="5"; url="./reparto.php�>
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
<b>Tutti gli ordini</b>
<br><br>

<?php

if(!empty($_GET['ordine'])){
	//aggiorno il database ricevendo dalla pagina stessa il numero di ordine e l'alimento
	$a=$_GET['ordine'];
	$b=$_GET['alimento'];
	$q = "UPDATE $table1 SET pronto=1 WHERE id_ordine=$a AND id_alimento=$b;";
	$qu = $cn->query($q);
}

echo "<table><tr><td>Reparto 1 </td></tr>";
for($i=1;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['pronto']==0 && $aaa['reparto']==1  && $aaa['tavolo']!=0){
		echo "<tr><td>";
		echo "tavolo:".$aaa['tavolo']."  -";
		echo "".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " -".$aaa['commenti']."</td><td>";
		//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
		$temp = "./reparto.php?ordine=".$aaa['id_ordine']."&alimento=".$aaa['id_alimento'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> pronto </button></td></tr>";
	}
	
}

echo "<table><tr><td>Reparto 2 </td></tr>";
for($i=1;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['pronto']==0 && $aaa['reparto']==2  && $aaa['tavolo']!=0){
		echo "<tr><td>";
		echo "tavolo:".$aaa['tavolo']."  -";
		echo "".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " -".$aaa['commenti']."</td><td>";
		$temp = "./reparto.php?ordine=".$aaa['id_ordine']."&alimento=".$aaa['id_alimento'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> pronto </button></td></tr>";
	}
	
}

echo "<table><tr><td>Reparto 3 </td></tr>";
for($i=1;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['pronto']==0 && $aaa['reparto']==3  && $aaa['tavolo']!=0){
		echo "<tr><td>";
		echo "tavolo:".$aaa['tavolo']."  -";
		echo "".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " -".$aaa['commenti']."</td><td>";
		$temp = "./reparto.php?ordine=".$aaa['id_ordine']."&alimento=".$aaa['id_alimento'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> pronto </button></td></tr>";
	}
	
}

echo "<table><tr><td>Reparto 4 </td></tr>";
for($i=1;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['pronto']==0 && $aaa['reparto']==4  && $aaa['tavolo']!=0){
		echo "<tr><td>";
		echo "tavolo:".$aaa['tavolo']."  -";
		echo "".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " -".$aaa['commenti']."</td><td>";
		$temp = "./reparto.php?ordine=".$aaa['id_ordine']."&alimento=".$aaa['id_alimento'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> pronto </button></td></tr>";
	}
	
}
echo "</table>";

?>

<script type="text/javascript">
<!�
setTimeout('location.href="./reparto.php"',1000);
�>
</script>
</body>
</html>
