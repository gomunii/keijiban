<?php
$image = $_POST['image'];
$mysql = mysqli_connect('db','root','root',);
$db_selected = mysqli_select_db($mysql, 'information_db');

$query = "SELECT * FROM informations ;";
$datas = mysqli_query($mysql,$query);
$row = $datas->fetch_assoc();
$image_path = 'uploads/'.$row['image'];

?>
<img src="<?php echo $image_path.$image; ?>">
