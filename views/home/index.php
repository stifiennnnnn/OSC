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
            <div class="canteen-item">
              <img src="../../assets/images/siomay.png" alt="makanan">
              <p class="namatoko">Mr. Komeng's Siomay</p>
            </div>
            <div class="canteen-item">
              <a href="../../views/item/index.php">
                <button class="menu-button">
                  <img src="../../assets/images/smackdown.png" alt="makanan">  
                  <p class="namatoko">Mr. Win's Chicken Smackdown</p>
                </button>
              </a>
            </div>
            <div class="canteen-item">
              <img src="../../assets/images/cupcake.png" alt="makanan">
              <p class="namatoko">Mrs. Momoy's Shop</p>
            </div>
            <div class="canteen-item">
              <img src="../../assets/images/specialfood.png" alt="makanan">
              <p class="namatoko">Mr. Bobi's Soto Ayam</p>
            </div>
            <div class="canteen-item">
              <img src="../../assets/images/fries.png" alt="makanan">
              <p class="namatoko">Mrs. Nina's Fries</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include '../../includes/footer.php'; ?>
</body>
</html>
