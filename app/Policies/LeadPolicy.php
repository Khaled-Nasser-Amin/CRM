<?php

namespace App\Policies;

use App\Models\User;
use App\Models\lead;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeadPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }


    public function view(User $user, lead $lead)
    {

    }


    public function create(User $user)
    {

    }


    public function update(User $user, lead $lead)
    {
        return $user->id == $lead->user_id || $user->role == '1';
    }


    public function delete(User $user, lead $lead)
    {
        return $user->id == $lead->user_id || $user->role == '1';

    }


    public function restore(User $user, lead $lead)
    {
        //
    }

    public function forceDelete(User $user, lead $lead)
    {
        //
    }
}
