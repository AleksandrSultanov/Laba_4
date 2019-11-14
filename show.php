<?php
function show ()
{
    require 'connect.php';
    $count = 0;
    try {
        $connect = connect();

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
        foreach ($connect->query('SELECT * from car') as $row)
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
        $connect = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
