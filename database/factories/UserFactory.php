<?php
    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Models\User;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Faker\Generator as Faker;
    use Illuminate\Support\Facades\Hash;
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
        $name = $faker->firstName;
        $id_role = $faker->randomElement([ 0, 1, 2, ]);
        $data = [
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'first_name' => $name,
            'slug' => SlugService::createSlug(User::class, 'slug', $name),
            'id_created_by' => $id_role == 0
                ? User::where('id_role', 1)->orwhere('id_role', 3)->get()->random()->id_user
                : 1,
            'id_role' => $id_role,
        ];

        switch ($id_role) {
            case 0:
                $data['alias'] = $faker->words(3, true);
                $data['birth_date'] = $faker->dateTime;
                $data['candidate_number'] = $faker->unique()->randomNumber;
                $data['cbu'] = $faker->randomNumber;
                $data['cuil'] = $faker->randomNumber;
                $data['id_certificate'] = $faker->randomElement([ 1, 2, ]);
                $data['id_country'] = $faker->randomElement([ 1, 2, 3, 4, ]);
                $data['id_level'] = $faker->randomElement([ 0, 1, 2,]);
                $data['last_name'] = $faker->lastName;
                break;

            case 1:
                $data['benchmark'] = $faker->name;
                $data['direction'] = $faker->streetAddress;
                $data['id_category'] = $faker->randomElement([ 1, 2, 3, 4, 5, ]);
                $data['phone'] = $faker->e164PhoneNumber;
                break;
        }

        return $data;
    });