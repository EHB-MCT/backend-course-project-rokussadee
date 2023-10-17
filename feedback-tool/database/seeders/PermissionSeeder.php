<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            // Category permissions
            'category_create',
            'category_edit',
            'category_show',
            'category_delete',
            'category_access',
            // Session permissions
            'session_create',
            'session_edit',
            'session_show',
            'session_delete',
            'session_access',
            // FeedbackForm permissions
            'form_create',
            'form_edit',
            'form_show',
            'form_delete',
            'form_access',
            // Question permissions
            'question_create',
            'question_edit',
            'question_show',
            'question_delete',
            'question_access'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        Role::create(['name'=>'Super Admin']);

        $userrole = Role::create(['name' => 'User']);

        $userPermissions =[
            // Session permissions
            'session_create',
            'session_edit',
            'session_show',
            'session_delete',
            'session_access',
            // FeedbackForm permissions
            'form_create',
            'form_edit',
            'form_show',
            'form_delete',
            'form_access',
            // Question permissions
            'question_create',
            'question_edit',
            'question_show',
            'question_delete',
            'question_access',
        ];

        foreach ($userPermissions as $permission) {
            $userrole->givePermissionTo($permission);
        }
    }
}
