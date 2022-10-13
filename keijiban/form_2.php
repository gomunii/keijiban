<h2>確認</h2>

<?php

$name = $_GET["name"];
  echo "名前：{$name}";

$kana = $_GET["kana"];
  echo "<br>"."名前（カナ）：{$kana}";

$sex = $_GET["sex"];
if($sex=="男") {
  echo "<br>"."性別：男";
}
else {
  echo "<br>"."性別：女";
}

$email = $_GET["email"];
  echo "<br>"."メールアドレス：{$email}";

$email2 = $_GET["email2"];
if($email==$email2) {
  echo "<br>"."メールアドレス確認用：確認済";
}
else  {
  echo "<br>"."メールアドレス確認用：error";
}


$number = $_GET["number"];
  echo "<br>"."電話番号：{$number}";

$age = $_GET["age"];
  echo "<br>"."年齢：{$age}";

$company = $_GET["company"];
  echo "<br>"."会社名：{$company}";

$post = $_GET["post"];
  echo "<br>"."郵便番号：{$post}";

$address = $_GET["address"];
  echo "<br>"."住所：{$address}";

$blood = $_GET["blood"];
  echo "<br>"."血液型：{$blood}型";

$memo = $_GET["memo"];
$memo = nl2br($memo);
  echo "<br>"."メッセージ：{$memo}";
?>
<p>
<a href="./form_top.php"><input type="submit" value="訂正"/>
</a>

<form action="form_3.php"> <method="GET">
  <input type="hidden" name="name" value="<?php echo $name;
?>"/>
<input type="submit" value="完了"/>
</form>



</p><?php
// $name = htmlspecialchars($_GET['name']);
// $kana = htmlspecialchars($_GET['kana']);
// $sex = htmlspecialchars($_GET['sex']);
// $email = htmlspecialchars($_GET['email']);
// $email2 = htmlspecialchars($_GET['email2']);
// $number = htmlspecialchars($_GET['number']);
// $age = htmlspecialchars($_GET['age']);
// $company = htmlspecialchars($_GET['company']);
// $post = htmlspecialchars($_GET['post']);
// $address = htmlspecialchars($_GET['address']);
// $blood = htmlspecialchars($_GET['blood']);
// $memo = htmlspecialchars($_GET['memo']);
//
// $hantei = 'ng';
//
// if ($name != '' && $kana != '' && $sex != '' && $email != '' && $email2 != '' && $number != '' && $age != '' && $company != '' && $post != '' ) {
//   $hantei = 'ok';
// }
// else {
//   $hantei = 'ng';
// }
//   $error = '';
// if ($_POST['email'] !== $_POST['email2']) {
//   $error = 'メールアドレスが一致しません。';
// }
//
// if ($hantei == 'ng') {
//   echo ("<p align='center'>必須項目が抜けているため送信できません。<br>お手数ですが、もう一度ご入力ください。");
// }
// else {
//   echo "" ;
// }

?>
