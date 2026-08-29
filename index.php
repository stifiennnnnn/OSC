<!DOCTYPE html>
<html lang="id">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/landing.css">

<body>
  <?php include 'includes/header.php'; ?>
  <section class="hero">
    <div class="container">
      <div class="hero-text">
        <h1>Less Waiting,<br>More Eating!</h1>
        <p>Pesan makanan dan minuman kantin terlebih dahulu, lalu ambil pesananmu saat sudah siap. Lebih cepat, lebih praktis, dan lebih banyak waktu untuk beristirahat.</p>
        <div class="hero-buttons">
          <a href="views/login/index.php" class="btn btn-outline">Pesan Sekarang!</a>
        </div>
      </div>
      <div class="hero-img">
        <img src="https://images.unsplash.com/photo-1572195577046-2f25894c06fc?w=900&q=80&auto=format&fit=crop" alt="Pesanan makanan untuk siswa">
      </div>
    </div>
  </section>

  <section class="section about" id="tentang-kami">
    <div class="container">
      <div class="about-img">
        <img src="https://images.unsplash.com/photo-1657271511865-f610b280dca4?w=800&q=80&auto=format&fit=crop" alt="Makanan di kantin sekolah">
      </div>

      <div class="about-text">
        <h2>Apa itu <span>AD-Meals?</span></h2>
        <p>AD-Meals adalah platform digital yang dirancang untuk mempermudah pengalaman siswa saat membeli makanan dan minuman di kantin sekolah.</p>
        <p>Melalui AD-Meals, siswa dapat melihat menu yang tersedia, melakukan pre-order sebelum waktu istirahat, dan mengambil pesanan ketika sudah siap. Dengan begitu, waktu yang biasanya digunakan untuk mengantre dapat digunakan untuk makan dan beristirahat.</p>
        <a href="#layanan" class="btn btn-primary">Pelajari Lebih Lanjut</a>
      </div>
    </div>
  </section>

  <section class="section" style="padding-top:0;" id="preorder">
    <div class="special">
      <div>
        <h2>Pesan Sebelum Istirahat<br><span>Ambil Saat Sudah Siap</span></h2>
        <p>Hindari antrean panjang dengan melakukan pre-order melalui AD-Meals. Pesananmu akan disiapkan sebelum waktu pengambilan.</p>
        <a href="views/login/index.php" class="btn btn-primary">Mulai Pre-Order</a>
      </div>

      <div class="special-img">
        <img src="https://images.unsplash.com/photo-1603508102983-99b101395d1a?w=800&q=80&auto=format&fit=crop" alt="Makanan siap diambil">
      </div>
    </div>
  </section>

  <section class="section services" id="layanan">
    <div class="container">
      <div class="section-title">
        <h2>Kenapa <span>AD-Meals?</span></h2>
        <p>Solusi sederhana untuk membuat pengalaman di kantin sekolah menjadi lebih cepat dan praktis.</p>
      </div>
      <div class="service-grid">

        <div class="service-card">
          <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="9"/>
              <path d="M9 9h.01M15 15h.01M15 9l-6 6"/>
            </svg>
          </div>
          <h4>Kurangi Antrean</h4>
          <p>Pesan lebih awal, tanpa perlu antre saat waktu istirahat.</p>
        </div>

        <div class="service-card">
          <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="5.5" cy="17.5" r="3.5"/>
              <circle cx="18.5" cy="17.5" r="3.5"/>
              <path d="M15 6a1 1 0 0 0-1-1h-2M12 17.5V14l-3-3 4-3 2 3h3"/>
            </svg>
          </div>
          <h4>Ambil dengan Cepat</h4>
          <p>Datang dan ambil pesananmu tanpa perlu menunggu lama.</p>
        </div>

        <div class="service-card">
          <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 2v8a2 2 0 0 0 2 2v10M6 2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2M6 2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2M18 2c-2 0-3 2-3 5v4c0 1.5 1 2 2 2v9"/>
            </svg>
          </div>
          <h4>Lihat Ketersediaan Menu</h4>
          <p>Cek ketersediaan makanan dan minuman sebelum ke kantin.</p>
        </div>

        <div class="service-card">
          <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polygon points="12 2 15 9 22 9.5 17 14.5 18.5 22 12 18 5.5 22 7 14.5 2 9.5 9 9 12 2"/>
            </svg>
          </div>
          <h4>Resi melalui Email</h4>
          <p>Dapatkan bukti pesanan langsung melalui email.</p>
        </div>
      </div>
    </div>

    <br><br><br>

    <div class="container" id="hasil-penelitian">
      <div class="section-title">
        <h2>Hasil <span>Penelitian Kami</span></h2>
        <p>Kami melakukan penelitian untuk memahami pengalaman siswa saat membeli makanan dan minuman di kantin sekolah.</p>
      </div>

      <div class="menu-grid">
        <div class="service-card">
          <span class="price">60%</span>
          <h4>Antrean Panjang</h4>
          <p>Antrean panjang saat istirahat terjadi karena jumlah siswa tinggi dan staf kantin terbatas.</p>            
        </div>

        <div class="service-card">
          <span class="price">14%</span>
          <h4>Melewatkan Pembelian</h4>
          <p>Waktu tunggu yang lama membuat siswa enggan membeli makanan karena waktu istirahat terbatas.</p>
        </div>

        <div class="service-card">
          <span class="price">76%</span>
          <h4>Kebutuhan Pre-Order</h4>
          <p>Penelitian menunjukkan kebutuhan kuat akan sistem pemesanan sebelum waktu istirahat.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="menu">
    <div class="container">
      <div class="section-title">
        <h2>Menu <span>Favorit</span></h2>
        <p>Pilih makanan dan minuman favoritmu sebelum waktu istirahat tiba.</p>
      </div>

      <div class="menu-grid">
        <div class="card">
          <div class="thumb">
            <img src="https://images.unsplash.com/photo-1543900348-f03d06be7653?w=600&q=80&auto=format&fit=crop" alt="Nasi dengan lauk">
          </div>
          <h3>Nasi Ayam</h3>
          <p>Nasi hangat dengan ayam dan lauk pilihan, cocok untuk mengisi energi di waktu istirahat.</p>
          <span class="price">Rp15.000</span>
          <a href="views/login/index.php" class="btn btn-primary">Pesan</a>
        </div>

        <div class="card">
          <div class="thumb">
            <img src="https://images.unsplash.com/photo-1516100882582-96c3a05fe590?w=600&q=80&auto=format&fit=crop" alt="Mie dengan saus">
          </div>
          <h3>Mie Goreng</h3>
          <p>Mie goreng dengan bumbu gurih dan topping yang nikmat untuk menemani waktu istirahatmu.</p>
          <span class="price">Rp12.000</span>
          <a href="views/login/index.php" class="btn btn-primary">Pesan</a>
        </div>

        <div class="card">
          <div class="thumb">
            <img src="https://images.unsplash.com/photo-1556761223-4c4282c73f77?w=600&q=80&auto=format&fit=crop" alt="Makanan siap disantap">
          </div>
          <h3>Menu Spesial</h3>
          <p>Pilihan menu spesial yang tersedia di kantin untuk membuat waktu istirahatmu lebih menyenangkan.</p>
          <span class="price">Rp18.000</span>
          <a href="views/login/index.php" class="btn btn-primary">Pesan</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section contact" id="hubungi-kami">
    <div class="container">
      <div class="contact-left" style="flex:1;min-width:280px;">
        <h2>Hubungi <span style="color:var(--orange);">Kami</span></h2>
        <p>Punya pertanyaan atau saran tentang AD-Meals? Kami ingin mendengarnya.</p>
      </div>

      <form class="contact-form">
        <input type="text" placeholder="Nama kamu">
        <input type="email" placeholder="email@contoh.com">
        <textarea placeholder="Tulis pesan kamu"></textarea>
        <a onclick="alert('Pesan berhasil dikirim!')" class="btn btn-primary" style="text-align:center;">Kirim Pesan</a>
      </form>
    </div>
  </section>
  <script src="assets/js/header.js"></script>
  <?php include 'includes/footer.php'; ?>
</body>
</html>