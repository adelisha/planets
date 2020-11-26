<!DOCTYPE html>
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
$zapros="UPDATE center SET nazvanie='".$_GET['nazvanie'].
"', counrty='".$_GET['counrty']."', address='"
.$_GET['address']."', numemployees='".$_GET['numemployees']."'WHERE id=".$_GET['id'];
mysqli_query($connect, $zapros);
if (mysqli_affected_rows($connect)>0) {
echo 'Все сохранено. <a href="lab4.php"> <br>Вернуться к списку</a>'; }
else { echo 'Ошибка сохранения. <a href="lab4.php"><br> Вернуться к списку</a> '; }
?> 
		
</div>
	</body>
</html