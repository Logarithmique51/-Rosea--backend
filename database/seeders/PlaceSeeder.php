<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    protected $places = [
        ["name"=> "donges"],
        ["name"=> "pontchateau"]
    ];
    public function run(): void
    {
        $address = Address::inRandomOrder()->take(2)->get();
        dd($address);
    }
}
