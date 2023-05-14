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
  try {
    //DBに接続
    $dbh = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8mb4','root','root');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //SQLを準備
    $stmt = $dbh->prepare('INSERT INTO boards (name, content) VALUES(?, ?)');
  
    if (!$stmt) {
      die($dbh->error);
    }
  
    // パラメータを割り当て
    $stmt->bindParam(1, $_POST["name"], PDO::PARAM_STR_CHAR);
    $stmt->bindParam(2, $_POST["content"], PDO::PARAM_STR_CHAR);
  
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
    <a href="task3-1.php">
      <input type="button" value="投稿一覧へ戻る">
    </a>
  </div>
</body>
</html>