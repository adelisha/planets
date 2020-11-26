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
// Подключение к базе данных:
$connect = mysqli_connect("localhost", "root", "root", "planets" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO center SET nazvanie='".$_GET['nazvanie'].
"', counrty='".$_GET['counrty']."', address='"
.$_GET['address']."', numemployees='".$_GET['numemployees']."'";
mysqli_query($connect, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($connect)>0) // если нет ошибок при выполнении запроса
{ print "<p>Спасибо, вы внесли исследовательский центр в БД";
print "<p><a href=\"lab4.php\"> Вернуться к таблицам</a>"; }
else { print "Ошибка сохранения. <a href=\"lab4.php\"> Вернуться к таблицам</a>"; }
?>	
</div>
	</body>
</html>