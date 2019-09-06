<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Distribuidora\Model;
use Faker\Generator as Faker;
use Distribuidora\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'description'=> $faker->sentence(10)
    ];
});
