<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

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
        $admission = $this->store($data);
        return $admission;
    }
}
