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


$boards = $dbh->query('SELECT * FROM boards ORDER BY id ASC');
$ary_id = array(); //id用の配列を用意
?>

<?php while ($board = $boards->fetch(PDO::FETCH_ASSOC)): ?>
  <div style="border:thick double #32a1ce; padding:0 0 10px 20px;">
    <ul style="list-style: none;padding-left: 0px;">
      <li>
        No:
        <?php
        $ary_id[] = $board['id']; # id要素のみを格納
        echo count($ary_id); # 上記配列の要素数を表示
        ?>
      </li>
      <li>
        名前:<?php echo htmlspecialchars($board["name"]);?>
      </li>
      <li>
        投稿内容:<?php echo htmlspecialchars($board["content"]);?>
      </li>
    </ul>
    <div>
      <a href="update.php?id=<?php echo $board['id'];?>">
        <input type="submit" value="編集">
      </a>
    </div>
    <form action="delete.php" method="post">
      <div>
          <input type="hidden" name="id" value="<?php echo $board['id']; ?>">
          <button type="submit">削除</button>
      </div>
    </form>
  </div>
  <br>
<?php endwhile; ?>
  
</body>
</html>