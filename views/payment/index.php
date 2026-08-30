<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/payment.css">
<body>
    <?php include '../../includes/header-main.php'; ?>
    <main>
        <div class="checkout-wrapper">
            <div class="kiri">
                <div class="payment-box">
                    <h2 class="title">Payment</h2>

                    <div class="summary-section">
                        <p class="summary-title">Order Summary:</p>
                        <ul class="summary-list">
                            <li>1x Martabak Telur</li><span class="price">Rp. 5.000</span>
                            <li>1x Nasi Ayam Geprek</li><span class="price">Rp. 25.000</span>
                            <li>1x Nasi Goreng</li><span class="price">Rp. 20.000</span>
                            <li>1x Ayam Gulai</li><span class="price">Rp. 30.000</span>
                        </ul>

                        <p class="subtotal-title">Subtotal:</p>
                        <p class="subtotal-price">Rp. 80.000</p>
                    </div>

                    <div class="total-section">
                        <h3>Total:</h3>
                        <h1 class="total-price">Rp. 80.000</h1>
                    </div>
                </div>
            </div>

            <div class="kanan">
                <div class="method-box">
                    <h2 class="title">Choose Your Payment Method</h2>

                    <div class="payment-grid">
                        <button class="method-card"><img src="../../assets/images/qris.png" alt="QRIS"></button>
                        <button class="method-card"><img src="../../assets/images/ovo.png" alt="OVO"></button>
                        <button class="method-card"><img src="../../assets/images/gopay.png" alt="GoPay"></button>
                        <button class="method-card"><img src="../../assets/images/shopeepay.png" alt="ShopeePay"></button>
                        <button class="method-card"><img src="../../assets/images/dana.png" alt="DANA"></button>
                        <button class="method-card"><img src="../../assets/images/linkaja.png" alt="LinkAja"></button>
                        <button class="method-card"><img src="../../assets/images/bca.png" alt="BCA"></button>
                        <button class="method-card"><img src="../../assets/images/cash.png" alt="Cash"></button>
                        <button class="method-card"><img src="../../assets/images/card.png" alt="Card"></button>
                    </div>

                    <button class="btn-proceed">Proceed with Payment</button>
                </div>
            </div>
        </div>
    </main>
    <script>
        const methodCards = document.querySelectorAll('.method-card');
        methodCards.forEach(card => {
            card.addEventListener('click', () => {
                methodCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
            });
        });
    </script>
    <?php include '../../includes/footer.php'; ?>   
</body> 
