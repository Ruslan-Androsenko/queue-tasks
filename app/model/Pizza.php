<?php

namespace App\model;


class Pizza extends BaseModel
{
    /**
     * @var int Порядковый номер пиццы
     */
    protected static $counter = 30;

    /** Получить список товаров в меню
     * @return Pizza[] */
    public static function loadMenu()
    {
        return [
            new self('Мексиканская'),
            new self('Капричоза'),
            new self('Неаполитанска'),
            new self('Мясная'),
            new self('Барбекю'),
            new self('Четыре сыра'),
            new self('Калифорния'),
            new self('Делюкс'),
            new self('Маргарита'),
            new self('Пепперони'),
        ];
    }
}