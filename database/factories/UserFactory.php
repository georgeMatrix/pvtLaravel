<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Provedor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'razon_social' => $faker->name,
        'rfc' => $faker->name,
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'contacto' => $faker->name,
    ];
});

$factory->define(App\Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->name,
    ];
});


$factory->define(App\UnidadMedida::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->name,
        'decimal' => $faker->name,
    ];
});

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'clave' => $faker -> numberBetween(1000, 1999),
        'sku' => $faker -> name,
        'skuVnpk' => $faker -> name,
        'provedor' => $faker -> biasedNumberBetween(1,5),
        'categoria' => $faker -> biasedNumberBetween(1,5),
        'descripcion' => $faker -> biasedNumberBetween(1,5),
        'descripcionE' => $faker -> name,
        'costo' => $faker -> name,
        'iva_costo' => $faker -> name,
        'ieps_costo' => $faker -> name,
        'total_costo' => $faker -> name,
        'precio_Mayoreo' => $faker -> name,
        'iva_Precio_Mayoreo' => $faker -> name,
        'ieps_Precio_Mayoreo' => $faker -> name,
        'total_Precio_Mayoreo' => $faker -> name,
        'precio_Medio_Mayoreo' => $faker -> name,
        'iva_Precio_Medio_Mayoreo' => $faker -> name,
        'ieps_Precio_Medio_Mayoreo' => $faker -> name,
        'total_Precio_Medio_Mayoreo' => $faker -> name,
        'precio_Retail' => $faker -> name,
        'iva_Precio_Retail' => $faker -> name,
        'ieps_Precio_Retail' => $faker -> name,
        'total_Precio_Retail' => $faker -> name,
        'existencia' => $faker -> name,
        'unidad_Medida' => $faker -> biasedNumberBetween(1,5),
    ];
});