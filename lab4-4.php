<html> <body>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");  
 $zapros="UPDATE bank SET INN='".$_GET['INN'].
"', Naim='".$_GET['Naim']."', Country='"
.$_GET['Country']."', RelClass='".$_GET['RelClass'].
"', VolOfAsset='".$_GET['VolOfAsset']."' WHERE id="
.$_GET['id'];
 mysqli_query($connect, $zapros);
 if (mysqli_affected_rows($connect)>0) {
 echo 'Все сохранено. <a href="Lab4.php"> Вернуться к списку пользователей </a>'; }
 else { echo 'Ошибка сохранения. <a href="Lab4.php"> Вернуться к списку пользователей</a> '; }
?>
</body> </html>
