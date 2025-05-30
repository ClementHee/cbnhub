<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['abbr' => 'SA', 'name' => 'Super Admin']);
        Role::create(['abbr' => 'CA', 'name' => 'Church Admin']);
        Role::create(['abbr' => 'FA', 'name' => 'Facilitator']);
        Role::create(['abbr' => 'HF', 'name' => 'Head Facilitator']);
        //Jan, April, July, October
        
        Permission::create(['name' => 'user.assign-role']);
        Permission::create(['name' => 'user.assign-permission']);
        Permission::create(['name' => 'can-view-S1']);
            Permission::create(['name' => 'can-view-S1QJan']);
            Permission::create(['name' => 'can-view-S1QApr']);
            Permission::create(['name' => 'can-view-S1QJul']);
            Permission::create(['name' => 'can-view-S1QOct']);

        Permission::create(['name' => 'can-view-S2']);
            Permission::create(['name' => 'can-view-S2QJan']);
            Permission::create(['name' => 'can-view-S2QApr']);  
            Permission::create(['name' => 'can-view-S2QJul']);
            Permission::create(['name' => 'can-view-S2QOct']);

        Permission::create(['name' => 'can-view-S3']);
            Permission::create(['name' => 'can-view-S3QJan']);
            Permission::create(['name' => 'can-view-S3QApr']);
            Permission::create(['name' => 'can-view-S3QJul']);
            Permission::create(['name' => 'can-view-S3QOct']);

        Permission::create(['name' => 'can-view-S4']);
            Permission::create(['name' => 'can-view-S4QJan']);
            Permission::create(['name' => 'can-view-S4QApr']);
            Permission::create(['name' => 'can-view-S4QJul']);
            Permission::create(['name' => 'can-view-S4QOct']);

        Permission::create(['name' => 'can-view-S5']);
            Permission::create(['name' => 'can-view-S5QJan']);
            Permission::create(['name' => 'can-view-S5QApr']);
            Permission::create(['name' => 'can-view-S5QJul']);
            Permission::create(['name' => 'can-view-S5QOct']);
    
    }
}
