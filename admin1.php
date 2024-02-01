<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminka</title>
</head>
<body>
    <div style="text-align:centre">
    <?php if(!empty($_SESSION["login"])):  ?>
<?php echo"Ви адмін а не попуск".$_SESSION['login'];?>
<br>
<a href="logout.php">Вийти</a>
<a href="./contact.php">Контакти</a>
<a href="">Хедер</a>
<a href="./uslugi.php">Услугі</a>
<a href="./about.php">О нас</a>
<?php else:
    echo'<h2>Сєбав з адмінкі підарас</h2>','<a href="/">На головну</a>';
    ?>
<?php endif ?>
</div>
</body>
</html>