<?php

//l'ho preso dallo stesso posto da cui ho preso lo script di fileread.php ; le variabili che si passano le ho lasciate con i loro nomi

if(!empty($_GET['ln'])){
	$fn = $_GET['ln'];
	
	$fileName = basename($fn);
	$filePath = './files/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
		// Define headers
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$fileName");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");
	    
		// Read the file
		readfile($filePath);
		exit;
	}else{
	    echo 'The file does not exist.<br>';
		echo $filePath;
	}
}else if(!empty($_GET['de'])){
	$fn = $_GET['de'];
	
	$fileName = basename($fn);
	$filePath = './files/'.$fileName;
	if (!unlink($filePath)){
		echo 'file NON cancellato';
	}
}

?>

<script languaguage="javascript"> 
<!-- 
window.location = "./fileread.php";  
//--> 
</script>
