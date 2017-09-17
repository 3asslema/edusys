<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisationId = DB::table('organisations')->insertGetId([
            'name' => 'Ecole Privée Avicenne',
            'address' => '10, Rue Abdelhamid Tlili - Bardo',
            'phone' => '71 516 090',
            'fax' => '',
            'email' => 'oussama.benbrahim1@gmail.com',
            'website' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $facilityId = DB::table('facilities')->insertGetId([
            'name' => 'Ecole Privée Avicenne',
            'address' => '10, Rue Abdelhamid Tlili - Bardo',
            'phone' => '71 516 090',
            'fax' => '',
            'email' => 'oussama.benbrahim1@gmail.com',
            'organisation_id' => $organisationId,
            'website' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        $addressId = DB::table('addresses')->insertGetId([
            'address' => 'Rue 8712 Bloc 53 Cité Olympique',
            'city' => 'Tunis',
            'zip_code' => '1003',
            'country' => 'Tunisia',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $userId = DB::table('users')->insertGetId([
            'name' => 'Oussema Ben Brahin',
            'email' => 'oussama.benbrahim1@gmail.com',
            'password' => bcrypt('P@ssword'),
            'address_id' => $addressId,
            'settings' => json_encode(['language' => 'fr']),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('facility_users')->insert([
            'user_id' => $userId,
            'facility_id' => $facilityId,
        ]);
    }
}
