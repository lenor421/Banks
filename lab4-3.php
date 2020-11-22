<html>
<head
<title> Редактирование данных о банке</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 $rows=mysqli_query($connect, "SELECT INN, Naim, Country, RelClass, VolOfAsset FROM bank WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $INN = $st['INN'];
 $Naim = $st['Naim'];
 $Country = $st['Country'];
 $RelClass = $st['RelClass'];
 $VolOfAsset = $st['VolOfAsset'];
 }
print "<form action='lab4-4.php' metod='get'>";
print "Инн: <input name='INN' size='20' type='int'value='".$INN."'>";
print "<br>Наименование: <input name='Naim' size='20' type='varchar'value='".$Naim."'>";
print "<br>Страна: <input name='Country' size='20' type='varchar'value='".$Country."'>";
print "<br>Класс надежности: <input name='RelClass' size='30' type='varchar'value='".$RelClass."'>";
print "<br>Объем активов: <input name='VolOfAsset' size='20' type='varchar'value='".$VolOfAsset."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"Lab4.php\"> Вернуться к списку банков </a>";
?>
</body>
</html>
