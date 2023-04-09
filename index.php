<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課題①-1</title>
</head>
<body>
  <form  method="post">
    <p>日本の首都は？</p>
    <input type="text" name="answer">
    <input type="submit" value="OK">
  </form>
  <?php
  $answer = "東京";
  if (isset($_POST["answer"])) {
    $input_answer = $_POST["answer"];
    if ($input_answer == $answer) {
      echo "正解";
    } else {
      echo "不正解";
    }
  }
  ?>
</body>
</html>