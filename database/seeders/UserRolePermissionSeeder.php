<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_users = [
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),];

        DB::beginTransaction();

        try {

            $superAdmin = User::create(array_merge([
                'name' => 'superAdmin',
                'username' => 'superAdmin',
            ], $default_users));
    
            $adminPuskesmas = User::create(array_merge([
                'name' => 'adminPuskesmas',
                'username' => 'adminPuskesmas@gmail.com',
            ], $default_users));
    
            $kader = User::create(array_merge([
                'name' => 'kader',
                'username' => 'kader@gmail.com',
            ], $default_users));
            
            $bidan = User::create(array_merge([
                'name' => 'bidan',
                'username' => 'bidan@gmail.com',
            ], $default_users));
    
            $roleSuperAdmin = Role::create(['name' => 'super admin']);
            // $roleAdminDinas = Role::create(['name' => 'admin dinas']);
            $roleAdminPuskesmas = Role::create(['name' => 'admin puskesmas']);
            $roleKader = Role::create(['name' => 'kader']);
            $roleBidan = Role::create(['name' => 'bidan']);
    
            // $permission = Permission::create(['name' => 'read']);
            // $permission = Permission::create(['name' => 'create']);
            // $permission = Permission::create(['name' => 'update']);
            // $permission = Permission::create(['name' => 'delete']);

                    $permission = Permission::create(['name' => 'read wilayah']);
            
                
                    $permission = Permission::create(['name' => 'create wilayah']);
                
                
                    $permission = Permission::create(['name' => 'update wilayah']);
                
                
                    $permission = Permission::create(['name' => 'delete wilayah']);
                
                
                    $permission = Permission::create(['name' => 'read puskesmas']);
                
                
                    $permission = Permission::create(['name' => 'create puskesmas']);
                
                
                    $permission = Permission::create(['name' => 'update puskesmas']);
                
                
                    $permission = Permission::create(['name' => 'delete puskesmas']);
                
                
                    $permission = Permission::create(['name' => 'read gizi']);
                
                
                    $permission = Permission::create(['name' => 'create gizi']);
                
                
                    $permission = Permission::create(['name' => 'update gizi']);
                
                
                    $permission = Permission::create(['name' => 'delete gizi']);
                
                
                    $permission = Permission::create(['name' => 'read posyandu']);
                
                
                    $permission = Permission::create(['name' => 'create posyandu']);
                
                
                    $permission = Permission::create(['name' => 'update posyandu']);
                
                
                    $permission = Permission::create(['name' => 'delete posyandu']);
                
                    $permission = Permission::create(['name' => 'read bidan']);
                
                    $permission = Permission::create(['name' => 'create bidan']);
                
                
                    $permission = Permission::create(['name' => 'update bidan']);
                
                
                    $permission = Permission::create(['name' => 'delete bidan']);
                
                
                    $permission = Permission::create(['name' => 'read kader']);
                
                
                    $permission = Permission::create(['name' => 'create kader']);
                
                
                    $permission = Permission::create(['name' => 'update kader']);
                
            
                    $permission = Permission::create(['name' => 'delete kader']);

            $roleSuperAdmin->givePermissionTo([
                'create wilayah',
                'read wilayah',
                'update wilayah',
                'delete wilayah',
                'create puskesmas',
                'read puskesmas',
                'update puskesmas',
                'delete puskesmas',
                'read gizi'
            ]);

            $roleAdminPuskesmas->givePermissionTo([
                'create posyandu',
                'read posyandu',
                'update posyandu',
                'delete posyandu',
                'create bidan',
                'read bidan',
                'update bidan',
                'delete bidan',
                'create kader',
                'read kader',
                'update kader',
                'delete kader',
                'read gizi'
            ]);

            $roleKader->givePermissionTo([
                'create gizi',
                'read gizi',
                'update gizi',
                'delete gizi',
                'create anak',
                'read anak',
                'update anak',
                'delete anak',
                'create imunisasi',
                'read imunisasi',
                'update imunisasi',
                'delete imunisasi',
            ]);

            $roleBidan->givePermissionTo([
                'read gizi'
            ]);
            
            $superAdmin->assignRole('super admin');
            // $adminDinas->assignRole('admin dinas');
            $adminPuskesmas->assignRole('admin puskesmas');
            $kader->assignRole('kader');
            $bidan->assignRole('bidan');

            
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }


    }
}
