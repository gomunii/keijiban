<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>店舗管理</title>
</head>
<body>

<a href="./store2.php"><input type="submit" value="従業員一覧"/>
</a>
<a href="./store3.php"><input type="submit" value="タイムカード"/>
</a>
<hr>
<h1>わたるの店舗管理</h1>
<table>

  <tr>
   <th>
    <form action="store1.php" method = "POST" >
   </th>
  </tr>

  <tr>
   <th align="left">
    店舗名検索
    <input type = "text" name = "search">

    <input type="submit" value="検索">
    <input type="reset" value="リセット">
    </form>
  </th>
  </tr>

</table>
<br />

<form action="store1.php" method = "POST" >
<table>
  <tr>
   <th align="left">
    店舗名
    <input type = "text" name = "storename">
   </th>
  </tr>
  <tr>
   <th align="left">
    郵便番号（ハイフンなし）
    <input type = "text" name = "postcode">
   </th>
  </tr>

  <tr>
   <th align="left">
    住所
    <input type = "text" name = "house">
   </th>
  </tr>

  <tr>
   <th align="left">
    電話番号
    <input type = "text" name = "phonenumber">
   </th>
  </tr>

  <tr>
   <th align="left">
    FAX
    <input type = "text" name = "fax">
   </th>
  </tr>

  <tr>
   <th align="left">
    オープン日
    <select name="openingyear">
    <option value="">-</option>
    <?php for($i=1940; $i<=2022; $i++) { ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
    </select>年
    <select name="openingmonth">
    <option value="">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    </select> 月
    <select name="openingday">
    <option value="">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    </select> 日
   </th>
  </tr>

  <tr>
   <th align="left">
    担当者
    <input type = "text" name = "manager">
   </th>
  </tr>

</table>


<br />
<input type="submit" value="送信">
<input type="reset" value="リセット">
</form>
<hr>

<?php
$search = $_POST['search'];
$storename = $_POST['storename'];
$postcode = $_POST['postcode'];
$house = $_POST['house'];
$phonenumber = $_POST['phonenumber'];
$fax = $_POST['fax'];
$opening = $_POST['openingyear']."-";
$opening .= $_POST['openingmonth']."-";
$opening .= $_POST['openingday'];
$opening .= " 00:00:00";
$manager = $_POST['manager'];


$mysql = mysqli_connect('db','root','root',);
$db_selected = mysqli_select_db($mysql, 'store_db');


if(!empty($search))
{
  $query = "SELECT * FROM stores WHERE storename LIKE '%$search%' OR house LIKE '%$search%';";

  $datas = mysqli_query($mysql,$query);
  if(!empty($datas)) {
    while($data = mysqli_fetch_assoc($datas))
    {
      ?>
      <br />
      <table border="3">
        <?php
        echo "<tr>";
        echo "<th>";
        echo "店舗名";
        ?>
        <form action="store2.php" method = "GET">
          <input type="hidden" name="store_id" value="<?php echo $data['store_id'] ;?>"/>
          <input type="hidden" name="storename" value="<?php echo $data['storename'] ;?>"/>
          <input type="submit" value="従業員を見る"/>
        </form>
        <form action="store_sales.php" method = "GET">
          <input type="hidden" name="store_id" value="<?php echo $data['store_id'] ;?>"/>
          <input type="submit" value="損益計算書"/>
        </form>
        <?php
        echo "</th>";
        echo "<td>";
        echo "$data[storename]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "郵便番号";
        echo "</th>";
        echo "<td>";
        echo "$data[postcode]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "住所";
        echo "</th>";
        echo "<td>";
        echo "$data[house]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "電話番号";
        echo "</th>";
        echo "<td>";
        echo "$data[phonenumber]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "FAX";
        echo "</th>";
        echo "<td>";
        echo "$data[fax]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "オープン日";
        echo "</th>";
        echo "<td>";
        echo "$data[opening]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "担当者";
        echo "</th>";
        echo "<td>";
        echo "$data[manager]";
        echo "</td>";
        echo "</tr>";
      echo "</table>";
    }
  }
}

if(!empty($search))
{
exit;
}

if(!empty($storename) && !empty($postcode) && !empty($house) && empty($search))
{
  $query = "INSERT INTO stores
  (store_id,storename,postcode,house,phonenumber,fax,opening,manager)
  VALUES
  (NULL,'$storename',$postcode,'$house','$phonenumber','$fax','$opening','$manager')";
  mysqli_query($mysql,$query);
}


$query = "SELECT stores.store_id,storename,stores.postcode,stores.house,
          stores.phonenumber,fax,opening,manager,COUNT(employees.employee_id) as staff_num
          FROM stores LEFT JOIN employees
          ON stores.store_id = employees.store_id
          GROUP BY stores.store_id
          ORDER BY stores.store_id DESC;";
// $query = "SELECT * FROM stores ORDER BY store_id DESC ;";
// var_dump($query);
$datas = mysqli_query($mysql,$query);

if(!empty($datas)) {
  while($data = mysqli_fetch_assoc($datas))
  {
    ?>
    <br />
    <form action="store2.php" method = "GET">
      <input type="hidden" name="store_id" value="<?php echo $data['store_id'] ;?>"/>
    </form>
    <table border="3">
      <?php
      echo "<tr>";
      echo "<th>";
      echo "ID";
      echo "</th>";
      echo "<td>";
      echo "$data[store_id]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "店舗名";
      ?>
      <form action="store2.php" method = "GET">
        <input type="hidden" name="store_id" value="<?php echo $data['store_id'] ;?>"/>
        <input type="hidden" name="storename" value="<?php echo $data['storename'] ;?>"/>
        <input type="submit" value="従業員を見る"/>
      </form>
      <form action="store_sales.php" method = "GET">
        <input type="hidden" name="store_id" value="<?php echo $data['store_id'] ;?>"/>
        <input type="submit" value="損益計算書"/>
      </form>
      <?php
      echo "</th>";
      echo "<td>";
      echo "$data[storename]";
      echo "</td>";
      echo "</tr>";


      echo "<tr>";
      echo "<th>";
      echo "郵便番号";
      echo "</th>";
      echo "<td>";
      echo "$data[postcode]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "住所";
      echo "</th>";
      echo "<td>";
      echo "$data[house]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "電話番号";
      echo "</th>";
      echo "<td>";
      echo "$data[phonenumber]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "FAX";
      echo "</th>";
      echo "<td>";
      echo "$data[fax]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "オープン日";
      echo "</th>";
      echo "<td>";
      echo "$data[opening]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "担当者";
      echo "</th>";
      echo "<td>";
      echo "$data[manager]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "従業員数";
      echo "</th>";
      echo "<td>";
      echo "$data[staff_num]";
      echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
}
?>
</body>
</html>
