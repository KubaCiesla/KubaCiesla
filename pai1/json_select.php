<?php
        header('Access-Control-Allow-Origin: *');+
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT id, nazwisko, imie FROM klienci ORDER BY id"))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($id,$nazwisko,$imie);
                while ($sql->fetch())
                  $nazwiska[] = array(
                     "id" => $id,
                     "nazwisko" => $nazwisko,
					 "imie" => $imie
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>