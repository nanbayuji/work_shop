<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
</head>
<body>

<h1>管理者画面</h1>
<p>商品を追加する</p>
<form action="insert.php" method="POST">
  商品名<input type="text" name="name">
  価格<input type="text" name="price">
  在庫<input type="text" name="stock">
  <input type="submit" value="追加">
</form>

<p><a href="index.php">商品画面へ</a>

</body>
</html>
