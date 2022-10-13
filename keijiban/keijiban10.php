<?php
// ＄＿FILESが存在するなら
if(!empty($_FILES))
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
  $img_path = $uploaded_path;
  }
  // 存在しないならアップロード失敗
  else
  {
  $MSG = 'アップロード失敗！エラーコード：'.$_FILES['image']['error'];
  }
}
  else
  {
  $MSG = '画像を選択してください';
  }
?>

<!-- ここから確認画面バージョン -------------------------------->
<?php
// 日本時間に設定
date_default_timezone_set('Asia/Tokyo');
// ＄＿POST[  ] を取得、それぞれ代入
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$image= $uploaded_path;
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$edit = $_POST["edit"];
// 現在時刻を代入
$time = date("Y/m/d H:i:s");
$preview = $_POST["preview"];
$information_id = $_POST["information_id"];
// $preview == "1"ならデータを表示せずkeijiban3.phpに送信
if($preview == "1") {
?>

  <h1>確認</h1>


 <form action="keijiban11.php" method = "POST">
  <input type="hidden" name="information_id" value="<?php echo $information_id;?>"/>

  <input type="hidden" name="name" value="<?php echo $name ;?>"/>

  <input type="hidden" name="subject" value="<?php echo $subject ;?>"/>

  <input type="hidden" name="message" value="<?php echo $message ;?>"/>

  <input type="hidden" name="image" value="<?php echo $image ;?>"/>

  <input type="hidden" name="email" value="<?php echo $email;?>"/>

  <input type="hidden" name="url" value="<?php echo $url ;?>"/>

  <input type="hidden" name="font_color" value="<?php echo $font_color ;?>"/>

  <input type="hidden" name="edit" value="<?php echo $edit ;?>"/>

  <input type="hidden" name="timer" value="<?php echo $time ;?>"/>

  <!-- 投稿を押すとデータ送信 -->
  <input type="submit" value=" ok " />

 </form>

<!-- 訂正を押すとデータを引き継いだままkeijiban.phpに送信 -->

 <button type="button" onclick=history.back()>訂正</button>


 <br />

<!-- テーブル作成 -->
<table border="１">
<tr>

<?php
// 文字色$datas[font_solor]で文字列を表示
echo "<th>";
echo "<h3>"."<font color = ".$font_color.">".$subject."</font>"."</h3>";
echo "--";
echo "<font color = ".$font_color.">".$name."</font>";
echo "--";
echo "<br />";
echo "<font color = ".$font_color.">".$timer."</font>"."</td>";
echo "</th>";
echo "<td>";
echo "<font color = ".$font_color.">".nl2br($message)."</font>";
echo "<br />";
if($email != "")
{
echo "<font color = ".$font_color.">".$email."</font>";
echo "<br />";
}
if($url != "")
{
echo "<font color = ".$font_color.">".$url."</font>";
}
echo "</td>";
// 画像を表示
if($image != "./css/" )
{
echo "<td>";
echo "<img src=".$image." width='200'/>";
echo "</td>";
}
echo "<tr>";
echo "<td>"."<font color = ".$font_color.">".$edit."</font>"."</td>";
echo "</tr>";
}

?>

</table>

<?php

// $preview != "1"なら投稿完了
if($preview != "1")
{
 ?>
 <h1>返信ありがとうございました</h1>
 <a href="./keijiban.php">ホームに戻る</a>

<!-- データベースに接続 -->
 <?php
 $mysql = mysqli_connect('db','root','root',);
 // informaition_dbを使用
 $db_selected = mysqli_select_db($mysql, 'information_db');
/// $name,$subject,$messageが存在するなら
  if(!empty($name) && !empty($subject) && !empty($message))
  {
    // データを追加
    $query = "INSERT INTO replies
    (reply_id,information_id,name,subject,message,image,email,url,font_color,edit,timer)
    VALUES
    (NULL,'$information_id','$name','$subject','$message','$image','$email','$url','$font_color','$edit','$time')";
    $datas = mysqli_query($mysql,$query);
  }
}
?>

</body>
</html>
