<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = config('permission.authorities');

        $listPermission = [];
        $superAdminPermissions = [];
        $adminPermissions = [];
        $editorPermissions = [];

        foreach ($authorities as $label => $permissions) {
            foreach ($permissions as $permission) {
                $listPermission[] = [
                    'name'       => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                // Super Admin
                $superAdminPermissions[] = $permission;
                // Admin
                if (in_array($label, ['manage_posts', 'manage_categories', 'manage_tags'])) {
                    $adminPermissions[] = $permission;
                }
                // Editor
                if (in_array($label, ['manage_posts'])) {
                    $editorPermissions[] = $permission;
                }
            }
        }

        // insert permission
        Permission::insert($listPermission);

        // Insert Roles:
        // Super admin
        $superAdmin = Role::create([
            'name'       => "SuperAdmin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // Admin
        $admin = Role::create([
            'name'       => "Admin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // Editor
        $editor = Role::create([
            'name'       => "Editor",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Role -> permission
        $superAdmin->givePermissionTo($superAdminPermissions);
        $admin->givePermissionTo($adminPermissions);
        $editor->givePermissionTo($editorPermissions);

        // Assign Role
        $userSuperAdmin = User::find(1)->assignRole("SuperAdmin");
    }
}
