<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課題①-4</title>
</head>
<body>
<form method="post">
  <select name="user_hand">
    <option value="グー">グー</option>
    <option value="チョキ">チョキ</option>
    <option value="パー">パー</option>
  </select>
  <br>
  <input type="submit" value="じゃんけん！">
</form>

<?php
$hands = ["グー", "チョキ", "パー"];


if (isset($_POST["user_hand"])) {
  $your_hand = $_POST["user_hand"];

  $random = array_rand($hands);
  $pc_hand = $hands[$random];

  echo "自分:" . $your_hand;
  echo "<br>";
  echo "相手:" . $pc_hand;
  echo "<br>";

  // 勝敗を判定
  switch ($your_hand) {
    // 自分の手がグーの時
    case 'グー': 
      switch ($pc_hand) {
        case 'グー':
          echo "あいこ";
          break;
        case 'チョキ':
          echo "あなたの勝ちです！";
          break;
        case 'パー':
          echo "あなたの敗北です。。。";
          break;
      }
      break;
    // 自分の手がチョキの時
    case 'チョキ': 
      switch ($pc_hand) {
        case 'グー':
          echo "あなたの敗北です。。。";
          break;
        case 'チョキ':
          echo "あいこ";
          break;
        case 'パー':
          echo "あなたの勝ちです！";
          break;
      }
      break;
    // 自分の手がパーの時
    case 'パー': 
      switch ($pc_hand) {
        case 'グー':
          echo "あなたの勝ちです！";
          break;
        case 'チョキ':
          echo "あなたの敗北です。。。";
          break;
        case 'パー':
          echo "あいこ";
          break;
      }
      break;
  }
}
?>

</body>
</html>