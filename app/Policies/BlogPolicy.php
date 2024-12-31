<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Blog;


use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    use HandlesAuthorization;

    public function blog_edit(User $user, Blog $blog){
        return $user->id === $blog->user_id;
    }


////////  Use Gates


//////Gate Responses


    // public function blog_edit(User $user, Blog $blog){
    //     return $user->id === $blog->user_id
    //     ? Response::allow()
    //     : Response::deny('You have no permition.');
    // }


    // public function update_blog(User $user, Blog $blog){
    //     return $user->id === $blog->user_id;
    // }


    // public function blog_edit(User $user, Blog $blog){
    //     if($user->id === $blog->user_id){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    
}
