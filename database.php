<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=blog;charset=utf8',
  'blog',
  'CZsi5loFDmmXy)Pq'
);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
