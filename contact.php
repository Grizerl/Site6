<?php  session_start();?>
<?php require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminka</title>
</head>
<body>
    <div style="text-align:centre">
    <h1>Редактор контактів</h1>
    <?php if(!empty($_SESSION["login"])):  ?>
<?php echo"Ви адмін а не попуск".$_SESSION['login'];?>
<br>
<a href="logout.php">Вийти</a>
<a href="./contact.php">Контакти</a>
<a href="">Хедер</a>
<a href="">Услугі</a>
<a href="">О нас</a>

<?php
$sql=$pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res=$sql->fetch(PDO::FETCH_OBJ);
?>
<form action="./contact.php" method="post">

<input type="text" name="city" value="<?php echo $res->city ?>">
<input type="text" name="phone" value="<?php echo $res->phone ?>">
<input type="text" name="email" value="<?php echo $res->email ?>">
<input type="submit" value="save">

<?php
$city=$_POST["city"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$row="UPDATE contact SET city=:city,phone=:phone,email=:email";
$queri=$pdo->prepare($row);
$queri->execute(["city"=>$city,"phone"=>$phone,"email"=>$email]);

?>

</form>

<?php else:
    echo'<h2>Сєбав з адмінкі підарас</h2>','<a href="/">На головну</a>';
    ?>
<?php endif ?>
</div>
</body>
</html>