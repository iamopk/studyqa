<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->role !== User::ROLE_PUBLISHER;
    }

    public function destroy(User $user)
    {
        return $user->role === User::ROLE_ADMIN;
    }
}
