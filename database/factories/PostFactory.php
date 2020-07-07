<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7,11),
        'content' => $faker->text,
        'path' => $faker->imageUrl($width = 640, $height = 480)
    ];
});