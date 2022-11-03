<?php
$conexao ="";
$host = "localhost";
$user = "root";
$password = "";
$database = "bdturma90";


function connectDB() {
$GLOBALS['conexao'] = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'],
$GLOBALS['database']);
}

$conexaobd = connectDB();
print_r($conexao);
echo "<br>";

?>