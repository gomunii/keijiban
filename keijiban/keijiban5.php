<?php
$edit = $_POST["edit"];
$information_id = $_POST["information_id"];
$delete = $_POST["delete"];
$reply_id = $_POST["reply_id"];

if($edit == $delete)
{
echo "<h1>"."削除完了"."</h1>";
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');
 if(!empty($reply_id))
 {
  $query = "DELETE FROM replies WHERE reply_id = $reply_id ;";
  mysqli_query($mysql,$query);

 }
 else
 {
  $query = "SELECT * FROM replies WHERE information_id = $information_id;";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas) )
  {
   while($data = mysqli_fetch_assoc($datas))
   {
  // var_dump($data['reply_id']);
  // exit;
  //
    $query = "DELETE FROM replies WHERE reply_id = $data[reply_id] ;";
    mysqli_query($mysql,$query);
   }
  $query2 = "DELETE FROM informations WHERE information_id = $information_id ;";
  mysqli_query($mysql,$query2);
  }
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
