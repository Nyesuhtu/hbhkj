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
</div>
<hr><br>
<?php

//trova data e ora e li scrive nel file
$data=time();
$data =date("d-m-Y H-i-s",$data);
$data1="./files/".$data.".txt";
//header("Cache-Control: public");
//header("Content-Description: File Transfer");
//header("Content-Disposition: attachment: filename=$data1");
//header("Content-Type: applicatoin/txt");
//header("Content-Transfer-Encoding: binary");

$fp = fopen($data1,"w");  //scrittura file

	for($i=1;$i<=$lun_ordini;$i++){
		$q = "SELECT * FROM $table1,$table2 WHERE $table1.id_ordine=$i AND $table2.id_alimento=$table1.id_alimento";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		if($aaa['tavolo']!=0){
			$s = "ordine" .$aaa['id_ordine']." - ".$aaa['nome']." x". $aaa['numero'];
			echo $s."<br>";
			fputs($fp,$s);fwrite($fp,"\r\n");
		}
	}
	$totale = 0.0;
	echo "<hr>";

	fputs($fp,"\r\n ---------------------- \r\n");
	for($a=1;$a<=$ntavoli;$a++){  //conto tavolo per tavolo
		$q = "SELECT * FROM $table3 WHERE tavolo=$a";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		$totale += $aaa['totale'];
		$s ="tavolo ".$a."   -euro ".($aaa['totale']/100);
		echo $s."<br>";
		fputs($fp,$s);fwrite($fp,"\r\n");
	}
	$q = "SELECT * FROM $table4";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	if($totale != $aaa['soldi']){
		$q = "UPDATE $table4 SET soldi=$totale";
		$qu = $cn->query($q);
	}
	fputs($fp,"\r\n ---------------------- \r\n");
	echo "<hr>totale euro  ". ($totale/100) . " <hr>";  //totale serata
	fwrite($fp,"totale euro  ". ($totale/100));

	fputs($fp,"\r\n ---------------------- \r\n");
	$q = "SELECT count(*) as totale FROM $table2";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	$lun = $aaa['totale'];
	$q = "SELECT count(*) as totale FROM $table1";
	$qu = $cn->query($q);
	$aaa = $qu->fetch_assoc();
	$lun_ordini = $aaa['totale'];

	for($i=1;$i<=$lun;$i++){   //roba venduta
		$q = "SELECT nome FROM $table2 WHERE id_alimento=$i";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		echo $aaa['nome']."   - venduti " ;
		fputs($fp,$aaa['nome']."   - venduti ");
		$q = "SELECT sum(numero) as n FROM $table1 WHERE id_alimento=$i AND pronto=1 AND aperto=0";
		$qu = $cn->query($q);
		$aaa = $qu->fetch_assoc();
		echo $aaa['n']."<br>";
		fputs($fp,$aaa['n']);
		fwrite($fp,"\r\n");
	}
	fputs($fp,"\r\n ---------------------- \r\n data     ");
	fputs($fp,$data);
	fclose($fp);
	//fine scrittura file
	$fn = "./".$data.".txt";

for($i=0;$i<=$ntavoli;$i++){  //reset tavoli
	$q = "UPDATE $table3 SET totale=0.0 WHERE tavolo =$i";
	$qu = $cn->query($q);
	$q = "UPDATE $table3 SET occupato=0 WHERE tavolo =$i";
	$qu = $cn->query($q);
}

for($i=1;$i<=$lun_ordini+2;$i++){   //reset ordinazioni
	$q="DELETE FROM $table1 WHERE id_ordine=$i";
	$qu = $cn->query($q);
}

$q = "UPDATE $table4 SET soldi=0.0"; //reset totale
$qu = $cn->query($q);

echo "<hr>";
		$temp = "./download.php?ln=".$fn;
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> download file </button></td></tr>";
		$temp = "./download.php?de=".$fn;
		$temp = 'javascript:location.href="'.$temp.'"';
		echo "<button class='button button3' onclick='".$temp."'> delete file </button></td></tr>";

?>
<button class="button" onclick="javascript:location.href='./fileread.php'"> log file</button>
<br><br>
tavoli resettati ; ordinazioni cancellate ; file creato 
<hr>
</body>
</html>
