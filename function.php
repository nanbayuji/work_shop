<?php

//全商品を表示
function viewProduct($pdo){
  echo '<table border="1">';
  echo '<tr><th>商品名</th><th>価格[円]</th><th>在庫</th></tr>';
  foreach($pdo -> query('SELECT * FROM product') as $row){
    echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
    }
  echo '</table>';
}


// //商品名の部分一致で検索して表示
// function search($pdo){
//   $stmt = $pdo -> prepare('SELECT * FROM product WHERE name LIKE ?');
//     $stmt -> execute(['%'. $_POST['keyword']. '%']);
//     foreach($stmt as $row){
//       echo "<p>{$row['name']}:{$row['price']}円:残り{$row['stock']}個</p>";
//     }
// }

//商品名の部分一致で検索して表示
function search($pdo){
  $stmt = $pdo -> prepare('SELECT * FROM product WHERE name LIKE ?');
  $stmt -> execute(['%'. $_POST['keyword']. '%']);

  echo '<table border="1">';
  echo '<tr><th>商品名</th><th>価格[円]</th><th>在庫</th></tr>';  
  foreach($stmt as $row){
      echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td></tr>";
  }
  echo '</table>';
}

//商品を追加
function add($pdo){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  $stmt = $pdo -> prepare('INSERT INTO product (name, price, stock) VALUES (?, ?, ?)');
  if($stmt -> execute([$name, $price, $stock])){
    echo '追加できました';
  }else{
    echo '追加できませんでした';
  }
}

?>