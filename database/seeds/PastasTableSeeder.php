<?php

use Illuminate\Database\Seeder;
use App\Pasta;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pastas = config('pasta');

        foreach($pastas as $pasta) {

            $formato = new Pasta();
            $formato->src = $pasta['src'];
            $formato->title = $pasta['titolo'];
            $formato->type = $pasta['tipo'];
            $formato->cooking_time = $pasta['cottura'];
            $formato->weight = $pasta['peso'];
            $formato->description = $pasta['descrizione'];
            $formato->save();

        }

    }
}
