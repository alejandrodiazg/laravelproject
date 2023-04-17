<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name' => 'Admin']);
        $author = Role::create(['name' => 'Author']);


        Permission::create(['name' => 'admin.index', 'description' => 'Acceder al admin'])->syncRoles($admin, $author);

        // Categorias

        Permission::create(['name' => 'categories.index', 'description' => 'Ver categorias'])->syncRoles($admin, $author);
        Permission::create(['name' => 'categories.create', 'description' => 'Crear categorias'])->assignRole($admin);
        Permission::create(['name' => 'categories.edit', 'description' => 'Editar categorias'])->assignRole($admin);
        Permission::create(['name' => 'categories.destroy', 'description' => 'Eliminar categorias'])->assignRole($admin);

        // Articulos

        Permission::create(['name' => 'articles.index', 'description' => 'Ver articulos'])->syncRoles($admin, $author);
        Permission::create(['name' => 'articles.create', 'description' => 'Crear articulos'])->syncRoles($admin, $author);
        Permission::create(['name' => 'articles.edit', 'description' => 'Editar articulos'])->syncRoles($admin, $author);
        Permission::create(['name' => 'articles.destroy', 'description' => 'Eliminar articulos'])->syncRoles($admin, $author);

        // Comentarios

        Permission::create(['name' => 'comments.index', 'description' => 'Ver comentarios'])->syncRoles($admin, $author);
        Permission::create(['name' => 'comments.destroy', 'description' => 'Eliminar comentarios'])->syncRoles($admin, $author);

        // Usuarios

        Permission::create(['name' => 'users.index', 'description' => 'Ver usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles($admin);
    
        //Roles

        Permission::create(['name' => 'roles.index', 'description' => 'Ver roles'])->syncRoles($admin, $author);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->assignRole($admin);

    }

    
}
