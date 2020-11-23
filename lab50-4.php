<html> <body>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");  
$get_naz = $_GET['Naz'];
	$name = substr($_GET['Naz'], 0, (strlen($_GET['Naz'])-1));
	$num = substr($_GET['Naz'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;
 $zapros1="UPDATE deposit SET date='".$_GET['date']."', start_sum='".$_GET['start_sum']."', id_prog='".$str."', Naz_prog='" .$name."' where id='".$_GET['id']."'";
 mysqli_query($connect, $zapros1);
 if (mysqli_affected_rows($connect)>0) {
 echo 'Все сохранено. <a href="Lab4.php"> Вернуться к списку пользователей </a>'; }
 else { echo "Ошибка сохранения.".mysqli_error($connect)." <a href=\"Lab4.php\"> Вернуться к списку банков </a>"; }

?>
</body> </html>
