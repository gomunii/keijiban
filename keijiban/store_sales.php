<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>店舗管理</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<a href="./store1.php"><input type="submit" value="店舗一覧"/>
</a>
<hr>
<!-- <table>

  <tr>
   <th>
    <form action="store_sales.php" method = "GET" >
   </th>
  </tr>

  <tr>
   <th align="left">
    検索
    <input type = "text" name = "search">

    <input type="submit" value="送信">
    <input type="reset" value="リセット">
    </form>
  </th>
  </tr>

</table>

<hr> -->

<?php
$store_id = $_GET['store_id'];

?>
<table>
  <tr>
   <th>
    <form action="store_sales.php" method = "GET" >
   </th>
  </tr>

  <input type="hidden" name="store_id" value="<?php echo $store_id ;?>"/>

  <tr>
   <th align="left">
    店舗売上高
    <input type = "text" name = "storesales">
   </th>
  </tr>

  <tr>
   <th align="left">
    通販売上高
    <input type = "text" name = "ordersales">
   </th>
  </tr>

  <tr>
   <th align="left">
    売上高合計
    <input type = "text" name = "salessum">
   </th>
  </tr>

  <tr>
   <th align="left">
    仕入高
    <input type = "text" name = "purchasing">
   </th>
  </tr>

  <tr>
   <th align="left">
    売上原価
    <input type = "text" name = "cost">
   </th>
  </tr>

  <tr>
   <th align="left">
    売上総利益
    <input type = "text" name = "salesprofit">
   </th>
  </tr>

  <tr>
   <th align="left">
    給与手当
    <input type = "text" name = "salary">
   </th>
  </tr>

  <tr>
   <th align="left">
    法定福利費
    <input type = "text" name = "welfare">
   </th>
  </tr>

  <tr>
   <th align="left">
    旅費交通費
    <input type = "text" name = "travel">
   </th>
  </tr>

  <tr>
   <th align="left">
    広告宣伝費
    <input type = "text" name = "promotion">
   </th>
  </tr>

  <tr>
   <th align="left">
    発送配達費
    <input type = "text" name = "send">
   </th>
  </tr>

  <tr>
   <th align="left">
    支払手数料
    <input type = "text" name = "commission">
   </th>
  </tr>

  <tr>
   <th align="left">
    地代家賃
    <input type = "text" name = "rent">
   </th>
  </tr>

  <tr>
   <th align="left">
    修繕費
    <input type = "text" name = "repair">
   </th>
  </tr>

  <tr>
   <th align="left">
    通信費
    <input type = "text" name = "communication">
   </th>
  </tr>

  <tr>
   <th align="left">
    水道光熱費
    <input type = "text" name = "water">
   </th>
  </tr>

  <tr>
   <th align="left">
    保険料
    <input type = "text" name = "insurance">
   </th>
  </tr>

  <tr>
   <th align="left">
    備品消耗品費
    <input type = "text" name = "equipment">
   </th>
  </tr>

  <tr>
   <th align="left">
    諸会費
    <input type = "text" name = "dues">
   </th>
  </tr>

  <tr>
   <th align="left">
    雑費
    <input type = "text" name = "rough">
   </th>
  </tr>

  <tr>
   <th align="left">
    販売費及び一般管理費合計
    <input type = "text" name = "generalsum">
   </th>
  </tr>

  <tr>
   <th align="left">
    営業利益
    <input type = "text" name = "operating">
   </th>
  </tr>

  <tr>
   <th align="left">
    営業外収益合計
    <input type = "text" name = "non_operating">
   </th>
  </tr>

  <tr>
   <th align="left">
    営業外費用合計
    <input type = "text" name = "non_expenses">
   </th>
  </tr>

  <tr>
   <th align="left">
    経常利益
    <input type = "text" name = "ordinary">
   </th>
  </tr>

  <tr>
   <th align="left">
    特別利益合計
    <input type = "number" name = "specialbenefit">
   </th>
  </tr>

  <tr>
   <th align="left">
    特別損益合計
    <input type = "text" name = "specialloss">
   </th>
  </tr>

  <tr>
   <th align="left">
    税引前当期純利益
    <input type = "text" name = "tax">
   </th>
  </tr>

  <tr>
   <th align="left">
    当期純利益
    <input type = "text" name = "net_income">
   </th>
  </tr>
</table>

<br />
<input type="submit" value="送信">
<input type="reset" value="リセット">
</form>
<hr>

