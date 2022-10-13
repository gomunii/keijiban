<?php
$name = $_POST['name'];
$mysql = mysqli_connect('db','root','root',);
// informaition_dbを使用
$db_selected = mysqli_select_db($mysql, 'information_db');
$query = "SELECT * FROM informations WHERE name = '$name' ;";
$datas = mysqli_query($mysql,$query);
?>
<!-- $datasが存在するなら-->
<?php
echo "<h2>"."$name"."の投稿"."</h2>";
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
  }
}
?>
