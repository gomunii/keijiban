<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>返信完了</title>
  </head>
  <body>

    <?php

    $post = $_POST;

    $post['timer'] = date("Y-m-d H:i:s");

    $mysql = mysqli_connect('db','root','root',);
    $db_selected = mysqli_select_db($mysql, 'kubokeijiban_db');

    $message = "";

    if(!empty($post["reply_id"])) {

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

        // var_dump($query);
        // exit;

      $result = mysqli_query($mysql,$query);

      $message = "返信の編集完了";

    } else if(empty($post["reply_id"]) && empty($post["delete_id"])) {

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

      $message = "返信の新規投稿完了";

    // 返信削除パターン
  } else if(!empty($post["delete_id"]) && !empty($post["keyword"])) {

      $check = mysqli_query($mysql,"SELECT * FROM replies
        WHERE reply_id = '{$post["delete_id"]}' AND edit = '{$post["keyword"]}';");

      $check = mysqli_fetch_assoc($check);

      if(!empty($check)) {

        // 返信テーブル削除
        mysqli_query($mysql,"DELETE FROM replies WHERE reply_id = '{$post["delete_id"]}';");

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
