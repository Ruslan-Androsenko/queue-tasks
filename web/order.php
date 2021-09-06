<?php
chdir(dirname(__DIR__));
require_once('vendor/autoload.php');

use App\AmqpWrapper\SimpleSender;
use App\model\Order;

try {
    $order = new Order();
    $order->loadForm();

    $sender = new SimpleSender();
    $sender->execute($order->toJson());

    exit(json_encode([
        'message' => '[x] Message sent.',
        'success' => true,
    ]));
} catch (Exception $ex) {
    echo "Exception : " . $ex->getMessage() . " \n";
}