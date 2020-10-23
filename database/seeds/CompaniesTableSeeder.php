<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
	const NAMES = [
		'Apple',
		'Nike',
		'Adidas',
		'PUMA',
		'Microsoft',
		'Samsung',
		'Reebok',
		'Storm',
		'Beeline',
		'Мегафон',
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (self::NAMES as $name) {
			DB::table('companies')->insert([
				'name' => $name,
				'email' => $name . '@local.laravel-junior.ru',
				'web_site' => 'http://' . $name . '.com',
			]);
		}
    }
}
