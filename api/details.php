<?php
session_start();
date_default_timezone_set('Asia/Taipei');
// print_r($_POST);
$dsn = "mysql:host=localhost;charset=utf8;dbname=api_homework";
$pdo = new PDO($dsn, 'root', 'root');
// $dsn = "mysql:host=localhost;charset=utf8;dbname=s1110222";
// $pdo = new PDO($dsn, 'root', 'root');


$sql = "select Id, Name, Address, Picture1, LowestPrice, CeilingPrice, Tel from hotel where Id = '{$_GET['id']}'";
$results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
