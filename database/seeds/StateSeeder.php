<?php

use App\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $states = [
            [
                'id'    => 1,
                'title' => 'A faire',
            ],
            [
                'id'    => 2,
                'title' => 'En attente',
            ],
            [
                'id'    => 3,
                'title' => 'Gagne',
            ],
            [
                'id'    => 4,
                'title' => 'Perdu',
            ],
        ];

        State::insert($states);
    }
}
