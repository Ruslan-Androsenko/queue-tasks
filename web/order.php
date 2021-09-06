<?php
chdir(dirname(__DIR__));
require_once('vendor/autoload.php');

use App\AmqpWrapper\SimpleSender;

try {
    $theName = filter_input(INPUT_POST, 'theName', FILTER_SANITIZE_STRING);
    $sender = new SimpleSender();
    $sender->execute($theName);

    exit(json_encode([
        'message' => '[x] Message sent.',
        'success' => true,
    ]));
} catch (Exception $ex) {
    echo "Exception : " . $ex->getMessage() . " \n";
}