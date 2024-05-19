<?php
include "database.php";



$sql2 = "SELECT v_name FROM vendors";
$stmt = $dbh->prepare($sql2);
$stmt->execute();
$vendorss = $stmt->fetchAll(PDO::FETCH_ASSOC);

$vendors = $_GET['vendors'];
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
          <form action="Main2.php" method="GET">       
            <p > Виробник: </p>
            <select name="vendors">
              <?php foreach ($vendorss as $vend): ?>
                  <option value="<?= htmlspecialchars($vend['v_name']) ?>">
                      <?= htmlspecialchars($vend['v_name']) ?>
                  </option>
              <?php endforeach; ?>
            </select>
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

$sql = "SELECT * FROM items  
INNER JOIN vendors ON vendors.ID_Vendors=items.FID_Vendor
WHERE vendors.v_name = :vendors
ORDER BY ID_Items ASC";
$stmt = $dbh->prepare($sql);

$stmt->bindParam(':vendors', $vendors);
$stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        ?>
        <tr>
            <th><?= $row['ID_Items']?></th>
            <th><?= $row['FID_Category']?></th>
            <th><?= $row['name']?></th>
            <th><?= $row['v_name']?></th>
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