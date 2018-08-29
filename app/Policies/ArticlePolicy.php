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
        return $article->user_id === $user->id;
    }

    public function update(User $user, Article $article)
    {
        return $article->user_id === $user->id;
    }

    public function destroy(User $user)
    {
        return $user->role !== User::ROLE_PUBLISHER;
    }
}
