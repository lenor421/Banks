<html>
<head
<title> Редактирование данных о банке</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 $rows=mysqli_query($connect, "SELECT  Name, Proz, Naz_banka FROM depositprograms WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $Name = $st['Name'];
 $Proz = $st['Proz'];
 $Naz_banka = $st['Naz_banka'];
 }
print "<form action='lab5-4.php' metod='get'>";
print "Название: <input name='Name' size='20' type='varchar'value='".$Name."'>";
print "<br>% годовых: <input name='Proz' size='20' type='varchar'value='".$Proz."'>";
 $rows1=mysqli_query($connect, "SELECT id, Naim FROM bank ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $Naz[$i] = $st['Naim'];
            $id_b[$i] = $st['id'];
            $i++;
        }
?>

<br>Наименование банка:
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
