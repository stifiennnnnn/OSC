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
            <!-- <a href="../../views/home/index.php">
                <img src="../../assets/images/ARROW.png" class="return" alt="back">
            </a> -->
            <h2 class="Choices2">All Items</h2>
            <div class="pick">
                <?php 
                    $vendor_id = isset($_GET['vendor_id']) ? (int)$_GET['vendor_id'] : null;

                    $query = "SELECT * FROM item WHERE vendor_id = '$vendor_id'";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="menu-item" 
                                    data-item-id="' . $row['item_id'] . '"
                                    data-item-name="' . htmlspecialchars($row['item_name']) . '"
                                    data-item-price="' . $row['item_price'] . '">';

                        if (file_exists('../../assets/images/' . $row['item_id'] . '.png')) {
                            echo '<img src="../../assets/images/' . $row['item_id'] . '.png" alt="ilust makanan">';
                        } else {
                            echo '<img src="../../assets/images/' . $row['item_id'] . '.jpg" alt="ilust makanan">';
                        }

                        echo '<p>' . htmlspecialchars($row['item_name']) . '</p>';
                        echo '<p>Rp ' . number_format($row['item_price'], 0, ',', '.') . '</p>';

                        echo '<div class="quantity">';
                        echo '<button type="button" onclick="decreaseQuantity(this)">-</button>';
                        echo '<span>0</span>';
                        echo '<button type="button" onclick="increaseQuantity(this)">+</button>';
                        echo '</div>';

                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        
        <div class="proceed-button">
            <button class="btn-proceed" onclick="proceedToOrders()">
                Proceed to Orders
            </button>
        </div>
      </section>
    </main>
    <?php include '../../includes/footer.php'; ?>
    <script>
        function increaseQuantity(button) {
            const menuItem = button.closest('.menu-item');
            const quantity = menuItem.querySelector('.quantity span');

            let value = parseInt(quantity.textContent);

            quantity.textContent = value + 1;
            quantity.style.color = 'var(--orange)';
        }

        function decreaseQuantity(button) {
            const menuItem = button.closest('.menu-item');
            const quantity = menuItem.querySelector('.quantity span');

            let value = parseInt(quantity.textContent);

            if (value > 0) {
                quantity.textContent = value - 1;

                if (value - 1 === 0) {
                    quantity.style.color = 'var(--text)';
                }
            }
        }

        function proceedToOrders() {
            const menuItems = document.querySelectorAll('.menu-item');
            const cart = [];

            menuItems.forEach(item => {
                const quantity = parseInt(
                    item.querySelector('.quantity span').textContent
                );

                if (quantity > 0) {
                    cart.push({
                        item_id: item.dataset.itemId,
                        item_name: item.dataset.itemName,
                        item_price: parseInt(item.dataset.itemPrice),
                        quantity: quantity
                    });
                }
            });

            if (cart.length === 0) {
                alert('Please select at least one item.');
                return;
            }

            sessionStorage.setItem(
                'cart',
                JSON.stringify(cart)
            );

            const vendorId =
                new URLSearchParams(window.location.search)
                    .get('vendor_id');

            window.location.href =
                '../../views/orders/index.php?vendor_id=' + vendorId;
        }
    </script>
</body>
</html>