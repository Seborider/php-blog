<?php
include("../init.php");

error_reporting(E_ALL); 
ini_set('display_errors', 1); 

$postsController = $container->make("postsController");
$postsController->index();

?>
