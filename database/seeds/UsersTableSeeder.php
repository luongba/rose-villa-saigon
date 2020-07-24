<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'first_name'     => 'Supper',
                'last_name'      => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
                'phone'          => '01234567890',
                'dob'            => now(),
                'occupation'     => 'Development',
                'address_one'    => 'Thái Nguyên',
                'city'           => 'Thái Nguyên',
                'post_code'      => '25000',
                'country'        => 'Việt Nam',
            ]);
        }
    }
}
