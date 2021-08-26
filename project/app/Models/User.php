<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * 
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $reg_no
 * @property integer $role
 * @property string $password
 * @property string $remember_token
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'firstname',

        'user_id',

        'lastname',

        'email',

        'reg_no',

        'role',

        'status',
        
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];


    public static function boot(){
        parent::boot();

        static::created(function($user){
            // echo "successfully create";

            $user->profile()->create();

        });

    }

    

    public function isAdmin()
    {
        return (int)$this->isAdmin === 1;
    }
   

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
