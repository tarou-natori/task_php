<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP課題①-2</title>
</head>
<body>
  <form method="post">
    <input type="text" name="answer">
    <input type="submit" value="検索">
    <?php
    $fruits = ['apple', 'orange', 'strawberry'];
    $input_answer = filter_input(INPUT_POST, "answer");
    if (isset($input_answer)) {
      if ($input_answer == $fruits[0]) {
        echo $input_answer . "は、配列に含まれています。";
      } elseif ($input_answer == $fruits[1]){
        echo $input_answer . "は、配列に含まれています。";
      } elseif ($input_answer == $fruits[2]){
        echo $input_answer . "は、配列に含まれています。";
      } else {
        echo $input_answer . "は、配列に含まれていません。";
      }
    }
    ?>
  </form>
</body>
</html>