	<!DOCTYPE html>
	<html lang="ja">
	<head>
	<meta charset="utf-8">
	<title>PHPテスト</title>
	</head>
	<body>
<?php
 $text1 = "こんにちは。";
 $text2 = "PHP!";
	echo "$text1";
	echo "$text2";
?>



<p>
<?php
 $text1 = "こんにちは。";
 $text2 = "PHP!";
  echo "$text1$text2";
?>
</p>



<h1>
<?php
$text1 = "こんにちは。";
$text2 = "PHP!";
	echo "$text1$text2";
?>
</h1>



<p>
<?php
 $arr = array();
 $arr[0] = 'バナナ';
 $arr[1] = 'リンゴ';
 $arr[2] = 'トマト';
 $arr[3] = '時計';
  var_dump($arr);
?>
</p>



<p>
<?php
 $vocaloids = [];
 $vocaloids[] = 'バナナ';
 $vocaloids[] = 'リンゴ';
 $vocaloids[] = 'トマト';
 $vocaloids[] = '時計';
  echo count($vocaloids);
?>
</p>



<p>
<?php
 $vocaloids = [];
 $vocaloids[] = 'バナナ';
 $vocaloids[] = 'リンゴ';
 $vocaloids[] = 'トマト';
 $vocaloids[] = '時計';
for($i = 0; $i <= count($vocaloids) - 1; ++$i){
	echo $vocaloids[$i] . "\n";
}
?>
</p>



<p>
<?php
 $vocaloids = [];
 $vocaloids[] = '<p>バナナ</p>';
 $vocaloids[] = '<p>リンゴ</p>';
 $vocaloids[] = '<p>トマト</p>';
 $vocaloids[] = '<p>時計</p>';
for($i = 0; $i <= count($vocaloids) - 1; ++$i){
 echo $vocaloids[$i] . "\n";
}
?>
</p>



<p>
<?php
 $vocaloids = [];
 $vocaloids[] = 'バナナ';
 $vocaloids[] = 'リンゴ';
 $vocaloids[] = 'トマト';
 $vocaloids[] = '時計';
for($i = 0; $i <= count($vocaloids) - 1; ++$i){
 $arr= array($vocaloids[$i]);
 $search = '時計';
 $key = in_array($search, $arr);}
if ($key){
  echo($search);
}
?>
</p>



<?php
 $arr = array(
	    '男性'=>['キムタク','所ジョージ','タモリ'],
	    '女性'=>['松嶋菜々子','ふかきょん','あいみょん']
  );
 var_dump($arr);
?>



<p>
<?php
$arr = [
	['キムタク','男性'],
     ['所ジョージ','男性'],
     ['タモリ','男性']
 ];
 print_r($arr);

 $array = [
 	['松嶋菜々子','女性'],
      ['ふかきょん','女性'],
      ['あいみょん','女性']
  ];
print_r($array);
?>
</p>

<p>
<?php
$arr = array(
		 '男性'=>array(
			 'キムタク','所ジョージ','タモリ',
		 ),
		 '女性'=>array(
			 '松嶋菜々子','ふかきょん','あいみょん'
 )
);
     var_dump($arr);
?>
</p>



<p>
<?php
// $arr = array(
// 		 '男性'=>array(
// 			 'キムタク','所ジョージ','タモリ',
// 		 ),
// 		 '女性'=>array(
// 			 '松嶋菜々子','ふかきょん','あいみょん'
//  )
// );

// $x = array();
// $y = array('男性'=>array(
// 	'キムタク','所ジョージ','タモリ');
// $z = array(	 '女性'=>array(
// 		 '松嶋菜々子','ふかきょん','あいみょん');
// 	 )

// array_push($x,$y) ;
// array_push($x,$z) ;
// for($i = 0 ; $i < count($x) ; $i++)
//     $row = $x[$i];
// for($j = 0; $j < count($row); $j++)
//         var_dump($x[$i][$j]);
//         echo "<br>";
// for($i = 0; $i <= count('男性') - 1; ++$i){
//  $arr= array('男性'[$i]);
// for($j = 0; $i <= count('女性') - 1; ++$j){
//   $arr= array('女性'[$j]);
// 	var_dump($x[$i][$j]);
// 	echo "<br>";


$sex = array("男性","女性");
$member = array(
	"キムタク",
	"所ジョージ",
	"タモリ",
	"松嶋菜々子",
	"ふかきょん",
	"あいみょん"
	 );
for($i = 0; $i <= count($sex) - 1; ++$i){
    for($j = 0; $j <= count($member) - 1; ++$j){
		  var_dump($member[$j]."は".$sex[$i]."です" );
 }
}
?>
</p>

$member = array($x.$y)
$x = array ("キムタク",
            "所ジョージ",
            "タモリ"
);
$y = array(	"松嶋菜々子",
           	"ふかきょん",
          	"あいみょん"
);

array_push = ($member,$x)
array_push = ($member,$y)


<?php
// $member = array(
//   "キムタク",
//   "所ジョージ",
//   "タモリ",
// 	"松嶋菜々子",
// 	"ふかきょん",
// 	"あいみょん"
// );
//
// $sex = array(
//  "キムタク" => "男性",
//  "所ジョージ" => "男性",
//  "タモリ" => "男性",
//  "松嶋菜々子" => "女性",
//  "ふかきょん" => "女性",
//  "あいみょん" => "女性",
// );


?>







<?php
// $member = array(
//   "キムタク",
//   "所ジョージ",
// 	"タモリ"
// 	"松嶋菜々子"
// 	"ふかきょん"
// 	"あいみょん"
// );
//
// $sex = array(
// "キムタク" => '男性'
// "所ジョージ"　=> '男性'
// "タモリ"　=> '男性'
// "松嶋菜々子" => '女性'
// "ふかきょん"　 => '女性'
// "あいみょん"　 => '女性'
// );
// for($i = 0, $member = count($sex); $i < $member; $i++)
// var_dump($member);
?>

</body>
 </html>
