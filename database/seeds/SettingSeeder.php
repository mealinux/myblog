<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Setting::create([
          'user_id' => '1',
          'logo' => '',
          'teknoseyir' => '',
          'google' => '',
          'github' => '',
          'bitbucket' => '',
          'linkedin' => '',
          'version' => '',
          'footer' => ''
      ]);
    }
}
