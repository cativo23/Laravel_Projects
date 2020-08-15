<?php

use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servers')->insert([
            'name' => 'Mexico Xpertz',
            'domain' => 'mexicoxpertz.com',
            'webmin_url' => 'https://webmin.mexicoxpertz.com'
        ]);
        DB::table('servers')->insert([
            'name' => 'USA Xpertz',
            'domain' => 'usaxpertz.com',
            'webmin_url' => 'https://webmin.usaxpertz.com'
        ]);
        DB::table('servers')->insert([
            'name' => 'Europe Xpertz',
            'domain' => 'europexpertz.com',
            'webmin_url' => 'https://webmin.europexpertz.com'
        ]);
        DB::table('servers')->insert([
            'name' => 'Caribbean Xpertz',
            'domain' => 'caribbeanxpertz.com',
            'webmin_url' => 'https://webmin.caribbeanxpertz.com'
        ]);

    }
}
