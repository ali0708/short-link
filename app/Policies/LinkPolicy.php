<?php

namespace App\Policies;

use App\Link;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function create(User $user)
    {
        return $user->isUser();
    }

    public function edit(User $user)
    {
        return $user->isUser();
    }

    public function changeCondition(User $user)
    {
        return $user->isManager();
    }

    public function delete(User $user , Link $link)
    {
        return $user->id === $link->user_id;
    }
}
