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

        <div id="cart-container"></div>

        <button class="add" type="button" onclick="backToItems()">
          Back to Menu
        </button>
      </div>
    </div>

    <div class="kanan">
      <div class="pickup">
        <h4 class="heading2">Pickup Time</h4>
        <p class="sub2">Choose your preferred time to pick up your orders.</p>

        <div class="pickup-body">
          <div class="tanggal">
            <div class="tgl-col">
              <button type="button" class="tgl-btn">Mon<br>10 Aug</button>
              <button type="button" class="tgl-btn">Tue<br>11 Aug</button>
              <button type="button" class="tgl-btn">Wed<br>12 Aug</button>
            </div>

            <div class="tgl-col offset">
              <button type="button" class="tgl-btn">Thu<br>13 Aug</button>
              <button type="button" class="tgl-btn">Fri<br>14 Aug</button>
            </div>
          </div>

          <div class="jam">
            <button type="button" class="jam-btn">9:00</button>
            <button type="button" class="jam-btn">9:15</button>
            <button type="button" class="jam-btn">9:30</button>
            <button type="button" class="jam-btn">09:45</button>
            <button type="button" class="jam-btn">10:00</button>
            <button type="button" class="jam-btn">10:15</button>
            <button type="button" class="jam-btn">10:30</button>
            <button type="button" class="jam-btn">10:45</button>
            <button type="button" class="jam-btn">11:15</button>
            <button type="button" class="jam-btn">11:45</button>
          </div>

          <div class="catatan">
            <label for="note">Leave A Note(Optional)</label>
            <textarea id="note"></textarea>
          </div>
        </div>
      </div>

      <div class="total-box">
        <h2>Total:</h2>
        <h1 class="total-price" id="total-price">Rp. 0</h1>

        <button
          type="button"
          class="btn-checkout"
          onclick="proceedToPayment()"
        >
          Proceed to Payment
        </button>
      </div>
    </div>
  </div>

  <script>
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    const cartContainer = document.getElementById('cart-container');
    const totalPrice = document.getElementById('total-price');

    function formatRupiah(price) {
      return 'Rp' + Number(price).toLocaleString('id-ID');
    }

    function renderCart() {
      cartContainer.innerHTML = '';

      if (cart.length === 0) {
        cartContainer.innerHTML = '<p>Your cart is empty.</p>';
        totalPrice.textContent = 'Rp. 0';
        return;
      }

      let total = 0;

      cart.forEach((item, index) => {
        const itemPrice = Number(item.item_price);
        const quantity = Number(item.quantity);
        const subtotal = itemPrice * quantity;

        total += subtotal;

        const cartItem = document.createElement('div');
        cartItem.className = 'cart-isi';

        cartItem.innerHTML = `
          <img
            src="../../assets/images/${item.item_id}.png"
            alt="${item.item_name}"
            onerror="this.onerror=null; this.src='../../assets/images/${item.item_id}.jpg';"
          >

          <span class="badge">${index + 1}</span>

          <div class="detail">
            <h3>${item.item_name}</h3>
            <p class="price">${formatRupiah(itemPrice)}</p>
          </div>

          <div class="qty">
            <button
              type="button"
              onclick="decreaseQuantity(${index})"
            >
              -
            </button>

            <span>${quantity}</span>

            <button
              type="button"
              onclick="increaseQuantity(${index})"
            >
              +
            </button>
          </div>
        `;

        cartContainer.appendChild(cartItem);
      });

      totalPrice.textContent =
        'Rp. ' + total.toLocaleString('id-ID');
    }

    function increaseQuantity(index) {
      cart[index].quantity++;

      sessionStorage.setItem(
        'cart',
        JSON.stringify(cart)
      );

      renderCart();
    }

    function decreaseQuantity(index) {
      if (cart[index].quantity > 1) {
        cart[index].quantity--;
      } else {
        cart.splice(index, 1);
      }

      sessionStorage.setItem(
        'cart',
        JSON.stringify(cart)
      );

      renderCart();
    }

    function backToItems() {
      const vendorId =
        new URLSearchParams(window.location.search)
          .get('vendor_id');

      if (vendorId) {
        window.location.href =
          '../../views/item/index.php?vendor_id=' + vendorId;
      } else {
        window.history.back();
      }
    }

    function proceedToPayment() {
      if (cart.length === 0) {
        alert('Your cart is empty.');
        return;
      }

      const selectedDate =
        document.querySelector('.tgl-btn.active');

      const selectedTime =
        document.querySelector('.jam-btn.active');

      const note =
        document.getElementById('note').value;

      if (!selectedDate) {
        alert('Please select a pickup date.');
        return;
      }

      if (!selectedTime) {
        alert('Please select a pickup time.');
        return;
      }

      const orderDetails = {
        cart: cart,
        pickup_date: selectedDate.innerText,
        pickup_time: selectedTime.innerText,
        note: note
      };

      sessionStorage.setItem(
        'orderDetails',
        JSON.stringify(orderDetails)
      );

      window.location.href =
        '../../views/payment/index.php';
    }

    const tglBtns =
      document.querySelectorAll('.tgl-btn');

    tglBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        tglBtns.forEach(b => {
          b.classList.remove('active');
        });

        btn.classList.add('active');
      });
    });

    const jamBtns =
      document.querySelectorAll('.jam-btn');

    jamBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        jamBtns.forEach(b => {
          b.classList.remove('active');
        });

        btn.classList.add('active');
      });
    });

    renderCart();
  </script>

  <?php include '../../includes/footer.php'; ?>
</body>
</html>