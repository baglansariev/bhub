<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Laravelista\Comments\Commenter;
use Laravelista\Comments\Comment;
use App\Models\Like;
use App\Models\Startup;
use App\Models\QuizUserAnswer;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Followable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'image', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isCreator($user_email = false)
    {
        $creator_email = 'baglansariev@mail.ru';
        if ($user_email) {
            return $user_email == $creator_email;
        }

        return $this->email == $creator_email;
    }

    public function startups()
    {
        return $this->hasMany(Startup::class);
    }

    public function isAuthUser()
    {
        return Auth::user()->email == $this->email;
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Commenter::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(50);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

     public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function quiz_user_answer()
    {
        return $this->hasMany(QuizUserAnswer::class);
    }
}
