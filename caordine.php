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
<button class="button button4" onclick="javascript:location.href='./index.html'"> home </button>
</div>

<?php
//forse non c'era neance bisongo di usare il php qua ...
echo "<form action='./cambiaordine.php' method='post'><br>";
echo "tavolo    <input type='text' name='tavolo'><br><table>";
echo "</table><br><button class='button' type='submit' value='Submit' > cambia </button></fomr><hr><br>";
?>
</body>
</html>