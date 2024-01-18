<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    private $feature = [
        'Производитель',
        'Модель',
        'Тип техники',
        'Цвет',
        'Размеры',
        'Вес',
        'Мощность',
        'Напряжение',
        'Материал корпуса',
        'Количество отделений',
        'Управление',
        'Гарантийный срок',
        'Наличие колес',
        'Уровень шума',
        'Длина сетевого шнура',
        'Комплектация',
        'Страна производства',
        'Дополнительные функции',
        'Возможность подключения к умному дому',
        'Совместимость с операционными системами',
        'Поддержка Wi-Fi',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->feature as $value)
        {
            Features::query()->create(
                [
                    'name' => $value
                ]
            );
        }
    }
}
