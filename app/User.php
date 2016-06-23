<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'title',
        'bio',
        'link',
        'twitter',
        'facebook',
        'linkedin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','created_at','updated_at'];


    /**
     * Return the related clients for a given user
     */
    public function clients(){
        return $this->hasMany('App\Client','user_id');
    }

    /**
     * Return the related projects for a given user
     */
    public function projects(){
        return $this->hasMany('App\Project','user_id');
    }   

    /**
     * Return the related tasks for a given user
     */
    public function tasks(){
        return $this->hasMany('App\Task','user_id');
    }

    public function inProjects(){
        return $this->belongsToMany('App\Project');
    }

    /**
     * Get the total weight of a user
     * @param  [int] $id [the id of the user]
     * @return [int]     [the total weight of all the incomplete tasks a user has]
     */
    public static function weight($id = null){
        if ($id == null) {
            $result = DB::table('tasks')->where('user_id',Auth::id())->whereState('incomplete')->sum('weight');
        }else{
            $result = DB::table('tasks')->where('user_id',$id)->whereState('incomplete')->sum('weight');
        }
        return $result;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    public static function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

}
