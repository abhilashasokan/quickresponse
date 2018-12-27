<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    $category = $faker->word;
    return [
        'name' => $category,
        'slug' => str_slug($category)
    ];
});
