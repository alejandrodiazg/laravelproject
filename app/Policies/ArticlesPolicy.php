<?php

namespace App\Policies;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Articles $articles): bool
    {
        //
        return $user->id == $articles->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Articles $articles): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Articles $articles): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Articles $articles): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Articles $articles): bool
    {
        //
    }
    public function published(User $user, Articles $articles){
        if($articles->status == 1){
            return true;
          }else{
            return false;
          }
    }
}
