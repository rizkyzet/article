<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artikel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Artikel::class, function (Faker $faker) {

    return [
        'judul' => $faker->sentence(),
        'isi' => $faker->paragraph(10),
        'slug' => Str::slug($faker->sentence())
    ];
});
