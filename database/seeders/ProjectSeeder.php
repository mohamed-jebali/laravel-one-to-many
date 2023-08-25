<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
{
    for ($i = 0; $i < 50; $i++) { 
        $newProject = new Project ();
        $newProject->title = $faker->word(5,true);
        $newProject->description = $faker->paragraph(80);
        $newProject->image = $faker->imageUrl(360, 360, 'projects', true, 'project', true, 'jpg');
        $newProject->slug = Str::of($newProject->title)->slug('-');
        $newProject->save();
        $newProject->slug = Str::of("$newProject->id " . $newProject->title)->slug('-');
        $newProject->save();
    }
}

}
