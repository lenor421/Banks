<!DOCTYPE html>
<html>
	<body>
		<h1> Лабораторная работа №5</h1>
		<h3>Шаяхметов Р.Д.</h3>
<html>
<head> <title> Добавление нового вклада </title> </head>
<body>
<H2>Добавление нового вклада:</H2> 
<form action="lab50-2.php" metod="get">
Дата создания вклада: <input name="date" size="20" type="date">
<br>Стартовая сумма вклада: <input name="start_sum" size="20" type="int">
<br>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

 $rows=mysqli_query($connect, "SELECT id, Name FROM depositprograms ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows)) {
            $Naz[$i] = $st['Name'];
            $id_b[$i] = $st['id'];
            $i++;
        }
        ?>
<form action='lab50-2.php' metod='get'>
        Наименование программы депозита:<br>
        <select  name='Naz'>
        <?php
        for($i = 0; $Naz[$i] != null; $i++): ?>
            <option value="<?=$Naz[$i].$i?>"><?=$Naz[$i]?></option>
        <?php endfor;
        for($i = 0; $Naz[$i] != null; $i++){
            $name = "num_res". $i;
            $value = "" . $id_b[$i];
            print "<input type='hidden' name='".$name."' value='".$value."'>";
        }
        ?>
        </select><br>

</textarea>
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
</form>
<p>
<a href="Lab4.php"> Вернуться к списку вкладов </a>
</body>
</html>
