<?php
  $path_prefix = '';
  if (strpos($_SERVER['PHP_SELF'], '/views/') !== false) {
    $path_prefix = '/OSC#';
  } else {
    $path_prefix = '#';
  }
?>

<header>
  <link rel="stylesheet" href="/OSC/assets/css/header.css">
  <nav>
  <div class="logo"><a href="/OSC"><img src="/OSC/assets/logo/logo.svg" alt="AD-Meals"></a></div>
  <ul>
    <li><a href="<?php echo $path_prefix; ?>">Beranda</a></li>
    <li><a href="<?php echo $path_prefix; ?>tentang-kami">Tentang Kami</a></li>
    <li><a href="<?php echo $path_prefix; ?>layanan">Cara Kerja</a></li>
    <li><a href="<?php echo $path_prefix; ?>menu">Menu</a></li>
    <li><a href="<?php echo $path_prefix; ?>hubungi-kami">Kontak</a></li>
  </ul>
  <a href="/OSC/views/login/index.php" class="btn btn-primary" style="background:var(--orange);">Masuk</a>
  </nav>
</header>