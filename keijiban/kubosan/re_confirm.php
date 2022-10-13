
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>久保掲示板</title>
  </head>
  <body>

    <!-- 確認画面ver. -->
    <?php if(!empty($_POST)  && $_POST["preview"] === "pre_on") { ?>


      <h1>確認画面</h1>

      <hr />

      <form action="./re_thanks.php" method="post" enctype="multipart/form-data">

        <?php

        $post = $_POST;
        $uploaddir = "";

        //画像アップロード処理
        if(!empty($_FILES["image"]["name"])) {

          $pathinfo = pathinfo($_FILES['image']['name']);

          $file_name = date("YmdHis"). "." . $pathinfo['extension'];
          $uploaddir = './img/'.$file_name;

          echo '<pre>';
          if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir)) {
          } else {
              echo "<h2>画像アップロードに失敗</h2>";
              exit;
          }
        }


        if(!empty($_POST )) {
          $post_data = $_POST;
          // input type=hidden"をforeachで全部出す
          foreach($post_data as $key => $value) {
        ?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>" />
        <?php
          }
        ?>
          <input type="hidden" name="image" value="<?php echo $uploaddir; ?>" />
        <?php
        }
        ?>

        <table>
          <tr>
            <th>名前</th>
            <td>
              <?php echo $_POST["name"]; ?>
            </td>
          </tr>
          <tr>
            <th>件名</th>
            <td>
              <?php echo $_POST["subject"]; ?>
            </td>
          </tr>
          <tr>
            <th>メッセージ </th>
            <td>
              <?php echo $_POST["message"]; ?>
              </textarea>
            </td>
          </tr>
          <tr>
            <th>画像</th>
            <td>
              <?php
              if(!empty($uploaddir)) {
                echo "<img src='{$uploaddir}' style='max-width:200px;' />";
              }
              ?>
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              <?php echo $_POST["email"]; ?>
            </td>
          </tr>
          <tr>
            <th>URL</th>
            <td>
              <?php echo $_POST["url"]; ?>
            </td>
          </tr>
          <tr>
            <th>文字色</th>
            <td>
              <?php echo "<font color='{$_POST["font_color"]}'>■■■■■■■</font>"; ?>
            </td>
          </tr>
          <tr>
            <th>編集/削除キー</th>
            <td>
              <?php echo $_POST["edit"]; ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" value="投稿" />
              <button type="button" onclick="history.back()">戻る</button>
            </td>
          </tr>
        </table>

      </form>

    <?php } else {

        $post = $_POST;

        $mysql = mysqli_connect('db','root','root',);
        $db_selected = mysqli_select_db($mysql, 'kubokeijiban_db');

        if(empty($post["reply_id"])) {

          $query = "INSERT INTO replies VALUES(
            NULL,
            '{$post['information_id']}',
            '{$post['name']}',
            '{$post['subject']}',
            '{$post['message']}',
            '{$post['image']}',
            '{$post['email']}',
            '{$post['url']}',
            '{$post['font_color']}',
            {$post['edit']},
            '{$post['timer']}');";

          $result = mysqli_query($mysql,$query);

          $message = "新規返信完了";

        } else if(!empty($post["reply_id"])) {

          $query = "UPDATE replies SET
            name = '{$post['name']}',
            subject = '{$post['subject']}',
            message = '{$post['message']}',
            image = '{$post['image']}',
            email = '{$post['email']}',
            url = '{$post['url']}',
            font_color = '{$post['font_color']}',
            edit = {$post['edit']},
            timer = '{$post['timer']}'
            WHERE reply_id = {$post["reply_id"]};";

          $result = mysqli_query($mysql,$query);

          $message = "返信の編集完了";

        }

      ?>

      <h1><?php echo $message; ?></h1>
      <a href="./bbs.php">TOPページ</a>

      <p><?php echo mysqli_error($mysql); ?></p>

    <?php } ?>

  </body>
</html>
