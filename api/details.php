<?php
session_start();
date_default_timezone_set('Asia/Taipei');
// print_r($_POST);
$dsn = "mysql:host=localhost;charset=utf8;dbname=api_homework";
$pdo = new PDO($dsn, 'root', 'root');
// $dsn = "mysql:host=localhost;charset=utf8;dbname=s1110222";
// $pdo = new PDO($dsn, 'root', 'root');
$sql = "select Name, Picture1, Description, Spec, LowestPrice, CeilingPrice, Address, Tel, IndustryEmail, Serviceinfo, Parkinginfo, ParkingSpace, TotalNumberofRooms, TotalNumberofPeople from hotel where Id = '{$_POST['id']}'";
$details = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
print(json_encode($details));
