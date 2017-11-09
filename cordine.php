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
<button class="button button4" onclick="javascript:location.href='./index.html'"> home </button>
</div>

<?php

if(!empty($_POST['tavolo'])){
$tavolo = intval($_POST['tavolo']);
}else if(!empty($_GET['t'])){
$tavolo = intval($_GET['t']);
}

$q = "SELECT count(*) as totale FROM $table2";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();
$lun = $aaa['totale'];

for($a=1;$a<=$lun;$a++){
	$b = "c".$a; //$b � una stringa che da il nome della variabile in cui c'� il commento
	$numero = (int)($_POST[$a]);
	$commento = $_POST[$b];
	if($numero != 0){
		$q = "SELECT prezzo FROM $table2 WHERE id_alimento=$a ";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		$prz = (float)$aaa['prezzo'];
		$prezzo=$prz*$numero*100;
		$lun_ordini++;
		$q = "INSERT INTO `gestione2`.`ordini` (`id_ordine`, `tavolo`, `pronto`,`aperto`,`id_alimento`, `numero`, `commenti`, `money`) VALUES ('$lun_ordini', '$tavolo', '0', '1', '$a', '$numero', '$commento', '$prezzo')";
		$qu = $cn->query($q);
		$q = "UPDATE $table3 SET occupato=1 WHERE tavolo=$tavolo";
	$qu = $cn->query($q);
		$q = "SELECT count(*) as totale FROM $table1";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		$lun_ordini = $aaa['totale'];
		}
	}
?>

<p id='p2'>inserito :</p>
<?php 

echo "tavolo: ".$tavolo."<br>";

for($i=0;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table1.pronto,$table1.aperto,$table1.tavolo,$table1.numero,$table1.commenti,$table1.money,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['tavolo']==$tavolo && $aaa['id_ordine']=$i && $aaa['pronto']==0){
		echo " - ordine:".$i."  ";
		echo " - ".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " ".$aaa['commenti']."  ";
		echo " - ".($aaa['money']/100)."  euro <br>";
	}
}

//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
echo "<br><br><hr>";
$temp = "./annullaordine.php?l=".$lun_ordini."&t=".$tavolo;
$temp = 'javascript:location.href="'.$temp.'"';
echo "<button class='button button3' onclick='".$temp."'> annulla </button>";
?>
<button class="button button4" onclick="javascript:location.href='./index.php'"> home </button>
<button class="button button4" onclick="javascript:location.href='./ordini.php'"> ordini </button>

</body>
</html>