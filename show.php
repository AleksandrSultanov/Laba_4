<?php
function show ()
{
    $count = 0;
    try {
        $connection = new PDO('mysql:host=localhost;dbname=auto;charset=utf8', 'root', '');
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr scope="row">';
        echo '<td>' . "№" . '</td>';
        echo '<td>' . "Марка" . '</td>';
        echo '<td>' . "Модель" . '</td>';
        echo '<td>' . "Год производства" . '</td>';
        echo '<td>' . "Стоимость (₽)" . '</td>';
        echo '<td>' . "Пробег (км)" . '</td>';
        echo '</tr>';
        echo '</thead>';
        foreach ($connection->query('SELECT * from car') as $row)
        {
            echo '<tr scope="row">';
            echo '<td>' . ++$count . '</td>';
            for ($td = 1; $td < 6; $td++)
            {
                echo '<td>' . $row[$td] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        $connection = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
