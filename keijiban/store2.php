<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>店舗管理</title>
</head>
<body>

<a href="./store1.php"><input type="submit" value="店舗一覧"/>
</a>
<a href="./store3.php"><input type="submit" value="タイムカード"/>
</a>
<hr>
<h1>従業員一覧</h1>

<?php
$mysql = mysqli_connect('db','root','root',);
$db_selected = mysqli_select_db($mysql, 'store_db');

?>
<table>
  <tr>
   <th align="left">
    <form action="store2.php" method = "GET" >
      名前検索
      <input type = "text" name = "search">

      <input type="submit" value="検索">
      <input type="reset" value="リセット">
    </form>
  </th>
  </tr>
</table>
<br />
<table>

  <tr>
   <th>
    <form action="store2.php" method = "GET" >
   </th>
  </tr>

  <tr>
   <th align="left">
    名前
    <input type = "text" name = "name">
   </th>
  </tr>

  <tr>
   <th align="left">
    カナ
    <input type = "text" name = "namekana">
   </th>
  </tr>

  <tr>
   <th align="left">
    性別
    <label>
    <input type = "radio" name="sex" value = "1"> 男
    </label>
    <label>
    <input type = "radio" name="sex" value = "2"> 女
    </label>
   </th>
  </tr>

  <tr>
   <th align="left">
    生年月日
    <select name="birthyear">
    <option value="">-</option>
    <option value="1940">1940</option>
    <option value="1941">1941</option>
    <option value="1942">1942</option>
    <option value="1943">1943</option>
    <option value="1944">1944</option>
    <option value="1945">1945</option>
    <option value="1946">1946</option>
    <option value="1947">1947</option>
    <option value="1948">1948</option>
    <option value="1949">1949</option>
    <option value="1950">1950</option>
    <option value="1951">1951</option>
    <option value="1952">1952</option>
    <option value="1953">1953</option>
    <option value="1954">1954</option>
    <option value="1955">1955</option>
    <option value="1956">1956</option>
    <option value="1957">1957</option>
    <option value="1958">1958</option>
    <option value="1959">1959</option>
    <option value="1960">1960</option>
    <option value="1961">1961</option>
    <option value="1962">1962</option>
    <option value="1963">1963</option>
    <option value="1964">1964</option>
    <option value="1965">1965</option>
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    </select>年
    <select name="birthmonth">
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
    <select name="birthday">
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
    所属
    <input type = "text" name = "affiliation">
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
    郵便番号
    <input type = "text" name = "postcode">
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
    入社日
    <select name="hireyear">
    <option value="">-</option>
    <option value="1940">1940</option>
    <option value="1941">1941</option>
    <option value="1942">1942</option>
    <option value="1943">1943</option>
    <option value="1944">1944</option>
    <option value="1945">1945</option>
    <option value="1946">1946</option>
    <option value="1947">1947</option>
    <option value="1948">1948</option>
    <option value="1949">1949</option>
    <option value="1950">1950</option>
    <option value="1951">1951</option>
    <option value="1952">1952</option>
    <option value="1953">1953</option>
    <option value="1954">1954</option>
    <option value="1955">1955</option>
    <option value="1956">1956</option>
    <option value="1957">1957</option>
    <option value="1958">1958</option>
    <option value="1959">1959</option>
    <option value="1960">1960</option>
    <option value="1961">1961</option>
    <option value="1962">1962</option>
    <option value="1963">1963</option>
    <option value="1964">1964</option>
    <option value="1965">1965</option>
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    </select>年
    <select name="hiremonth">
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
    <select name="hireday">
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
   <th>
    <label>
    <input type = "radio" name="employment" value = "1"> 正社員
    </label>
    <label>
    <input type = "radio" name="employment" value = "2"> アルバイト
    </label>
    <label>
    <input type = "radio" name="employment" value = "3"> パート
    </label>
    <label>
    <input type = "radio" name="employment" value = "4"> 契約社員
    </label>
   </th>
  </tr>

  <tr>
   <th align="left">
    メールアドレス
    <input type = "email" name = "email">
   </th>
  </tr>
  <?php
  $store_id = $_GET['store_id'];
  $storename = $_GET['storename'];
  ?>
  <input type="hidden" name="store_id" value="<?php echo $store_id ;?>"/>
  <input type="hidden" name="storename" value="<?php echo $storename ;?>"/>
</table>

<br />
<input type="submit" value="送信">
<input type="reset" value="リセット">
</form>
<hr>

