<?php

namespace App\Repositories\User;

use App\Repositories\EloquentModel;
use App\Models\User;

class EloquentUser extends  EloquentModel implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function setRole($userId, $roleId)
    {
        return $this->find($userId)->setRole($roleId);
    }

    /**
     * {@inheritdoc}
     */
    public function countByRole($roleName)
    {
        return User::role($roleName)->count();
    }

    /**
     * {@inheritdoc}
     */
    public function getUsersWithRole($roleName)
    {
        return User::with('role')
            ->role($roleName)
            ->get();
    }


}
