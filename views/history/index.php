<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/history.css">
<body>
  <?php include '../../includes/header-main.php'; ?>
  <main>
    <div class="kotak-history">
      <h2 class="title">Order History</h2>
      <div class="history-list">
        <div class="order-card">
            <div class="card-left">
              <img src="../../assets/images/nasgor 1.png" alt="Nasi Goreng">
            <div class="item-info">
              <h3>Nasi Goreng</h3>
              <p class="price">Rp10.000</p>
            </div>
          </div>
        <div class="card-right">
          <span class="status status-success">Successful</span>
          <p class="date">Mon, 10 Aug 2026</p>
          <p class="time">Order Time: 08.45</p>
          <p class="time">Pickup Time: 09.45</p>
        </div>
      </div>

      <div class="order-card">
          <div class="card-left">
            <img src="../../assets/images/nasgor 1.png" alt="Nasi Goreng">
            <div class="item-info">
              <h3>Nasi Goreng</h3>
              <p class="price">Rp10.000</p>
            </div>
          </div>
          <div class="card-right">
            <span class="status status-cancelled">Cancelled</span>
            <p class="date">Fri, 7 Aug 2026</p>
            <p class="time">Order Time: 08.45</p>
            <p class="time">Pickup Time: 09.45</p>
          </div>
      </div>

      <div class="order-card">
          <div class="card-left">
            <img src="../../assets/images/nasgor 1.png" alt="Nasi Goreng">
            <div class="item-info">
              <h3>Nasi Goreng</h3>
              <p class="price">Rp10.000</p>
            </div>
          </div>
          <div class="card-right">
            <span class="status status-done">Done</span>
            <p class="date">Thu, 6 Aug 2026</p>
            <p class="time">Order Time: 08.45</p>
            <p class="time">Pickup Time: 09.45</p>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include '../../includes/footer.php'; ?>
</body>