<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Only post owners can update
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
