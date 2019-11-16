<?php

namespace App\Policies;

use App\User;
use App\KeyPerfomanceIndicatorScore;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeyPerfomanceIndicatorScorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomanceIndicatorScore  $keyPerfomanceIndicatorScore
     * @return bool
     */
    public function view(User $user, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return false;
    }

    /**
     * Determine whether the user can create a keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomanceIndicatorScore  $keyPerfomanceIndicatorScore
     * @return bool
     */
    public function update(User $user, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomanceIndicatorScore  $keyPerfomanceIndicatorScore
     * @return bool
     */
    public function delete(User $user, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomanceIndicatorScore  $keyPerfomanceIndicatorScore
     * @return bool
     */
    public function restore(User $user, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the keyPerfomanceIndicatorScore.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomanceIndicatorScore  $keyPerfomanceIndicatorScore
     * @return bool
     */
    public function forceDelete(User $user, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return false;
    }
}
