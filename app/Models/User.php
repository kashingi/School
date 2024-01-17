<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    

static public function getSingle($id){
    return self::find($id);
}
   static  public function getAdmin()
    {
      $return = self::select('users.*')
        ->where('user_type', '=',1)
        ->where('is_delete', '=',0);
        if (!empty(Request::get('email')) )
        {
            # code...
            $return = $return->where('email', 'like','%'. Request::get('email').'%');     

        }
        else if (!empty(Request::get('name')) )
        {
            # code...
            $return = $return->where('name', 'like','%'. Request::get('name').'%');     
        }
        $result = $return->orderBy('id', 'desc')
                    ->paginate(5);
        return $result;
    }
    //create static public function for listing parents
    static  public function getParent()
    {
      $return = self::select('users.*')
        ->where('user_type', '=',4)
        ->where('is_delete', '=',0);
        
        if (!empty(Request::get('name'))) 
        {
            # code...
            $return = $return->where('users.name', 'like','%'. Request::get('name').'%');     
        }
        if (!empty(Request::get('last_name'))) 
        {
            # code...
            $return = $return->where('users.last_name', 'like','%'. Request::get('last_name').'%');     
        }
        if (!empty(Request::get('mobile_number'))) {
            # code...
            $return = $return->where('users.mobile_number','like', '%'.Request::get('mobile_number').'%');
        }
        if (!empty(Request::get('email'))) {
            # code...
            $return = $return->where('users.email','like', '%'.Request::get('email').'%');
        }
        $result = $return->orderBy('id', 'desc')
                    ->paginate(2);
        return $result;
    }
    //create static function for student list
    static  public function getStudent()
    {
      $return = self::select('users.*', 'class.name as class_name', 'parent.name as  parent_name', 'parent.last_name as parent_last_name')
        ->join('users as parent', 'parent.id', '=', 'users.id', 'left') 
        ->join('class', 'class.id', '=', 'users.class_id', 'left')
        ->where('users.user_type', '=',3)
        ->where('users.is_delete', '=',0);
        if (!empty(Request::get('name'))) 
        {
            # code...
            $return = $return->where('users.name', 'like','%'. Request::get('name').'%');     
        }
        if (!empty(Request::get('last_name'))) 
        {
            # code...
            $return = $return->where('users.last_name', 'like','%'. Request::get('last_name').'%');     
        }
        if (!empty(Request::get('admission_number'))) {
            # code...
            $return = $return->where('users.admission_number','like', '%'.Request::get('admission_number').'%');
        }
        if (!empty(Request::get('email'))) {
            # code...
            $return = $return->where('users.email','like', '%'.Request::get('email').'%');
        }
        $result = $return->orderBy('users.id', 'desc')
                    ->paginate(2);
        return $result;
    }

    //create function to get the parent id of an assigned student
    static public function getMyStudent($parent_id)
    {
        $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_last_name')//query not correcti
                ->join('users as parent', 'parent.id', '=', 'users.parent_id')  
                ->join('class', 'class.id', '=', 'users.class_id', 'left')
                ->where('users.user_type', '=',3)
                ->where('users.parent_id', '=',$parent_id)
                ->where('users.is_delete', '=', 0)
                ->orderBy('users.id', 'asc')
                ->paginate(5);

        return $return;
    }
    //create search teacher function
    static public function getTeacher()
    {
        $return = self::select('users.*')
                    ->where('users.user_type', '=', 2)
                    ->where('users.is_delete', '=', 0);
                    if (!empty(Request::get('name'))) 
                    {
                        # code...
                        $return = $return->where('users.name', 'like','%'. Request::get('name').'%');     
                    }
                    if (!empty(Request::get('last_name'))) 
                    {
                        # code...
                        $return = $return->where('users.last_name', 'like','%'. Request::get('last_name').'%');     
                    }
                    if (!empty(Request::get('mobile_number'))) {
                        # code...
                        $return = $return->where('users.mobile_number','=', Request::get('mobile_number'));
                    }
                    if (!empty(Request::get('email'))) {
                        # code...
                        $return = $return->where('users.email','like', '%'.Request::get('email').'%');
                    }
        $return = $return->orderBy('users.id', 'asc')
                    ->paginate(2);

        return $return;

    }
    //create function to get one teacher's students
    
    //create public function to get class teacher
    
    static public function getClassTeacher()
    {
        $return = self::select('users.*')
                    ->where('users.user_type', '=', 2)
                    ->where('users.is_delete', '=', 0);
        $return = $return->orderBy('users.id', 'asc')
                    ->get();

        return $return;

    }
    
    //create the getSearchStudent function here
    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('users.*', 'class.name as class_name')
                            ->join('class', 'class.id', '=', 'users.class_id')
                            ->join('class_teachers', 'class_teachers.class_id', '=', 'class.id')
                            ->where('class_teachers.teacher_id', '=', $teacher_id)
                            ->where('class_teachers.status', '=',0)
                            ->where('class_teachers.is_delete', '=', 0)
                            ->where('users.user_type', '=',3)
                            ->where('users.is_delete', '=',0);
        $result = $return->orderBy('users.id', 'desc')
                            ->groupBy('users.id')
                            ->paginate(3);
        return $result;
    }
    static public function getSearchStudent()
    {
        if(!empty(Request::get('name')) || !empty(Request::get('last_name')) || !empty(Request::get('admission_number')) || !empty(Request::get('email')))
        {
            # code...
             $return = self::select('users.*', 'class.name as class_name', 'parent.name as  parent_name')
                        ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                        ->join('class', 'class.id', '=', 'users.class_id')
                        ->where('users.user_type', '=',3)
                        ->where('users.is_delete', '=',0);
                        if (!empty(Request::get('name'))) 
                        {
                            # code...
                            $return = $return->where('users.name', 'like','%'. Request::get('name').'%');     
                        }
                        if (!empty(Request::get('last_name'))) 
                        {
                            # code...
                            $return = $return->where('users.last_name', 'like','%'. Request::get('last_name').'%');     
                        }
                        if (!empty(Request::get('admission_number'))) {
                            # code...
                            $return = $return->where('users.admission_number','like', '%'.Request::get('admission_number').'%');
                        }
                        if (!empty(Request::get('email'))) {
                            # code...
                            $return = $return->where('users.email','like', '%'.Request::get('email').'%');
                        }
            $result = $return->orderBy('users.id', 'desc')
                                ->limit(20)
                                ->paginate(3);
            return $result;
        }

    }
    //create function to collect users information
    static public function getPayment($student_id){
        
        $return = self::select('users.*', 'class.name as class_name')
                            ->join('class', 'class.id', '=', 'users.class_id')
                            ->join('unit', 'unit.id', '=', 'unit.id')
                            ->where('users.user_type', '=',3)
                            ->where('users.is_delete', '=',0);

        $result = $return->orderBy('users.id', 'desc')
                            ->first();
        return $result;
    }
    static public function getEmailSingle($email){

        return User::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token){

        return User::where('remember_token', '=', $remember_token)->first();
    }
    public function getProfile()
    {
        
        if (!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)) {
            # code...
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }

}
