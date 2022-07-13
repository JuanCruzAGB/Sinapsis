<?php
    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\User;
    use Faker\Generator as Faker;

    $factory->define(Evaluation::class, function (Faker $faker) {
        $associated = false;

        while (!$associated) {
            $associated = User::associates()->get()->random();

            if (!Exam::createdBy($associated->id_user)->count() || !User::candidates()->createdBy($associated->id_user)->count()) {
                $associated = false;
            }
        }

        return [
            'id_exam' => Exam::createdBy($associated->id_user)->get()->random()->id_exam,
            'id_user' => User::candidates()->createdBy($associated->id_user)->get()->random()->id_user,
            'qualification' => $faker->randomElement([ NULL, 0, 1, 3, 4, 5, 6, 7, 8, 9, 10, ]),
        ];
    });
