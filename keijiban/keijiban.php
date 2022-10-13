<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>掲示板</title>
</head>
<body>
<h1>わたる掲示板</h1>

<!-- テーブル作成 -->
<table>

<!--POSTメソット、multipart/form-data形式で keijiban2.phpに送信 -->
 <tr>
  <th>
   <form action="keijiban2.php" method = "POST" enctype = "multipart/form-data">
  </th>
 </tr>

<!-- nameという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   名前
   <input type = "text" name = "name">
  </th>
 </tr>

<!-- subjectという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   件名
   <input type = "text" name = "subject">
  </th>
 </tr>

<!-- messageという名前で３０文字が５行のメッセージフォームを作成 -->
 <tr>
  <th align="left">
   メッセージ<br />
   <textarea name="message" cols="30" rows="5"></textarea>
  </tr>
 </th>

<!-- imageという名前でファイルアップロードフォームを作成  形式は全てok -->
 <tr>
  <th align="left">
   画像
   <input type="file" name="image" accept="image/*">
  </tr>
 </th>

 <tr>
  <th align="left">
   画像
   <input type="file" name="image2" accept="image/*">
  </tr>
 </th>

<!-- emailという名前でメールフォームを作成 -->
 <tr>
  <th align="left">
   メールアドレス
   <input type = "email" name = "email">
  </th>
 </tr>

<!-- urlという名前でurlフォームを作成 -->
 <tr>
  <th align="left">
   URL
   <input type = "url" name = "url">
  </th>
 </tr>

<!-- font_colorという名前で黒、緑、青、紫、ピンク、オレンジ、ネイビー、グレーのラジオフォームを作成 -->
 <tr>
  <th align="left">
   文字色
   <label>
    <input type = "radio" name="font_color" value = "black" checked>
    <span style="color:black">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "green">
    <span style="color:green">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "blue">
    <span style="color:blue">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "purple">
    <span style="color:purple">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "pink">
    <span style="color:pink">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "orange">
    <span style="color:orange">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "navy">
    <span style="color:navy">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "gray">
    <span style="color:gray">■</span>
   </label>
  </th>
 </tr>

<!-- editという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   編集/削除キー
   <input type = "text" name = "edit">(半角英数字のみ４文字)
  </th>
 </tr>

<!-- previewという名前でチェックボックスフォームを作成 -->
 <tr>
  <th align="left">
   <input type = "checkbox" name = "preview" value="1">
   プレビューする(投稿前に、内容をプレビューして確認できます)
  </th>
 </tr>
</table>

<!-- 投稿を押すとデータ送信 -->
<!-- リセット機能を追加 -->
<br />
<input type="submit" value="投稿">
<input type="reset" value="リセット">
</form>

<!-- データベースに接続 -->
<?php
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');
?>

<hr />

<?php
// 日本時間に設定
date_default_timezone_set('Asia/Tokyo');

