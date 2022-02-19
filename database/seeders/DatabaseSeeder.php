<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
use App\Models\AdminUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'administrator'
        ]);
        DB::table('admin_roles')->insert([
            'name' => 'administrador',
            'slug'=> 'administrador'
        ]);
        DB::table('admin_permissions')->insert([
            'name'        => 'All permission',
            'slug'        => '*',
            'http_method' => '',
            'http_path'   => '*'
        ]);
        DB::table('admin_role_permissions')->insert([
            'role_id' => 1,
            'permission_id'=> 1
        ]);
        DB::table('admin_role_users')->insert([
            'role_id' => 1,
            'user_id'=> 1
        ]);
        DB::table('admin_menu')->insert([[
            'parent_id' => 0,
            'order'     => 1,
            'title'     => 'Dashboard',
            'icon'      => 'fa-bar-chart',
            'uri'       => '/',
        ],
        [
            'parent_id' => 0,
            'order'     => 2,
            'title'     => 'Admin',
            'icon'      => 'fa-tasks',
            'uri'       => '',
        ],
        [
            'parent_id' => 2,
            'order'     => 3,
            'title'     => 'Users',
            'icon'      => 'fa-users',
            'uri'       => 'auth/users',
        ],
        [
            'parent_id' => 2,
            'order'     => 4,
            'title'     => 'Roles',
            'icon'      => 'fa-user',
            'uri'       => 'auth/roles',
        ],
        [
            'parent_id' => 2,
            'order'     => 5,
            'title'     => 'Permission',
            'icon'      => 'fa-ban',
            'uri'       => 'auth/permissions',
        ],
        [
            'parent_id' => 2,
            'order'     => 6,
            'title'     => 'Menu',
            'icon'      => 'fa-bars',
            'uri'       => 'auth/menu',
        ],
        [
            'parent_id' => 2,
            'order'     => 7,
            'title'     => 'Operation log',
            'icon'      => 'fa-history',
            'uri'       => 'auth/logs',
        ],
        [
            'parent_id' => 1,
            'order'     => 0,
            'title'     => 'Hints',
            'icon'      => 'fa-automobile',
            'uri'       => 'hints',
        ]
        ]);
        DB::table('admin_role_menu')->insert([
            ['role_id'=> 1,'menu_id' => 1],
            ['role_id'=> 1,'menu_id' => 2],
            ['role_id'=> 1,'menu_id' => 3],
            ['role_id'=> 1,'menu_id' => 4],
            ['role_id'=> 1,'menu_id' => 5],
            ['role_id'=> 1,'menu_id' => 6],
            ['role_id'=> 1,'menu_id' => 7],
            ['role_id'=> 1,'menu_id' => 8]
        ]);
        \App\Models\AdminUser::factory(10)->create();
        \App\Models\Hint::factory(10)->create();
    }
}
