<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Passport;

class PassportClientCredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = Passport::client()->forceFill([
            'id' => 1,
            'name' => 'DoubleVTest',
            'secret' => 'mFRn19FSwRoObbZleJ8k9009Ct5E4ipY850n8Cb4',
            'redirect' => '',
            'personal_access_client' => false,
            'password_client' => false,
            'revoked' => false,
        ]);

        $client->save();
    }
}