<?php
// $storesales = $_GET['storesales'];
// $ordersales = $_GET['ordersales'];
// $salessum = $_GET['salessum'];
// $purchasing = $_GET['purchasing'];
// $cost = $_GET['cost'];
// $salesprofit = $_GET['salesprofit'];
// $salary = $_GET['salary'];
// $welfare = $_GET['welfare'];
// $travel = $_GET['travel'];
// $promotion = $_GET['promotion'];
// $send = $_GET['send'];
// $commission = $_GET['commission'];
// $rent = $_GET['rent'];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];
// $ = $_GET[''];

$mysql = mysqli_connect('db','root','root',);
$db_selected = mysqli_select_db($mysql, 'store_db');
$store_id = $_GET['store_id'];
$sale = $_GET;
// itiou syoki ka.
$sales = "";
$values = "";

foreach ($sale as $key => $value)
{
  if($key === "store_id")
  {
    continue;
  }
  $sales .= ",".$key;
  $values .= ",".$value;
}

date_default_timezone_set('Asia/Tokyo');
$salesdate = date("Y-m-d");

//store_id ha douyatte tottekiteru no?
//store1karrahiddendemottekimasu

if(!empty($sales))
{

  $query = "INSERT INTO sales (sales_id,store_id,salesdate {$sales}) VALUES
            (NULL,$store_id,'$salesdate' {$values});";
  mysqli_query($mysql,$query);
}


?>
<table border="3" >
<?php
  echo "<tr>";
  echo "<th>";
  echo "";
  echo "</th>";


  echo "<td>";
  echo "店舗売上高";
  echo "</td>";


  echo "<td>";
  echo "通販売上高";
  echo "</td>";



  echo "<td>";
  echo "売上高合計";
  echo "</td>";



  echo "<td>";
  echo "仕入高";
  echo "</td>";



  echo "<td>";
  echo "売上原価";
  echo "</td>";



  echo "<td>";
  echo "売上総利益";
  echo "</td>";



  echo "<td>";
  echo "給与手当";
  echo "</td>";



  echo "<td>";
  echo "法定福利費";
  echo "</td>";



  echo "<td>";
  echo "旅費交通費";
  echo "</td>";



  echo "<td>";
  echo "広告宣伝費";
  echo "</td>";



  echo "<td>";
  echo "発送配達費";
  echo "</td>";



  echo "<td>";
  echo "支払手数料";
  echo "</td>";



  echo "<td>";
  echo "地代家賃";
  echo "</td>";



  echo "<td>";
  echo "修繕費";
  echo "</td>";



  echo "<td>";
  echo "通信費";
  echo "</td>";



  echo "<td>";
  echo "水道光熱費";
  echo "</td>";



  echo "<td>";
  echo "保険料";
  echo "</td>";



  echo "<td>";
  echo "備品消耗品費";
  echo "</td>";



  echo "<td>";
  echo "諸会費";
  echo "</td>";



  echo "<td>";
  echo "雑費";
  echo "</td>";



  echo "<td>";
  echo "販売費及び一般管理費合計";
  echo "</td>";



  echo "<td>";
  echo "営業利益";
  echo "</td>";



  echo "<td>";
  echo "営業外収益合計";
  echo "</td>";



  echo "<td>";
  echo "営業外費用合計";
  echo "</td>";



  echo "<td>";
  echo "経常利益";
  echo "</td>";



  echo "<td>";
  echo "特別利益合計";
  echo "</td>";



  echo "<td>";
  echo "特別損益合計";
  echo "</td>";



  echo "<td>";
  echo "税引前当期純利益";
  echo "</td>";



  echo "<td>";
  echo "当期純利益";
  echo "</td>";
  echo "</tr>";


  $query = "SELECT * FROM sales WHERE store_id = $store_id ORDER BY sales_id DESC ;";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {

      echo "<tr>";
      echo "<th>";
      echo $data['salesdate'];
      echo "</th>";



      echo "<td>";
      echo $data['storesales'];
      echo "</td>";



      echo "<td>";
      echo $data['ordersales'];
      echo "</td>";



      echo "<td>";
      echo $data['salessum'];
      echo "</td>";



      echo "<td>";
      echo $data['purchasing'];
      echo "</td>";



      echo "<td>";
      echo $data['cost'];
      echo "</td>";



      echo "<td>";
      echo $data['salesprofit'];
      echo "</td>";



      echo "<td>";
      echo $data['salary'];
      echo "</td>";



      echo "<td>";
      echo $data['welfare'];
      echo "</td>";



      echo "<td>";
      echo $data['travel'];
      echo "</td>";



      echo "<td>";
      echo $data['promotion'];
      echo "</td>";



      echo "<td>";
      echo $data['send'];
      echo "</td>";



      echo "<td>";
      echo $data['commission'];
      echo "</td>";



      echo "<td>";
      echo $data['rent'];
      echo "</td>";



      echo "<td>";
      echo $data['repair'];
      echo "</td>";



      echo "<td>";
      echo $data['communication'];
      echo "</td>";



      echo "<td>";
      echo $data['water'];
      echo "</td>";



      echo "<td>";
      echo $data['insurance'];
      echo "</td>";



      echo "<td>";
      echo $data['equipment'];
      echo "</td>";


      echo "<td>";
      echo $data['dues'];
      echo "</td>";



      echo "<td>";
      echo $data['rough'];
      echo "</td>";



      echo "<td>";
      echo $data['generalsum'];
      echo "</td>";



      echo "<td>";
      echo $data['operating'];
      echo "</td>";



      echo "<td>";
      echo $data['non_operating'];
      echo "</td>";



      echo "<td>";
      echo $data['non_expenses'];
      echo "</td>";



      echo "<td>";
      echo $data['ordinary'];
      echo "</td>";



      echo "<td>";
      echo $data['specialbenefit'];
      echo "</td>";



      echo "<td>";
      echo $data['specialloss'];
      echo "</td>";



      echo "<td>";
      echo $data['tax'];
      echo "</td>";



      echo "<td>";
      echo $data['net_income'];
      echo "</td>";
      echo "</tr>";
    }
  }

  echo "<tr>";
  echo "<th>";
  echo "合計";
  echo "</th>";

