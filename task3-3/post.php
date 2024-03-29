<<<<<<< HEAD
test
=======
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿完了</title>
</head>
<body>
  <?php
  require_once("connect_db.php");
  ?>

  <?php
  try {
    //SQLを準備
    $stmt = $dbh->prepare('INSERT INTO boards (name, content, deleted) VALUES(:name, :content, :deleted)');
  
    if (!$stmt) {
      die($dbh->error);
    }
  
    $name = $_POST["name"];
    $content = $_POST["content"];

    // パラメータを割り当て
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":content", $content);
    $deleted = 0;
    $stmt->bindParam(":deleted", $deleted);
  
    // SQLを実行する
    $ret = $stmt->execute();

    if ($ret) { 
      echo "投稿が完了しました。";
    }
  
  } catch (PDOException $e) {
    print ("エラー：{$e->getMessage()}");
  }
  ?>
  
  <div>
    <a href="index.php">
      <input type="button" value="投稿一覧へ戻る">
    </a>
  </div>
</body>
</html>
>>>>>>> refs/remotes/origin/master
