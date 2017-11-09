<?php
$control2=true;
$a1 = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$a2 = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$a3 = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$a4 = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$a5 = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"WebOS");
if($a1||$a2||$a3||$a4||$a5){
	$control2 = false;
	}
?>