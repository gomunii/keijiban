<html>
<head>
  <title>MySQLの練習</title>
</head>
<body>
<?php

// データベースへの接続を開始（Dockerだからdbだけど大抵はlocalhostと書く）
// 参照 https://qiita.com/gat3ta/items/562e227e1c778445cced
$mysql = mysqli_connect('db', 'root', 'root');
if (!$mysql) {
    echo "接続に失敗しました".mysql_error();
    exit;
}
echo '<p>接続に成功しました。</p>';

// データベースの選択 use mysql_lesson; の事
$db_selected = mysqli_select_db($mysql, 'mysql_lesson');
if (!$db_selected){
  echo "データベースの選択に失敗しました".mysqli_error();
  exit;
}

echo '<p>データベースの選択に成功しました。</p>';

//以降、DB接続の返り値を入れた下記変数を使いDBを操作していく
$mysql; // ←こいつ超重要

?>

<!--
ここから練習問題を解く
※ 古い回答を下へ。今やってる問題が一番上にくるように書いた方が楽。
-->
<hr />
<!-- 問36 -->

<?php
$query = "SELECT distinct goals.goal_time ,players.uniform_num,players.position,players.name FROM goals LEFT JOIN players ON goals.player_id = players.id ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ゴール時間</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["goal_time"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問35 -->

<?php
$query = "SELECT distinct countries.name AS x ,players.name AS y , goal_time  FROM players INNER JOIN countries ON
players.country_id = countries.id INNER JOIN pairings ON countries.id = pairings.my_country_id INNER JOIN goals ON
pairings.id = goals.pairing_id ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>国名</th>
    <th>名前</th>
    <th>ゴール時間<th>
  </tr>
