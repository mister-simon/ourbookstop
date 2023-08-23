<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\Shelf;
use App\Models\User;

class BookPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Shelf $shelf): bool
    {
        return $user->hasVerifiedEmail() && $shelf->users->contains($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): bool
    {
        $shelf = $book->shelf;

        return $user->hasVerifiedEmail() && $shelf->users->contains($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): bool
    {
        $shelf = $book->shelf;

        return $user->hasVerifiedEmail() && $shelf->users->contains($user);
    }
}
