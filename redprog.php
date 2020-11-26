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
<H3>Редактирование программы:</H3>
		<?php
$connect = mysqli_connect("localhost", "root", "root", "planets" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$rows=mysqli_query($connect, "SELECT pnaz, daten, dateo, fio, cost, nazplan, nazcen FROM prog WHERE id=".$_GET['id']);
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
$pnaz = $st['pnaz'];
$daten = $st['daten'];
$dateo = $st['dateo'];
$fio = $st['fio'];
$cost = $st['cost'];
$nazplan = $st['nazplan'];
$nazcen = $st['nazcen'];
}
print "<form action='redprog1.php' method='get'>";
$rows1 = mysqli_query($connect, "SELECT id, name FROM planet ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $name[$i] = $st['name'];
            $id_zh[$i] = $st['id'];
            $i++;
        }
$rows2 = mysqli_query($connect, "SELECT id, nazvanie FROM center ORDER BY id");
$j=0;
        while ($st1 = mysqli_fetch_array($rows2)) {
            $nazvanie[$j] = $st1['nazvanie'];
            $id_zh1[$j] = $st1['id'];
            $j++;
        }
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<br>Название: <input name='pnaz' size='20' type='varchar'value='".$pnaz."'><br>";
print "<br>Дата начала: <input name='daten' size='20' type='date'value='".$daten."'><br>";
print "<br>Дата окончания: <input name='dateo' size='20' type='date'value='".$dateo."'><br>";
print "<br>ФИО руководителя проекта: <input name='fio' size='50' type='varchar'value='".$fio."'><br>";
print "<br>Бюджет: <input name='cost' size='20' type='varchar'value='".$cost."'><br>";

?>
Планета:
<select name='name'>
        <?php
        for($i = 0; $name[$i] != null; $i++): ?>
            <option value="<?=$name[$i].$i?>"><?=$name[$i]?></option>
        <?php endfor;
        for($i = 0; $name[$i] != null; $i++){
$name = "num_res". $i;
$value = "" . $id_zh[$i];
print "<input type='hidden' name='".$name."' value='".$value."'>";
}
       ?>
<br>
Исследовательский центр:
<select name='nazvanie'>
        <?php
        for($j = 0; $nazvanie[$j] != null; $j++): ?>
            <option value="<?=$nazvanie[$j].$j?>"><?=$nazvanie[$j]?></option>
        <?php endfor;
        for($j = 0; $nazvanie[$j] != null; $j++){
$nazvanie = "num_resn". $j;
$value1 = "" . $id_zh1[$j];
print "<input type='hidden' name='".$nazvanie."' value='".$value1."'>";
}
        ?>
        </select><br>
<?php
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lab4.php\"> Вернуться к списку</a>";
?> 
		
</div>
	</body>
</html>