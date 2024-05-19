<?php
include "database.php";

$sql1 = "SELECT c_name FROM category";
$stmt = $dbh->prepare($sql1);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT v_name FROM vendors";
$stmt = $dbh->prepare($sql2);
$stmt->execute();
$vendorss = $stmt->fetchAll(PDO::FETCH_ASSOC);

$category = $_GET['category'];
$vendors = $_GET['vendors'];
$price_min = $_GET['price_min'];
$price_max = $_GET['price_max'];

$search1 = $_GET['search1'];
$search2 = $_GET['search2'];
$search3 = $_GET['search3'];
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
    <a href="Main1.php">Головна</a>
  </div>
  <div class="row">
    <div class="side">
      <p class="task"> БД для зберігання інформації про товари в інтернет-магазині. <br>Забезпечити виведення таких даних: <br>товари обраного виробника;<br>товари в обраної категорії;<br>товари в обраному ціновому діапазоні.</p>
    </div>
    <div class="main">   
        <p class="task"> Товари в інтернет-магазині: </p>

        <div class="search">
          <form action="Main.php" method="GET">       
              <p > Категорія: </p>  
              <select name="category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['c_name']) ?>">
                        <?= htmlspecialchars($category['c_name']) ?>
                    </option>
                <?php endforeach; ?>
              </select>
              <input type="submit" name="search1">  
          </form>
       </div>
       <div class="search">
          <form action="Main.php" method="GET">       
            <p > Виробник: </p>
            <select name="vendors">
              <?php foreach ($vendorss as $vendors): ?>
                  <option value="<?= htmlspecialchars($vendors['v_name']) ?>">
                      <?= htmlspecialchars($vendors['v_name']) ?>
                  </option>
              <?php endforeach; ?>
            </select>
              <input type="submit" name="search2">  
          </form>
       </div>
    
       <div class="search">
          <form action="Main.php" method="GET">       
            <p > Ціна: </p>
            <p class="price"> Від: </p>
            <input type="text" name="price_min" value="0">
            <p class="price"> До: </p>
            <input type="text" name="price_max" value="3000"><br>
                <input type="submit" name="search3">    
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