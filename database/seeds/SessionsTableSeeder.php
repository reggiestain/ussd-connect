<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        Session::truncate();

        $faker = \Faker\Factory::create();

        Session::create([
            'sessionid' => '1',
            'name' => 'Reginald',
            'surname' => 'Bossman',
            'phone' => '27781304587',
            'mno' => 'mtn'
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'sessionid' => '1',
                'name' => $faker->name,
                'surname' => $faker->email,
                'phone' => $password,
                'mno' => 'mtn'
            ]);
        }
    }

}
