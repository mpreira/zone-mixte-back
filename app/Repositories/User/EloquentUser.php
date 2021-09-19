<?php

namespace App\Repositories\User;

use App\Repositories\Role\RoleRepository;
use App\Models\Role;
use App\Models\User;

class EloquentUser implements UserRepository
{
    /**
     * @var RoleRepository
     */
    private $roles;

    public function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return User::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return User::find($id);
    }

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
    public function create(array $data)
    {
        $user = User::create($data);

        //event(new Created($user));

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $user = $this->find($id);
        if ($user) {
            $user->update($data);
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $user = $this->find($id);

        return $user->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function restore($id)
    {
        $user = User::withTrashed()
            ->find($id);

        return $user->restore();
    }

    /**
     * {@inheritdoc}
     */
    public function forceDelete($id)
    {
        $user = User::withTrashed()
            ->find($id);

        return $user->forceDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function paginate(array $filters = [])
    {
        $query = User::query();

        $query->withTrashed();

        if (isset($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $query->where('username', "like", "%{$filters['search']}%");
                $query->orWhere('email', 'like', "%{$filters['search']}%");
                $query->orWhere('first_name', 'like', "%{$filters['search']}%");
                $query->orWhere('last_name', 'like', "%{$filters['search']}%");
            });
        } else {
            if (isset($filters['role'])) {
                $query->whereHas('roles', function($query) use ($filters) {
                    $query->where('id', $filters['role']);
                    $query->orWhere('name', $filters['role']);
                });
            }
            if (isset($filters['academy'])) {
                $query->where('academy', $filters['academy']);
            }
            if (isset($filters['department'])) {
                $query->where('department', $filters['department']);
            }
            if (isset($filters['first_name'])) {
                $query->where('first_name', $filters['first_name']);
            }
            if (isset($filters['last_name'])) {
                $query->where('last_name', $filters['last_name']);
            }
        }

        $result = $query->orderBy('id', 'desc')
            ->paginate($filters['perPage']);

        if (isset($filters['search'])) {
            $result->appends(['search' => $filters['search']]);
        }

        if (isset($filters['role'])) {
            $result->appends(['role' => $filters['role']]);
        }

        if (isset($filters['department'])) {
            $result->appends(['department' => $filters['department']]);
        }

        if (isset($filters['academy'])) {
            $result->appends(['academy' => $filters['academy']]);
        }

        if (isset($filters['first_name'])) {
            $result->appends(['first_name' => $filters['first_name']]);
        }

        if (isset($filters['last_name'])) {
            $result->appends(['last_name' => $filters['last_name']]);
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return User::query()->count();
    }

    /**
     * {@inheritdoc}
     */
    public function latest($count = 20)
    {
        return User::query()->orderBy('created_at', 'DESC')->limit($count)->get();
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

    /**
     * {@inheritdoc}
     */
    public function findByConfirmationToken($token)
    {
        return User::where('confirmation_token', $token)->first();
    }
}
