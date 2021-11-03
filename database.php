<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=blog',
  'root',
  ''
);

function fetchPosts() 
{
    global $pdo;
    return $pdo->query("SELECT * FROM `posts`");
}

?>