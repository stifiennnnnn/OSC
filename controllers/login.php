<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /osc/views/login/index.php");
    exit;
}

require_once __DIR__ . '/../config/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = strtolower(trim($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    header("Location: /osc/views/login/index.php?msg=empty");
    exit;
}

try {
    $stmt = $connection->prepare(
        "SELECT uid, username, email, password
         FROM `user`
         WHERE email = ?
         LIMIT 1"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $stmt->close();
        $connection->close();

        header("Location: /osc/views/login/index.php?msg=not-found");
        exit;
    }

    $user = $result->fetch_assoc();

    $stmt->close();

    if (!password_verify($password, $user['password'])) {
        $connection->close();

        header("Location: /osc/views/login/index.php?msg=wrong");
        exit;
    }

    session_regenerate_id(true);

    $_SESSION['uid'] = $user['uid'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];

    $connection->close();

    header("Location: /osc/views/home/index.php");
    exit;

} catch (Throwable $e) {
    die($e->getMessage());
}