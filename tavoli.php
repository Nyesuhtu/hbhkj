<!DOCTYPE html>
<head>
<title>gestione</title>
<link href="testo/bott1.css" rel="styleSheet" type="text/CSS" media="screen"/>
<?php
include 'connect.php';
?>

<META HTTP-EQUIV="Refresh" CONTENT="5"; url="./tavoli.php�>
</head>
<body>
<div class="abcd">
<div style="height:200px; padding:5px">
<div>
<br>
<center>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home Page </button>
</center>
<br>
</div>
<hr align=�left� size=�1? width=�300? color=�#000000�>
<br>
Ordini tavoli
<br><br>

<?php

if(!empty($_GET['ordine'])){
	//aggiorno il database ricevendo dalla pagina stessa il numero di ordine e l'alimento
	$a=$_GET['ordine'];
	$b=$_GET['alimento'];
	$q = "UPDATE $table1 SET pronto=1 WHERE id_ordine=$a AND id_alimento=$b;";
	$qu = $cn->query($q);
}

echo "<table>";
for($a=1;$a<=$ntavoli;$a++){
	$q = "SELECT count(pronto) as aaa FROM $table1 WHERE aperto=1 AND tavolo=$a AND pronto=0 ";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['aaa']>0){
		echo "<tr><td><br><br><a name='tav".$a."'>tavolo</a>:".$a."  </td></tr>";
		for($i=1;$i<=$lun_ordini;$i++){
			$q = "SELECT $table2.prezzo,$table2.reparto,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
			$qu = $cn->query($q);
			$aaa = $qu->fetch_assoc();
			if($aaa['pronto']==0 && $aaa['tavolo']==$a && $aaa['id_ordine']==$i){
				echo "<tr><td>";
				echo "reparto ".$aaa['reparto']." - ".$aaa['nome']."  ";
				echo " x".$aaa['numero']."   ";
				echo " ".$aaa['commenti']."</td><td>";
				//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
				$temp = "./tavoli.php?ordine=".$aaa['id_ordine']."&alimento=".$aaa['id_alimento'];
				$temp = 'javascript:location.href="'.$temp.'"';
				echo "<button class='button button3' onclick='".$temp."'> pronto </button></td></tr>";
			}
		}
	}
}
echo "</table>";
?>

<script type="text/javascript">
<!�
setTimeout('location.href="./tavoli.php"',1000);
�>
</script>
</body>
</html>
