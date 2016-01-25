<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UserTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'admin' => true,
        ]);

        factory(App\User::class, 30)->create()->each(function ($u) {
            $u->profile()->save(factory(App\Profile::class)->make());
        });

    }
}
