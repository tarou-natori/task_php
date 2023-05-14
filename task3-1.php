<?php
$dbh = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8mb4','root','root');
$boards = $dbh->query("SELECT * FROM boards order by id asc");

if (!$boards) {
  die($dbh->error);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
  <h1>掲示板</h1>
  <h2>新規投稿</h2>
  <form action="post.php" method="post">
    <div>
      <label for="name">name:</label>
      <input type="text" name="name">
    </div>
    <div>
      <label for="content">投稿内容:</label>
      <div>
        <textarea name="content" cols="30" rows="10"></textarea>
      </div>
    </div>
    <input type="submit" value="投稿">
  </form>
  <h2>投稿内容一覧</h2>

  <?php while ($board = $boards->fetch(PDO::FETCH_ASSOC)): ?>
  <div>
    <p style="border:thick double #32a1ce">
      No:<?php echo htmlspecialchars($board["id"]);?><br>
      名前:<?php echo htmlspecialchars($board["name"]);?><br>
      投稿内容:<?php echo htmlspecialchars($board["content"]);?>
    </p>
  </div>
  <?php endwhile; ?>
  
</body>
</html>