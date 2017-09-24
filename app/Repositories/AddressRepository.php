<?php

namespace App\Repositories;

use App\Models\Address;
use App\Storage\DataBag;

class AddressRepository extends BaseRepository
{
    /**
     * Create admission
     *
     * @param DataBag $dataBag
     *
     * @return mixed
     */
    public function createAddress(DataBag $dataBag)
    {
        $data = $dataBag->all();
        $address = new Address();
        $address->forceFill($data);
        $address->save();
        return $address;
    }
}
