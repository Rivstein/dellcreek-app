<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //system permissions
        $permissions = $this->getPermissions();

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'description' => $permission['description'],
                'type' => $permission['type']
            ]);    
        }

        // create super admin credentials pwd:dellcreeksuperadmin
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@dellcreek.co.ke',
            'phone_number' => '0700000001',
            'email_verified_at' => now(),
            'password' => '$2y$10$m1vc6bYlR478A0gbdcx4retRQM6MJf2kzsOeM00.57EcNav7nPWsO', // password
            'remember_token' => Str::random(10),
        ]);

        foreach ($permissions as $permission) {
            $user->attachPermission($permission['name']);    
        }
        
    }

    /**
     * Get permissions list
     */
    private function getPermissions()
    {
        return [
            [
                'name'=>'access-admin', 
                'display_name' => 'Admin access',
                'description' => 'Grants user admin access',
                'type' => 'system'
            ],
            [
                'name'=>'manage-property', 
                'display_name' => 'Access property manager',
                'description' => 'Grants user access to property management tools',
                'type' => 'property'
            ],
            [
                'name'=>'manage-access-control', 
                'display_name' => 'Manage access control',
                'description' => 'Grants user access to access control management tools',
                'type' => 'access control'
            ]
        ];
    }
}
