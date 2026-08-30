<?php
session_start();

ob_start();
include '../../includes/head.php';
ob_end_clean();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    try {
        if (!isset($connection)) {
            throw new Exception('Database connection not found.');
        }

        $uid = $_SESSION['uid'] ?? null;

        if (!$uid) {
            throw new Exception('User is not logged in.');
        }

        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        if (!$data) {
            throw new Exception('Invalid request data.');
        }

        if (
            !isset($data['cart']) ||
            !is_array($data['cart']) ||
            count($data['cart']) === 0
        ) {
            throw new Exception('Your cart is empty.');
        }

        if (
            !isset($data['payment_method']) ||
            empty($data['payment_method'])
        ) {
            throw new Exception('Payment method is required.');
        }

        $uid = (int) $uid;

        $payment_method =
            trim($data['payment_method']);

        $note =
            isset($data['note'])
                ? trim($data['note'])
                : null;

        $allowed_methods = [
            'QRIS',
            'OVO',
            'GoPay',
            'ShopeePay',
            'DANA',
            'LinkAja',
            'BCA',
            'Cash',
            'Card'
        ];

        if (
            !in_array(
                $payment_method,
                $allowed_methods,
                true
            )
        ) {
            throw new Exception(
                'Invalid payment method.'
            );
        }

        $order_status = 'Pending';
        $order_time = date('Y-m-d H:i:s');

        $connection->begin_transaction();

        $stmt = $connection->prepare(
            "INSERT INTO orders
            (
                uid,
                item_id,
                item_quantity,
                order_status,
                order_time,
                payment_method,
                order_note
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            throw new Exception(
                'Prepare failed: ' .
                $connection->error
            );
        }

        foreach ($data['cart'] as $item) {
            if (
                !isset($item['item_id']) ||
                !isset($item['quantity'])
            ) {
                throw new Exception(
                    'Invalid item data.'
                );
            }

            $item_id =
                (int) $item['item_id'];

            $item_quantity =
                (int) $item['quantity'];

            if (
                $item_id <= 0 ||
                $item_quantity <= 0
            ) {
                throw new Exception(
                    'Invalid item ID or quantity.'
                );
            }

            $stmt->bind_param(
                'iiissss',
                $uid,
                $item_id,
                $item_quantity,
                $order_status,
                $order_time,
                $payment_method,
                $note
            );

            if (!$stmt->execute()) {
                throw new Exception(
                    'Insert failed: ' .
                    $stmt->error
                );
            }
        }

        $stmt->close();

        $connection->commit();

        echo json_encode([
            'success' => true,
            'message' => 'Order placed successfully.'
        ]);

        exit;

    } catch (Throwable $e) {
        if (
            isset($connection) &&
            $connection->connect_errno === 0
        ) {
            $connection->rollback();
        }

        http_response_code(500);

        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);

        exit;
    }
}
?>

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

                        <p class="summary-title">
                            Order Summary:
                        </p>

                        <ul
                            class="summary-list"
                            id="summary-list"
                        ></ul>

                        <p class="subtotal-title">
                            Subtotal:
                        </p>

                        <p
                            class="subtotal-price"
                            id="subtotal-price"
                        >
                            Rp. 0
                        </p>

                    </div>

                    <div class="total-section">

                        <h3>Total:</h3>

                        <h1
                            class="total-price"
                            id="total-price"
                        >
                            Rp. 0
                        </h1>

                    </div>

                </div>
            </div>

            <div class="kanan">

                <div class="method-box">

                    <h2 class="title">
                        Choose Your Payment Method
                    </h2>

                    <div class="payment-grid">

                        <button
                            type="button"
                            class="method-card"
                            data-method="QRIS"
                        >
                            <img
                                src="../../assets/images/qris.png"
                                alt="QRIS"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="OVO"
                        >
                            <img
                                src="../../assets/images/ovo.png"
                                alt="OVO"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="GoPay"
                        >
                            <img
                                src="../../assets/images/gopay.png"
                                alt="GoPay"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="ShopeePay"
                        >
                            <img
                                src="../../assets/images/shopeepay.png"
                                alt="ShopeePay"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="DANA"
                        >
                            <img
                                src="../../assets/images/dana.png"
                                alt="DANA"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="LinkAja"
                        >
                            <img
                                src="../../assets/images/linkaja.png"
                                alt="LinkAja"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="BCA"
                        >
                            <img
                                src="../../assets/images/bca.png"
                                alt="BCA"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="Cash"
                        >
                            <img
                                src="../../assets/images/cash.png"
                                alt="Cash"
                            >
                        </button>

                        <button
                            type="button"
                            class="method-card"
                            data-method="Card"
                        >
                            <img
                                src="../../assets/images/card.png"
                                alt="Card"
                            >
                        </button>

                    </div>

                    <button
                        type="button"
                        class="btn-proceed"
                        onclick="proceedWithPayment()"
                    >
                        Proceed with Payment
                    </button>

                </div>

            </div>

        </div>
    </main>

    <script>
    const orderDetails =
        JSON.parse(
            sessionStorage.getItem('orderDetails')
        ) || null;

    const summaryList =
        document.getElementById('summary-list');

    const subtotalPrice =
        document.getElementById('subtotal-price');

    const totalPrice =
        document.getElementById('total-price');

    const methodCards =
        document.querySelectorAll('.method-card');

    let selectedMethod = null;

    function formatRupiah(price) {
        return 'Rp. ' +
            Number(price).toLocaleString('id-ID');
    }

    function loadOrder() {
        if (
            !orderDetails ||
            !orderDetails.cart ||
            orderDetails.cart.length === 0
        ) {
            summaryList.innerHTML =
                '<li>Your order is empty.</li>';

            subtotalPrice.textContent = 'Rp. 0';
            totalPrice.textContent = 'Rp. 0';

            return;
        }

        let total = 0;

        orderDetails.cart.forEach(item => {

            const quantity =
                Number(item.quantity);

            const price =
                Number(item.item_price);

            const subtotal =
                price * quantity;

            total += subtotal;

            const listItem =
                document.createElement('li');

            listItem.textContent =
                quantity +
                'x ' +
                item.item_name;

            const priceElement =
                document.createElement('span');

            priceElement.className = 'price';

            priceElement.textContent =
                formatRupiah(subtotal);

            summaryList.appendChild(listItem);
            summaryList.appendChild(priceElement);
        });

        subtotalPrice.textContent =
            formatRupiah(total);

        totalPrice.textContent =
            formatRupiah(total);
    }

    methodCards.forEach(card => {

        card.addEventListener('click', () => {

            methodCards.forEach(c => {
                c.classList.remove('active');
            });

            card.classList.add('active');

            selectedMethod =
                card.dataset.method;
        });

    });

    async function proceedWithPayment() {

        if (
            !orderDetails ||
            !orderDetails.cart ||
            orderDetails.cart.length === 0
        ) {
            alert('Your order is empty.');
            return;
        }

        if (!selectedMethod) {
            alert('Please select a payment method.');
            return;
        }

        const paymentData = {
            cart: orderDetails.cart,
            pickup_date:
                orderDetails.pickup_date || '',
            pickup_time:
                orderDetails.pickup_time || '',
            note:
                orderDetails.note || '',
            payment_method:
                selectedMethod
        };

        try {

            const response =
                await fetch(
                    window.location.href,
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type':
                                'application/json'
                        },
                        body:
                            JSON.stringify(paymentData)
                    }
                );

            const result =
                await response.json();

            if (result.success) {

                sessionStorage.removeItem('cart');

                sessionStorage.removeItem(
                    'orderDetails'
                );

                sessionStorage.setItem(
                    'paymentDetails',
                    JSON.stringify(paymentData)
                );

                alert(
                    'Order placed successfully.'
                );

                window.location.href =
                    '../../views/home/index.php';

            } else {

                alert(
                    result.message ||
                    'Failed to place order.'
                );
            }

        } catch (error) {

            console.error(error);

            alert(
                'Server error: ' +
                error.message
            );
        }
    }

    loadOrder();
    </script>

<?php include '../../includes/footer.php'; ?>

</body>
</html>