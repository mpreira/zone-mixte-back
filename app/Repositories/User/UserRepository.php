<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\Role;

interface UserRepository{


    /**
     *  get all users
     * @param $id
     * @return null|Collection
     */
    public function all();

    /**
     * Find user by its id.
     *
     * @param $id
     * @return null|User
     */
    public function find($id);

    /**
     * Find user by email.
     *
     * @param $email
     * @return null|User
     */
    public function findByEmail($email);

    /**
     * Create new user.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update user specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return User
     */
    public function update($id, array $data);

    /**
     * Delete user with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Restore user with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function restore($id);

    /**
     * Force delete user with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function forceDelete($id);

    /**
     * Paginate registered users.
     *
     * @param array $filters
     * @return mixed
     */
    public function paginate(array $filters = []);

    /**
     * Number of users in database.
     *
     * @return mixed
     */
    public function count();

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
