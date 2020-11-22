<?php
 // Подключение к базе данных:
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO bank SET INN='" . $_GET['INN']
."', Naim='".$_GET['Naim']."', Country='"
.$_GET['Country']."', RelClass='".$_GET['RelClass'].
"', VolOfAsset='".$_GET['VolOfAsset']. "'";
 mysqli_query($connect, $sql_add); // Выполнение запроса
 if (mysqli_affected_rows($connect)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, вы зарегистрировали банк в базе данных.";
 print "<p><a href=\"Lab4.php\"> Вернуться к списку банков </a>"; }
 else { print "Ошибка сохранения. <a href=\"Lab4.php\"> Вернуться к списку банков </a>"; }
?>

