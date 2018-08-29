<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function edit(User $user)
    {
        return $user->role === User::ROLE_ADMIN;
    }
}
