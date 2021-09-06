<?php

namespace App\model;


class Order
{
    /**
     * @var Customer Покупатель
     */
    private $customer;

    /**
     * @var Pizza Товар пицца
     */
    private $pizza;

    public function getCustomer()
    {
        return $this->customer->getId() . "). " . $this->customer->getName();
    }

    public function getPizza()
    {
        return $this->pizza->getId() . "). " . $this->pizza->getName();
    }

    /** Загрузить данные из формы */
    public function loadForm()
    {
        $customerName = filter_input(INPUT_POST, 'customer', FILTER_SANITIZE_STRING);
        $pizzaName = filter_input(INPUT_POST, 'pizza', FILTER_SANITIZE_STRING);

        $this->customer = new Customer($customerName);
        $this->pizza = new Pizza($pizzaName);
    }

    /** Загрузить данные из очереди */
    public function loadQueue($msgJson)
    {
        $orderData = json_decode($msgJson, true);

        $this->customer = Customer::create($orderData['customer'] ?? []);
        $this->pizza = Customer::create($orderData['pizza'] ?? []);
    }

    /** Преобразовать объект заказа в json-строку
     * @return false|string */
    public function toJson()
    {
        $orderData = [
            'customer' => [
                'id' => $this->customer->getId(),
                'name' => $this->customer->getName(),
            ],
            'pizza' => [
                'id' => $this->pizza->getId(),
                'name' => $this->pizza->getName(),
            ],
        ];

        return json_encode($orderData);
    }

    /** Преобразовать объект заказа в строку
     * @return string */
    public function toString()
    {
        return "customer: " . $this->customer->getName() . " -> pizza: " . $this->pizza->getName();
    }
}