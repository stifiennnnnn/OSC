<?php

return [
    'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
    'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
    'redirect_uri' => "http://localhost/OSC/controllers/google-callback.php"
];

?>