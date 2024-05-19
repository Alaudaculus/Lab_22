<?php
include "database.php";

$sql = "SELECT * FROM items  
INNER JOIN category ON category.ID_Category=items.FID_Category 
INNER JOIN vendors ON vendors.ID_Vendors=items.FID_Vendor
WHERE price BETWEEN :price_min AND :price_max 
AND vendors.v_name = :vendors
AND category.c_name = :category
ORDER BY ID_Items ASC";
$stmt = $dbh->prepare($sql);

$stmt->bindParam(':vendors', $vendors);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':price_min', $price_min);
$stmt->bindParam(':price_max', $price_max);
$stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        ?>
        <tr>
            <th><?= $row['ID_Items']?></th>
            <th><?= $row['c_name']?></th>
            <th><?= $row['name']?></th>
            <th><?= $row['v_name']?></th>
            <th><?= $row['price']?></th>
            <th><?= $row['quantity']?></th>
            <th><?= $row['quality']?></th>   
        </tr>
        
         <?php
    }

 
 ?>
