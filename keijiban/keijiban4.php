<?php
$edit = $_POST["edit"];
$information_id = $_POST["information_id"];
$reply_id = $_POST["reply_id"];
?>

<form action="keijiban5.php" method="POST">
<th align="left">
編集・削除キー：
<input type = "text" name = "delete">
<input type="submit" value="削除">
<input type="hidden" name="edit" value="<?php echo $edit;?>"/>
<input type="hidden" name="information_id" value="<?php echo $information_id;?>"/>
<input type="hidden" name="reply_id" value="<?php echo $reply_id;?>"/>
</form>
