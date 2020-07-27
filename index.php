<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
</head>
<body>

<h1>商品画面</h1>
<p>商品名を入力してください</p>
<form action="search.php" method="POST">
  <input type="text" name="keyword">
  <input type="submit" value="検索">
</form>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
    foreach($pdo -> query('SELECT * FROM product') as $row){
      echo "<p>{$row['id']}:{$row['name']}:{$row['price']}円:残り{$row['stock']}個</p>";
    }
?>

<p><a href="admin.php">管理者画面へ</a></p>
</body>
</html>
