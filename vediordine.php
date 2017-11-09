<!DOCTYPE html>
<head>
<title>gestione</title><link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<link rel="stylesheet" type="text/css" href="stile.css" >
<?php
include 'connect.php';
?>
<META HTTP-EQUIV="Refresh" CONTENT="5"; url="./vedioridne.php�> 
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home </button>
<br>
<hr>
</div>

<?php
for($i=1;$i<=$lun_ordini;$i++){
		$q = "SELECT * FROM $table1,$table2 WHERE $table1.id_ordine=$i AND $table2.id_alimento=$table1.id_alimento";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		if($aaa['tavolo']!=0){
			$stringa = $aaa['nome']." x". $aaa['numero']; // stampa una tabella con nome degli alimenti ordinati e numero
			echo $stringa."<br>";
		}
}
echo "<hr>";

	$totale = 0.0;

	//conto tavolo per tavolo
	for($a=1;$a<=$ntavoli;$a++){  //uso $a nel ciclo perch� $i la uso in un ciclo all'interno
		$q = "SELECT * FROM $table3 WHERE tavolo=$a";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		$totale += $aaa['totale'];
		echo "Tavolo ".$a."   - Euro ".($aaa['totale']/100)."<br>"; //tutti i prezzi sono moltiplicati per 100 nel database perch� mi da problemi con i decimali, ma vengono stampati aschermo divisi per 100
	}
	$q = "SELECT * FROM $table4";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($totale != $aaa['soldi']){
		$q = "UPDATE $table4 SET soldi=$totale"; //query di aggiornamento del database
		$qu = $cn->query($q);
	}
	echo "<hr>Totale Euro  ". ($totale/100) . " <hr>";  //totale serata

	$q = "SELECT count(*) as totale FROM $table2";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	$lunghezza = $aaa['totale']; //$lunghezza � il numero di righe della tabella "alimenti"
	$q = "SELECT count(*) as totale FROM $table1";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	$lun_ordini = $aaa['totale'];

	for($i=1;$i<=$lunghezza;$i++){   //roba venduta
		$q = "SELECT nome FROM $table2 WHERE id_alimento=$i";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		echo $aaa['nome']."   - venduti " ;
		$q = "SELECT sum(numero) as n FROM $table1 WHERE id_alimento=$i AND pronto=1 AND aperto=0";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		echo $aaa['n']."<br>";
	}
	
	//stampa a schermo data e ora
	$data=time();
	$data =date("d-m-Y H:i:s",$data);
	echo "<hr><br>data ";
	echo $data;
?>
<br>

<script type="text/javascript">
<!�
setTimeout('location.href="./vedioridne.php"',1000);
�>
</script>
</body>
</html>
