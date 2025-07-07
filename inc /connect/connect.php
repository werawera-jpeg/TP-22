<?php
//$get_base=mysqli_connect('localhost','root','','pinterest');
session_start();

function dbconnect(){
    static $connect = null;

    if ($connect == null){
        // $connect = mysqli_connect('localhost','ETU003902','wzUcAszy','db_s2_ETU003902');
        $connect = mysqli_connect('localhost','root','','employees');

        if (!$connect){
            die('connexion à la base de donnée tsy nety' . mysqli_connect_error());

        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}
?>