<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {
// var_dump($data);
// exit;

  echo "<tr>";
  echo "<td>".$data["x"]."</td>";
  echo "<td>".$data["y"]."</td>";
  echo "<td>".$data["goal_time"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />



<!-- 問34 -->

<?php
$query = "SELECT distinct countries.name AS x ,players.uniform_num,players.name AS y FROM players INNER JOIN countries ON players.country_id = countries.id;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>国名</th>
    <th>背番号</th>
    <th>名前</th>
  </tr>
<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {
// var_dump($data);
// exit;

  echo "<tr>";
  echo "<td>".$data["x"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["y"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問33 -->
<?php
$query = "SELECT SUM(ranking) FROM countries WHERE group_name = 'C';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>FIFAランキング</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["SUM(ranking)"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />


<!-- 問32 -->

<?php
$query = "SELECT MIN(ranking) FROM countries WHERE group_name = 'A';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>FIFAランキング</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["MIN(ranking)"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問31 -->
<?php
$query = "SELECT MAX(height),MAX(weight) FROM players;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["MAX(height)"]."</td>";
  echo "<td>".$data["MAX(weight)"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />


<!-- 問30 -->

<?php
$query = "SELECT COUNT(player_id) AS goal FROM goals ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>選手ID</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data['goal']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問29 -->

<?php
$query = "SELECT  COUNT(player_id) AS goal FROM goals WHERE player_id >= '714' AND player_id <= '736';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>選手ID</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data['goal']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問28 -->
<?php
$query = "SELECT AVG(height) , AVG(weight) FROM players;";
$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["AVG(height)"]."</td>";
  echo "<td>".$data["AVG(weight)"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />



<!-- 問27 -->

<?php
$query = "SELECT id,pairing_id,goal_time,player_id, (CASE WHEN(player_id IS NULL)  THEN '9999' ELSE player_id END) AS goal FROM goals ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>対戦テーブルID</th>
    <th>選手ID</th>
    <th>ゴール時間</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

   /**
    * 今はMYSQLの練習のみのウェブサイトみてるから
    *　頭がMYSQLのみにいってるかもしれんけど、
    *あくまでここはPHPだから
    *PHPがつかえるわけで
    *　もしクエリで表現できなくても
    *　こういう手もあるぞというのを教えておく
    * これ９９９９のときはプレイヤーIDなにになるの？
    * NULL　おk
    */

    //デフォで＄リザルトはプレイヤーIDつっこんどく
   // $result = $data["player_id"];
   //
   // //ただ、からの場合がある（おうんゴール時）
   // if(empty($result)) {
   //   //その場合は９９９９にクエリのほうでしといたから、goal参照しといて。
   //   $result = $data["goal"];
   // }

  echo "<tr>";
  echo "<td>".$data['id']."</td>";
  echo "<td>".$data['pairing_id']."</td>";
  echo "<td>".$data['goal']."</td>";
  echo "<td>".$data['goal_time']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />


<!-- 問26 -->

<?php
$query = "SELECT id,pairing_id,goal_time, IFNULL(player_id,'9999') FROM goals;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>対戦テーブルID</th>
    <th>選手ID</th>
    <th>ゴール時間</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data['id']."</td>";
  echo "<td>".$data['pairing_id']."</td>";
  echo "<td>".$data["IFNULL(player_id,'9999')"]."</td>";
  echo "<td>".$data['goal_time']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問25 -->
<?php
$query = "SELECT DATE_FORMAT(birth,'2017:04:30') AS  x FROM players ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["SUBSTRING(position,1,1)"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["x"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />


<!-- 問24 -->
<?php

$query = "SELECT * FROM countries ORDER BY CHAR_LENGTH(name) DESC ;";
$datas = mysqli_query($mysql, $query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>


<?php
if(!empty($datas)) {

  while($data = mysqli_fetch_assoc($datas)) {

    echo "<tr>";
    echo "<td>".$data["id"]."</td>";
    echo "<td>".$data["name"]."</td>";
    echo "<td>".$data["ranking"]."</td>";
    echo "<td>".$data["group_name"]."</td>";
    echo "</tr>";
  }
}

else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>

</table>

<hr />

<!-- 問23 -->

<?php
$query = "SELECT SUBSTRING(position,1,1) FROM players;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["SUBSTRING(position,1,1)"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問22 -->
<?php
$query = "SELECT * FROM players ORDER BY height DESC , weight DESC;";
$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>ID:</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問21 -->
<?php
$query = "SELECT * FROM players ORDER BY birth DESC ;";
$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問20 -->
<?php

$query = "SELECT * FROM countries ORDER BY ranking ;";
$datas = mysqli_query($mysql, $query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>


<?php
if(!empty($datas)) {

  while($data = mysqli_fetch_assoc($datas)) {

    echo "<tr>";
    echo "<td>".$data["id"]."</td>";
    echo "<td>".$data["name"]."</td>";
    echo "<td>".$data["ranking"]."</td>";
    echo "<td>".$data["group_name"]."</td>";
    echo "</tr>";
  }
}

else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>

</table>

<hr />

<!-- 問19 -->
<?php
$query = "SELECT name, club, (height + weight) AS x FROM players;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>体力指数</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["体力指数"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問18 -->
<?php
$query = "SELECT CONCAT(name, '選手のポジションは\'', position, '\'です') AS player FROM players;";

$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>名前、ポジション</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["player"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問17 -->
<?php
$query = "SELECT name, club, (height + weight) as goukei FROM players  ;";
$datas = mysqli_query($mysql,$query,);
?>

<table border="1">
  <tr>
    <th>ID***</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>身長+体重</th>
  </tr>
<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {


  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["goukei"]."</td>";

  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問16 -->
<?php
$query = "SELECT DISTINCT position FROM players ;";
$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>ポジション</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["position"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問15 -->
<?php
$query = "SELECT * FROM players WHERE (position = 'FW' OR position = 'MF') AND height < '170';";
$datas = mysqli_query($mysql,$query);

?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問14 -->
<?php
$query = "SELECT * FROM players WHERE height < '165' OR weight < '60';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />
<!-- 問13 -->
<?php
$query = "SELECT * FROM players WHERE weight / POW( (height /100) , 2) >=20 AND weight / POW( (height /100) , 2) < 21;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問12 -->
<?php

$query = "SELECT * FROM countries WHERE NOT group_name = 'A';";
$datas = mysqli_query($mysql, $query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>


<?php
if(!empty($datas)) {

  while($data = mysqli_fetch_assoc($datas)) {

    echo "<tr>";
    echo "<td>".$data["id"]."</td>";
    echo "<td>".$data["name"]."</td>";
    echo "<td>".$data["ranking"]."</td>";
    echo "<td>".$data["group_name"]."</td>";
    echo "</tr>";
  }
}

else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>

</table>

<hr />

<!-- 問11 -->
<?php
$query = "SELECT * FROM players WHERE name LIKE '%ニョ%';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />
<!-- 問10 -->
<?php
$query = "SELECT * FROM players WHERE name LIKE '%ニョ';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問9 -->
<?php
$query = "SELECT * FROM goals WHERE player_id IS NOT NULL ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>対戦テーブルID</th>
    <th>選手ID</th>
    <th>ゴール時間</th>
  </tr>

<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data['id']."</td>";
  echo "<td>".$data['pairing_id']."</td>";
  echo "<td>".$data['player_id']."</td>";
  echo "<td>".$data['goal_time']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />
<!-- 問8 -->
<?php
$query = "SELECT * FROM goals WHERE player_id IS NULL ;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>対戦テーブルID</th>
    <th>選手ID</th>
    <th>ゴール時間</th>
  </tr>

<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data['id']."</td>";
  echo "<td>".$data['pairing_id']."</td>";
  echo "<td>".$data['player_id']."</td>";
  echo "<td>".$data['goal_time']."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問7 -->
<?php
$query = "SELECT * FROM players WHERE position IN ('GK','DF','MF');";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問6 -->
<?php
$query = "SELECT * FROM countries WHERE ranking BETWEEN '36' AND '56';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["ranking"]."</td>";
  echo "<td>".$data["group_name"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問5 -->
<?php
$query = "SELECT * FROM players WHERE height < '170';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問4 -->
<?php
$query = "SELECT * FROM  players WHERE birth <= '1976-01-13';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国テーブルID</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属クラブ</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
  </tr>
<?php
if(!empty($datas)) {
 while($data = mysqli_fetch_assoc($datas)) {
  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["country_id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["position"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "<td>".$data["birth"]."</td>";
  echo "<td>".$data["height"]."</td>";
  echo "<td>".$data["weight"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。<td><tr>";
}
?>
</table>

<hr />

<!-- 問3 -->
<?php
$query = "SELECT * FROM countries WHERE group_name != 'C';";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>

<?php
if(!empty($datas)) {

 while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["ranking"]."</td>";
  echo "<td>".$data["group_name"]."</td>";
  echo "<tr>";
 }
}
else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>

<hr />

<!-- 問2 -->
<?php

$query = "SELECT * FROM countries WHERE group_name = 'C';";
// クエリを発行, 接続情報が入った$mysqlが第一引数、クエリの文字列が第二引数
// 返り値（見つかったデータ）が$datasに入る
$datas = mysqli_query($mysql, $query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>国名</th>
    <th>FIFAランキング</th>
    <th>グループ</th>
  </tr>


<?php
if(!empty($datas)) {

  while($data = mysqli_fetch_assoc($datas)) {

    echo "<tr>";
    echo "<td>".$data["id"]."</td>";
    echo "<td>".$data["name"]."</td>";
    echo "<td>".$data["ranking"]."</td>";
    echo "<td>".$data["group_name"]."</td>";
    echo "</tr>";
  }
}

else {
 echo "<tr><td colspan = '3'>データが見つかりませんでした。</td></tr>";
}
?>

</table>

<hr />

<?php
// 問1
$query = "SELECT * FROM players;";
$datas = mysqli_query($mysql,$query);
?>

<table border="1">
  <tr>
    <th>ID</th>
    <th>背番号</th>
    <th>名前</th>
    <th>所属チーム</th>
  </tr>

<?php
if(!empty($datas)) {

  while($data = mysqli_fetch_assoc($datas)) {

  echo "<tr>";
  echo "<td>".$data["id"]."</td>";
  echo "<td>".$data["uniform_num"]."</td>";
  echo "<td>".$data["name"]."</td>";
  echo "<td>".$data["club"]."</td>";
  echo "</tr>";
  }
}
else {
 echo "<tr><td colspan = '3'> データが見つかりませんでした。</td></tr>";
}
?>

</table>
</body>
</html>
