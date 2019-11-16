<?php

namespace App\Policies;

use App\User;
use App\KeyPerfomaceIndicator;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeyPerfomaceIndicatorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomaceIndicator  $keyPerfomaceIndicator
     * @return bool
     */
    public function view(User $user, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return false;
    }

    /**
     * Determine whether the user can create a keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomaceIndicator  $keyPerfomaceIndicator
     * @return bool
     */
    public function update(User $user, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomaceIndicator  $keyPerfomaceIndicator
     * @return bool
     */
    public function delete(User $user, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomaceIndicator  $keyPerfomaceIndicator
     * @return bool
     */
    public function restore(User $user, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the keyPerfomaceIndicator.
     *
     * @param  App\User  $user
     * @param  App\KeyPerfomaceIndicator  $keyPerfomaceIndicator
     * @return bool
     */
    public function forceDelete(User $user, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return false;
    }
}
