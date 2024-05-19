<?php
include "database.php";

$category = $_GET['category'];
$vendors = $_GET['vendors'];
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
    <a href="result.php">Результат</a>
  </div>
  <div class="row">
    <div class="side">
      <p class="task"> БД для зберігання інформації про товари в інтернет-магазині. <br>Забезпечити виведення таких даних: <br>товари обраного виробника;<br>товари в обраної категорії;<br>товари в обраному ціновому діапазоні.</p>
    </div>
    <div class="main">
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
         <?php include "sql_f.php"; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="footer">
    <h2>Лабораторна робота №1 </h2>
    <p> Варіант №5</p> 
  </div>
</body>
</html>