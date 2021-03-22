<?php

namespace App\Policies;

use App\Models\Properties;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, Properties $property)
    {
        return $user->id  == $property->user_id || $user->role == 1;
    }


    public function create(User $user)
    {
    }


    public function update(User $user, Properties $property)
    {
        return $user->id  == $property->user_id || $user->role == 1;
    }


    public function delete(User $user, Properties $property)
    {
        return $user->id  == $property->user_id || $user->role == 1;
    }


    public function restore(User $user, Properties $property)
    {
        //
    }


    public function forceDelete(User $user, Properties $property)
    {
        //
    }
}