//   $sales = "";
//   $values = "";
//
//   foreach ($sale as $key => $value)
//   {
//     if($key === "store_id" || $key === "storesales")
//     {
//       continue;
//     }
//     $sales .= ",SUM(".$key.")";
//     $values .= ",".$value;
//   }
//
//   $query = "SELECT SUM(storesales) $sales FROM sales WHERE store_id = $store_id;";
//   $datas = mysqli_query($mysql,$query);
//
//   $sales = "";
//   $values = "";
//   if(!empty($datas))
//   {
//     while($data = mysqli_fetch_assoc($datas))
//     {
//       foreach ($sale as $key => $value)
//       {
//         if($key === "store_id")
//         {
//           continue;
//         }
//
//         echo "<td>";
//         echo $data["SUM($key)"];
//         echo "</td>";
//
//       }
//       break;
//     }
//   }
// echo "</tr>";
// echo "</table>";

$query = "SELECT SUM(storesales),SUM(ordersales),SUM(salessum),SUM(purchasing),
SUM(cost),SUM(salesprofit),SUM(salary),SUM(welfare),SUM(travel),SUM(promotion),
SUM(send),SUM(commission),SUM(rent),SUM(repair),SUM(communication),SUM(water),
SUM(insurance),SUM(equipment),SUM(dues),SUM(rough),SUM(generalsum),SUM(operating),
SUM(non_operating),SUM(non_expenses),SUM(ordinary),SUM(specialbenefit),
SUM(specialloss),SUM(tax),SUM(net_income) FROM sales WHERE store_id = $store_id;";
$datas = mysqli_query($mysql,$query);

if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {
      echo "<td>";
      echo $data["SUM(storesales)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(ordersales)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(salessum)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(purchasing)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(cost)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(salesprofit)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(salary)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(welfare)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(travel)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(promotion)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(send)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(commission)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(rent)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(repair)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(communication)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(water)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(insurance)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(equipment)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(dues)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(rough)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(generalsum)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(operating)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(non_operating)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(non_expenses)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(ordinary)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(specialbenefit)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(specialloss)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(tax)"];
      echo "</td>";

      echo "<td>";
      echo $data["SUM(net_income)"];
      echo "</td>";



    }
  }
?>
</table>

<script>
$("input[type='text']").each(function() {
  number = Math.floor(Math.random() * 100000)
  $(this).val(number);
});

$("input[name='ordersales']").blur(function() {
  number1 = $("input[name='storesales']").val();
  number2 = $("input[name='ordersales']").val();
  number1 = Number(number1);
  number2 = Number(number2);
  console.log(number1);
  console.log(number2);

  $("input[name='salessum']").val(number1+number2);

});


</script>

</body>
</html>
