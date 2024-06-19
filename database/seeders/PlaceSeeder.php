<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    protected $places = [
        ["name"=> "donges"],
        ["name"=> "pontchateau"]
    ];
    public function run(): void
    {

    }
}
