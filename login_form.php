<?php

  session_start();

  require_once 'UserLogic.php';

  $result = UserLogic::checkLogin();
if($result){
  header('Location: mypage.php');
  return;
}

  $err = $_SESSION;

  //セッションを消す
  $_SESSION = array();
  session_destroy();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>
<body>
  <h2>ログインフォーム</h2>
    <?php if(isset($err['msg'])) : ?>
      <p><?php echo $err['msg']; ?></p>
    <?php endif; ?>
  <form action="login.php" method="POST">
    <p>
      <label for="username">ユーザ名:</label>
      <input type="text" name="username">
      <?php if(isset($err['user'])) : ?>
        <p><?php echo $err['user']; ?></p>
      <?php endif; ?>
    </p>
    <p>
      <label for="password">パスワード:</label>
      <input type="password" name="password">
      <?php if(isset($err['password'])) : ?>
        <p><?php echo $err['password']; ?></p>
      <?php endif; ?>
    </p>
    <p>
      <input type="submit" value="ログイン">
    </p>
  </form>
  <a href="index.php">新規登録はこちら</a>
</body>
</html>