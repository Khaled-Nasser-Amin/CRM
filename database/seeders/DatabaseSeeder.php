<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Developer;
use App\Models\Employee;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Properties;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(AdminSeeder::class);
   /*     Employee::factory()->count(30)->create();
        User::factory()->has(
            Lead::factory()->count(5)
        )->has(
            Properties::factory()->has(Image::factory()->count(5))->count(5)
        )->count(10)->create();
        Developer::factory()->has(
            Project::factory()->count(2)
        )->count(5)->create();

        $amenities= Amenity::factory()->count(30)->create();

        Project::all()->each(function ($project) use($amenities){
            for ($i=0; $i < 5 ;$i++){
                $project->amenities()->syncWithoutDetaching($amenities->random());
            }
        });
       $properties = Properties::all();
       $properties->each(function ($property) use($amenities){
            for ($i=0; $i < 5 ;$i++){
                $property->amenities()->syncWithoutDetaching($amenities->random());
            }
        });

        Project::all()->each(function ($project) use($properties){
            for ($i=0; $i < 5 ;$i++){
                $project->properties()->save($properties->random());
            }
        });

        Lead::all()->each(function ($lead){
            $project=Project::all()->random();
            $lead->project()->associate($project)->save();
            $lead->developer()->associate($project->developer->id)->save();
        });*/






    }
}
