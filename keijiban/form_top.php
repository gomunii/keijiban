<h2>お問い合わせフォーム</h2>

<hr/>

<form action = "./form_2.php" method = "GET">

名前　　
<input type = "text" name = "name">

<hr/>

名前（カナ）
<input type = "text" name = "kana">

<hr/>

性別　　
<label>
<input type = "radio" name="sex" value = "男"> 男
</label>
<label>
<input type = "radio" name="sex" value = "女"> 女
</label>

<hr/>

メールアドレス用 　
<input type = "email" name = "email">

<hr/>

メールアドレス確認用
<input type = "email" name = "email2">

<hr/>

電話番号
<input type = "text" name = "number">
<hr/>

年齢 　
<input type = "number" name = "age">

<hr/>

会社名
<input type = "text" name = "company">

<hr/>

郵便番号
<input type = "text" name = "post">

<hr/>

住所
<input type = "text" name = "address">


<hr/>

血液型
<select name="blood">
  <option value = "A"> A </option>
  <option value = "B"> B </option>
  <option value = "O"> O </option>
  <option value = "AB"> AB </option>
</select>

<hr/>


メッセージ
 <textarea name="memo" cols="30" rows="5"> </textarea>

<hr/>



<input type="submit" value="送信">
</form>
