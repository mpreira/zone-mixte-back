<?php

namespace App\Traits;

use Spatie\Permission\Traits\HasRoles as OriginalTrait;

trait HasRoles
{
    use OriginalTrait{
        assignRole as protected originalAssignRole;
        removeRole as protected originalRemoveRole;
        syncRoles as protected originalSyncRoles;
    }

    /**
     *
     */
    public function assignRole(...$roles)
    {
        $this->originalAssignRole(...$roles);
        return $this;
    }

    /**
     *
     */
    public function removeRole($role)
    {
        $this->originalRemoveRole($role);
        return $this;
    }

    /**
     *
     */
    public function syncRoles(...$roles)
    {
        $this->roles()->detach();
        return $this->assignRole($roles);
    }
}
