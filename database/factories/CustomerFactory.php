<?php

use Faker\Generator as Faker;
use Faker\Provider\es_PE\{Company, Person, PhoneNumber};

$factory->define(Inventario\Customer::class, function (Faker $faker) {

    $faker->addProvider(new Company($faker));
    $faker->addProvider(new Person($faker));
    $faker->addProvider(new PhoneNumber($faker));

    return [
        'document' => 'DNI',
        'document_number' => $faker->dni,
        'name' => $faker->name,
        'phone' => $faker->phoneNumber
    ];
});

$factory->state(Inventario\Customer::class, 'company', function (Faker $faker) {

    return [
        'document' => 'RUC',
        'document_number' => '10' . $faker->dni . '1',
        'name' => $faker->company
    ];
});
