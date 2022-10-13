
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>店舗管理</title>
</head>
<body>
  <h1>管理者編集画面</h1>
<?php
if(!empty($_GET['employee_id']))
{
?>
  <a href="./store2.php"><input type="submit" value="従業員一覧"/>
  </a>
  <hr>
  <table>

    <tr>
     <th>
      <form action="store_edit.php" method = "GET" >
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

    <tr>
     <th align="left">
      管理者パス
      <input type = "password" name = "pass">
     </th>
    </tr>

    <?php
    $employee_id = $_GET['employee_id'];
    ?>
    <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>"/>

  </table>

  <br />
  <input type="submit" value="編集完了">
  <button type="button" onclick=history.back()>戻る</button>
  </form>
  <hr>

  <?PHP
  $employee_id = $_GET['employee_id'];
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
  $pass = $_GET['pass'];


  if($pass == 5621)
  {
    $mysql = mysqli_connect('db','root','root',);
    $db_selected = mysqli_select_db($mysql, 'store_db');

    $query = "UPDATE employees SET name = '$name' , namekana = '$namekana' , sex = $sex ,
              birth = '$birth' , affiliation = '$affiliation' , house = '$house' ,
              postcode = $postcode , phonenumber = '$phonenumber' , hire = '$hire' ,
              employment = $employment , email = '$email' WHERE employee_id = $employee_id;";
    mysqli_query($mysql,$query);

    if(!empty($name) && !empty($employment))
    {
      echo "編集が完了しました。";
    }
  }
  if( !empty($pass) && $pass != 5621){echo "エラー";}
  if(empty($pass)){echo "管理者パスを入力してください";}
}

if(!empty($_GET['time_id']))
{
  $attendance = $_GET['attendance'];
  $name = $_GET['name'];
  $time_id = $_GET['time_id'];
  $timer = $_GET['timer'];
?>
  <a href="./store3.php"><input type="submit" value="タイムカード"/>
  </a>
  <hr>

  <table>

    <tr>
     <th>
      <form action="store_edit.php" method = "GET" >
     </th>
    </tr>

    <input type="hidden" name="time_id" value="<?php echo $time_id ;?>"/>

    <tr>
     <th align="left">
      名前
      <input type = "text" name = "name" value="<?php echo $name ?>">
     </th>
    </tr>

    <tr>
     <th align="left">
      出退勤
      <select name="attendance">
      <option value="<?php echo $attendance ?>">
      <?php
      if($attendance == 1){echo "出勤";}
      if($attendance == 2){echo "休入";}
      if($attendance == 3){echo "休戻";}
      if($attendance == 4){echo "退勤";}
      ?>
    </option>
      <option value="1">出勤</option>
      <option value="2">休入</option>
      <option value="3">休戻</option>
      <option value="4">退勤</option>
      </select>
     </th>
    </tr>

    <tr>
     <th align="left">
      時間
      <input type = "text" name = "timer" value="<?php echo $timer ?>">
     </th>
    </tr>

    <tr>
     <th align="left">
      管理者パス
      <input type = "password" name = "pass">
     </th>
    </tr>

  </table>

  <input type="submit" value="編集完了">
  <button type="button" onclick=history.back()>戻る</button>
  </form>
  <hr>

  <?php
  $attendance = $_GET['attendance'];
  $name = $_GET['name'];
  $time_id = $_GET['time_id'];
  $timer = $_GET['timer'];
  $pass = $_GET['pass'];


  if($pass == 5621)
  {
    $mysql = mysqli_connect('db','root','root',);
    $db_selected = mysqli_select_db($mysql, 'store_db');

    $query = "UPDATE times SET attendance = $attendance , timer = '$timer' , name = '$name'
              WHERE time_id = $time_id;";
    mysqli_query($mysql,$query);

    if(!empty($attendance) && !empty($timer) && !empty($name))
    {
      echo "編集が完了しました。";
    }
  }
  if(!empty($pass && $pass != 5621)){echo "エラー";}
  if(empty($pass)){echo "管理者パスを入力してください";}
}
?>


</body>
</html>
