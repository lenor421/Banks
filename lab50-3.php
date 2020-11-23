<html>
<head
<title> Редактирование данных о вкладе</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 $rows=mysqli_query($connect, "SELECT   date, Naz_prog, start_sum FROM deposit WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $date = $st['date'];
 $start_sum = $st['start_sum'];
 $Naz_prog = $st['Naz_prog'];
 }
print "<form action='lab50-4.php' metod='get'>";
print "Название: <input name='date' size='20' type='date'value='".$date."'>";
print "<br>% годовых: <input name='start_sum' size='20' type='int'value='".$start_sum."'>";
 $rows1=mysqli_query($connect, "SELECT id, Name FROM depositprograms ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $Naz[$i] = $st['Name'];
            $id_b[$i] = $st['id'];
            $i++;
        }
?>

<br>Наименование программы депозита:
<select name='Naz'>
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
        </select>
<?php
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"Lab4.php\"> Вернуться к списку банков </a>";
?>
</body>
</html>
