<?php
chdir(dirname(__DIR__));
require_once('vendor/autoload.php');

use App\AmqpWrapper\SimpleReceiver;

try {
    $receiver = new SimpleReceiver();
    $receiver->listen();
} catch (Exception $ex) {
    echo "Exception : " . $ex->getMessage() . " \n";
}