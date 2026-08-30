<?php
session_start();

include '../../includes/head.php';

if (!isset($_SESSION['uid'])) {
    header('Location: ../../views/login/index.php');
    exit;
}

$uid = (int) $_SESSION['uid'];

$query = "
    SELECT
        orders.order_id,
        orders.item_id,
        orders.item_quantity,
        orders.order_status,
        orders.order_time,
        orders.payment_method,
        orders.order_note,
        item.item_name,
        item.item_price
    FROM orders
    INNER JOIN item
        ON orders.item_id = item.item_id
    WHERE orders.uid = ?
    ORDER BY orders.order_time DESC
";

$stmt = mysqli_prepare($connection, $query);

mysqli_stmt_bind_param(
    $stmt,
    'i',
    $uid
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="../../assets/css/history.css">

<body>

<?php include '../../includes/header-main.php'; ?>

<main>
    <div class="kotak-history">

        <h2 class="title">Order History</h2>

        <div class="history-list">

            <?php if (mysqli_num_rows($result) === 0): ?>

                <div class="order-card">
                    <p>No orders found.</p>
                </div>

            <?php else: ?>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <?php
                    $imagePath =
                        '../../assets/images/' .
                        $row['item_id'] .
                        '.png';

                    if (!file_exists($imagePath)) {
                        $imagePath =
                            '../../assets/images/' .
                            $row['item_id'] .
                            '.jpg';
                    }

                    $status =
                        strtolower(
                            $row['order_status']
                        );

                    $statusClass = 'status-success';

                    if (
                        $status === 'cancelled' ||
                        $status === 'canceled'
                    ) {
                        $statusClass =
                            'status-cancelled';
                    } elseif (
                        $status === 'done' ||
                        $status === 'completed' ||
                        $status === 'successful'
                    ) {
                        $statusClass =
                            'status-done';
                    } elseif (
                        $status === 'pending'
                    ) {
                        $statusClass =
                            'status-success';
                    }

                    $displayStatus =
                        ucfirst(
                            $row['order_status']
                        );

                    $orderDate =
                        date(
                            'D, d M Y',
                            strtotime(
                                $row['order_time']
                            )
                        );

                    $orderTime =
                        date(
                            'H.i',
                            strtotime(
                                $row['order_time']
                            )
                        );

                    $itemTotal =
                        $row['item_price'] *
                        $row['item_quantity'];
                    ?>

                    <div class="order-card">

                        <div class="card-left">

                            <img
                                src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($row['item_name']); ?>"
                            >

                            <div class="item-info">

                                <h3>
                                    <?php
                                    echo htmlspecialchars(
                                        $row['item_name']
                                    );
                                    ?>
                                </h3>

                                <p class="quantity">
                                    <?php
                                    echo $row['item_quantity'];
                                    ?>x
                                </p>

                                <p class="price">
                                    Rp<?php
                                    echo number_format(
                                        $itemTotal,
                                        0,
                                        ',',
                                        '.'
                                    );
                                    ?>
                                </p>

                            </div>

                        </div>

                        <div class="card-right">

                            <span
                                class="status <?php echo $statusClass; ?>"
                            >
                                <?php
                                echo htmlspecialchars(
                                    $displayStatus
                                );
                                ?>
                            </span>

                            <p class="date">
                                <?php
                                echo $orderDate;
                                ?>
                            </p>

                            <p class="time">
                                Order Time:
                                <?php
                                echo $orderTime;
                                ?>
                            </p>

                            <p class="time">
                                Payment:
                                <?php
                                echo htmlspecialchars(
                                    $row['payment_method']
                                );
                                ?>
                            </p>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>
</main>
<br><br><br><br>

<?php include '../../includes/footer.php'; ?>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
?>