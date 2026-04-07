<?php

namespace Database\Seeders;

use App\Models\CertificateExpiration;
use Illuminate\Database\Seeder;

class CertificateExpirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $durations = [
            ['certificate_duration' => '1 month', 'status' => 'active'],
            ['certificate_duration' => '3 months', 'status' => 'active'],
            ['certificate_duration' => '6 months', 'status' => 'active'],
            ['certificate_duration' => '12 months', 'status' => 'active'],
            ['certificate_duration' => '24 months', 'status' => 'active'],
        ];

        foreach ($durations as $duration) {
            CertificateExpiration::updateOrCreate(
                ['certificate_duration' => $duration['certificate_duration']],
                ['status' => $duration['status']]
            );
        }
    }
}
