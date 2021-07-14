<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['name' => 'CEO']);
        Position::create(['name' => 'Project Manager']);
        Position::create(['name' => 'Fullstack Developer']);
        Position::create(['name' => 'Backend Developer']);
        Position::create(['name' => 'Frontend Developer']);
        Position::create(['name' => 'Developer']);
        Position::create(['name' => 'UI/UX Designer']);
        Position::create(['name' => 'Designer']); 
        Position::create(['name' => 'Requirement Analyst']);
        Position::create(['name' => 'Quality Assurance']);
       
        Position::create(['name' => 'Marketing Strategist']);
        Position::create(['name' => 'SEO specialist']);
        Position::create(['name' => 'Content specialist']);
    }
}
