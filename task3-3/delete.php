<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>削除完了</title>
</head>
<body>
  <?php
    // 投稿のidを連番で振り直す
    function renumberPostIDs($dbh){
      $stmt = $dbh->query('SELECT id FROM boards ORDER BY id ASC');
      $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $newID = 1;
      foreach ($posts as $post) {
        $currentID = $post["id"];
        if ($currentID != $newID) {
          $stmt = $dbh->prepare('UPDATE boards SET id = :newID WHERE id = :currentID');
          $stmt->bindParam(":newID", $newID);
          $stmt->bindParam(":currentID", $currentID);
          $stmt->execute();
        }
        $newID++;
      }

    function deletePost($dbh, $postId) {
      $stmt = $dbh->prepare('UPDATE boards SET deleted = 1 WHERE id = :postId');
      $stmt->bindParam(':postId', $postId);
      $stmt->execute();
    }

    }

  if (!empty($_POST['id'])) { 
    try {

      require_once("connect_db.php");
      
      // 削除する投稿のIDを取得
      $id = $_POST['id'];

      //SQLを準備
      $stmt = $dbh->prepare('DELETE FROM boards WHERE id = :id');
      if (!$stmt) {
        die($dbh->error);
      }
    
      // パラメータを割り当て
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
      // SQLを実行する
      $ret = $stmt->execute();

      if ($ret) { 
        renumberPostIDs($dbh);
        echo "投稿の削除が完了しました。";
      }  
    } catch (PDOException $e) {
      print ("エラー：{$e->getMessage()}");
    }
  }
  ?>
  
  <div>
    <a href="index.php">
      <input type="button" value="投稿一覧へ戻る">
    </a>
  </div>


</body>
</html>