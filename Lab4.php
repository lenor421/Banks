<!DOCTYPE html>
<html>
	<body>
		<h1> Лабораторная работа №4</h1>
		<h3>Шаяхметов Р.Д.</h3>
		<h3>Вариант 3</h3>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
?>
<h2>Банки:</h2>
<table border="1">
<tr> 
 <th> Инн </th> 
 <th> Наименование </th> 
 <th> Страна </th> 
 <th> Класс надежности </th> 
 <th> Объем активов </th></tr>
<?php
$result=mysqli_query ($connect, "SELECT id, INN, Naim, Country, RelClass, VolOfAsset FROM bank");
while ($row=mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . $row['INN'] . "</td>";
 echo "<td>" . $row['Naim'] . "</td>";
 echo "<td>" . $row['Country'] . "</td>";
 echo "<td>" . $row['RelClass'] . "</td>";
 echo "<td>" . $row['VolOfAsset'] . "</td>";
 echo "<td><a href='lab4-3.php?id=" . $row['id']
. "'>Редактировать</a></td>"; 
 echo "<td><a href='lab4-5.php?id=" . $row['id']
. "'>Удалить</a></td>"; 
echo "</tr>";}print "</table>";
$num_rows = mysqli_num_rows($result); 
print("<P>Всего банков: $num_rows </p>");
?>
<p> <a href="lab4-1.php"> Добавить банк </a>
<h2>Программы депозитов:</h2>
<table border="1">
<tr> 
 <th> Название </th> 
 <th> % годовых </th> 
 <th> id банка </th> </tr>
<?php
$result=mysqli_query ($connect, "SELECT id, Name, Proz, id_bank, Naz_banka FROM depositprograms");
while ($row=mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . $row['Name'] . "</td>";
 echo "<td>" . $row['Proz'] . "</td>";
 echo "<td>" . $row['Naz_banka'] . "</td>";
 echo "<td><a href='lab4-3.php?id=" . $row['id']
. "'>Редактировать</a></td>"; 
 echo "<td><a href='lab4-5.php?id=" . $row['id']
. "'>Удалить</a></td>"; 
echo "</tr>";}print "</table>";
$num_rows = mysqli_num_rows($result); 
print("<P>Всего программ: $num_rows </p>");
?>
<p> <a href="lab4-1.php"> Добавить программу </a>
	</body>
</html>