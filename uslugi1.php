<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "testing";
$dbh = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';

try {
    $pdo = new PDO($dbh, $user, $password);
} catch (PDOException $e) {
    exit("Failed to connect to the database: " . $e->getMessage());
}

if (isset($_POST["save"])) {
    $list = ['.php', '.zip', '.js', '.html'];
    foreach ($list as $item) {
        if (preg_match("/$item$/", $_FILES['im']['name'])) {
            exit("Розширення не підходить");
        }
    }

    $type = getimagesize($_FILES['im']['tmp_name']);
    if ($type && !in_array($type['mime'], ['image/png', 'image/jpg', 'image/jpeg'])) {
        if ($_FILES['im']['size'] < 1024 * 1000) {
            $upload = 'img/' . $_FILES['im']['name'];

            if (move_uploaded_file($_FILES['im']['tmp_name'], $upload)) {
                echo "Файл загружен";
            } else {
                echo "Ошибка при загрузке файла";
            }
        } else {
            exit("Размер файла превышен");
        }
    } else {
        exit("Тип файла не подходит");
    }
}

$title = $_POST["title"];
$price = $_POST["price"]; 
$url=$_SERVER['REQUEST_URI'];
$url=explode('/',$url);
$str=$url[4];
echo $url;
$filename = $_FILES['im']['name'];

$sql = "UPDATE uslugi SET title=:title, price=:price, filename=:filename WHERE id=$str ";
$query = $pdo->prepare($sql);
$query->execute(["title" => $title, "price" => $price, "filename" => $filename]);
?>
