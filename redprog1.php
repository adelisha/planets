﻿<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
	</head>
	<body>
		<div> 
		<h4>Хайруллина А.Р.</h4>
		<h1>Лабораторная работа №4 и №5</h1>
<h4>Вариант 12</h4>
		<?php
$connect = mysqli_connect("localhost", "root", "root", "planets" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
	$get_fio = $_GET['name'];
	$name = substr($_GET['name'], 0, (strlen($_GET['name'])-1));
	$num = substr($_GET['name'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;

$get_fio1 = $_GET['nazvanie'];
	$name1 = substr($_GET['nazvanie'], 0, (strlen($_GET['nazvanie'])-1));
	$num1 = substr($_GET['nazvanie'], -1, 1);
	$v1 = "num_resn". $num1;
	$hid1 = "" . $_GET[$v1];
$str1 = (int)$hid1;

$zapros1="UPDATE prog SET pnaz='".$_GET['pnaz']."', daten='".$_GET['daten']."', dateo='".$_GET['dateo']."', daten='".$_GET['daten'].
"', fio='".$_GET['fio']."', cost='".$_GET['cost']."', idplan='" .$str ."', nazplan='" .$name.
"', idcen='" .$str1 ."', nazcen='" .$name1."' where id='".$_GET['id']."'";
mysqli_query($connect, $zapros1);
if (mysqli_affected_rows($connect)>0) {
echo 'Все сохранено. <a href="lab4.php"> <br>Вернуться к списку</a>'; }
else { echo 'Ошибка сохранения.'.mysqli_error($connect).' <a href="lab4.php"><br> Вернуться к списку</a> '; }
?> 
		
</div>
	</body>
</html