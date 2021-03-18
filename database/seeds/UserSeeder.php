<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'read_user']);
        Permission::create(['name' => 'update_user']);
        Permission::create(['name' => 'delete_user']);

        Permission::create(['name' => 'create_projects']);
        Permission::create(['name' => 'read_projects']);
        Permission::create(['name' => 'update_projects']);
        Permission::create(['name' => 'delete_projects']);

        Permission::create(['name' => 'create_specification']);
        Permission::create(['name' => 'read_specification']);
        Permission::create(['name' => 'update_specification']);
        Permission::create(['name' => 'delete_specification']);

        Permission::create(['name' => 'create_measurment']);
        Permission::create(['name' => 'read_measurment']);
        Permission::create(['name' => 'update_measurment']);
        Permission::create(['name' => 'delete_measurment']);

        Permission::create(['name' => 'create_docu_object']);
        Permission::create(['name' => 'read_docu_object']);
        Permission::create(['name' => 'update_docu_object']);
        Permission::create(['name' => 'delete_docu_object']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create_user');
        $role1->givePermissionTo('read_user');
        $role1->givePermissionTo('update_user');
        $role1->givePermissionTo('delete_user');

        $role1->givePermissionTo('create_projects');
        $role1->givePermissionTo('read_projects');
        $role1->givePermissionTo('update_projects');
        $role1->givePermissionTo('delete_projects');

        $role1->givePermissionTo('create_specification');
        $role1->givePermissionTo('read_specification');
        $role1->givePermissionTo('update_specification');
        $role1->givePermissionTo('delete_specification');

        $role1->givePermissionTo('create_measurment');
        $role1->givePermissionTo('read_measurment');
        $role1->givePermissionTo('update_measurment');
        $role1->givePermissionTo('delete_measurment');

        $role1->givePermissionTo('create_docu_object');
        $role1->givePermissionTo('read_docu_object');
        $role1->givePermissionTo('update_docu_object');
        $role1->givePermissionTo('delete_docu_object');

        $role2 = Role::create(['name' => 'project-manager']);
        $role2->givePermissionTo('read_user');

        $role2->givePermissionTo('create_projects');
        $role2->givePermissionTo('read_projects');
        $role2->givePermissionTo('update_projects');
        $role2->givePermissionTo('delete_projects');

        $role2->givePermissionTo('create_specification');
        $role2->givePermissionTo('read_specification');
        $role2->givePermissionTo('update_specification');
        $role2->givePermissionTo('delete_specification');

        $role2->givePermissionTo('create_measurment');
        $role2->givePermissionTo('read_measurment');
        $role2->givePermissionTo('update_measurment');
        $role2->givePermissionTo('delete_measurment');

        $role2->givePermissionTo('create_docu_object');
        $role2->givePermissionTo('read_docu_object');
        $role2->givePermissionTo('update_docu_object');
        $role2->givePermissionTo('delete_docu_object');

        $role3 = Role::create(['name' => 'construction-manager']);
        $role3->givePermissionTo('read_projects');
        $role3->givePermissionTo('read_specification');
        $role3->givePermissionTo('read_measurment');
        $role3->givePermissionTo('create_docu_object');
        $role3->givePermissionTo('read_docu_object');
        $role3->givePermissionTo('update_docu_object');
        $role3->givePermissionTo('delete_docu_object');

        $role4 = Role::create(['name' => 'assembler']);
        $role4->givePermissionTo('read_projects');
        $role4->givePermissionTo('read_specification');
        $role4->givePermissionTo('read_measurment');
        $role4->givePermissionTo('create_docu_object');
        $role4->givePermissionTo('read_docu_object');
        $role4->givePermissionTo('update_docu_object');
        $role4->givePermissionTo('delete_docu_object');

        

        // create admin user

        $user = new App\User;
        $user->name = 'pk-admin';
        $user->email = 'pk@sbigmbh.de';
        $user->password = Hash::make('123ysedcftgb');
        $user->assignRole($role1);
        $user->save();
    }
}
