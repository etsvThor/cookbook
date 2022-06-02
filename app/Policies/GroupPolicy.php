<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return Gate::forUser($user)->allows('groups.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $recipeGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Group $group)
    {
        return Gate::forUser($user)->allows('groups.viewAny');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::forUser($user)->allows('groups.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $recipeGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Group $group)
    {
        return Gate::forUser($user)->allows('groups.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $recipeGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Group $group)
    {
        return Gate::forUser($user)->allows('groups.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $recipeGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Group $group)
    {
        return Gate::forUser($user)->allows('groups.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $recipeGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Group $group)
    {
        return Gate::forUser($user)->allows('groups.forceDelete');
    }
}
