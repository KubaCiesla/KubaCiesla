<?php
function wczytaj($zmienna)
{
           if (!isset($_GET[$zmienna]) || $_GET[$zmienna]=="")
                die( "Blad! brak zmiennej: ".$zmienna ); 
           return $_GET[$zmienna];
}

$baza = new  mysqli("localhost", "root", "", "users");
if (mysqli_connect_errno())  die( "Blad: ".mysqli_connect_error() );
$baza->set_charset("utf8");
?>