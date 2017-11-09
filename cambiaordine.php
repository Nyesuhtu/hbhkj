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
<center>
<div>
<br>
<button class="button button4" onclick="javascript:location.href='./index.html'"> Home Page </button>
<br><br>
<hr align=”left” size=”1? width=”300? color=”#000000”>
</div>
</center>

<?php

if(!empty($_GET['del'])){
	//annulla l'ordine dalla pagina cambiaordine.php
	$ordine=$_GET['del'];
	$q = "UPDATE $table1 SET tavolo=0 WHERE id_ordine=$ordine";
	$qu = $cn->query($q);
	$q = "UPDATE $table1 SET numero=0 WHERE id_ordine=$ordine";
	$qu = $cn->query($q);
	$q = "UPDATE $table1 SET id_alimneto=0 WHERE id_ordine=$ordine";
	$qu = $cn->query($q);
	$q = 'UPDATE $table1 SET commento="annullato" WHERE id_ordine=$ordine';
	$qu = $cn->query($q);
	echo "Elemento cancellato<hr>";
}

//$tav=$_POST['tavolo'];
$tav=$_GET['tavolo'];
echo "<table>";
for($i=1;$i<=$lun_ordini;$i++){
	$q = "SELECT $table2.prezzo,$table2.nome,$table2.reparto,$table1.tavolo,$table1.pronto,$table1.numero,$table1.commenti,$table1.id_alimento,$table1.id_ordine FROM $table2,$table1 WHERE $table1.id_ordine=$i AND $table1.tavolo=$tav AND $table1.aperto=1 AND $table1.id_alimento=$table2.id_alimento";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($aaa['pronto']==0 && $aaa['tavolo']==$tav){
		echo "<tr><td>";
		echo "".$aaa['nome']."  ";
		echo " x".$aaa['numero']."   ";
		echo " -".$aaa['commenti']."</td><td>";
		//utilizzo $temp come stringa in cui metto tutto ci� che va a creare il tag html del pulsante
		$temp = "./cambiaordine.php?tavolo=".$tav."&del=".$aaa['id_ordine'];
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button' onclick='".$temp."'> Elimina </button></td></tr>";
	}
	
}
echo "</table>";

echo "<form action='./cordine.php?t=$tav' method='post'><br>";
//casella di testo per inserire il numero del tavolo
echo "<b>Tavolo   </b>".$tav."<br><table>";
$q = "SELECT count(*) as totale FROM $table2";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();
$tot=$aaa['totale'];

for($i=1;$i<=4;$i++){ //$i<=4 perch� sono 4 reparti
	echo "<tr><td><br><br><b>Reparto </b>".$i."</td></tr>";
	for($a=1;$a<=$tot;$a++){
		$q = "SELECT * FROM $table2 WHERE id_alimento=".$a;
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		if($aaa['reparto']==$i){
			echo "<tr><td>".$aaa['nome']."</td><td>
			<input type='button' value='-' onclick=".'"dim'.$a.'()"/>'."
			<input type='text' name=".$a." id='".$a."' value='0'>
			<input type='button' value='+' onclick=".'"aum'.$a.'()"/>';
			// script per i tasti + e - che modificano il valore della casella di testo
			echo "<script> function aum".$a."(){ 
				var i = document.getElementById(".$a.").value; 
				document.getElementById(".$a.").value=parseInt(i)+1;
				} function dim".$a."(){ 
				var i = document.getElementById(".$a.").value; 
				if(parseInt(i)>0){
				document.getElementById(".$a.").value=parseInt(i)-1;
				} }</script>";
			// campo per inserire i commenti
			echo "</td><td><p id='p2'>commenti: </p></td><td><textarea name='c".$a."' rows=2 cols=40></textarea></td></tr>";
		}
	}
}
echo "</table><br><br><center><button class='button' type='submit' value='Submit' > Invia </button></form><br><br>";
?>
<hr align=”left” size=”1? width=”300? color=”#000000”>
<br>
</body>
</html>