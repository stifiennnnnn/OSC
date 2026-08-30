<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/home.css">
<body>
  <?php include '../../includes/header-main.php'; ?>
  <main>
    <section>
      <h2 class="title item-title">Mrs. Win's Chicken Smackdown</h2>
      <div class="kotak">
            <a href="../../views/home/index.php">
                <img src="../../assets/images/ARROW.png" class="return" alt="back">
            </a>
            <h2 class="Choices">People's Choices</h2>
            
            <div class="pick">
                <div class="menu-item">
                    <img src="../../assets/images/nasgor 1.png" alt="ilust makanan1">
                    <p>Nasi Goreng</p>
                    <p>Rp 15.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/kulit goreng 1.png" alt="ilust makanan2">
                    <p>Kulit Goreng</p>
                    <p>Rp 12.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/smackdown.png" alt="ilust makanan3">
                    <p>Chicken Smackdown</p>
                    <p>Rp 20.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/martabak telor 1.png" alt="ilust makanan4">
                    <p>Martabak Telor</p>
                    <p>Rp 15.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/sosis ayam 1.png" alt="ilust makanan5">
                    <p>Sosis Ayam</p>
                    <p>Rp 10.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="kotak">
            <h2 class="Choices2">All Menus</h2>
            
            <div class="pick">
                <div class="menu-item">
                    <img src="../../assets/images/ayam gulai 1.png" alt="ilust makanan1">
                    <p>Ayam Gulai</p>
                    <p>Rp 18.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/ayam suwir 1.png" alt="ilust makanan2">
                    <p>Ayam Suwir</p>
                    <p>Rp 15.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/cumi pedas 1.png" alt="ilust makanan3">
                    <p>Cumi Pedas</p>
                    <p>Rp 20.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/nasgor 2.png" alt="ilust makanan4">
                    <p>Nasi Goreng</p>
                    <p>Rp 15.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/kulit goreng 1.png" alt="ilust makanan5">
                    <p>Kulit Goreng</p>
                    <p>Rp 12.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/martabak telor 1.png" alt="ilust makanan6">
                    <p>Martabak Telor</p>
                    <p>Rp 15.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/sosis ayam 1.png" alt="ilust makanan7">
                    <p>Sosis Ayam</p>
                    <p>Rp 10.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/telor balado 1.png" alt="ilust makanan8">
                    <p>Telor Balado</p>
                    <p>Rp 10.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/tempe orek 1.png" alt="ilust makanan9">
                    <p>Tempe Orek</p>
                    <p>Rp 8.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="../../assets/images/nasi kuning 1.png" alt="ilust makanan10">
                    <p>Nasi Kuning</p>
                    <p>Rp 12.000</p>
                    <div class="quantity">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <span>0</span>
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="proceed-button">
            <button class="btn-proceed" onclick="document.location.href='../../views/payment/index.php'">Proceed to Payment</button>
        </div>
      </section>
  </main>
  <?php include '../../includes/footer.php'; ?>

  <script>
    function increaseQuantity(button) {
        const quantity = button.parentElement.querySelector('span');
        let value = parseInt(quantity.textContent);
        quantity.textContent = value + 1;
    }

    function decreaseQuantity(button) {
        const quantity = button.parentElement.querySelector('span');
        let value = parseInt(quantity.textContent);

        if (value > 0) {
            quantity.textContent = value - 1;
        }
    }
  </script>
</body>
</html>