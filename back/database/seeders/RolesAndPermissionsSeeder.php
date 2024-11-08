<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run(): void
    {
        // Crear permisos
        $editArticles = Permission::create(['name' => 'edit articles']);
        $deleteArticles = Permission::create(['name' => 'delete articles']);
        
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $adminRole->givePermissionTo($editArticles, $deleteArticles);
        $userRole->givePermissionTo($editArticles); 
        

    }
}

