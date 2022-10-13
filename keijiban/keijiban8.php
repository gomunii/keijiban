<?php
date_default_timezone_set('Asia/Tokyo');
$edit = $_POST["edit"];
$information_id = $_POST["information_id"];
$editing = $_POST["editing"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$time = date("Y/m/d H:i:s");
$reply_id = $_POST["reply_id"];
$edit = $_POST["edit"];

// ＄＿FILESが存在するなら
if(!empty($_FILES['image']['name']))
{
  // ファイル名を取得し代入
  $filename = $_FILES['image']['name'];
// 一時保存するファイル名を代入
  $uploaded_path = "./css/".$filename;
// $_FILES['image']['tmp_name']を$uploaded_pathに一時保存
  $result = move_uploaded_file($_FILES['image']['tmp_name'],$uploaded_path);
  // $resultが存在するなら
  if($result)
  {
    // アップロード
  $MSG = 'アップロード成功！ファイル名：'.$filename;
  $image = $uploaded_path;
  }
  // 存在しないならアップロード失敗
  else
  {
  $MSG = 'アップロード失敗！エラーコード：'.$_FILES['image']['error'];
  }
}
  else
  {
   $image= $_POST['oldimage'];
  }


if(!empty($edit))
{
echo "<h1>"."編集完了"."</h1>";
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');
  if(!empty($reply_id))
  {
   $query = "UPDATE replies SET name = '$name' , subject = '$subject' , message = '$message' ,image = '$image' ,
            email = '$email' , url = '$url' , font_color = '$font_color' , edit = '$edit', timer = '$time'
            WHERE reply_id = $reply_id;";
   mysqli_query($mysql,$query);
  }
  else
  {
   $query = "UPDATE informations SET name = '$name' , subject = '$subject' , message = '$message' ,image = '$image' ,
            email = '$email' , url = '$url' , font_color = '$font_color' , edit = '$edit', timer = '$time'
            WHERE information_id = $information_id;";
   mysqli_query($mysql,$query);
  }
}
else
{
  echo "<h1>"."ERROR"."<h1>";
}
?>
<!--POSTメソットで keijiban.phpに送信 -->
<form action="keijiban.php" method = "POST">
  <!-- ホームに戻るを押すと送信 -->
<input type="submit" value="ホームに戻る">
</form>
