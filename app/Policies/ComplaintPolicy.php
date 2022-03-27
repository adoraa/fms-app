<?php

namespace App\Policies;

use App\Models\Complaint;
use App\Models\User;
use App\Models\Role;

use Illuminate\Auth\Access\HandlesAuthorization;

class ComplaintPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Complaint $complaint)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return in_array($user->role_id, [Role::IS_FACILITY_MANAGER, Role::IS_ESTATE_MANAGER,
        Role::IS_STAFF, Role::IS_STUDENT, Role::IS_STORE_MANAGER, Role::IS_ELECTRICIAN,
        Role::IS_PLUMBER, Role::IS_WELDER, Role::IS_CARPENTER]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Complaint $complaint)
    {
        //
        return in_array($user->role_id, [Role::IS_FACILITY_MANAGER, Role::IS_ESTATE_MANAGER,
        Role::IS_STAFF, Role::IS_STUDENT, Role::IS_STORE_MANAGER, Role::IS_ELECTRICIAN,
        Role::IS_PLUMBER, Role::IS_WELDER, Role::IS_CARPENTER]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Complaint $complaint)
    {
        //
        return in_array($user->role_id, [Role::IS_FACILITY_MANAGER, Role::IS_ESTATE_MANAGER,
        Role::IS_STAFF, Role::IS_STUDENT, Role::IS_STORE_MANAGER, Role::IS_ELECTRICIAN,
        Role::IS_PLUMBER, Role::IS_WELDER, Role::IS_CARPENTER]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Complaint $complaint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Complaint $complaint)
    {
        //
        return in_array($user->role_id, [Role::IS_FACILITY_MANAGER, Role::IS_ESTATE_MANAGER, 
        Role::IS_STAFF, Role::IS_STUDENT, Role::IS_STORE_MANAGER, Role::IS_ELECTRICIAN,
        Role::IS_PLUMBER, Role::IS_WELDER, Role::IS_CARPENTER]);
    }
}
