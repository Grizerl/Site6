<?php
$user="root";
$password="";
$host="localhost";
$db="testing";
$dbh='mysql:host='.$host.';dbname='.$db.';charset=utf8';
$pdo=new PDO($dbh, $user, $password);
?>

<?php
if(isset($_POST["save"]))
{
    $list=['.php','.zip','.js','.html'];
    foreach($list as $item){
        if(preg_match("/$item$/",$_FILES['im']['name']))exit("Розширення не підходить");
    }
    $type=getimagesize($_FILES['im']['tmp_name']);
    if($type && ($type['mime'] !='image/png' || $type['mime'] !='image/jpg' || $type['mime'] !='image/jpeg')){
        if($_FILES['im']['name'] <1024*1000){
            $upload='img/'.$_FILES['im']['name'];

            if(move_uploaded_file($_FILES['im']['tmp_name'],$upload)) echo "Файл загружен";
            else echo"оПИШБКА ПРИ ЗАГРУЗКА ФАЙЛА";
        }
        else exit("Размер файла перевишен");
    }

    else exit("Тип файла не перевишен");
}
?>

<?php
$title=$_POST["title"];
$description=$_POST["description"];
$filename=$_POST["filename"];
$sql="UPDATE about SET title=:title,description=:description,filename=:filename";
$query=$pdo->prepare($sql);
$query->execute(["title"=>$title,"description"=>$description,"filename"=>$filename]);


?>
