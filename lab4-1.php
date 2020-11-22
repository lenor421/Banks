<!DOCTYPE html>
<html>
	<body>
		<h1> Лабораторная работа №4</h1>
		<h3>Шаяхметов Р.Д.</h3>
<html>
<head> <title> Добавление нового банка </title> </head>
<body>
<H2>Добавление нового банка:</H2> 
<form action="lab4-2.php" metod="get">
 ИНН: <input name="INN" size="20" type="int">
<br>Наименование: <input name="Naim" size="20" type="varchar">
<br>Страна: <input name="Country" size="20" type="varchar">
<br>Класс надежности: <input name="RelClass" size="20" type="varchar">
<br>Объем активов: <input name="VolOfAsset" size="20" type="varchar">
</textarea>
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="Lab4.php"> Вернуться к списку банков </a>
</body>
</html>
