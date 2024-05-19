<?php
include "database.php";

$price_min = $_GET['price_min'];
$price_max = $_GET['price_max'];

$search = $_GET['search'];
?>
<!DOCTYPE html>
<html lang="uk-UA">
<head>
  <title>Lab_</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Лабораторна робота №1  курсу 'Internet-технології' поток КІУКІз-21">
  <link href="css//styly1.css" type="text/css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="img//12345.png">
</head>
<body>
  <div class="header">
      <h1 >...</h1>
  </div>
  <div class="navbar">
  <a href="Main.php">Головна</a>
    <a href="Main1.php">Головна1</a>
    <a href="Main2.php">Головна2</a>
    <a href="Main3.php">Головна3</a>
  </div>
  <div class="row">
    <div class="side">
      <p class="task"> БД для зберігання інформації про товари в інтернет-магазині. <br>Забезпечити виведення таких даних: <br>товари обраного виробника;<br>товари в обраної категорії;<br>товари в обраному ціновому діапазоні.</p>
    </div>
    <div class="main">   
        <p class="task"> Товари в інтернет-магазині: </p>
    
       <div class="search">
          <form action="Main3.php" method="GET">       
            <p > Ціна: </p>
            <p class="price"> Від: </p>
            <input type="text" name="price_min" value="0">
            <p class="price"> До: </p>
            <input type="text" name="price_max" value="3000"><br>
                <input type="submit" name="search">    
          </form>
       </div>


       <div class="search">
       <p class="task1"> Товари в інтернет-магазині </p>
      <div class="table">
        <table>
          <thead>
            <tr>
                <th>ID</th>
                <th>Категорія</th>
                <th>Ім'я</th>
                <th>Виробник</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Якість</th>   
            </tr>
          </thead>
          <tbody>
          <?php
include "database.php";

$sql = "SELECT * FROM items  
WHERE price BETWEEN :price_min AND :price_max 
ORDER BY ID_Items ASC";
$stmt = $dbh->prepare($sql);

$stmt->bindParam(':price_min', $price_min);
$stmt->bindParam(':price_max', $price_max);
$stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        ?>
        <tr>
            <th><?= $row['ID_Items']?></th>
            <th><?= $row['FID_Category']?></th>
            <th><?= $row['name']?></th>
            <th><?= $row['FID_Vendor']?></th>
            <th><?= $row['price']?></th>
            <th><?= $row['quantity']?></th>
            <th><?= $row['quality']?></th>   
        </tr>
        
         <?php
    }

 
 ?>
          </tbody>
        </table>
      </div>
       </div>


    </div>
  </div>

  <div class="footer">
    <h2>Лабораторна робота </h2>
    <p> Варіант №5</p> 
  </div>
</body>
</html>