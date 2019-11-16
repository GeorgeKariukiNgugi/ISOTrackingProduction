<?php

namespace App\Policies;

use App\User;
use App\StrategicObjective;
use Illuminate\Auth\Access\HandlesAuthorization;

class StrategicObjectivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any strategicObjective.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the strategicObjective.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjective  $strategicObjective
     * @return bool
     */
    public function view(User $user, StrategicObjective $strategicObjective)
    {
        return false;
    }

    /**
     * Determine whether the user can create a strategicObjective.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the strategicObjective.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjective  $strategicObjective
     * @return bool
     */
    public function update(User $user, StrategicObjective $strategicObjective)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the strategicObjective.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjective  $strategicObjective
     * @return bool
     */
    public function delete(User $user, StrategicObjective $strategicObjective)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the strategicObjective.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjective  $strategicObjective
     * @return bool
     */
    public function restore(User $user, StrategicObjective $strategicObjective)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the strategicObjective.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjective  $strategicObjective
     * @return bool
     */
    public function forceDelete(User $user, StrategicObjective $strategicObjective)
    {
        return false;
    }
}
