<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=blog;charset=utf8',
  'root',
  ''
);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function fetch_posts()
{
   global $pdo;
   return $pdo->query("SELECT * FROM `posts`");
}

function fetch_post($title)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM `posts` WHERE `title` = :title");
  $stmt->execute(["title" => $title]);
  return $stmt->fetch();

}
?>
