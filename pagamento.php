<!DOCTYPE html>
<head>
<title>gestione</title>
<?php
include 'connect.php';
?>
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home </button>
<button class="button button4" onclick="javascript:location.href='./cassa.php'"> cassa </button>
</div>

<?php

$tot=$_GET['tot']; // totale tavolo
$t=$_GET['t'];
$tot2=$_GET['tot2'];  //totale tavolo in tutta la serata (credo si possa togliere)

$q = "SELECT count(*) as totale FROM $table1 WHERE pronto = 1 AND aperto=1";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();
$lun = $aaa['totale'];

for($i=0;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table1.pronto,$table1.aperto,$table1.tavolo,$table1.numero,$table1.commenti,$table1.money,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['tavolo']==$t && $aaa['id_ordine']=$i && $aaa['pronto']==1 && $aaa['pronto']==1){
		echo " - ordine:".$i."  ";
		echo " - ".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " ".$aaa['commenti']."  ";
		echo " - ".($aaa['money']/100)."  euro <br>";
	}
}

$q = "UPDATE $table1 SET aperto=0 WHERE pronto=1 AND tavolo=$t";
$qu = $cn->query($q);
$tot2+=$tot;
$q = "UPDATE $table3 SET totale=$tot2 WHERE tavolo=$t";
$qu = $cn->query($q);
$q = "UPDATE $table3 SET occupato=0 WHERE tavolo=$t";
$qu = $cn->query($q);

echo "<br><br>pagato euro ".($tot/100);
//echo "<br> tot tavolo euro ".($tot2/100);
?>

</body>
</html>
