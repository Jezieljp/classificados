<?php
session_start();

global $pdo;
try{
$pdo = new PDO("mysql:dbname=classificados;host=localhost","root","");//chama no header a conecção com banco
} catch(PDOException $e) {
   echo "FALHOU: ".$e->getMessage();
   exit;
}

?>