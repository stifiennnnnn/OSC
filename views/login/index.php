<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/../../config/db.php';

if (isset($_SESSION['uid'])) {
  header("Location: /OSC/views/home/index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/login.css">
<body>
  <?php include '../../includes/header.php'; ?>
  <main class="login-page">
    <section class="left-panel">
      <div class="login-card">
        <h1 class="heading">Login</h1>

        <form action="../../controllers/login.php" method="POST">
          <div class="field">
            <label for="email">Email</label>
            <div class="input-wrap">
              <span class="input-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                  <path d="m4 7 8 6 8-6"></path>
                </svg>
              </span>
              <input class="input" id="email" name="email" type="email" placeholder="Enter your email address" autocomplete="email" required />
            </div>
          </div>

          <div class="field">
            <label for="password">Password</label>
            <div class="input-wrap">
              <span class="input-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="5" y="10" width="14" height="10" rx="2"></rect>
                  <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                  <circle cx="12" cy="15" r="1"></circle>
                </svg>
              </span>
              <input class="input" id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required />
              <button class="password-toggle" type="button" aria-label="Show password" onclick="togglePassword(this)">
                <svg id="password-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2.5 12s3.5-5 9.5-5 9.5 5 9.5 5-3.5 5-9.5 5-9.5-5-9.5-5Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>
              </button>
            </div>
          </div>

          <a class="forgot" onclick="alert('Verification email sent!')">Forgot Password?</a>

          <button class="login-button" type="submit">Login</button>
        </form>

        <div class="divider">Or Sign in with</div>

        <button onclick="window.location.href='../../controllers/google-login.php'" class="google-button" type="button">
          <svg class="google-icon" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#4285F4" d="M23.49 12.27c0-.79-.07-1.55-.2-2.27H12v4.3h6.44a5.51 5.51 0 0 1-2.39 3.61v3h3.87c2.27-2.09 3.57-5.17 3.57-8.64Z"/>
            <path fill="#34A853" d="M12 24c3.24 0 5.95-1.07 7.93-2.91l-3.87-3c-1.07.72-2.44 1.15-4.06 1.15-3.13 0-5.78-2.12-6.73-4.96H1.27v3.09A12 12 0 0 0 12 24Z"/>
            <path fill="#FBBC05" d="M5.27 14.28A7.24 7.24 0 0 1 4.89 12c0-.79.14-1.56.38-2.28V6.63H1.27A12 12 0 0 0 0 12c0 1.94.46 3.77 1.27 5.37l4-3.09Z"/>
            <path fill="#EA4335" d="M12 4.76c1.76 0 3.34.61 4.58 1.8l3.43-3.43C17.95 1.13 15.24 0 12 0A12 12 0 0 0 1.27 6.63l4 3.09C6.22 6.88 8.87 4.76 12 4.76Z"/>
          </svg>
          <span>Sign in with google</span>
        </button>

        <p class="signup">
          Don't have an account?
          <a href="../../views/register/index.php">Create an account</a>
        </p>
      </div>
    </section>

    <section class="right-panel" aria-hidden="true">
      
    </section>
  </main>
  <script src="../../assets/js/login.js"></script>
  <?php include '../../includes/footer.php'; ?>
</body>
</html>