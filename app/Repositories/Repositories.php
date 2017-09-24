<?php


namespace App\Repositories;


use App\Repositories\AddressRepository;
use App\Repositories\AdmissionRepository;
use App\Repositories\UserRepository;

trait Repositories
{

    private $userRepository;
    private $addressRepository;
    private $admissionRepository;

    /**
     * @return UserRepository
     */
    public function userRepository()
    {
        if ($this->userRepository == null) {
            $this->userRepository = new UserRepository();
        }

        return $this->userRepository;
    }

    /**
     * @return AddressRepository
     */
    public function addressRepository()
    {
        if ($this->addressRepository == null) {
            $this->addressRepository = new AddressRepository();
        }

        return $this->addressRepository;
    }

    /**
     * @return AdmissionRepository
     */
    public function admissionRepository()
    {
        if ($this->admissionRepository == null) {
            $this->admissionRepository = new AdmissionRepository();
        }

        return $this->admissionRepository;
    }
}