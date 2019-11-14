<?php
function connect ()
{
    return new PDO('mysql:host=localhost;dbname=auto;charset=utf8', 'root', '');
}