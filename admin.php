<?php
require_once 'header.php';
?>

<h1>管理者画面</h1>
<p>商品を追加する</p>
<form action="insert.php" method="POST">
  <p>商品名<input type="text" name="name"></p>
  <p>価格<input type="text" name="price"></p>
  <p>在庫<input type="text" name="stock"></p>
  <p><input type="submit" value="追加"></p>
</form>

<p><a href="mypage.php">商品画面へ</a>

<?php require_once 'footer.php' ?>
