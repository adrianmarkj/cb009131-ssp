<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Event\Date;
use Illuminate\Auth\Access\HandlesAuthorization;

class DatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Event\Date  $date
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Date $date)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Event\Date  $date
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Date $date)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Event\Date  $date
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Date $date)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Event\Date  $date
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Date $date)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Event\Date  $date
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Date $date)
    {
        //
    }
}
