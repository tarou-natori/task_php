<?php
// DB接続情報
$host = "localhost";
$dbname ="mydb";
$username ="root";
$password ="root";

// DB接続
try {
  $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("データベース接続に失敗しました: " . $e->getMessage());
}
?>