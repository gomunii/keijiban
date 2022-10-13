<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>店舗管理</title>
</head>
<body>

<a href="./store1.php"><input type="submit" value="店舗一覧"/>
</a>
<a href="./store2.php"><input type="submit" value="従業員一覧"/>
</a>
<hr>
<h1>タイムカード</h1>

<table>
  <tr>
   <th>
    <form action="store3.php" method = "POST" >
   </th>
  </tr>

  <tr>
   <th align="left">
    名前検索
    <input type = "text" name = "search">

    <input type="submit" value="検索">
    <input type="reset" value="リセット">
    </form>
  </th>
  </tr>
</table>
<br />

<?php
$mysql = mysqli_connect('db','root','root',);
$db_selected = mysqli_select_db($mysql, 'store_db');

$search = $_POST['search'];
if(!empty($search))
{
echo "<hr>";
  $query = "SELECT * FROM times WHERE name LIKE '%$search%';";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {
      ?>
      <table border="3">
        <?php
        echo "<tr>";
        echo "<td>";
        echo "$data[time_id]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "$data[name]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        if($data['attendance'] == 1)
        {
          echo "出勤";
        }
        if($data['attendance'] == 2)
        {
          echo "休入";
        }
        if($data['attendance'] == 3)
        {
          echo "休戻";
        }
        if($data['attendance'] == 4)
        {
          echo "退勤";
        }
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "$data[timer]";
        echo "</td>";
        echo "</tr>";

        ?>
        <tr>
          <th>
            <form action="store_edit.php" method="GET">
              <input type="hidden" name="attendance" value="<?php echo $data['attendance'];?>"/>
              <input type="hidden" name="name" value="<?php echo $data['name'];?>"/>
              <input type="hidden" name="time_id" value="<?php echo $data['time_id'];?>"/>
              <input type="hidden" name="timer" value="<?php echo $data['timer'];?>"/>
              <input type="submit" value="編集 *管理者専用">
            </form>
          </th>
        </tr>
        <?php
    }
  }
  ?>
  </table>
  <?php
}

$query = "SELECT affiliation FROM employees GROUP BY affiliation;";
$datas = mysqli_query($mysql,$query);
?>

<table>
  <tr>
   <th>
    <form action="store3.php" method = "POST" >
   </th>
  </tr>

  <tr>
   <th align="left">
    所属
      <select  name = "search">
        <option value="" selected>選択してください</option>
        <?php
        if(!empty($datas))
        {
          while($data = mysqli_fetch_assoc($datas))
          {
            ?><option >
            <?php
            echo $data['affiliation'];
            ?></option><?php
          }
        }
        ?>
        </select>
        <input type="submit" value="送信">
</form>
<form action="store3.php" method = "POST" >
    <?php
    $search = ($_POST['search']);

    $query = "SELECT * FROM employees WHERE affiliation = '$search' ;";
    $datas = mysqli_query($mysql,$query);
    ?>

      <tr>
       <th align="left">
        名前
          <select  name = "name">
            <option value="" selected>選択してください</option>
            <?php
            if(!empty($datas))
            {
              while($data = mysqli_fetch_assoc($datas))
              {
                ?>

                <option>
                <?php
                echo $data['name'];
                ?>
                </option>
            </select>
            <input type="hidden" name="employee_id" value="<?php echo $data['employee_id'];?>">
            <?php
              }
            }
            ?>
    <input type="submit" value="送信">
    <input type="reset" value="リセット">
    </form>
  </th>
  </tr>
</table>
<br />
<?php
  $name = $_POST['name'];
  $employee_id = $_POST['employee_id'];
?>
<table>
  <tr>
    <td>
    <form action="store3.php" method = "POST" >
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
      <label><input type="submit" name='attendance' value="1">出勤</label>
    </form>
    <form action="store3.php" method = "POST" >
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
      <label><input type="submit" name='attendance' value="2">休入</label>
    </form>
    <form action="store3.php" method = "POST" >
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
      <label><input type="submit" name='attendance' value="3">休戻</label>
    </form>
    <form action="store3.php" method = "POST" >
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
      <label><input type="submit" name='attendance' value="4">退勤</label>
    </form>
    </td>
  </tr>
</table>
<hr>
<?php


date_default_timezone_set('Asia/Tokyo');
$employee_id = $_POST['employee_id'];
$timer = date("Y-m-d H:i:s");
$attendance = $_POST['attendance'];
$name = $_POST['name'];

if(!empty($attendance) && !empty($name))
{
  $query = "INSERT INTO times
  (time_id,employee_id,attendance,timer,name)
  VALUES
  (NULL,$employee_id,$attendance,'$timer','$name')";
  mysqli_query($mysql,$query);
}

$query = "SELECT * FROM times ORDER BY time_id DESC ;";
$datas = mysqli_query($mysql,$query);
if(!empty($datas))
{
  while($data = mysqli_fetch_assoc($datas))
  {
    ?>
    <table border="3">
      <?php
      echo "<tr>";
      echo "<td>";
      echo "$data[time_id]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "$data[name]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      if($data['attendance'] == 1)
      {
        echo "出勤";
      }
      if($data['attendance'] == 2)
      {
        echo "休入";
      }
      if($data['attendance'] == 3)
      {
        echo "休戻";
      }
      if($data['attendance'] == 4)
      {
        echo "退勤";
      }
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "$data[timer]";
      echo "</td>";
      echo "</tr>";

      ?>
      <tr>
        <th>
          <form action="store_edit.php" method="GET">
          <input type="hidden" name="attendance" value="<?php echo $data['attendance'];?>"/>
          <input type="hidden" name="name" value="<?php echo $data['name'];?>"/>
          <input type="hidden" name="time_id" value="<?php echo $data['time_id'];?>"/>
          <input type="hidden" name="timer" value="<?php echo $data['timer'];?>"/>
          <input type="submit" value="編集 *管理者専用">
        </form>
        </th>
      </tr>
      <?php
  }
}
?>
</table>
</body>
</html>