// ＄＿POST[  ] を取得、それぞれ代入
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$image= $_POST["image"];
$image2= $_POST["image2"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$edit = $_POST["edit"];
// 現在時刻を代入
$time = date("Y/m/d H:i:s");



// informaitionsテーブルの全てのデータをtimerが最新順に抽出
$query = "SELECT * FROM informations ORDER BY timer DESC ;";
$datas = mysqli_query($mysql,$query);
?>
<!-- $datasが存在するなら-->
<?php
if(!empty($datas)) {
// $datasをセット、連想配列で取得し繰り返す
  while($data = mysqli_fetch_assoc($datas)) {
?>
<!-- テーブル作成 -->
 <table border="4">
 <tr>

<?php
// 文字色$datas[font_solor]で文字列を表示
  echo "<br />";
  echo "<th>";
  echo "<h3>"."<font color = ".$data['font_color'].">".$data["subject"]."</font>"."</h3>";
  echo "--";
  echo "<font color = ".$data['font_color'].">".$data["name"]."</font>"."</td>";
  echo "--";
  ?>
  <form action="keijiban12.php" method = "POST">
  <input type="hidden" name="name" value="<?php echo $data['name'] ;?>"/>
  <input type="submit" value="<?php echo $data['name'] ;?>の投稿を見る">
</form>
  <?php
  echo "<br />";
  echo "<font color = ".$data['font_color'].">".$data["timer"]."</font>"."</td>";
  echo "<br />";
  ?>
  <table>
  <form action="keijiban4.php" method = "POST">
    <input type="hidden" name="edit" value="<?php echo $data['edit'] ;?>"/>
    <input type="hidden" name="information_id" value="<?php echo $data['information_id'];?>"/>
    <input type="submit" value="削除"/>
  </form>
  <form action="keijiban6.php" method = "POST">
    <input type="hidden" name="edit" value="<?php echo $data['edit'] ;?>"/>
    <input type="hidden" name="information_id" value="<?php echo $data['information_id'];?>"/>
    <input type="hidden" name="name" value="<?php echo $data['name'] ;?>"/>
    <input type="hidden" name="subject" value="<?php echo $data['subject'] ;?>"/>
    <input type="hidden" name="message" value="<?php echo $data['message'] ;?>"/>
    <input type="hidden" name="image" value="<?php echo $data['image'] ;?>"/>
    <input type="hidden" name="image3" value="<?php echo $data['image2'] ;?>"/>
    <input type="hidden" name="email" value="<?php echo $data['email'];?>"/>
    <input type="hidden" name="url" value="<?php echo $data['url'] ;?>"/>
    <input type="hidden" name="font_color" value="<?php echo $data['font_color'] ;?>"/>
    <input type="submit" value="編集"/>
  </form>
  <form action="keijiban9.php" method = "POST">
    <input type="hidden" name="edit" value="<?php echo $data['edit'] ;?>"/>
    <input type="hidden" name="information_id" value="<?php echo $data['information_id'];?>"/>
    <input type="hidden" name="name" value="<?php echo $data['name'] ;?>"/>
    <input type="hidden" name="subject" value="<?php echo $data['subject'] ;?>"/>
    <input type="hidden" name="message" value="<?php echo $data['message'] ;?>"/>
    <input type="hidden" name="image" value="<?php echo $data['image'] ;?>"/>
    <input type="hidden" name="image2" value="<?php echo $data['image2'] ;?>"/>
    <input type="hidden" name="email" value="<?php echo $data['email'];?>"/>
    <input type="hidden" name="url" value="<?php echo $data['url'] ;?>"/>
    <input type="hidden" name="font_color" value="<?php echo $data['font_color'] ;?>"/>
    <input type="submit" value="返信"/>
  </form>
  </table>
    <?php

  echo "</th>";
  echo "<td>";
  echo "<font color = ".$data['font_color'].">".nl2br($data["message"])."</font>";
  echo "<br />";
  if($data["email"] != "")
  {
  ?><a href="mailto:<?php echo $data['email']?>"><?php echo $data['email']?></a><?php
  echo "<br />";
  }
  if($data["url"] != "")
  {
  ?> <a href="<?php echo $data['url']?>"><?php echo $data['url']?></a><?php
  }
  echo "</td>";
  // 画像を表示
  if((!empty($data["image"] && $data["image"]!= "./css/")))
  {
   echo "<td>";
   echo "<img src=".$data['image']." width='200'/>";
   echo "</td>";
  }
  if((!empty($data["image2"] && $data["image2"]!= "./css/")))
  {
   echo "<td>";
   echo "<img src=".$data['image2']." width='200'/>";
   echo "</td>";
  }
  $query2 = "SELECT * FROM replies WHERE information_id = $data[information_id] ORDER BY timer DESC ;";
  // $query2 = "SELECT * FROM informations LEFT JOIN replies USING(information_id);";
  $datas2 = mysqli_query($mysql,$query2);

  if(!empty($datas2) )
  {
   while($data2 = mysqli_fetch_assoc($datas2))
   {

    if(!empty($data2['name'] ))
    {

     echo "<br />";
     echo "<tr>";
     echo "<th>";
     echo "TO. ".$data['name'];
     echo "</th>";
     echo "</tr>";
     echo "<th>";
     echo "<h3>"."<font color = ".$data2['font_color'].">".$data2["subject"]."</font>"."</h3>";
     echo "--";
     echo "<font color = ".$data2['font_color'].">".$data2["name"]."</font>";
     echo "--";
     echo "<br />";
     echo "<font color = ".$data2['font_color'].">".$data2["timer"]."</font>"."</td>";
     echo "<br />";
     ?>
     <table>
     <form action="keijiban4.php" method = "POST">
       <input type="hidden" name="edit2" value="<?php echo $data2['edit'] ;?>"/>
       <input type="hidden" name="reply_id2" value="<?php echo $data2['reply_id'];?>"/>
       <input type="submit" value="削除"/>
     </form>
     <form action="keijiban6.php" method = "POST">
       <input type="hidden" name="edit2" value="<?php echo $data2['edit'] ;?>"/>
       <input type="hidden" name="reply_id2" value="<?php echo $data2['reply_id'];?>"/>
       <input type="hidden" name="name2" value="<?php echo $data2['name'] ;?>"/>
       <input type="hidden" name="subject2" value="<?php echo $data2['subject'] ;?>"/>
       <input type="hidden" name="message2" value="<?php echo $data2['message'] ;?>"/>
       <input type="hidden" name="image2" value="<?php echo $data2['image'] ;?>"/>
       <input type="hidden" name="email2" value="<?php echo $data2['email'];?>"/>
       <input type="hidden" name="url2" value="<?php echo $data2['url'] ;?>"/>
       <input type="hidden" name="font_color2" value="<?php echo $data2['font_color'] ;?>"/>
       <input type="submit" value="編集"/>
     </form>
     </table>
       <?php
     echo "</th>";
     echo "<td>";

     echo "<font color = ".$data2['font_color'].">".nl2br($data2["message"])."</font>";
     echo "<br />";
     if($data2["email"] != "")
     {
      ?><a href="mailto:<?php echo $data['email']?>"><?php echo $data['email']?></a><?php
      echo "<br />";
     }
     if($data2["url"] != "")
     {
      ?> <a href="<?php echo $data2['url']?>"><?php echo $data2['url']?></a><?php
     }
     echo "</td>";
     // 画像を表示
     if((!empty($data2["image"] && $data2["image"]!= "./css/" )))
     {
      echo "<td>";
      echo "<img src=".$data2['image']." width='200'/>";
      echo "</td>";
     }
     echo "</tr>";
    }
   }
  }
 }
}
  // $datasが存在しないなら文字列を表示
  else {
   echo  "<tr><td colspan = '3'> データが見つかりませんでした。</td></tr>";;
  }
?>
</table>
</body>
</html>
