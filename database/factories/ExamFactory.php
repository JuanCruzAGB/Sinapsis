<?php
    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Models\Exam;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Faker\Generator as Faker;

    $factory->define(Exam::class, function (Faker $faker) {
        $name = $faker->firstName;

        return [
            'id_type' => $faker->randomElement([ 1, 2, ]),
            'name' => $name,
            'scheduled_at' => $faker->dateTime,
            'slug' => SlugService::createSlug(Exam::class, 'slug', $name),
        ];
    });