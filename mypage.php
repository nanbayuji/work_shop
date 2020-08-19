<?php
  session_start();

  require_once 'UserLogic.php';
  require_once 'Security.php';
  require_once 'dbconnect.php';
  require_once 'function.php';



  //ログインしているかを判定し、していなかったら新規登録画面へ返す
  $result = UserLogic::checkLogin();

  if(!$result){
    $_SESSION['login_err'] = 'ユーザを登録してログインしてください';
    header('Location: index.php');
    return;
  }

  $login_user = $_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品画面</title>
</head>
<body>
  <h2>商品一覧</h2>
  <p>ログインユーザ：<?php echo h($login_user['name']) ?></p>
  <p>商品名を入力してください</p>
  <form action="search.php" method="POST">
    <input type="text" name="keyword">
    <input type="submit" value="検索">
  </form>
  <?php
    viewProduct(connect());
  ?>



    <form action="logout.php" method="POST">
      <input type="submit" name="logout" value="ログアウト">
    </form>
    <p><a href="admin.php">管理者画面へ</a></p>


</body>
</html>








