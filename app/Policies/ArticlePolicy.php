<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Article $article)
    {
        return $article->user_id === $user->id ||
               in_array($user->role, [User::ROLE_ADMIN, User::ROLE_MODERATOR]);
    }

    public function destroy(User $user)
    {
        return $user->role !== User::ROLE_PUBLISHER;
    }

    public function create(User $user)
    {
        return $user->role !== User::ROLE_MODERATOR;
    }
}
