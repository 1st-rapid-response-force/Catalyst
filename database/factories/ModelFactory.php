<?php

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

$factory->define(App\User::class, function ($faker) {
    return [
        'email' => $faker->email,
        'password' => str_random(40),
        'steam_id' => $faker->unique()->randomNumber(),
        'okEmail' => 1,
        'notify' => 'y',
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Application::class, 'applicant', function ($faker) {
    return [
        'status' => 'Under Review',
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'nationality' => $faker->country,
        'mos_id' => $faker->numberBetween(15,35),
        'milsim_experience' => $faker->boolean,
        'milsim_badconduct' => $faker->boolean,
        'milsim_grouplist'=> $faker->sentence,
        'milsim_highestrank'=> $faker->word(2),
        'milsim_previoustraining'=> $faker->sentence,
        'milsim_depature'=> $faker->text,
        'agreement_milsim' => $faker->boolean,
        'agreement_guidelines' => $faker->boolean,
        'agreement_orders' => $faker->boolean,
        'agreement_ranks' => $faker->boolean,
        'signature' => $faker->firstNameMale.' '.$faker->lastName,
        'signature_date' => $faker->dateTime,
    ];
});

$factory->defineAs(App\Application::class, 'acceptedApplicant', function ($faker) {
    return [
        'status' => 'Accepted',
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'nationality' => $faker->country,
        'mos_id' => $faker->numberBetween(15,35),
        'milsim_experience' => $faker->boolean,
        'milsim_badconduct' => $faker->boolean,
        'milsim_grouplist'=> $faker->sentence,
        'milsim_highestrank'=> $faker->word(2),
        'milsim_previoustraining'=> $faker->sentence,
        'milsim_depature'=> $faker->text,
        'agreement_milsim' => $faker->boolean,
        'agreement_guidelines' => $faker->boolean,
        'agreement_orders' => $faker->boolean,
        'agreement_ranks' => $faker->boolean,
        'signature' => $faker->firstNameMale.' '.$faker->lastName,
        'decision_name' => 'Rodriguez, Guillermo',
        'decision_paygrade' => 'O-3',
        'decision_date' => $faker->dateTime,
        'decision_signature' => 'Guillermo Rodriguez',
        'signature_date' => $faker->dateTime,
    ];
});

$factory->defineAs(App\Application::class, 'rejectedApplicant', function ($faker) {
    return [
        'status' => 'Rejected',
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'nationality' => $faker->country,
        'mos_id' => $faker->numberBetween(15,35),
        'milsim_experience' => $faker->boolean,
        'milsim_badconduct' => $faker->boolean,
        'milsim_grouplist'=> $faker->sentence,
        'milsim_highestrank'=> $faker->word(2),
        'milsim_previoustraining'=> $faker->sentence,
        'milsim_depature'=> $faker->text,
        'agreement_milsim' => $faker->boolean,
        'agreement_guidelines' => $faker->boolean,
        'agreement_orders' => $faker->boolean,
        'agreement_ranks' => $faker->boolean,
        'signature' => $faker->firstNameMale.' '.$faker->lastName,
        'decision_name' => 'Rodriguez, Guillermo',
        'decision_paygrade' => 'O-3',
        'decision_date' => $faker->dateTime,
        'decision_signature' => 'Guillermo Rodriguez',
        'signature_date' => $faker->dateTime,
    ];
});

$factory->defineAs(App\VPF::class, 'active', function ($faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'assignment_id' => $faker->unique()->numberBetween(2,155),
        'rank_id' => $faker->numberBetween(3,8),
        'face_id' => $faker->numberBetween(1,35),
        'status' => 'Active',
    ];
});

$factory->defineAs(App\VPF::class, 'recruits', function ($faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'assignment_id' => 156,
        'rank_id' => 1,
        'face_id' => $faker->numberBetween(1,35),
        'status' => 'Active',
    ];
});

$factory->defineAs(App\VPF::class, 'discharged', function ($faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'assignment_id' => null,
        'rank_id' => 0,
        'face_id' => $faker->numberBetween(1,35),
        'status' => 'Discharged',
    ];
});