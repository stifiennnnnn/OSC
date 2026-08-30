<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$config = require __DIR__ . '/../config/google.php';

$client = new Google_Client();

$client->setClientId($config['client_id']);
$client->setClientSecret($config['client_secret']);
$client->setRedirectUri($config['redirect_uri']);

$client->addScope('email');
$client->addScope('profile');

header("Location: " . $client->createAuthUrl());
exit;