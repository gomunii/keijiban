<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>PHPテスト</title>
</head>
<body>


<?php
 date_default_timezone_set('Asia/Tokyo');
 echo date("Y/m/d H:i:s");

 $sec = date("s") ;
 echo "<p>$sec</p>" ;

 if($sec %2 == 1) {
   echo "奇数";
 } else if ($sec %2 == 0 ) {
   echo "偶数";
 }






($sec %2 == 1) ? $valid = "無効" : $valid = "有効";
echo $valid;


echo "<table border = [1]>";
echo "<tr>";
echo "<th>"."ID"."</th>";
echo "<th>"."有効/無効"."</th>";
echo "</tr>";

$i = 0;

while($i < 60) {

  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$valid."</td>";
  echo "</tr>";

  if($i >= $sec) {
    break;
  }

  $i++;
}

echo "</table>";



$arr = array();
$arr['名前'] = "わたる" ;
$arr['性別'] = "男" ;
$arr['身長'] = "181cm" ;
$arr['年齢'] = "21歳" ;
$arr['誕生日'] = "9月19日"  ;




foreach($arr as $key => $val) {
  echo   "<br>"."私の".$key."は".$val."です。";
   }
?>

</body>
</html>
