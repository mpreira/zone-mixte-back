<?php

namespace App\Repositories\User;

use App\Repositories\ModelRepository;

interface UserRepository extends ModelRepository
{
    /**
     * Find user by email.
     *
     * @param $email
     * @return null|User
     */
    public function findByEmail($email);

    /**
     * Set specified role to specified user.
     *
     * @param $userId
     * @param $roleId
     * @return mixed
     */
    public function setRole($userId, $roleId);

    /**
     * Count all users with provided role.
     *
     * @param $roleName
     * @return mixed
     */
    public function countByRole($roleName);

    /**
     * Get all users with provided role.
     *
     * @param $roleName
     * @return mixed
     */
    public function getUsersWithRole($roleName);

}
