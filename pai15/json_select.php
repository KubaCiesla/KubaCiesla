<?php
        header('Access-Control-Allow-Origin: *');+
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT isActive, age, first_name, last_name FROM ludzie ORDER BY age"))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($isActive,$age,$first_name,$last_name);
                while ($sql->fetch())
                  $table[] = array(
                     "isActive" => $isActive,
                     "age" => $age,
		     "first_name" => $first_name,
                     "last_name" => $last_name
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($table, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>