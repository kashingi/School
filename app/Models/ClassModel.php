<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    //create static function for getSingle
    static public function getSingle($id)
    {
        return self::find($id);
    }

    //create a static function and call it getRecord
    static public function getRecord()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'class.created_by');

                    //create the class search query
                    if (!empty(Request::get('name')) )
                    {
                        # code...
                        $return = $return->where('class.name', 'like','%'. Request::get('name').'%');     

                    }
                    $return= $return->where('class.is_delete', '=', 0)
                        ->orderBy('class.id', 'asc')
                        ->paginate(5); 

        //return the list of classes
        return $return;
    }
    //create the static getCclass function
    static public function getClass()
    {
        $return = ClassModel::select('class.*')
                    ->join('users', 'users.id', 'class.created_by')
                    ->where('class.is_delete', '=', 0)
                    ->where('class.status', '=', 0)
                    ->orderBy('class.name', 'asc')
                    ->get(); 

        //return the list of assin units
        return $return;
    }
}

