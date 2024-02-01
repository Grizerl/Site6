<?php require_once 'connect.php';?>
<?php
$sql=$pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res=$sql->fetch(PDO::FETCH_ASSOC);
$main=$pdo->prepare("SELECT * FROM header");
$main->execute();
$result=$main->fetch(PDO::FETCH_OBJ);
$row=$pdo->prepare("SELECT * FROM about");
$row->execute();
$about=$row->fetch(PDO::FETCH_OBJ);   
$sql2=$pdo->prepare("SELECT * FROM uslugi");
$sql2->execute();
$uslugi2=$sql2->fetchAll(PDO::FETCH_OBJ);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title><?php echo $res["title"]?></title>
    <meta name="description"content="<?php echo $res["description"]?>">
</head>
<nav>
    <div class="header">
        <div class="left">
        <a class="text-1">Логотип</a>
    <a class="text-2" ><?php echo $res["city"]?></a>
        </div>
    <div class="right">
    <a class="text-3" ><?php echo $res["phone"]?></a>
    <a class="text-4" ><?php echo $res["email"]?></a>
    </div>
    </div>
</nav>
    <h1 class="content"><?php echo $result->name?></h1>
        <h2 class="text"><?php echo $result->title?></h2>
        <?php foreach($uslugi2 as $uslugi): ?>
        <div class="box-img">
            <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_R0sHEfo-aXugvc3zjlW3vwvj9GhWqEGBieMSt4iJkw&s" alt="foto">
        </div>
        <div class="box">
            <h4><?php echo $uslugi->title ?></h4>
            <span><?php echo $uslugi->price ?></span>
        </div>
    <?php endforeach ?>
        <div class="footer">
        <img  class="foto" src=<?php echo $about->filename?> alt="foto">
        <h2 class="title"><?php echo $about->title?></h2>
        <p class="p"><?php echo $about->description?></p>
    </div>
    </div>
<div class="container">
</div>
</html>