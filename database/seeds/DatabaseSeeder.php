<?php

use Illuminate\Database\Eloquent\Model;
use App\User;
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
        Model::unguard();

        array_map(function ($name) {
            User::create([
                'name'     => $name,
                'email'    => sprintf('%s@thebeatles.com', $name),
                'password' => str_random(20)
            ]);
        }, ['John', 'Paul', 'George', 'Ringo']);
    }
}
