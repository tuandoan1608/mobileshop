<?php

namespace App\Policies;

use App\User;
use App\attribute;
use Illuminate\Auth\Access\HandlesAuthorization;

class attributePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\attribute  $attribute
     * @return mixed
     */
    public function view(User $user, attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\attribute  $attribute
     * @return mixed
     */
    public function update(User $user, attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\attribute  $attribute
     * @return mixed
     */
    public function delete(User $user, attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\attribute  $attribute
     * @return mixed
     */
    public function restore(User $user, attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\attribute  $attribute
     * @return mixed
     */
    public function forceDelete(User $user, attribute $attribute)
    {
        //
    }
}
