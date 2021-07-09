<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name' => 'Ceo']);
        Department::create(['name' => 'Technology']);
        Department::create(['name' => 'Marketing']);

    }
}
