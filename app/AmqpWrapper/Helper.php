<?php

namespace App\AmqpWrapper;


class Helper
{
    /** Хост сервера на котором развернут Rabbit MQ */
    const RABBITMQ_HOST = 'rabbitmq.loc';

    /** Порт для отправки сообщений на сервер Rabbit MQ */
    const RABBITMQ_PORT = 5672;

    /** Имя пользователя для отправки сообщений в очередь Rabbit MQ */
    const RABBITMQ_USER = 'guest';

    /** Пароль для отправки сообщений в очередь Rabbit MQ */
    const RABBITMQ_PASS = 'guest';

    /** Имя очереди в которую будем отправлять сообщения */
    const QUEUE_NAME = 'pizzaTime';
}