<?php
$question["問題"] = "日本の首都は?";
$answer["回答1"] = "大阪";
$answer["回答2"] = "北海道";
$answer["回答3"] = "箱根";
$answer["回答4"] = "東京";

$question = array("問題" => "日本の首都は?");
$answer = ["回答1" => "犬", "回答2" => "北海道", "回答3" => "箱根", "回答4" => "東京"];
?>

<h2>
<?php echo key($question)." ".current($question);?>
</h2>

<?php
foreach ($answer as $key => $value) {
  echo $key." ".$value."<br>";
}
?>