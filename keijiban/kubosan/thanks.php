<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>投稿完了</title>
  </head>
  <body>

    <?php

    $post = $_POST;
    $post['timer'] = date("Y-m-d H:i:s");

    $mysql = mysqli_connect('db','root','root',);
    $db_selected = mysqli_select_db($mysql, 'kubokeijiban_db');

    $message = "";

    if(!empty($post["information_id"])) {

      $query = "UPDATE informations SET
        name = '{$post['name']}',
        subject = '{$post['subject']}',
        message = '{$post['message']}',
        image = '{$post['image']}',
        email = '{$post['email']}',
        url = '{$post['url']}',
        font_color = '{$post['font_color']}',
        edit = {$post['edit']},
        timer = '{$post['timer']}'
        WHERE information_id = {$post["information_id"]};";

      $result = mysqli_query($mysql,$query);

      $message = "編集完了";

    } else if(empty($post["information_id"]) && empty($post["delete_id"])) {

      $query = "INSERT INTO informations VALUES(
        NULL,
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

      $message = "新規投稿完了";

    // 親削除パターン
  } else if(!empty($post["delete_id"]) && !empty($post["keyword"])) {

      $check = mysqli_query($mysql,"SELECT * FROM informations
        WHERE information_id = '{$post["delete_id"]}' AND edit = '{$post["keyword"]}';");

      $check = mysqli_fetch_assoc($check);

      if(!empty($check)) {


        // 返信テーブル削除
        mysqli_query($mysql,"DELETE FROM replies WHERE information_id = '{$post["delete_id"]}';");

        // 投稿テーブル削除
        mysqli_query($mysql,"DELETE FROM informations WHERE information_id = '{$post["delete_id"]}';");

        $message = "削除完了";

      } else {

        $message = "不正なキーです。";

      }


    }


    ?>
    <h1><?php echo $message; ?></h1>
    <a href="./bbs.php">TOPページ</a>

    <p><?php echo mysqli_error($mysql); ?></p>

  </body>
</html>
