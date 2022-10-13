<?php
$edit = $_POST["edit"];
$information_id = $_POST["information_id"];
$editing = $_POST["editing"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$oldimage = $_POST["image"];
$oldimage3 = $_POST["image3"];
$email = $_POST["email"];
$url = $_POST["url"];
$font_color = $_POST["font_color"];
$edit2 = $_POST["edit2"];
$name2 = $_POST["name2"];
$subject2 = $_POST["subject2"];
$message2 = $_POST["message2"];
$oldimage2 = $_POST["image2"];
$email2 = $_POST["email2"];
$url2 = $_POST["url2"];
$font_color2 = $_POST["font_color2"];
$reply_id = $_POST["reply_id2"];

?>

<form action="keijiban7.php" method="POST">
<th align="left">
編集・削除キー：
<input type = "text" name = "editing">
<input type="submit" value="編集">
<input type="hidden" name="edit" value="<?php echo $edit;?>"/>
<input type="hidden" name="edit2" value="<?php echo $edit2;?>"/>
<input type="hidden" name="information_id" value="<?php echo $information_id;?>"/>
<input type="hidden" name="name" value="<?php echo $name ;?>"/>
<input type="hidden" name="subject" value="<?php echo $subject ;?>"/>
<input type="hidden" name="message" value="<?php echo $message ;?>"/>
<input type="hidden" name="oldimage" value="<?php echo $oldimage ;?>"/>
<input type="hidden" name="oldimage3" value="<?php echo $oldimage3 ;?>"/>
<input type="hidden" name="email" value="<?php echo $email;?>"/>
<input type="hidden" name="url" value="<?php echo $url ;?>"/>
<input type="hidden" name="font_color" value="<?php echo $font_color ;?>"/>
<input type="hidden" name="timer" value="<?php echo $time ;?>"/>
<input type="hidden" name="reply_id" value="<?php echo $reply_id;?>"/>
<input type="hidden" name="name2" value="<?php echo $name2 ;?>"/>
<input type="hidden" name="subject2" value="<?php echo $subject2 ;?>"/>
<input type="hidden" name="message2" value="<?php echo $message2 ;?>"/>
<input type="hidden" name="oldimage2" value="<?php echo $oldimage2;?>"/>
<input type="hidden" name="email2" value="<?php echo $email2;?>"/>
<input type="hidden" name="url2" value="<?php echo $url2 ;?>"/>
<input type="hidden" name="font_color2" value="<?php echo $font_color2 ;?>"/>
<input type="hidden" name="timer2" value="<?php echo $time2 ;?>"/>
</form>
