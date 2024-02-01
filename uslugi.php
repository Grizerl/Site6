<?php  session_start();?>
<?php require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div style="text-align:centre">
    <h1>Редактор Услугі</h1>
    <?php if(!empty($_SESSION["login"])):  ?>
<?php echo"Ви адмін а не попуск".$_SESSION['login'];?>
<br>
<a href="logout.php">Вийти</a>
<a href="./contact.php">Контакти</a>
<a href="">Хедер</a>
<a href="">Услугі</a>
<a href="./about1.php">О нас</a>

<?php
$sql=$pdo->prepare("SELECT * FROM uslugi");
$sql->execute();
while ($res=$sql->fetch(PDO::FETCH_OBJ)):?>
<?php echo $res->id ?> <br>
<form action="./uslugi1.php/<?php echo $res->id ?>" method="post" enctype="multipart/form-data">
<input type="text" name="title " value="<?php echo $res->title ?>">
<input type="text" name="price" value="<?php echo $res->price?>">
<p>
<input type="file" name="im">
</p>
<input type="submit" name="save" value="save">
</form>
<img src="<?php echo $res->filename?>" alt="">
<?php endwhile?>
<?php
$city=$_POST["city"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$row="UPDATE contact SET city=:city,phone=:phone,email=:email";
$queri=$pdo->prepare($row);
$queri->execute(["city"=>$city,"phone"=>$phone,"email"=>$email]);

?>



<?php else:
    echo'<h2>Сєбав з адмінкі підарас</h2>','<a href="/">На головну</a>';
    ?>
<?php endif ?>
</div>
</body>
</html>