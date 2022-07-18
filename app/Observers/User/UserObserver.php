<?php

namespace App\Observers\User;

use App\Models\User\Role;
use App\Models\User\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        if (! $user->role_id) {
            $user->role_id = Role::whereClient()->first()->id;
        }
    }
}
