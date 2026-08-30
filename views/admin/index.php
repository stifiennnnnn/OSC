<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../../config/db.php';

$admin_password = 'admin';
$is_authenticated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_authenticated'] = true;
        $is_authenticated = true;
    } else {
        $error = 'Kata sandi salah';
    }
}

if (isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated']) {
    $is_authenticated = true;
}

if ($is_authenticated) {
    $table = isset($_GET['table']) ? $_GET['table'] : 'dashboard';
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action_type'])) {
            $action_type = $_POST['action_type'];

            if ($action_type === 'add_vendor') {
                $name = mysqli_real_escape_string($connection, $_POST['vendor_name']);
                $email = mysqli_real_escape_string($connection, $_POST['vendor_email']);
                $active = isset($_POST['vendor_active']) ? 1 : 0;
                mysqli_query($connection, "INSERT INTO vendor (vendor_name, vendor_email, vendor_active) VALUES ('$name', '$email', $active)");
                header("Location: /OSC/views/admin/index.php?table=vendor");
                exit();
            } elseif ($action_type === 'edit_vendor') {
                $vid = intval($_POST['vendor_id']);
                $name = mysqli_real_escape_string($connection, $_POST['vendor_name']);
                $email = mysqli_real_escape_string($connection, $_POST['vendor_email']);
                $active = isset($_POST['vendor_active']) ? 1 : 0;
                mysqli_query($connection, "UPDATE vendor SET vendor_name='$name', vendor_email='$email', vendor_active=$active WHERE vendor_id=$vid");
                header("Location: /OSC/views/admin/index.php?table=vendor");
                exit();
            } elseif ($action_type === 'delete_vendor') {
                $vid = intval($_POST['vendor_id']);
                mysqli_query($connection, "DELETE FROM vendor WHERE vendor_id=$vid");
                header("Location: /OSC/views/admin/index.php?table=vendor");
                exit();
            } elseif ($action_type === 'add_item') {
                $vendor_id = intval($_POST['vendor_id']);
                $name = mysqli_real_escape_string($connection, $_POST['item_name']);
                $price = intval($_POST['item_price']);
                $count = intval($_POST['item_count']);
                mysqli_query($connection, "INSERT INTO item (vendor_id, item_name, item_price, item_count) VALUES ($vendor_id, '$name', $price, $count)");
                header("Location: /OSC/views/admin/index.php?table=item");
                exit();
            } elseif ($action_type === 'edit_item') {
                $iid = intval($_POST['item_id']);
                $vendor_id = intval($_POST['vendor_id']);
                $name = mysqli_real_escape_string($connection, $_POST['item_name']);
                $price = intval($_POST['item_price']);
                $count = intval($_POST['item_count']);
                mysqli_query($connection, "UPDATE item SET vendor_id=$vendor_id, item_name='$name', item_price=$price, item_count=$count WHERE item_id=$iid");
                header("Location: /OSC/views/admin/index.php?table=item");
                exit();
            } elseif ($action_type === 'delete_item') {
                $iid = intval($_POST['item_id']);
                mysqli_query($connection, "DELETE FROM item WHERE item_id=$iid");
                header("Location: /OSC/views/admin/index.php?table=item");
                exit();
            } elseif ($action_type === 'add_user') {
                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                mysqli_query($connection, "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')");
                header("Location: /OSC/views/admin/index.php?table=user");
                exit();
            } elseif ($action_type === 'edit_user') {
                $uid = intval($_POST['uid']);
                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                if (!empty($_POST['password'])) {
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    mysqli_query($connection, "UPDATE user SET username='$username', email='$email', password='$password' WHERE uid=$uid");
                } else {
                    mysqli_query($connection, "UPDATE user SET username='$username', email='$email' WHERE uid=$uid");
                }
                header("Location: /OSC/views/admin/index.php?table=user");
                exit();
            } elseif ($action_type === 'delete_user') {
                $uid = intval($_POST['uid']);
                mysqli_query($connection, "DELETE FROM user WHERE uid=$uid");
                header("Location: /OSC/views/admin/index.php?table=user");
                exit();
            } elseif ($action_type === 'update_order_status') {
                $oid = intval($_POST['order_id']);
                $status = mysqli_real_escape_string($connection, $_POST['order_status']);
                mysqli_query($connection, "UPDATE orders SET order_status='$status' WHERE order_id=$oid");
                header("Location: /OSC/views/admin/index.php?table=orders");
                exit();
            } elseif ($action_type === 'delete_order') {
                $oid = intval($_POST['order_id']);
                mysqli_query($connection, "DELETE FROM orders WHERE order_id=$oid");
                header("Location: /OSC/views/admin/index.php?table=orders");
                exit();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AD Meals</title>
    <link rel="stylesheet" href="/OSC/assets/css/main.css">
    <link rel="stylesheet" href="/OSC/assets/css/admin.css">
</head>
<body>
    <?php if (!$is_authenticated): ?>
        <div class="password-wall">
            <div class="password-form">
                <h2>Admin Access</h2>
                <?php if (isset($error)): ?>
                    <div class="password-error"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="password" name="password" placeholder="Masukkan kata sandi admin" required>
                    <button type="submit">Masuk</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="admin-container">
            <div class="dashboard-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Admin Dashboard</h1>
                    <a href="/OSC/controllers/logout.php" class="logout-btn">Logout</a>
                </div>
            </div>

            <div class="admin-nav">
                <a href="/OSC/views/admin/index.php" class="nav-btn <?php echo $table === 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
                <a href="/OSC/views/admin/index.php?table=vendor" class="nav-btn <?php echo $table === 'vendor' ? 'active' : ''; ?>">Vendor</a>
                <a href="/OSC/views/admin/index.php?table=item" class="nav-btn <?php echo $table === 'item' ? 'active' : ''; ?>">Item</a>
                <a href="/OSC/views/admin/index.php?table=user" class="nav-btn <?php echo $table === 'user' ? 'active' : ''; ?>">User</a>
                <a href="/OSC/views/admin/index.php?table=orders" class="nav-btn <?php echo $table === 'orders' ? 'active' : ''; ?>">Orders</a>
            </div>

            <?php if ($table === 'dashboard'): ?>
                <div class="stats-grid">
                <div class="stats-grid">
                    <?php
                    $vendorCount = mysqli_query($connection, "SELECT COUNT(*) as count FROM vendor");
                    $vendorRow = mysqli_fetch_assoc($vendorCount);
                    
                    $itemCount = mysqli_query($connection, "SELECT COUNT(*) as count FROM item");
                    $itemRow = mysqli_fetch_assoc($itemCount);
                    
                    $orderCount = mysqli_query($connection, "SELECT COUNT(*) as count FROM orders");
                    $orderRow = mysqli_fetch_assoc($orderCount);
                    
                    $userCount = mysqli_query($connection, "SELECT COUNT(*) as count FROM user");
                    $userRow = mysqli_fetch_assoc($userCount);
                    ?>
                    <div class="stat-card">
                        <h3>Total Vendors</h3>
                        <div class="value"><?php echo $vendorRow['count']; ?></div>
                    </div>
                    <div class="stat-card">
                        <h3>Total Items</h3>
                        <div class="value"><?php echo $itemRow['count']; ?></div>
                    </div>
                    <div class="stat-card">
                        <h3>Total Orders</h3>
                        <div class="value"><?php echo $orderRow['count']; ?></div>
                    </div>
                    <div class="stat-card">
                        <h3>Total Users</h3>
                        <div class="value"><?php echo $userRow['count']; ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($table === 'vendor'): ?>
                <div class="section">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2>Vendor Management</h2>
                        <button class="btn-add" onclick="document.getElementById('addVendorForm').style.display = document.getElementById('addVendorForm').style.display === 'none' ? 'block' : 'none'">+ Add Vendor</button>
                    </div>

                    <div class="search-box">
                        <form method="GET" style="display: flex; gap: 0.5rem;">
                            <input type="hidden" name="table" value="vendor">
                            <input type="text" name="search" placeholder="Search vendor..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn-search">Search</button>
                        </form>
                    </div>

                    <div id="addVendorForm" class="form-container" style="display: none; margin-bottom: 1.5rem;">
                        <h3>Add New Vendor</h3>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="add_vendor">
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="vendor_email">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="vendor_active" checked> Active
                                </label>
                            </div>
                            <button type="submit" class="btn-submit">Add Vendor</button>
                        </form>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $where = $search ? "WHERE vendor_name LIKE '%$search%' OR vendor_email LIKE '%$search%'" : '';
                            $vendors = mysqli_query($connection, "SELECT * FROM vendor $where");
                            
                            if (mysqli_num_rows($vendors) > 0) {
                                while ($v = mysqli_fetch_assoc($vendors)) {
                                    $status = $v['vendor_active'] ? 'active' : 'inactive';
                                    echo "
                                    <tr>
                                        <td>#{$v['vendor_id']}</td>
                                        <td>{$v['vendor_name']}</td>
                                        <td>{$v['vendor_email']}</td>
                                        <td><span class='status {$status}'>" . ($v['vendor_active'] ? 'Aktif' : 'Inactive') . "</span></td>
                                        <td>
                                            <form method='POST' style='display: inline;'>
                                                <input type='hidden' name='action_type' value='delete_vendor'>
                                                <input type='hidden' name='vendor_id' value='{$v['vendor_id']}'>
                                                <button type='submit' class='btn-danger' onclick='return confirm(\"Delete this vendor?\")'>Delete</button>
                                            </form>
                                            <button class='btn-edit' onclick='editVendor({$v['vendor_id']}, \"" . htmlspecialchars($v['vendor_name']) . "\", \"" . htmlspecialchars($v['vendor_email']) . "\", {$v['vendor_active']})'>Edit</button>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='5' style='text-align: center; color: #999;'>No vendors found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="editVendorModal" style="display: none;" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="document.getElementById('editVendorModal').style.display='none'">&times;</span>
                        <h2>Edit Vendor</h2>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="edit_vendor">
                            <input type="hidden" name="vendor_id" id="editVendorId">
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" id="editVendorName" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="vendor_email" id="editVendorEmail">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="vendor_active" id="editVendorActive"> Active
                                </label>
                            </div>
                            <button type="submit" class="btn-submit">Update Vendor</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($table === 'item'): ?>
                <div class="section">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2>Item Management</h2>
                        <button class="btn-add" onclick="document.getElementById('addItemForm').style.display = document.getElementById('addItemForm').style.display === 'none' ? 'block' : 'none'">+ Add Item</button>
                    </div>

                    <div class="search-box">
                        <form method="GET" style="display: flex; gap: 0.5rem;">
                            <input type="hidden" name="table" value="item">
                            <input type="text" name="search" placeholder="Search item..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn-search">Search</button>
                        </form>
                    </div>

                    <div id="addItemForm" class="form-container" style="display: none; margin-bottom: 1.5rem;">
                        <h3>Add New Item</h3>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="add_item">
                            <div class="form-group">
                                <label>Vendor</label>
                                <select name="vendor_id" required>
                                    <?php
                                    $vendors = mysqli_query($connection, "SELECT vendor_id, vendor_name FROM vendor");
                                    while ($v = mysqli_fetch_assoc($vendors)) {
                                        echo "<option value='{$v['vendor_id']}'>{$v['vendor_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="item_name" required>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="item_price" required>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="item_count" required>
                            </div>
                            <button type="submit" class="btn-submit">Add Item</button>
                        </form>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $where = $search ? "WHERE i.item_name LIKE '%$search%' OR v.vendor_name LIKE '%$search%'" : '';
                            $items = mysqli_query($connection, "
                                SELECT i.*, v.vendor_name 
                                FROM item i 
                                JOIN vendor v ON i.vendor_id = v.vendor_id 
                                $where
                            ");
                            
                            if (mysqli_num_rows($items) > 0) {
                                while ($item = mysqli_fetch_assoc($items)) {
                                    echo "
                                    <tr>
                                        <td>#{$item['item_id']}</td>
                                        <td>{$item['item_name']}</td>
                                        <td>{$item['vendor_name']}</td>
                                        <td>Rp " . number_format($item['item_price'], 0, ',', '.') . "</td>
                                        <td>{$item['item_count']}</td>
                                        <td>
                                            <form method='POST' style='display: inline;'>
                                                <input type='hidden' name='action_type' value='delete_item'>
                                                <input type='hidden' name='item_id' value='{$item['item_id']}'>
                                                <button type='submit' class='btn-danger' onclick='return confirm(\"Delete this item?\")'>Delete</button>
                                            </form>
                                            <button class='btn-edit' onclick='editItem({$item['item_id']}, {$item['vendor_id']}, \"" . htmlspecialchars($item['item_name']) . "\", {$item['item_price']}, {$item['item_count']})'>Edit</button>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='6' style='text-align: center; color: #999;'>No items found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="editItemModal" style="display: none;" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="document.getElementById('editItemModal').style.display='none'">&times;</span>
                        <h2>Edit Item</h2>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="edit_item">
                            <input type="hidden" name="item_id" id="editItemId">
                            <div class="form-group">
                                <label>Vendor</label>
                                <select name="vendor_id" id="editItemVendor" required>
                                    <?php
                                    $vendors = mysqli_query($connection, "SELECT vendor_id, vendor_name FROM vendor");
                                    while ($v = mysqli_fetch_assoc($vendors)) {
                                        echo "<option value='{$v['vendor_id']}'>{$v['vendor_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="item_name" id="editItemName" required>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="item_price" id="editItemPrice" required>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="item_count" id="editItemCount" required>
                            </div>
                            <button type="submit" class="btn-submit">Update Item</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($table === 'user'): ?>
                <div class="section">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2>User Management</h2>
                        <button class="btn-add" onclick="document.getElementById('addUserForm').style.display = document.getElementById('addUserForm').style.display === 'none' ? 'block' : 'none'">+ Add User</button>
                    </div>

                    <div class="search-box">
                        <form method="GET" style="display: flex; gap: 0.5rem;">
                            <input type="hidden" name="table" value="user">
                            <input type="text" name="search" placeholder="Search user..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn-search">Search</button>
                        </form>
                    </div>

                    <div id="addUserForm" class="form-container" style="display: none; margin-bottom: 1.5rem;">
                        <h3>Add New User</h3>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="add_user">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" required>
                            </div>
                            <button type="submit" class="btn-submit">Add User</button>
                        </form>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Google Account</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $where = $search ? "WHERE username LIKE '%$search%' OR email LIKE '%$search%'" : '';
                            $users = mysqli_query($connection, "SELECT * FROM user $where");
                            
                            if (mysqli_num_rows($users) > 0) {
                                while ($user = mysqli_fetch_assoc($users)) {
                                    echo "
                                    <tr>
                                        <td>#{$user['uid']}</td>
                                        <td>{$user['username']}</td>
                                        <td>{$user['email']}</td>
                                        <td>" . ($user['google'] ? $user['google'] : '-') . "</td>
                                        <td>
                                            <form method='POST' style='display: inline;'>
                                                <input type='hidden' name='action_type' value='delete_user'>
                                                <input type='hidden' name='uid' value='{$user['uid']}'>
                                                <button type='submit' class='btn-danger' onclick='return confirm(\"Delete this user?\")'>Delete</button>
                                            </form>
                                            <button class='btn-edit' onclick='editUser({$user['uid']}, \"" . htmlspecialchars($user['username']) . "\", \"" . htmlspecialchars($user['email']) . "\")'>Edit</button>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='5' style='text-align: center; color: #999;'>No users found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="editUserModal" style="display: none;" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="document.getElementById('editUserModal').style.display='none'">&times;</span>
                        <h2>Edit User</h2>
                        <form method="POST">
                            <input type="hidden" name="action_type" value="edit_user">
                            <input type="hidden" name="uid" id="editUserId">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="editUserUsername" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="editUserEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Password (leave blank to keep current)</label>
                                <input type="password" name="password" id="editUserPassword">
                            </div>
                            <button type="submit" class="btn-submit">Update User</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($table === 'orders'): ?>
                <div class="section">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2>Order Management</h2>
                    </div>

                    <div class="search-box">
                        <form method="GET" style="display: flex; gap: 0.5rem;">
                            <input type="hidden" name="table" value="orders">
                            <input type="text" name="search" placeholder="Search orders..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn-search">Search</button>
                        </form>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $where = $search ? "WHERE u.username LIKE '%$search%' OR i.item_name LIKE '%$search%' OR o.order_status LIKE '%$search%'" : '';
                            $orders = mysqli_query($connection, "
                                SELECT o.*, u.username, i.item_name 
                                FROM orders o 
                                JOIN user u ON o.uid = u.uid 
                                JOIN item i ON o.item_id = i.item_id 
                                $where
                                ORDER BY o.order_time DESC
                            ");
                            
                            if (mysqli_num_rows($orders) > 0) {
                                while ($order = mysqli_fetch_assoc($orders)) {
                                    $status = strtolower($order['order_status']);
                                    echo "
                                    <tr>
                                        <td>#{$order['order_id']}</td>
                                        <td>{$order['username']}</td>
                                        <td>{$order['item_name']}</td>
                                        <td>
                                            <form method='POST' style='display: inline-flex; gap: 0.5rem;'>
                                                <input type='hidden' name='action_type' value='update_order_status'>
                                                <input type='hidden' name='order_id' value='{$order['order_id']}'>
                                                <select name='order_status' onchange='this.form.submit()'>
                                                    <option value='pending' " . ($order['order_status'] === 'pending' ? 'selected' : '') . ">Pending</option>
                                                    <option value='completed' " . ($order['order_status'] === 'completed' ? 'selected' : '') . ">Completed</option>
                                                    <option value='cancelled' " . ($order['order_status'] === 'cancelled' ? 'selected' : '') . ">Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{$order['payment_method']}</td>
                                        <td>" . date('d/m/Y H:i', strtotime($order['order_time'])) . "</td>
                                        <td>
                                            <form method='POST' style='display: inline;'>
                                                <input type='hidden' name='action_type' value='delete_order'>
                                                <input type='hidden' name='order_id' value='{$order['order_id']}'>
                                                <button type='submit' class='btn-danger' onclick='return confirm(\"Delete this order?\")'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='7' style='text-align: center; color: #999;'>No orders found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <script>
            function editVendor(id, name, email, active) {
                document.getElementById('editVendorId').value = id;
                document.getElementById('editVendorName').value = name;
                document.getElementById('editVendorEmail').value = email;
                document.getElementById('editVendorActive').checked = active === 1;
                document.getElementById('editVendorModal').style.display = 'block';
            }
            function editItem(id, vendorId, name, price, count) {
                document.getElementById('editItemId').value = id;
                document.getElementById('editItemVendor').value = vendorId;
                document.getElementById('editItemName').value = name;
                document.getElementById('editItemPrice').value = price;
                document.getElementById('editItemCount').value = count;
                document.getElementById('editItemModal').style.display = 'block';
            }
            function editUser(id, username, email) {
                document.getElementById('editUserId').value = id;
                document.getElementById('editUserUsername').value = username;
                document.getElementById('editUserEmail').value = email;
                document.getElementById('editUserModal').style.display = 'block';
            }
            window.onclick = function(event) {
                const modal = event.target.closest('.modal');
                if (event.target.classList.contains('close')) {
                    event.target.closest('.modal').style.display = 'none';
                }
            }
        </script>
    <?php endif; ?>
</body>
</html>
