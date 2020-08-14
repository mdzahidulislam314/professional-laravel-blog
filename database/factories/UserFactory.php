<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Category;
use App\Tag;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'slug' => Str::slug($faker->name()),
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'slug' => Str::slug($faker->word()),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => Str::slug($faker->sentence()),
        'image' => $faker->imageUrl(700,340),
        'editor1' => $faker->text(600),
        'view_count' => 1,
        'user_id' => 1,
        'status' => 1,
        'is_approved' => 1
    ];
});
