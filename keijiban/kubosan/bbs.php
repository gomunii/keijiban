<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>久保掲示板</title>
  </head>
  <?php
  $mysql = mysqli_connect('db','root','root',);
  $db_selected = mysqli_select_db($mysql, 'kubokeijiban_db');


  $data["information_id"] = "";
  $data["name"] = "";
  $data["subject"] = "";
  $data["message"] = "";
  $data["image"] = "";
  $data["email"] = "";
  $data["url"] = "";
  $data["font_color"] = "";
  $data["edit"] = "";

  $target_action = "./confirm.php";

  // 編集モード
  if(!empty($_POST["edit_id"]) && !empty($_POST["keyword"])) {

    $edit_id = $_POST["edit_id"];
    $datas = mysqli_query($mysql,"SELECT * FROM informations WHERE information_id = '{$edit_id}';");
    $data = mysqli_fetch_assoc($datas);

    //編集コードとデータベースから取ってきたeditが違う場合は初期値も空にする
    if($data["edit"] !== $_POST["keyword"]) {
      $data = null;
    }
  }

  //返信モード
  if(!empty($_POST["re_info_id"])) {

    $datas = mysqli_query($mysql,"SELECT * FROM informations WHERE information_id = '{$_POST["re_info_id"]}';");
    $data = mysqli_fetch_assoc($datas);

    $information_id = $data["information_id"];
    $sub = $data["subject"];

    $data = null;

    $data["information_id"] = $information_id;
    $data["subject"] = "RE:".$sub;

    $target_action = "./re_confirm.php";
  }

  // 返信の編集モード

  if(!empty($_POST["reply_id"]) && !empty($_POST["keyword"])) {

    $reply_id = $_POST["reply_id"];
    $datas = mysqli_query($mysql,"SELECT * FROM replies WHERE reply_id = '{$reply_id}';");
    $data = mysqli_fetch_assoc($datas);

    if($data["edit"] !== $_POST["keyword"]) {
      $data = null;
    }

    $target_action = "./re_confirm.php";

  }

  ?>
  <body>

    <h1>久保掲示板</h1>

    <hr />

    <form action="<?php echo $target_action; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="information_id" value="<?php echo $data["information_id"]; ?>">
      <input type="hidden" name="reply_id" value="<?php echo $data["reply_id"]; ?>">
      <table>
        <tr>
          <th>名前</th>
          <td>
            <input type="text" name="name" value="<?php echo $data["name"]; ?>" required/>
          </td>
        </tr>
        <tr>
          <th>件名</th>
          <td>
            <input type="text" name="subject" value="<?php echo $data["subject"]; ?>" required/>
          </td>
        </tr>
        <tr>
          <th>メッセージ </th>
          <td>
            <textarea name="message" rows="8" cols="80" required><?php echo $data["message"]; ?></textarea>
          </td>
        </tr>
        <tr>
          <th>画像</th>
          <td>
            <input type="file" name="image" />
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="email" name="email" value="<?php echo $data["email"]; ?>" />
          </td>
        </tr>
        <tr>
          <th>URL</th>
          <td>
            <input type="text" name="url" value="<?php echo $data["url"]; ?>" />
          </td>
        </tr>
        <tr>
          <th>文字色</th>
          <td>
            <?php
            $data["font_color"];
            $arr[$data["font_color"]] = "checked";
            ?>

            <label>
              <input type="radio" name="font_color" value="#000000" <?php echo $arr["#000000"]; ?> >
              <font color="#000000">■</font>
            </label>
            <label>
              <input type="radio" name="font_color" value="#696969" <?php echo $arr["#696969"]; ?> >
              <font color="#696969">■</font>
            </label>
            <label>
              <input type="radio" name="font_color" value="#000080" <?php echo $arr["#000080"]; ?> >
              <font color="#000080">■</font>
            </label>
            <label>
              <input type="radio" name="font_color" value="#c71585" <?php echo $arr["#c71585"]; ?> >
              <font color="#c71585">■</font>
            </label>
            <label>
              <input type="radio" name="font_color" value="#00ff00" <?php echo $arr["#00ff00"]; ?> >
              <font color="#00ff00">■</font>
            </label>


          </td>
        </tr>
        <tr>
          <th>編集/削除キー</th>
          <td>
            <input type="password" name="edit" value="<?php echo $data["edit"]; ?>" required/>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <label>
              <input type="checkbox" name="preview" value="pre_on" />
              確認画面を表示する
            </label>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="投稿" />
            <input type="reset" value="リセット" />
          </td>
        </tr>
      </table>
    </form>


    <?php
    $datas = mysqli_query($mysql,"
    SELECT
    i.information_id as information_id,
    i.name as name,
    i.subject as subject,
    i.message as message,
    i.image as image,
    i.email as email,
    i.url as url,
    i.font_color as font_color,

    r.reply_id as reply_id,
    r.information_id as r_information_id,
    r.name as r_name,
    r.subject as r_subject,
    r.message as r_message,
    r.image as r_image,
    r.email as r_email,
    r.url as r_url,
    r.font_color as r_font_color
    FROM informations i
    LEFT JOIN replies r ON i.information_id = r.information_id
    ORDER BY i.information_id DESC;
    ");
    if(!empty($datas)) {

      $information_id = null;
      $reply_id = null;
      $counter = 0;
      while($data = mysqli_fetch_assoc($datas)) {

        if($information_id != $data["information_id"]) {
          $information_id = $data["information_id"];
          echo $counter != 0 ? "</tr></table>" : null;
    ?>
    <table border="1" style="color:<?php echo $data["font_color"]; ?>; margin-bottom:20px;">
      <tr>
        <th>名前</th>
        <td>
          <?php echo $data["name"]; ?>
        </td>
      </tr>
      <tr>
        <th>件名</th>
        <td>
          <?php echo $data["subject"]; ?>
        </td>
      </tr>
      <tr>
        <th>メッセージ </th>
        <td>
          <?php echo nl2br($data["message"]); ?>
        </td>
      </tr>
      <?php if(!empty($data["image"])) { ?>
      <tr>
        <th>画像</th>
        <td>
          <img src="<?php echo $data["image"]; ?>" style="max-width:200px;" />
        </td>
      </tr>
      <?php } ?>
      <tr>
        <th>メールアドレス</th>
        <td>
          <?php echo $data["email"]; ?>
        </td>
      </tr>
      <tr>
        <th>URL</th>
        <td>
          <?php echo $data["url"]; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <form action="./bbs.php" method="post">
            <input type="password" name="keyword" />
            <input type="hidden" name="edit_id" value="<?php echo $data["information_id"]; ?>">
            <input type="submit" value="編集" />
          </form>
          <form action="./thanks.php" method="post">
            <input type="password" name="keyword" />
            <input type="hidden" name="delete_id" value="<?php echo $data["information_id"]; ?>">
            <input type="submit" value="削除" />
          </form>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <form action="./bbs.php" method="post">
            <input type="hidden" name="re_info_id" value="<?php echo $data["information_id"]; ?>">
            <input type="submit" value="返信" />
          </form>
        </td>
      </tr>
      <?php
        }

      // 返信も表示しなければ
      if($data["reply_id"]) {
      ?>
        <tr style="background-color:#eeeeee;">
          <th align="right">名前</th>
          <td align="right">
            <?php echo $data["r_name"]; ?>
          </td>
        </tr>
        <tr style="background-color:#eeeeee;">
          <th align="right">件名</th>
          <td align="right">
            <?php echo $data["r_subject"]; ?>
          </td>
        </tr>
        <tr style="background-color:#eeeeee;">
          <th align="right">メッセージ </th>
          <td align="right">
            <?php echo nl2br($data["r_message"]); ?>
          </td>
        </tr>
        <?php if(!empty($data["image"])) { ?>
        <tr style="background-color:#eeeeee;">
          <th align="right">画像</th>
          <td align="right">
            <img src="<?php echo $data["r_image"]; ?>" style="max-width:200px;" />
          </td>
        </tr>
        <?php } ?>
        <tr style="background-color:#eeeeee;">
          <th align="right">メールアドレス</th>
          <td align="right">
            <?php echo $data["r_email"]; ?>
          </td>
        </tr>
        <tr style="background-color:#eeeeee;">
          <th align="right">URL</th>
          <td align="right">
            <?php echo $data["r_url"]; ?>
          </td>
        </tr>
        <tr style="background-color:#eeeeee;">
          <td colspan="2" align="right">
            <form action="./bbs.php" method="post">
              <input type="password" name="keyword" />
              <input type="hidden" name="reply_id" value="<?php echo $data["reply_id"]; ?>">
              <input type="submit" value="編集" />
            </form>
            <form action="./re_thanks.php" method="post">
              <input type="password" name="keyword" />
              <input type="hidden" name="delete_id" value="<?php echo $data["reply_id"]; ?>">
              <input type="submit" value="削除" />
            </form>
          </td>
        </tr>
        <?
        }
        ?>
      <?php
        $counter++;
        }
        echo "</table>";
      }
      ?>
  </body>
</html>
