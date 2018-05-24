<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $this->call(UserRoleTableSeeder::class);
         $this->call(LanguageTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
		 $this->call(SettingTableSeeder::class);*/
         //$this->call(ProductStatusTableSeeder::class);

         //Seeder temporary
        factory(\App\ProductStatus::class)->create([
            'id' => 1,
            'status' => 'Activé'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 2,
            'status' => 'Désactivé'
        ]);
    }
}