<?php
if(empty($_GET))
{
  $query = "SELECT COUNT(employee_id) AS employees_id FROM employees";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {
      echo "<h3>"."従業員数"."$data[employees_id]"."人"."</h3>";
    }
  }

  $query = "SELECT * FROM employees ORDER BY employee_id DESC;";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {
      ?>
      <br />
      <table border="3">
        <?php
        echo "<tr>";
        echo "<th>";
        echo "名前";
        echo "</th>";
        echo "<td>";
        echo "$data[name]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "性別";
        echo "</th>";
        echo "<td>";
        if($data['sex'] == 1)
        {
          echo "男";
        }
        else
        {
          echo "女";
        }
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "誕生日";
        echo "</th>";
        echo "<td>";
        echo "$data[birth]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "所属";
        echo "</th>";
        echo "<td>";
        echo "$data[affiliation]";
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
        echo "入社日";
        echo "</th>";
        echo "<td>";
        echo "$data[hire]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "雇用形態";
        echo "</th>";
        echo "<td>";
        if($data['employment'] == 1)
        {
          echo "正社員";
        }
        if($data['employment'] == 2)
        {
          echo "アルバイト";
        }
        if($data['employment'] == 3)
        {
          echo "パート";
        }
        if($data['employment'] == 4)
        {
          echo "契約社員";
        }
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "メールアドレス";
        echo "</th>";
        echo "<td>";
        echo "$data[email]";
        echo "</td>";
        echo "</tr>";

        ?>
        <tr>
          <th>
            <form action="store_edit.php" method="GET">
              <input type="hidden" name="employee_id" value="<?php echo $data['employee_id'];?>"/>
              <input type="submit" value="編集 *管理者専用">
            </form>
          </th>
        </tr>
        <?php

      echo "</table>";
    }
  }
}
$storename = $_GET['storename'];
$search = $_GET['search'];
$store_id = $_GET['store_id'];
$name = $_GET['name'];
$namekana = $_GET['namekana'];
$sex = $_GET['sex'];
$birth = $_GET['birthyear']."-";
$birth .= $_GET['birthmonth']."-";
$birth .= $_GET['birthday'];
$birth .= " 00:00:00";
$affiliation = $_GET['affiliation'];
$house = $_GET['house'];
$postcode = $_GET['postcode'];
$phonenumber = $_GET['phonenumber'];
$hire = $_GET['hireyear']."-";
$hire .= $_GET['hiremonth']."-";
$hire .= $_GET['hireday'];
$hire .= " 00:00:00";
$employment = $_GET['employment'];
$email = $_GET['email'];

if(!empty($search))
{
  $query = "SELECT COUNT(employee_id) AS employees_id FROM employees WHERE name LIKE '%$search%'";
  $datas = mysqli_query($mysql,$query);
  if(!empty($datas))
  {
    while($data = mysqli_fetch_assoc($datas))
    {
      echo "<h3>"."従業員数"."$data[employees_id]"."人"."</h3>";
    }
  }


  $query = "SELECT * FROM employees WHERE name LIKE '%$search%';";
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
        echo "名前";
        echo "</th>";
        echo "<td>";
        echo "$data[name]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "性別";
        echo "</th>";
        echo "<td>";
        if($data['sex']=1)
        {
          echo "男";
        }
        else
        {
          echo "女";
        }
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "誕生日";
        echo "</th>";
        echo "<td>";
        echo "$data[birth]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "所属";
        echo "</th>";
        echo "<td>";
        echo "$data[affiliation]";
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
        echo "入社日";
        echo "</th>";
        echo "<td>";
        echo "$data[hire]";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "雇用形態";
        echo "</th>";
        echo "<td>";
        if($data['employment'] == 1)
        {
          echo "正社員";
        }
        if($data['employment'] == 2)
        {
          echo "アルバイト";
        }
        if($data['employment'] == 3)
        {
          echo "パート";
        }
        if($data['employment'] == 4)
        {
          echo "契約社員";
        }
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo "メールアドレス";
        echo "</th>";
        echo "<td>";
        echo "$data[email]";
        echo "</td>";
        echo "</tr>";

        ?>
        <tr>
          <th>
            <form action="store_edit.php" method="GET">
              <input type="hidden" name="employee_id" value="<?php echo $data['employee_id'];?>"/>
              <input type="submit" value="編集 *管理者専用">
            </form>
          </th>
        </tr>
        <?php

      echo "</table>";
    }
  }
}
if(!empty($search))
{
exit;
}

if(!empty($name) && !empty($namekana))
{
  $query = "INSERT INTO employees
  (employee_id,store_id,name,namekana,sex,birth,affiliation,house,postcode,
    phonenumber,hire,employment,email)
  VALUES
  (NULL,$store_id,'$name','$namekana',$sex,'$birth','$affiliation','$house',
    $postcode,'$phonenumber','$hire',$employment,'$email')";
  mysqli_query($mysql,$query);
}

$query = "SELECT COUNT(employee_id) AS employees_id FROM employees WHERE store_id=$store_id";
$datas = mysqli_query($mysql,$query);
if(!empty($datas))
{
  echo "<h2>".$storename."</h2>";
  while($data = mysqli_fetch_assoc($datas))
  {
    echo "<h3>"."従業員数"."$data[employees_id]"."人"."</h3>";
  }
}

$query = "SELECT * FROM employees  WHERE store_id=$store_id ORDER BY employee_id DESC ;";
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
      echo "名前";
      echo "</th>";
      echo "<td>";
      echo "$data[name]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "性別";
      echo "</th>";
      echo "<td>";
      if($data['sex']==1)
      {
        echo "男";
      }
      else
      {
        echo "女";
      }
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "誕生日";
      echo "</th>";
      echo "<td>";
      echo "$data[birth]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "所属";
      echo "</th>";
      echo "<td>";
      echo "$data[affiliation]";
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
      echo "入社日";
      echo "</th>";
      echo "<td>";
      echo "$data[hire]";
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "雇用形態";
      echo "</th>";
      echo "<td>";
      if($data['employment']==1)
      {
        echo "正社員";
      }
      if($data['employment']==2)
      {
        echo "アルバイト";
      }
      if($data['employment']==3)
      {
        echo "パート";
      }
      if($data['employment']==4)
      {
        echo "契約社員";
      }
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>";
      echo "メールアドレス";
      echo "</th>";
      echo "<td>";
      echo "$data[email]";
      echo "</td>";
      echo "</tr>";
      ?>
      <tr>
        <th>
          <form action="store_edit.php" method="GET">
          <input type="hidden" name="employee_id" value="<?php echo $data['employee_id'];?>"/>
          <input type="submit" value="編集 *管理者専用">
        </form>
        </th>
      </tr>
      <?php
    echo "</table>";

  }
}
?>





</body>
</html>
