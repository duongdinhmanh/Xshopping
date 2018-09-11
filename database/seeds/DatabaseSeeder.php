<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(adminSeeder::class);
	}
}

class adminSeeder extends Seeder {
	/**
	 * summary
	 */
	public function run() {
		DB::table('users')->insert(
			[
				'name' => 'admin',
				'Password' => bcrypt('123456'),
				'email' => 'duongdinhmanh252@gmail.com',
				'address' => 'Hà Nội',
				'phone' => '01218858822',
				'role' => 1,
				'status' => 1,
			]
		);
	}
}

class categorySeeder extends Seeder {
	/**
	 * summary
	 */
	public function run() {
		DB::table('category')->insert([
			['name' => 'NEW - PRODUCTS', 'parent_id' => 0, 'slug' => 'NEW - PRODUCTS', 'created_at' => date('Y-m-d H:i:t')],
			['name' => 'FOUR - SEASONS - FASHION', 'parent_id' => 0, 'slug' => 'FOUR - SEASONS - FASHION', 'created_at' => date('Y-m-d H:i:t')],
			['name' => "MEN'S - FASHION", 'parent_id' => 0, 'slug' => "MEN'S - FASHION", 'created_at' => date('Y-m-d H:i:t')],
			['name' => "WOMEN'S - FASHION", 'parent_id' => 0, 'slug' => "WOMEN'S - FASHION", 'created_at' => date('Y-m-d H:i:t')],
		]);
	}
}
