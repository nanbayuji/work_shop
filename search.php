<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
</head>
<body>

  <?php
    $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
    $stmt = $pdo -> prepare('SELECT * FROM product WHERE name LIKE ?'); //商品名の部分一致で検索
    $stmt -> execute(['%'. $_POST['keyword']. '%']);
    foreach($stmt as $row){
      echo "<p>{$row['id']}:{$row['name']}:{$row['price']}円:残り{$row['stock']}個</p>";
    }
  ?>

</body>
</html>
