<?php

use Faker\Generator as Faker;
use Spatie\BackupServer\Models\Destination;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Destination::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'disk_name' => 'backups',
        'keep_all_backups_for_days' => 7,
        'keep_daily_backups_for_days' => 16,
        'keep_weekly_backups_for_weeks' => 8,
        'keep_monthly_backups_for_months' => 4,
        'keep_yearly_backups_for_years' => 2,
        'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
    ];
});
