<header>
  <link rel="stylesheet" href="/OSC/assets/css/header.css">
  <nav>
    <div class="logo"><a href="/OSC/views/home/index.php"><img src="/OSC/assets/logo/logo.svg" alt="AD-Meals"></a></div>
    <ul>
        <li><a href="/OSC/views/home/index.php">Home</a></li>
        <li><a href="/OSC/views/orders/index.php">Orders</a></li>
        <li><a href="/OSC/views/history/index.php">History</a></li>
    </ul>
    <div class="right">
        <a href="/OSC/views/notifications/index.php"><img src="/OSC/assets/images/notif.svg" class="notif-icon"></a>
        <a href="/OSC/views/profile/index.php"><img src="/OSC/assets/images/profile-icon.png" class="profile-icon"></a>
    </div>
  </nav>
</header>
<script>
    const currentPath = window.location.pathname;

    document.querySelectorAll('nav a').forEach(link => {
        const linkPath = new URL(link.href, window.location.origin).pathname;

        if (currentPath === linkPath) {
            link.classList.add('active');
        }
    });
</script>