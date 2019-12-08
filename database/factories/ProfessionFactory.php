<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Profession::class, function (Faker $faker) {
    return [
        //Especificamos el atributo que queremos que se genere de forma aleatoria
        //La idea del componente faker es generar componentes aleatorios
            'title' => $faker->sentence(3, false)
    ];
});
