<?php

namespace Database\Seeders;
use App\Models\categories;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $addCategory=['personalty','working','studies','playing','poems','anyThings'];
foreach ($addCategory as $Category) {
    categories::create(['name'=>$Category]);
 };
    }
}
