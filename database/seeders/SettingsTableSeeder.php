<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('settings')->insert([
            'logo' => 'path/to/default/logo.png',
            'login_title' => 'Admin Panel',
            'background_image' => 'path/to/default/background.jpg',
        ]);
    }
}
