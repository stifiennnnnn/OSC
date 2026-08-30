<?php
include_once __DIR__ . '/auth.php';
?>
<header>
  <link rel="stylesheet" href="/OSC/assets/css/header.css">
  <nav>
    <div class="logo">
      <a href="/OSC/views/home/index.php">
        <img src="/OSC/assets/logo/logo.svg" alt="AD-Meals">
      </a>
    </div>
    <ul>
      <li><a href="/OSC/views/home/index.php">Home</a></li>
      <li><a href="/OSC/views/orders/index.php">Orders</a></li>
      <li><a href="/OSC/views/history/index.php">History</a></li>
    </ul>
    <div class="right">
      <a href="/OSC/views/notifications/index.php">
        <img src="/OSC/assets/images/notif.svg" class="notif-icon" alt="Notifications">
      </a>

      <a href="/OSC/views/profile/index.php">
        <img src="/OSC/assets/images/profile-icon.png" class="profile-icon" alt="Profile">
      </a>
      <button class="hamburger" type="button" aria-label="Open menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>
</header>

<script src="/OSC/assets/js/header-main.js"></script>