<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/google.php';

$client = new Google_Client();

$client->setClientId($config['client_id']);
$client->setClientSecret($config['client_secret']);
$client->setRedirectUri($config['redirect_uri']);

try {
    if (!isset($_GET['code'])) {
        header("Location: /osc/views/login/index.php?msg=fail");
        exit;
    }

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (isset($token['error'])) {
        header("Location: /osc/views/login/index.php?msg=fail");
        exit;
    }

    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    $email = strtolower(trim($userInfo->email ?? ''));
    $name = trim($userInfo->name ?? '');
    $name = str_replace(' ', '_', $name);
    $googleId = $userInfo->id ?? null;

    if (!$email || !$googleId) {
        header("Location: /osc/views/login/index.php?msg=fail");
        exit;
    }

    $stmt = $connection->prepare("
        SELECT uid 
        FROM user 
        WHERE email = ? OR google = ? 
        LIMIT 1
    ");

    $stmt->bind_param("ss", $email, $googleId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        $userId = $row['uid'];
    } else {
        $stmt = $connection->prepare("
            INSERT INTO user (username, email, google)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("sss", $name, $email, $googleId);
        $stmt->execute();

        $userId = $connection->insert_id;
    }
    $_SESSION['uid'] = $userId;
    $updateStmt = $connection->prepare("UPDATE user SET last_login = NOW() WHERE uid = ?");
    $updateStmt->bind_param("i", $userId);
    $updateStmt->execute();
    header("Location: /osc/views/home/index.php");
    exit;
} catch (Throwable $e) {
    header("Location: /osc/views/login/index.php?msg=fail");
    exit;
}