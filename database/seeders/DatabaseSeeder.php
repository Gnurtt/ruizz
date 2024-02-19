<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'secret_key'    => '3745821',
            'email'         => 'admin@gmail.com',
            'password'      => '$2y$10$pmNHwQhyhP.dmPUxVMXzQOtB9IUo3q5NYqJSpaAvGEMI8aK5eyVx6',
            'status'        => '1',
        ]);
    }
}
