<?php

namespace App\model;


class BaseModel
{
    protected static $counter = 10;

    /**
     * @var int Идентификатор
     */
    protected $id;

    /**
     * @var string Имя
     */
    protected $name;

    public function __construct($name = '')
    {
        $this->id = static::$counter++;
        $this->name = $name;
    }

    /** Получить идентификатор
     * @return int */
    public function getId()
    {
        return $this->id;
    }

    /** Получить имя
     * @return string */
    public function getName()
    {
        return $this->name;
    }

    /** Фабричнный метод для создания модели
     * @param $data array Данные модели */
    public static function create($data)
    {
        $model = new static();

        $model->id = $data['id'] ?? static::$counter++;
        $model->name = $data['name'] ?? 'not name';

        return $model;
    }
}