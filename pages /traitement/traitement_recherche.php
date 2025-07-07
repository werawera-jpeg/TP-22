<?php
include("../../inc/fonction.php");


if(isset($_GET['dep'])){
    $_SESSION['dep']=$_GET['dep'];

    header("location: ../modele.php?id=1&&page=index.php");
}
if(isset($_GET['nom'])){
    $_SESSION['nom']=$_GET['nom'];
    header("location: ../modele.php?id=2&&page=index.php");
}
?>