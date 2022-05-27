<?php

namespace Database\Seeders;

use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin', 'description' => '']);
        $role2 = Role::create(['name' => 'user', 'description' => '']);

        Permission::create(['name' => 'admin.users.index', 'description'        => '"Admin", Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create', 'description'       => '"Admin", Crear un nuevo Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description'         => '"Admin", Editar dato de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy', 'description'      => '"Admin", Eliminar permiso usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index', 'description'        => '"Admin", Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description'       => '"Admin", Crear un Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description'         => '"Admin", Editar dato de Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description'      => '"Admin", Eliminar un Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description'         => '"Admin", Ver listado de etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.create', 'description'        => '"Admin", Crear una etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description'          => '"Admin", Editar dato de etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 'description'       => '"Admin", Eliminar publicación de etiqueta'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.blog.index', 'description'         => '"Admin", Mostrar Configuración Blog'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description'   => '"Admin", Ver listado de categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create', 'description'  => '"Admin", Crear una categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description'    => '"Admin", Editar dato de categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => '"Admin", Eliminar publicación categoría'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 'description'        => '"Admin", Ver lista de blogs'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.posts.create', 'description'       => '"Admin", Crear un blog'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.posts.edit', 'description'         => '"Admin", Editar dato de blog'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.posts.destroy', 'description'      => '"Admin", Eliminar publicación de blog'])->syncRoles([$role1]);
    }
}
