<?php

namespace App\Policies;

use App\User;
use App\NonConformities;
use Illuminate\Auth\Access\HandlesAuthorization;

class NonConformitiesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any nonConformities.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the nonConformities.
     *
     * @param  App\User  $user
     * @param  App\NonConformities  $nonConformities
     * @return bool
     */
    public function view(User $user, NonConformities $nonConformities)
    {
        return false;
    }

    /**
     * Determine whether the user can create a nonConformities.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the nonConformities.
     *
     * @param  App\User  $user
     * @param  App\NonConformities  $nonConformities
     * @return bool
     */
    public function update(User $user, NonConformities $nonConformities)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the nonConformities.
     *
     * @param  App\User  $user
     * @param  App\NonConformities  $nonConformities
     * @return bool
     */
    public function delete(User $user, NonConformities $nonConformities)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the nonConformities.
     *
     * @param  App\User  $user
     * @param  App\NonConformities  $nonConformities
     * @return bool
     */
    public function restore(User $user, NonConformities $nonConformities)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the nonConformities.
     *
     * @param  App\User  $user
     * @param  App\NonConformities  $nonConformities
     * @return bool
     */
    public function forceDelete(User $user, NonConformities $nonConformities)
    {
        return false;
    }
}
