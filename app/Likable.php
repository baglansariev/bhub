<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Like;
use App\User;

trait Likable
{

	//Comment::all()
	//Comment::withLikes()->get()
	public function scopeWithLikes(Builder $query)
	{
		$query->leftJoinSub(
			'select comment_id, sum(liked) likes, sum(!liked) dislikes from likes group by comment_id',
			'likes',
			'likes.comment_id',
			'comment_id'
		);

		// left join (
		// 	select comment_id, sum(liked) likes, sum(!liked) dislikes from likes group by comment_id  
		// ) likes on likes.comment_id = comment_id
	}

	/**
     * isLikedBy ожидает модель User.
     */
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('comment_id', $this->id)
            ->where('liked', true)
            ->count();        
    }


    public function likedCount(User $user)
    {
    	return $user->likes
    		->where('comment_id', $this->id)
            ->where('liked', true)
            ->count();  
    }

    public function dislikedCount(User $user)
    {
    	return $user->likes
    		->where('comment_id', $this->id)
            ->where('liked', false)
            ->count();  
    }

	/**
     * isDislikedBy.
     */
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('comment_id', $this->id)
            ->where('liked', false)
            ->count();        
    }

	/**
     * Likes.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

	/**
     * Dislike.
     */
    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

	/**
     * Like.
     */
    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),        
        ], 

        [
            'liked' => $liked    
        ]);
    }

    public function current_user()
    {
        //dd(auth()->user());
        return auth()->user();
    }	
	
}