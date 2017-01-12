<?php

use Faker\Generator;
use App\Models\Access\User\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name'              => $faker->userName,
        'email'             => uniqid($faker->safeEmail, true),
        'password'          => $password ?: $password = bcrypt('secret'),
        'remember_token'    => str_random(10),
        'status'            => 1,
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
        'confirmed'         => 1,
        'tel'               => rand(13000000000, 18999999999),
        'qq'                => rand(10000, 9999999999),
        'we_chat'           => $faker->words(3, true),
        'real_name'         => $faker->name,
        'gender'            => rand(0, 1),
        'birthday'          => $faker->date('Y-m-d', 'now'),
        'id_number'         => rand(100000000000000000, 999999999999999999),
        'university'        => $faker->words(3, true),
        'avatar'            => $faker->imageUrl(),
        'resume'            => $faker->paragraph,
        'created_at'        => $faker->dateTime('now', date_default_timezone_get()),
        'updated_at'        => $faker->dateTime('now', date_default_timezone_get()),
    ];
});

$factory->define(\App\Models\Job::class, function (Generator $faker) {
    $max_user_id = User::count('id');

    return [
        'title'              => $faker->words(3, true),
        'publisher_id'          => rand(4, $max_user_id),
        'status'             => rand(-1, 1),
        'max_hire'           => rand(5, 100),
        'reward'             => rand(0.99, 99999999.99),
        'location'           => $faker->streetAddress,
        'describe'           => $faker->paragraph,
        'start_at'           => $faker->date(),
        'maintain'           => rand(1, 30),
        'work_hours_pre_day' => rand(1, 8),
        'cover'              => $faker->imageUrl(),
        'created_at'         => $faker->dateTime,
        'updated_at'         => $faker->dateTime,
    ];
});
//
//$factory->state(User::class, 'active', function () {
//    return [
//        'status' => 1,
//    ];
//});
//
//$factory->state(User::class, 'inactive', function () {
//    return [
//        'status' => 0,
//    ];
//});
//
//$factory->state(User::class, 'confirmed', function () {
//    return [
//        'confirmed' => 1,
//    ];
//});
//
//$factory->state(User::class, 'unconfirmed', function () {
//    return [
//        'confirmed' => 0,
//    ];
//});

/**
 * Roles
 */
$factory->define(Role::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'all'  => 0,
        'sort' => $faker->numberBetween(1, 100),
    ];
});

$factory->state(Role::class, 'admin', function () {
    return [
        'all' => 1,
    ];
});
