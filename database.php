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

function fetch_post($id)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM `posts` WHERE `id` = :id");
  $stmt->execute(["id" => $id]);
  return $stmt->fetch();

}
?>
