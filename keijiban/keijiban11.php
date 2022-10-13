<h1>返信ありがとうございました</h1>
<!--POSTメソットで keijiban.phpに送信 -->
<form action="keijiban.php" method = "POST">
  <!-- ホームに戻るを押すと送信 -->
<input type="submit" value="ホームに戻る">
</form>
<!-- データベースに接続 -->
<?php
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');
// 日本時間に設定
date_default_timezone_set('Asia/Tokyo');
// ＄＿POST[  ] を取得、それぞれ代入
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$image= $_POST["image"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$edit = $_POST["edit"];
// 現在時刻を代入
$time = date("Y/m/d H:i:s");
$information_id = $_POST["information_id"];
$reply_id = $_POST["reply_id"];



// $name,$subject,$messageが存在するなら
if(!empty($name) && !empty($subject) && !empty($message))
{
  // データを追加
  $query = "INSERT INTO replies
  (reply_id,information_id,name,subject,message,image,email,url,font_color,edit,timer)
  VALUES
  (NULL,'$information_id','$name','$subject','$message','$image','$email','$url','$font_color','$edit','$time')";
  $datas = mysqli_query($mysql,$query);
}

?>
