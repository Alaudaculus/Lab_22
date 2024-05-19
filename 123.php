<form action="result.php" method="GET">
        <div class="search">
          <p > Категорія: </p>  
          <select name="category">
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['c_name']) ?>">
                    <?= htmlspecialchars($category['c_name']) ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="search">
          <p > Виробник: </p>
          <select name="vendors">
            <?php foreach ($vendorss as $vendors): ?>
                <option value="<?= htmlspecialchars($vendors['v_name']) ?>">
                    <?= htmlspecialchars($vendors['v_name']) ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="search">
          <p > Ціна: </p>
          <p class="price"> Від: </p>
          <input type="text" name="price_min" value="0">
          <p class="price"> До: </p>
          <input type="text" name="price_max" value="3000">
        </div>
        <div class="search">
          <input type="submit" name="search">
        </div>
      </form>