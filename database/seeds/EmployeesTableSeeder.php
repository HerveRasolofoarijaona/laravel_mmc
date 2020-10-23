<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class EmployeesTableSeeder extends Seeder
{
	private const FIRST_NAMES = [
		'John',
		'Maria',
		'Alice',
		'Mark',
		'Jesus',
		'Alex',
		'Kirill',
		'Robert',
	];

	private const LAST_NAMES = [
		'Smith',
		'Johnson',
		'Peterson',
		'Promes',
		'Paredes',
		'Jigou',
		'Adriano',
		'Monsson',
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$companies = Company::all(['id'])->toArray();

		for ($i = 0; $i < 40; $i++) {
			$firstName = self::FIRST_NAMES[rand(0, count(self::FIRST_NAMES) - 1)];
			$secondName = self::LAST_NAMES[rand(0, count(self::LAST_NAMES) - 1)];
			DB::table('employees')->insert([
				'first_name' => $firstName,
				'last_name' => $secondName,
				'phone' => rand(10, 99) . '-' . rand(100, 999) . '-' . rand(100, 999),
				'email' => $firstName . '.' . $secondName . '@local.laravel-junior.ru',
				'company_id' => $companies[rand(0, count($companies) - 1)]['id'],
			]);
		}
    }
}
