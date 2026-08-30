<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/home.css">
<body>
  <?php include '../../includes/header-main.php'; ?>
  <main>
    <section>
      <div class="kotak">
          <h2  class="greet">Hi, <span>USERDUMMY!</span></h2>
          <h1 class="title">What would you<br>like to eat today?</h1>
          <img src="../../assets/images/breakfast food-bro 2.png" alt="ilust makanan" class="breakfast">
      </div>
      <div class="choice">
        <h1 class="Choose">Choose A Menu!</h1>
        <div class="selection">
          <?php
            $query = "SELECT * FROM vendor";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="canteen-item">';
              echo '<a href="../../views/item/index.php?vendor_id=' . $row['vendor_id'] . '">';
              echo '<button class="menu-button">';
              echo '<img src="../../assets/images/vendor/' . $row['vendor_id'] . '.png" alt="makanan">';
              echo '<p class="namatoko">' . $row['vendor_name'] . '</p>';
              echo '</button>';
              echo '</a>';
              echo '</div>';
            }
          ?>
      </div>
    </section>
  </main>
  <?php include '../../includes/footer.php'; ?>
</body>
</html>
