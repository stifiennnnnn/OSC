<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/orders.css">
<body>
  <?php include '../../includes/header-main.php'; ?>
  <div class="checkout-wrapper">
    <div class="kiri">
      <div class="cart">
        <h4 class="heading">Your Cart</h4>
        <p class="sub">Review your orders before checking out.</p>

        <div class="cart-isi">
          <img src="../../assets/images/martabak telor 1.png" alt="food">
          <span class="badge">1</span>
          <div class="detail">
            <h3>Martabak Telur</h3>
            <p class="price">Rp5.000</p>
          </div>
          <div class="qty">
            <button>-</button>
            <span>1</span>
            <button>+</button>
          </div>
      </div>

      <div class="cart-isi">
        <img src="../../assets/images/smackdown.png" alt="food">
        <span class="badge">2</span>
        <div class="detail">
            <h3>Nasi Ayam Geprek</h3>
            <p class="price">Rp15.000</p>
        </div>
        <div class="qty">
            <button>-</button>
            <span>1</span>
            <button>+</button>
        </div>
      </div>

      <div class="cart-isi">
        <img src="../../assets/images/nasgor 1.png" alt="food">
        <span class="badge">3</span>
        <div class="detail">
            <h3>Nasi Goreng</h3>
            <p class="price">Rp10.000</p>
        </div>
        <div class="qty">
            <button>-</button>
            <span>1</span>
            <button>+</button>
        </div>
      </div>

      <div class="cart-isi">
        <img src="../../assets/images/ayam gulai 1.png" alt="food">
        <span class="badge">4</span>
        <div class="detail">
            <h3>Ayam Gulai</h3>
            <p class="price">Rp10.000</p>
        </div>
        <div class="qty">
            <button>-</button>
            <span>1</span>
            <button>+</button>
        </div>
      </div>

        <img src="../../assets/images/note.png" class="note" alt="note icon">
        <button class="add">+ Add More Items</button>
      </div>
    </div>

    <div class="kanan">
      <div class="pickup">
        <h4 class="heading2">Pickup Time</h4>
        <p class="sub2">Choose your preferred time to pick up your orders.</p>

        <div class="pickup-body">
          <div class="tanggal">
            <div class="tgl-col">
                <button class="tgl-btn">Mon<br>10 Aug</button>
                <button class="tgl-btn">Tue<br>11 Aug</button>
                <button class="tgl-btn">Wed<br>12 Aug</button>
            </div>

            <div class="tgl-col offset">
                <button class="tgl-btn">Thu<br>13 Aug</button>
                <button class="tgl-btn">Fri<br>14 Aug</button>
            </div>
        </div>
        <div class="jam">
          <button class="jam-btn">9:00</button>
          <button class="jam-btn">9:15</button>
          <button class="jam-btn">9:30</button>
          <button class="jam-btn">09:45</button>
          <button class="jam-btn">10:00</button>
          <button class="jam-btn">10:15</button>
          <button class="jam-btn">10:30</button>
          <button class="jam-btn">10:45</button>
          <button class="jam-btn">11:15</button>
          <button class="jam-btn">11:45</button>
        </div>
        <div class="catatan">
          <label>Leave A Note(Optional)</label>
          <textarea></textarea>
        </div>
      </div>
    </div>

        <div class="total-box">
          <h2>Total:</h2>
          <h1 class="total-price">Rp. 40.000</h1>
          <button class="btn-checkout">Proceed To Checkout</button>
        </div>
      </div>
    </div>
  <?php include '../../includes/footer.php'; ?>
</body>