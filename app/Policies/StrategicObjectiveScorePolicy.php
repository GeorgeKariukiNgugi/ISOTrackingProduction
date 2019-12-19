<?php

namespace App\Policies;

use App\User;
use App\StrategicObjectiveScore;
use Illuminate\Auth\Access\HandlesAuthorization;

class StrategicObjectiveScorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjectiveScore  $strategicObjectiveScore
     * @return bool
     */
    public function view(User $user, StrategicObjectiveScore $strategicObjectiveScore)
    {
        return false;
    }

    /**
     * Determine whether the user can create a strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjectiveScore  $strategicObjectiveScore
     * @return bool
     */
    public function update(User $user, StrategicObjectiveScore $strategicObjectiveScore)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjectiveScore  $strategicObjectiveScore
     * @return bool
     */
    public function delete(User $user, StrategicObjectiveScore $strategicObjectiveScore)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjectiveScore  $strategicObjectiveScore
     * @return bool
     */
    public function restore(User $user, StrategicObjectiveScore $strategicObjectiveScore)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the strategicObjectiveScore.
     *
     * @param  App\User  $user
     * @param  App\StrategicObjectiveScore  $strategicObjectiveScore
     * @return bool
     */
    public function forceDelete(User $user, StrategicObjectiveScore $strategicObjectiveScore)
    {
        return false;
    }
}
