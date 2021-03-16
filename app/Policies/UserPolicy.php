<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, User $model)
    {
        return $user->role == 1 ;
    }


    public function create(User $user)
    {
        return $user->role == 1 ;
    }


    public function update(User $user, User $model)
    {
        return $user->role == 1 ;
    }


    public function delete(User $user, User $model)
    {
        return $user->role == 1 ;
    }


    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
