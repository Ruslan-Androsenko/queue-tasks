<?php

namespace App\AmqpWrapper;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;


class SimpleSender
{
    /** Отправляем сообщение в очередь pizzaTime
     * @param $message string Отправляемое сообщение */
    public function execute($message)
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
        $msq = new AMQPMessage($message);

        $channel->basic_publish(
            $msq,
            '',
            Helper::QUEUE_NAME
        );

        $channel->close();
        $connection->close();
    }
}