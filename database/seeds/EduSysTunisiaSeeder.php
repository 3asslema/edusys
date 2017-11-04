<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EduSysTunisiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_years')->delete();
        $yearId = DB::table('academic_years')->insertGetId([
            'name' => 'Année Scolaire 2017 / 2018',
            'year' => 2017,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
            DB::table('organisations')->delete();
        $organisationId = DB::table('organisations')->insertGetId([
            'name' => 'Ecole Privée Avicenne',
            'address' => '10, Rue Abdelhamid Tlili - Bardo',
            'phone' => '71 516 090',
            'fax' => '',
            'email' => 'demo@yopmail.com',
            'website' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->delete();
        $facilityId = DB::table('facilities')->insertGetId([
            'name' => 'Ecole Privée Avicenne',
            'address' => '10, Rue Abdelhamid Tlili - Bardo',
            'phone' => '71 516 090',
            'fax' => '',
            'email' => 'demo@yopmail.com',
            'organisation_id' => $organisationId,
            'website' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        $CollegeFacilityId = DB::table('facilities')->insertGetId([
            'name' => 'Collège Privée Avicenne',
            'address' => '10, Rue Abdelhamid Tlili - Bardo',
            'phone' => '71 516 090',
            'fax' => '',
            'email' => 'demo@yopmail.com',
            'organisation_id' => $organisationId,
            'website' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('admission_requirements')->delete();
        $addressId = DB::table('admission_requirements')->insert([
            'name' => 'Photos',
            'facility_id' => $facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
        $addressId = DB::table('admission_requirements')->insert([
            'name' => 'Certificat de naissance',
            'facility_id' => $facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $addressId = DB::table('admission_requirements')->insert([
            'name' => 'Photos',
            'facility_id' => $CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $addressId = DB::table('admission_requirements')->insert([
            'name' => 'Certificat de naissance',
            'facility_id' => $CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

            DB::table('addresses')->delete();
        $addressId = DB::table('addresses')->insertGetId([
            'address' => 'Rue 8712 Bloc 53 Cité Olympique',
            'city' => 'Tunis',
            'zip_code' => '1003',
            'country' => 'Tunisia',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $role = \App\Models\Role::where('name' ,'admin')->first();

        DB::table('users')->delete();
        $userId = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'demo@yopmail.com',
            'password' => bcrypt('password'),
            'address_id' => $addressId,
            'role_id' => $role->id,
            'settings' => json_encode(['language' => 'fr']),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facility_users')->delete();
        DB::table('facility_users')->insert([
            'facility_id' => $facilityId,
            'user_id' => $userId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('facility_users')->insert([
            'facility_id' => $CollegeFacilityId,
            'user_id' => $userId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);


        DB::table('scolar_programs')->delete();
        $petiteEnfanceId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Puériculture et petite enfance' ,
            'parent_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $enseignementBaseId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Enseignement de base' ,
            'parent_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $enseignementSecondaireId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Enseignement secondaire' ,
            'parent_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $enseignementSuperieurId = DB::table('scolar_programs')->insertGetId([
        'name' =>'Enseignement supérieur' ,
        'parent_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
        $enseignementProfessionnelId = DB::table('scolar_programs')->insertGetId([
        'name' =>'Enseignement technique et professionnel' ,
        'parent_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
        $ecoleMaternelleId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Ecole maternelles' ,
            'parent_id' => $petiteEnfanceId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $koutabId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Kouttabs' ,
            'parent_id' => $petiteEnfanceId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $classesPrepaId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Classes préparatoires' ,
            'parent_id' => $petiteEnfanceId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $enseignementPrimaireId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Enseignement primaire' ,
            'parent_id' => $enseignementBaseId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $enseignmentPrepaID = DB::table('scolar_programs')->insertGetId([
            'name' =>'Enseignement préparatoire' ,
            'parent_id' => $enseignementBaseId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $premierCycleId = DB::table('scolar_programs')->insertGetId([
        'name' =>'Premier cycle général' ,
        'parent_id' => $enseignementSecondaireId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
        $deuxiemeCycleId = DB::table('scolar_programs')->insertGetId([
        'name' =>'Deuxième cycle spécialisé' ,
        'parent_id' => $enseignementSecondaireId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
        $licenseId = DB::table('scolar_programs')->insertGetId([
            'name' =>'License' ,
            'parent_id' => $enseignementSuperieurId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $masterId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Master' ,
            'parent_id' => $enseignementSuperieurId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $doctoratId = DB::table('scolar_programs')->insertGetId([
            'name' =>'Doctorat' ,
            'parent_id' => $enseignementSuperieurId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_programs')->insert([
            'name' =>'Instituts préparatoires' ,
            'parent_id' => $enseignementSuperieurId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_programs')->insertGetId([
            'name' =>'Ecoles ingénieurs' ,
            'parent_id' => $enseignementSuperieurId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_programs')->insert([
            'name' =>'CAP' ,
            'parent_id' => $enseignementProfessionnelId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_programs')->insertGetId([
            'name' =>'BTP' ,
            'parent_id' => $enseignementProfessionnelId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_programs')->insert([
            'name' =>'BTS' ,
            'parent_id' => $enseignementProfessionnelId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facility_scolar_programs')->delete();
        DB::table('facility_scolar_programs')->insert([
        'facility_id' =>$facilityId,
        'scolar_program_id' => $classesPrepaId,

    ]);
        DB::table('facility_scolar_programs')->insert([
            'facility_id' =>$facilityId,
            'scolar_program_id' => $enseignementBaseId,

        ]);
        DB::table('facility_scolar_programs')->insert([
            'facility_id' =>$CollegeFacilityId,
            'scolar_program_id' => $premierCycleId,

        ]);

        DB::table('tuition_fees')->delete();
        $tfPreparatoireId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Préparatoire (enfance)' ,
            'is_scolar_year_fee' => true,
            'cost' => 381600,
            'periodicity' => 3,
            'scolar_program_id' => $classesPrepaId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        $tfPremierePrimaireId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Première Année (Primaire)' ,
            'is_scolar_year_fee' => true,
            'cost' => 397500,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfDeuxiemePrimaireId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Deuxième Année (Primaire)' ,
            'is_scolar_year_fee' => true,
            'cost' => 424000,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        $tfTroisiemePrimaireId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Troisième au sixième Année (Primaire)' ,
            'is_scolar_year_fee' => true,
            'cost' => 498200,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        
        DB::table('tuition_fees')->insert([
            'name' =>'Frais Inscription',
            'is_scolar_year_fee' => false,
            'cost' => 212000,
            'periodicity' => 12,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tuition_fees')->insert([
            'name' =>'Frais Inscription',
            'is_scolar_year_fee' => false,
            'cost' => 212000,
            'periodicity' => 12,
            'scolar_program_id' => $enseignmentPrepaID,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfCollegeId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Scolarité Collège' ,
            'is_scolar_year_fee' => true,
            'cost' => 318000,
            'periodicity' => 1,
            'scolar_program_id' => $enseignmentPrepaID,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfcCantineId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Cantine (Collège)' ,
            'is_scolar_year_fee' => false,
            'cost' => 84800,
            'periodicity' => 1,
            'scolar_program_id' => $enseignmentPrepaID,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfcPanierId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Panier (Collège)' ,
            'is_scolar_year_fee' => false,
            'cost' => 31800,
            'periodicity' => 1,
            'scolar_program_id' => $enseignmentPrepaID,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfcTablierId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Tablier (Collège)' ,
            'is_scolar_year_fee' => false,
            'cost' => 20000,
            'periodicity' => 1,
            'scolar_program_id' => $enseignmentPrepaID,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfeCantineId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Cantine (école)' ,
            'is_scolar_year_fee' => false,
            'cost' => 222000,
            'periodicity' =>3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfeGarde2Id = DB::table('tuition_fees')->insertGetId([
            'name' =>'Garde 2 (mercredi /après-midi) (école)' ,
            'is_scolar_year_fee' => false,
            'cost' => 106000,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfeGarde1Id = DB::table('tuition_fees')->insertGetId([
            'name' =>'Garde 1 (lundi, mardi, jeudi, vendredi /soir) (école)' ,
            'is_scolar_year_fee' => false,
            'cost' => 106000,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $tfeTablierId = DB::table('tuition_fees')->insertGetId([
            'name' =>'Tablier (école)' ,
            'is_scolar_year_fee' => false,
            'cost' => 20000,
            'periodicity' => 3,
            'scolar_program_id' => $enseignementPrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('scolar_years')->delete();
        DB::table('scolar_years')->insertGetId([
            'name' =>'Préparatoire' ,
            'scolar_program_id' => $petiteEnfanceId,
            'tuition_fee_id' => $tfPreparatoireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $premiereAnneeId =DB::table('scolar_years')->insertGetId([
            'name' =>'1ére année (école)',
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfPremierePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'2éme année (école)' ,
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfDeuxiemePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'3éme année (école)' ,
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfTroisiemePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'4éme année (école)' ,
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfTroisiemePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'5éme année (école)' ,
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfTroisiemePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'6éme année (école)' ,
            'scolar_program_id' => $enseignementPrimaireId,
            'tuition_fee_id' => $tfTroisiemePrimaireId,
            'facility_id' =>$facilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'7éme année (collège)' ,
            'scolar_program_id' => $enseignmentPrepaID,
            'tuition_fee_id' => $tfCollegeId,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'8éme année (collège)' ,
            'scolar_program_id' => $enseignmentPrepaID,
            'tuition_fee_id' => $tfCollegeId,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('scolar_years')->insert([
            'name' =>'9éme année (collège)' ,
            'scolar_program_id' => $enseignmentPrepaID,
            'tuition_fee_id' => $tfCollegeId,
            'facility_id' =>$CollegeFacilityId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('disciplines')->delete();
        $mathId = DB::table('disciplines')->insertGetId([
            'name' => 'Mathématique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $scienceId = DB::table('disciplines')->insertGetId([
            'name' => 'Sciences Naturelles',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('study_programs')->delete();
        $studyProgramId = DB::table('study_programs')->insertGetId([
            'name' => 'Première Année Primaire',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('subjects')->delete();
        $algebraId = DB::table('subjects')->insertGetId([
            'name' => 'Algebre',
            'discipline_id' => $mathId,
            'study_program_id' => $studyProgramId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
