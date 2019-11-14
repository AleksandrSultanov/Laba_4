<?php
    require 'connect.php';
    try
    {
        $connect = connect();
        if (empty($_POST['mark']) and empty($_POST['model']) and empty($_POST['year']) and empty($_POST['cost']) and empty($_POST['mileage']))
            exit ("Поля не заполнены!");
        $mark    = htmlspecialchars($_POST['mark']);
        $model   = htmlspecialchars($_POST['model']);
        $year    = htmlspecialchars($_POST['year']);
        $cost    = htmlspecialchars($_POST['cost']);
        $mileage = htmlspecialchars($_POST['mileage']);
        $query = 'INSERT INTO car VALUES (NULL, :mark, :model, :year, :cost, :mileage)';
        $car = $connect->prepare($query);

        $car->execute(['mark' => $mark, 'model' => $model, 'year' => $year, 'cost' =>$cost, 'mileage' => $mileage]);
        Header ("Location: index.php");
    }
    catch (PDOException $e)
    {
        print "Error! : " . $e->getMessage() . "<br/>";
        die();
    }