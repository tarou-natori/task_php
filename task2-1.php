<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課題②-1</title>
</head>
<body>
  <h1>FizzBuzz問題</h1>
  <form method="post">
    <div>
      <label>FizzNum: 
        <input type="text" name="input_FizzNum" placeholder="整数値を入力してください">
      </label>
    </div>
    <div>
      <label>BuzzNum: 
        <input type="text" name="input_BuzzNum" placeholder="整数値を入力してください">
      </label>
    </div>
    <input type="submit" value="実行">
    <p>【出力】</p>

    <?php
    if (isset($_POST["input_FizzNum"]) && isset($_POST["input_BuzzNum"])) {
      $input_FizzNum = $_POST["input_FizzNum"];
      $input_BuzzNum = $_POST["input_BuzzNum"];
    }

    if (!isset($input_FizzNum) || !isset($input_BuzzNum)) {
      echo "";
      exit;
    }

    if (!filter_var($input_FizzNum, FILTER_VALIDATE_INT) || !filter_var($input_BuzzNum, FILTER_VALIDATE_INT)) {
      echo "整数値を入力してください";
      exit;
    }

    // ループ処理
    for ($i = 1; $i < 100; $i++) {
      
      if ($input_FizzNum === 0 || $input_BuzzNum === 0) {
        echo "整数値を入力してください";
      
      // $iが両方の変数(=入力値)で割り切れる時
      } elseif ($i % intval($input_FizzNum) == 0 && $i % intval($input_BuzzNum) == 0) {
      echo "FizzBuzz " . $i . "<br>";

      // input_FizzNumで割り切れる時
      } elseif ($i % $input_FizzNum === 0) {
      echo "Fizz " . $i . "<br>";

      // input_BuzzNumで割り切れる時
      } elseif ($i % $input_BuzzNum === 0) {
      echo "Buzz " . $i . "<br>";
      
      // どちらでも割り切れない時は出力しない
      } else {
      echo "";
      }
    }
    ?>
  </form>
</body>
</html>