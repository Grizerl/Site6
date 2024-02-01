<?php require_once 'connect.php';
session_start();
$name=$_POST["login"];
$password=$_POST["password"];

$sql=$pdo->prepare("SELECT id,login,password FROM user WHERE login=:login AND password=:password");
$sql->execute(array("login"=>$name,"password"=>$password));
$array=$sql->fetch(PDO::FETCH_ASSOC);
if($array["id"]> 0)
{
 $_SESSION['login']=$array['login'];
 header('Location:admin1.php');
}else{
    header('Loacation:login.php');
}
?>