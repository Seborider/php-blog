<?php

require __DIR__ . "/autoload.php";

function e($string)
{
    return htmlentities($string, ENT_QUOTES, "UTF-8");
}

$container = new App\Core\Container();

 ?>
