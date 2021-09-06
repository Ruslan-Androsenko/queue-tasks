<?php

namespace App\AmqpWrapper;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;


class SimpleReceiver
{
    /** Получаем сообщения из очереди pizzaTime */
    public function listen()
    {
        /** Создаем соединение с Rabbit AMQP */
        $connection = new AMQPStreamConnection(
            Helper::RABBITMQ_HOST,
            Helper::RABBITMQ_PORT,
            Helper::RABBITMQ_USER,
            Helper::RABBITMQ_PASS
        );

        /** @var $channel AMQPChannel */
        $channel = $connection->channel();
        $channel->queue_declare(
            Helper::QUEUE_NAME,
            false,
            false,
            false,
            false
        );

        echo " [x] Waiting for messages. To exit press Ctrl+C \n";

        $channel->basic_consume(
            Helper::QUEUE_NAME,
            '',
            false,
            true,
            false,
            false,
            [$this, 'processOrder']
        );

        while (count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

    /** Обрабатываем полученое сообщение
     * @param $msg AMQPMessage Объект сообщения */
    public function processOrder($msg)
    {
        echo " [x] Received {$msg->body} \n";
    }
}