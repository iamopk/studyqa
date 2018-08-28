<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function controller(User $user)
    {
        return $user->role !== User::ROLE_PUBLISHER;
    }
}
