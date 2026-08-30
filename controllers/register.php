<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

require_once __DIR__ . '/../config/db.php';

$username = strtolower(trim($_POST['username'] ?? ''));
$username = str_replace(' ', '_', $username);
$email = strtolower(trim($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
    header("Location: /osc/views/register/index.php?msg=invalid");
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo $username, $email, $hashedPassword;

$stmt = $connection->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);
try {
    $stmt->execute();
    $newUserId = $connection->insert_id;
    header("Location: /osc/views/login/index.php?msg=success");
    exit;
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        if (strpos($e->getMessage(), 'email') !== false) {
            header("Location: /osc/views/register/index.php?msg=used-email");
            exit;
        } elseif (strpos($e->getMessage(), 'username') !== false) {
            header("Location: /osc/views/register/index.php?msg=used-username");
            exit;
        } else {
            header("Location: /osc/views/register/index.php?msg=fail");
            exit;
        }
    } else {
        header("Location: /osc/views/register/index.php?msg=fail");
        exit;
    }
} finally {
    $stmt->close();
    $connection->close();
}
?>