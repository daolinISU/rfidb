<?php

/**
 * Created by PhpStorm.
 * User: Daolin
 * Date: 11/9/2015
 * Time: 3:10 PM
 */

use Illuminate\Database\Seeder;
use App\User as User;
class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        User::insert(array(
            array( 'email' => 'john@doe.com',
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'organization' => 'Iowa State University',
                    'reason' => 'Test account from seeder',
                    'password' => Hash::make('123456'),
                    'role' => 'admin',
                    'status' => '1'
            ),
            array( 'email' => 'jane@doe.com',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'organization' => 'Iowa State University',
                'reason' => 'Test account from seeder',
                'password' => Hash::make('123456'),
                'role' => 'reg',
                'status' => '0'
            ),
            array( 'email' => 'jack@doe.com',
                'first_name' => 'Jack',
                'last_name' => 'Doe',
                'organization' => 'Iowa State University',
                'reason' => 'Test account from seeder',
                'password' => Hash::make('123456'),
                'role' => 'reg',
                'status' => '1'
            ),
            )
        );
    }


//$table->increments('id');
//$table->string('email')->unique();
//$table->string('first_name', 50);
//$table->string('last_name', 50);
//$table->string('organization');
//$table->string('reason');
//$table->string('password', 60);
//$table->string('role')->default("reg");
//$table->string('activation_code');
//$table->tinyInteger('status')->default(0);
}