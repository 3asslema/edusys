<?php

namespace App\Repositories;

use App\Models\User;
use App\Storage\DataBag;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    public function createUser(DataBag $dataBag)
    {
        $data = $dataBag->all();
        $user = new User();
        $user->forceFill($data);
        $user->save();
        return $user;
    }
}
