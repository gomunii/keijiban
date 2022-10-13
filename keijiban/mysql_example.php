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
<!-- 問1 -->
<?php
// MySQLクエリを作成
$query = "SELECT * FROM players;";
// クエリを発行, 接続情報が入った$mysqlが第一引数、クエリの文字列が第二引数
// 返り値（見つかったデータ）が$datasに入る
$datas = mysqli_query($mysql, $query);
?>
<!-- 回答準備のテーブルをHTML直書き -->
<table border="1">
  <tr>
    <th>ユニフォーム番号</th>
    <th>選手名</th>
    <th>クラブチーム名</th>
  </tr>
<?php
// $datasが空じゃなければ（データが見つかっていれば）
if(!empty($datas)) {

  // $datas配列を頭から回していき、一行ずつデータを$dataに代入する
  // ※ データが無くなり次第falseになりwhileから抜ける
  while ($data = mysqli_fetch_assoc($datas)) {

    // ループ。上から順に取り出していくので回答となるデータを出力する
    echo "<tr>";
    echo "<td>".$data["uniform_num"]."</td>";
    echo "<td>".$data["name"]."</td>";
    echo "<td>".$data["club"]."</td>";
    echo "</tr>";
  }

// $datasが空だった場合の処理
} else {
  // 空だったぞメッセージ行(tr)の作成＆出力
  echo "<tr><td colspan='3'>データが見つかりませんでした。</td></tr>";
}
?>
</table>
<!-- 問1の終了 -->


</body>
</html>
