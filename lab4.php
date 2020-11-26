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
		$connect = mysqli_connect("localhost", "root", "root", "planets")or die("Невозможно подключиться к серверу");
		mysqli_query($connect, "SET NAMES utf8");		
?>
					<h4>Планета</h4>
<table border="1"> <tr> 
<th> Название </th>   
<th> Созвездие  </th>
<th> Расстояние до Земли </th> 
  <th> Тип </th> 
<th> Диаметр </th> 
<th> </th>
<th> </th>
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, name, cons, distance, type, diameter  FROM planet");
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['cons'] . "</td>";
echo "<td>" . $row['distance'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['diameter'] . "</td>";
echo "<td><a href='lab4-3.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='lab4-5.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество планет: $num_rows </p>");
?>		
<p> <a href="lab4-1.php">Добавить планету</a>

						<h4>Исследовательские центры</h4>		 
<table border="1"> <tr> 
<th> Название </th>   
<th> Страна  </th>
<th> Адрес </th> 
<th> Кол-во сотрудников </th> 
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, nazvanie, counrty, address, numemployees  FROM center");
while($row=mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['nazvanie'] . "</td>";
echo "<td>" . $row['counrty'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['numemployees'] . "</td>";
echo "<td><a href='redactc.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='delete.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows1 = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество центров: $num_rows1 </p>");
?>		
<p> <a href="newcen.php">Добавить центр</a>

						<h4>Исследовательская программа</h4>		 
<table border="1"> <tr> 
<th> Название </th>   
<th> Дата начала  </th>
<th> Дата окончания  </th>
<th> ФИО руководителя проекта  </th>
<th> Бюджет  </th>
<th> Планета  </th>
<th> Исследовательский центр  </th>
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, pnaz, daten, dateo, fio, cost, 	nazplan, nazcen  FROM prog");
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['pnaz'] . "</td>";
echo "<td>" . date_format(date_create_from_format('Y-m-d', $row['daten']),'d.m.Y') . "</td>";
echo "<td>" . date_format(date_create_from_format('Y-m-d', $row['dateo']),'d.m.Y') . "</td>";
echo "<td>" . $row['fio'] . "</td>";
echo "<td>" . $row['cost'] . "</td>";
echo "<td>" . $row['nazplan'] . "</td>";
echo "<td>" . $row['nazcen'] . "</td>";
echo "<td><a href='redprog.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='deleteprog.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows1 = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество программ: $num_rows1 </p>");
?>		
<p> <a href="newprog.php">Добавить программу</a>
<p> <a href="gen_pdf.php">PDF</a>
<p> <a href="gen_xls.php">Excel</a>
		 
	<p><a href="index.php" class="link">назад </a></p>	
</div>
	</body>
</html>