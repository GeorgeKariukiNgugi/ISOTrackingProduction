<?php

namespace App\Policies;

use App\User;
use App\Program;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any program.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the program.
     *
     * @param  App\User  $user
     * @param  App\Program  $program
     * @return bool
     */
    public function view(User $user, Program $program)
    {
        return false;
    }

    /**
     * Determine whether the user can create a program.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the program.
     *
     * @param  App\User  $user
     * @param  App\Program  $program
     * @return bool
     */
    public function update(User $user, Program $program)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the program.
     *
     * @param  App\User  $user
     * @param  App\Program  $program
     * @return bool
     */
    public function delete(User $user, Program $program)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the program.
     *
     * @param  App\User  $user
     * @param  App\Program  $program
     * @return bool
     */
    public function restore(User $user, Program $program)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the program.
     *
     * @param  App\User  $user
     * @param  App\Program  $program
     * @return bool
     */
    public function forceDelete(User $user, Program $program)
    {
        return false;
    }
}
