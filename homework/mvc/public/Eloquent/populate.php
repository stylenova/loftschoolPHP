<?php
require __DIR__ . '/../../vendor/autoload.php';
$main = new \App\Core\Config();

$faker = Faker\Factory::create();
for($i=0;$i<30;$i++)
{
    $user = new User();
    $user->name = $faker->name;
    $user->email = $faker->email;
    $user->password = $faker->password;
    $user->age = $faker->numberBetween($min = 15, $max = 100);
    $user->info = $faker->text;

    $user->created_at = $faker->dateTime;
    $user->save();
}