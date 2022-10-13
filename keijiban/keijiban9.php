<h2>返信画面</h2>
<?php
$edit = $_POST["edit"];
$information_id = $_POST["information_id"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$image= $_POST["image"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
// <!-- データベースに接続 -->
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');

$query = "SELECT * FROM informations WHERE information_id = $information_id ;";
$datas = mysqli_query($mysql,$query);

if(!empty($datas)) {
// $datasをセット、連想配列で取得し繰り返す
  while($data = mysqli_fetch_assoc($datas)) {
?>
  <br />
<!-- テーブル作成 -->
  <table border="2">
    <tr>

    <?php
    echo "<th>";
    echo "<h3>"."<font color = ".$data['font_color'].">".$data["subject"]."</font>"."</h3>";
    echo "--";
    echo "<font color = ".$data['font_color'].">".$data["name"]."</font>";
    echo "--";
    echo "<br />";
    echo "<font color = ".$data['font_color'].">".$data["timer"]."</font>"."</td>";
    echo "<br />";
    echo "</th>";
    echo "<td>";
    echo "<font color = ".$data['font_color'].">".nl2br($data["message"])."</font>";
    echo "<br />";
    if($data["email"] != "")
    {
      echo "<font color = ".$data['font_color'].">".$data["email"]."</font>";
      echo "<br />";
    }
    if($data["url"] != "")
    {
      echo "<font color = ".$data['font_color'].">".$data["url"]."</font>";
    }
    echo "</td>";
    // 画像を表示
    if(($data["image"]!= "./css/") )
    {
      echo "<td>";
      echo "<img src=".$data['image']." width='200'/>";
      echo "</td>";
    }
    if(($data["image2"]!= "./css/") )
    {
      echo "<td>";
      echo "<img src=".$data['image2']." width='200'/>";
      echo "</td>";
    }
  }
}
// $datasが存在しないなら文字列を表示
else {
 echo  "<tr><td colspan = '3'> データが見つかりませんでした。</td></tr>";;
}
?>


<table border="1">

<!--POSTメソット、multipart/form-data形式で keijiban10.phpに送信 -->
<form action="keijiban10.php" method = "POST" enctype = "multipart/form-data">
<br />
<input type="hidden" name="edit" value="<?php echo $edit;?>"/>
<input type="hidden" name="information_id" value="<?php echo $information_id;?>"/>
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
<input type="submit" value="返信">
<input type="reset" value="リセット">
<button type="button" onclick=history.back()>戻る</button>
</form>
