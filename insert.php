<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
</head>
<body>

<h1>管理者画面</h1>

<?php
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  
  $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
  $stmt = $pdo -> prepare('INSERT INTO product (name, price, stock) VALUES (?, ?, ?)');
  if($stmt -> execute([$name, $price, $stock])){
    echo '追加できました';
  }else{
    echo '追加できませんでした';
  }
?>


<p><a href="index.php">商品画面へ</a>

</body>
</html>
