<?php

namespace App\Policies;

use App\User;
use App\Perspective;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerspectivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any perspective.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the perspective.
     *
     * @param  App\User  $user
     * @param  App\Perspective  $perspective
     * @return bool
     */
    public function view(User $user, Perspective $perspective)
    {
        return false;
    }

    /**
     * Determine whether the user can create a perspective.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the perspective.
     *
     * @param  App\User  $user
     * @param  App\Perspective  $perspective
     * @return bool
     */
    public function update(User $user, Perspective $perspective)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the perspective.
     *
     * @param  App\User  $user
     * @param  App\Perspective  $perspective
     * @return bool
     */
    public function delete(User $user, Perspective $perspective)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the perspective.
     *
     * @param  App\User  $user
     * @param  App\Perspective  $perspective
     * @return bool
     */
    public function restore(User $user, Perspective $perspective)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the perspective.
     *
     * @param  App\User  $user
     * @param  App\Perspective  $perspective
     * @return bool
     */
    public function forceDelete(User $user, Perspective $perspective)
    {
        return false;
    }
}
