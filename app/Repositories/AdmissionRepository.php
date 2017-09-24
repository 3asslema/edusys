<?php

namespace App\Repositories;


use App\Models\Admission;
use App\Models\Role;
use App\Storage\DataBag;
use Illuminate\Support\Facades\DB;

class AdmissionRepository extends BaseRepository
{
    /**
     * Create admission
     *
     * @param DataBag $dataBag
     *
     * @return mixed
     */
    public function createAdmission(DataBag $dataBag)
    {
        $data = $dataBag->all();
        DB::beginTransaction();
        try {
            $address = $this->addressRepository()->createAddress($this->dataBag($data['contact']['address']));
            $contactRole = Role::where('name','=','parent')->first();
            $contactData = [
                'name' => $data['contact']['name'],
                'email' => $data['contact']['email'],
                'password' => bcrypt($data['contact']['password']),
                'settings' => ['lang' => 'fr'],
                'extra_fields' => $data['contact']['extra_fields'],
                'is_active' => false,
                'role_id' => $contactRole->id,
                'address_id' => $address->id,
            ];
            $contact = $this->userRepository()->createUser($this->dataBag($contactData));

            $studentRole = Role::where('name','=','student')->first();
            $studentAddress = $this->addressRepository()->createAddress($this->dataBag($data['contact']['address']));

            $studentData =  [
                'name' => $data['student']['name'],
                'email' => $data['student']['email'],
                'password' => bcrypt($data['student']['password']),
                'settings' => ['lang' => 'fr'],
                'extra_fields' => $data['student']['extra_fields'],
                'is_active' => false,
                'role_id' => $studentRole->id,
                'address_id' => $studentAddress->id,
            ];

            $student = $this->userRepository()->createUser($this->dataBag($studentData));
            $admissionData = [
                'created_by_id' => $data['created_by']['id'],
                'student_id' => $student->id,
                'contact_id' => $contact->id,
                'scolar_year_id' => $data['scolar_year'],
                'facility_id' => $data['facility']['id'],
                'academic_year_id' => $data['academic_year']['id'],
                'status' => 'paid',
                'attachments' => $data['attachments']
            ];
            $admission = new Admission();
            $admission->forceFill($admissionData);
            $admission->save();
            $student->contacts()->attach($contact->id,['mobile_phone'=>$contact->extra_fields['mobile_phone'],'id_card_number' => $contact->extra_fields['mobile_phone']]);
            $contact->children()->attach($student->id);
            $admission->tuitionFees()->attach($data['tuition_fees']);
        }catch (Exception $e) {

            Log::error($e->getMessage());
            DB::rollback();
            throw new Exception("Could't process admission. Please try again.");
        }

        DB::commit();
        return $admission;
    }

}
