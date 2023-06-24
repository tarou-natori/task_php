<?php
require_once("connect_db.php");
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM boards WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

$board = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $board['name'];
$content = $board['content'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集ページ</title>
</head>
<body>
<h2>編集ページ</h2>
  <form action="update_do.php" method="post">
    <div>
      <label for="name">名前 </label>
      <input type="text" name="name" value="<?php echo $name;?>">
    </div>
    <div>
      <label for="content">投稿内容</label>
      <div>
        <textarea name="content" cols="30" rows="10"><?php echo $content;?></textarea>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" value="更新">
    <a href="index.php">
      <input type="button" value="戻る">
    </a>
  </form>
</body>
</html>