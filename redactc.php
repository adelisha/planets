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
<H3>Редактирование исследовательского центра:</H3>
		<?php
$connect = mysqli_connect("localhost", "root", "root", "planets" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$rows=mysqli_query($connect, "SELECT nazvanie, counrty , address, numemployees FROM center WHERE id=".$_GET['id']);
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
$name = $st['nazvanie'];
$cons = $st['counrty'];
$distance = $st['address'];
$type = $st['numemployees'];
}
print "<form action='redactc1.php' metod='get'>";
print "Название: <input name='nazvanie' size='20' type='varchar'value='".$name."'>";
print "<br>Страна: <input name='counrty' size='20' type='varchar'value='".$cons."'>";
print "<br>Адрес: <input name='address' size='20' type='varchar'value='".$distance."'>";
print "<br>Кол-во сотрудников: <input name='numemployees' size='10' type='varchar'value='".$type."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lab4.php\"> Вернуться к таблицам</a>";
?> 	
</div>
	</body>
</html>