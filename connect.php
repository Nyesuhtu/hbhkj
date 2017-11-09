<?php

include 'mcontrol.php';

//foglio css
echo '<link rel="stylesheet" type="text/css" href="stile.css" >';

//connessione al database
$cn = new mysqli("127.0.0.1", "root", "","gestione2");
$table2 = "alimenti";
$table1 = "ordini";
$table3 = "tavoli";
$table4 = "guadagno";

//variabili globali 

//le variabli $q e $qu sono temporanee e servono a definire la query da inviare al database
//il pattern delle query � uguale in tutti i file
$q = "SELECT count(*) as totale FROM $table3";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();  //$aaa � l'array che viene ritornato dal database, c'� in tutti file con lo stesso significato
$ntavoli=$aaa['totale'];    //$ntavoli � il numero dei tavoli

$q = "SELECT count(*) as totale FROM $table1";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();
$lun_ordini = $aaa['totale']; //$lun_ordini � il numero di righe della tabella "ordini"

$q = "SELECT count(*) as totale FROM $table1 WHERE pronto = 0";
$qu = $cn->query($q);
$aaa = $qu->fetch_assoc();
$lun = $aaa['totale'];        //$lun � lo stesso di $lun_ordini dove il campo del database "pronto" � 0
?>