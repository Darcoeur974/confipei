<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            FruitsSeeder::class,
            ProducteursSeeder::class,
            RecompensesSeeder::class,
            CommandesSeeder::class,
            ConfituresSeeder::class,
            ]);
    }
}
