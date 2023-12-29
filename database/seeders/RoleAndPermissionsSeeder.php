<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    protected $roles =
        [
            [
                'title' => 'Advogado',
                'name' => 'lawyer',
                'guard_name' => 'web',
            ],
            [
                'title' => 'Juiz',
                'name' => 'judge',
                'guard_name' => 'web',
            ]
        ];

    protected $permissions =
        [
            [
                'title' => 'Criar Processo',
                'name' => 'create_process',
                'guard_name' => 'web',
            ],
            [
                'title' => 'Visualizar Processo',
                'name' => 'view_process',
                'guard_name' => 'web',
            ],
            [
                'title' => 'Editar Processo',
                'name' => 'edit_process',
                'guard_name' => 'web',
            ],
            [
                'title' => 'Deletar Processo',
                'name' => 'delete_process',
                'guard_name' => 'web',
            ],
            [
                'title' => 'Finalizar Processo',
                'name' => 'finish_process',
                'guard_name' => 'web',
            ],
        ];

    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::insert($this->roles);
        Permission::insert($this->permissions);

        $lawyer = Role::whereName('lawyer')->first();
        $lawyer->givePermissionTo(['create_process', 'view_process', 'edit_process', 'delete_process']);

        $judge = Role::whereName('judge')->first();
        $judge->givePermissionTo(['view_process', 'finish_process']);
    }
}
