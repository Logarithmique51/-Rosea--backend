<?php

namespace Database\Seeders;

use App\Models\Products\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $categories = [
        ["name"=> "boissons"],
        ["name"=> "pizzas"],
        ["name"=> "desserts"]
    ];
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create($category)->save();

        }
    }
}
