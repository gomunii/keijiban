<h1>編集画面</h1>
<?php
$edit = $_POST["edit"];
$edit2 = $_POST["edit2"];
$information_id = $_POST["information_id"];
$editing = $_POST["editing"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$oldimage = $_POST["oldimage"];
$oldimage3 = $_POST["oldimage3"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$reply_id = $_POST["reply_id"];
$name2 = $_POST["name2"];
$subject2 = $_POST["subject2"];
$message2 = $_POST["message2"];
$oldimage2 = $_POST["oldimage2"];
$email2 = $_POST["email2"];
$url2 = $_POST["url2"];
$font_color2 = $_POST["font_color2"];
$reply_id = $_POST["reply_id"];

if($edit == $editing || $edit2 == $editing)
{
 if(!empty($reply_id))
 {
?>

<table>

<!--POSTメソット、multipart/form-data形式で keijiban2.phpに送信 -->
 <tr>
  <th>
   <form action="keijiban8.php" method = "POST" enctype = "multipart/form-data">
  </th>
 </tr>
 <input type="hidden" name="editing" value="<?php echo $editing;?>"/>
 <input type="hidden" name="oldimage" value="<?php echo $oldimage2;?>"/>
 <input type="hidden" name="reply_id" value="<?php echo $reply_id;?>"/>
<!-- nameという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   名前
   <input type = "text" name = "name" value= "<?php echo $name2?>">
  </th>
 </tr>

<!-- subjectという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   件名
   <input type = "text" name = "subject" value="<?php echo $subject2?>">
  </th>
 </tr>

<!-- messageという名前で３０文字が５行のメッセージフォームを作成 -->
 <tr>
  <th align="left">
   メッセージ<br />
   <textarea name="message"  cols="30" rows="5" ><?php echo $message2?></textarea>
  </th>
 </tr>

 <tr>
  <th align="left">
   現在の画像
   <?php
   echo "<br />";
   if((!empty($oldimage2) &&  $oldimage2 != "./css/" ))
   {
    echo "<img src=".$oldimage2." width='200'/>";
   }
   ?>
  </th>
</tr>

<!-- imageという名前でファイルアップロードフォームを作成  形式は全てok -->
 <tr>
  <th align="left">
   画像を変更
   <input type="file" name="image"  accept="image/*">
  </th>
 </tr>

<!-- emailという名前でメールフォームを作成 -->
 <tr>
  <th align="left">
   メールアドレス
   <input type = "email" name = "email" value="<?php echo $email2?>">
  </th>
 </tr>

<!-- urlという名前でurlフォームを作成 -->
 <tr>
  <th align="left">
   URL
   <input type = "url" name = "url" value="<?php echo $url2?>">
  </th>
 </tr>

<!-- font_colorという名前で黒、緑、青、紫、ピンク、オレンジ、ネイビー、グレーのラジオフォームを作成 -->
 <tr>
  <th align="left">
   文字色
   <label>
    <input type = "radio" name="font_color" value = "black"
    <?php if($font_color2 == 'black') echo "checked" ?>>
    <span style="color:black">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "green"
    <?php if($font_color2 == 'green') echo "checked" ?>>
    <span style="color:green">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "blue"
    <?php if($font_color2 == 'blue') echo "checked" ?>>
    <span style="color:blue">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "purple"
    <?php if($font_color2 == 'purple') echo "checked" ?>>
    <span style="color:purple">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "pink"
    <?php if($font_color2 == 'pink') echo "checked" ?>>
    <span style="color:pink">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "orange"
    <?php if($font_color2 == 'orange') echo "checked" ?>>
    <span style="color:orange">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "navy"
    <?php if($font_color2 == 'navy') echo "checked" ?>>
    <span style="color:navy">■</span>
   </label>

   <label>
    <input type = "radio" name="font_color" value = "gray"
    <?php if($font_color2 == 'gray') echo "checked" ?>>
    <span style="color:gray">■</span>
   </label>
  </th>
 </tr>

<!-- editという名前でテキストフォームを作成 -->
 <tr>
  <th align="left">
   編集/削除キー
   <input type = "text" name = "edit" value="<?php echo $edit2?>">(半角英数字のみ４文字)
  </th>
 </tr>

<!-- データ送信 -->
<br />
<input type="submit" value="編集完了">
</form>
<?php
 }
 else
 {


  ?>

  <table>

  <!--POSTメソット、multipart/form-data形式で keijiban2.phpに送信 -->
   <tr>
    <th>
     <form action="keijiban8.php" method = "POST" enctype = "multipart/form-data">
    </th>
   </tr>
   <input type="hidden" name="editing" value="<?php echo $editing;?>"/>
   <input type="hidden" name="information_id" value="<?php echo $information_id;?>"/>
   <input type="hidden" name="oldimage" value="<?php echo $oldimage;?>"/>
  <!-- nameという名前でテキストフォームを作成 -->
   <tr>
    <th align="left">
     名前
     <input type = "text" name = "name" value= "<?php echo $name?>">
    </th>
   </tr>

  <!-- subjectという名前でテキストフォームを作成 -->
   <tr>
    <th align="left">
     件名
     <input type = "text" name = "subject" value="<?php echo $subject?>">
    </th>
   </tr>

  <!-- messageという名前で３０文字が５行のメッセージフォームを作成 -->
   <tr>
    <th align="left">
     メッセージ<br />
     <textarea name="message"  cols="30" rows="5" ><?php echo $message?></textarea>
    </tr>
   </th>

   <tr>
    <th align="left">
     現在の画像
     <br />
     <?php
      if((!empty($oldimage) &&  $oldimage != "./css/" ))
      {

       echo "<img src=".$oldimage." width='200'/>";
      }

      if((!empty($oldimage3) &&  $oldimage3 != "./css/" ))
      {
       echo "<img src=".$oldimage3." width='200'/>";
      }
     ?>
    </th>
  </tr>
  <!-- imageという名前でファイルアップロードフォームを作成  形式は全てok -->
   <tr>
    <th align="left">
     画像を変更
     <input type="file" name="image"  accept="image/*">
    </th>
   </tr>
  <!-- emailという名前でメールフォームを作成 -->
   <tr>
    <th align="left">
     メールアドレス
     <input type = "email" name = "email" value="<?php echo $email?>">
    </th>
   </tr>

  <!-- urlという名前でurlフォームを作成 -->
   <tr>
    <th align="left">
     URL
     <input type = "url" name = "url" value="<?php echo $url?>">
    </th>
   </tr>

  <!-- font_colorという名前で黒、緑、青、紫、ピンク、オレンジ、ネイビー、グレーのラジオフォームを作成 -->
   <tr>
    <th align="left">
     文字色
     <label>
      <input type = "radio" name="font_color" value = "black"
      <?php if($font_color == 'black') echo "checked" ?>>
      <span style="color:black">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "green"
      <?php if($font_color == 'green') echo "checked" ?>>
      <span style="color:green">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "blue"
      <?php if($font_color == 'blue') echo "checked" ?>>
      <span style="color:blue">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "purple"
      <?php if($font_color == 'purple') echo "checked" ?>>
      <span style="color:purple">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "pink"
      <?php if($font_color == 'pink') echo "checked" ?>>
      <span style="color:pink">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "orange"
      <?php if($font_color == 'orange') echo "checked" ?>>
      <span style="color:orange">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "navy"
      <?php if($font_color == 'navy') echo "checked" ?>>
      <span style="color:navy">■</span>
     </label>

     <label>
      <input type = "radio" name="font_color" value = "gray"
      <?php if($font_color == 'gray') echo "checked" ?>>
      <span style="color:gray">■</span>
     </label>
    </th>
   </tr>

  <!-- editという名前でテキストフォームを作成 -->
   <tr>
    <th align="left">
     編集/削除キー
     <input type = "text" name = "edit" value="<?php echo $edit?>">(半角英数字のみ４文字)
    </th>
   </tr>

  <!-- データ送信 -->
  <br />
  <input type="submit" value="編集完了">
  </form>

  <?php


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
