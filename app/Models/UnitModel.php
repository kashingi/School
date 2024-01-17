<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Request;


class UnitModel extends Model
{
    use HasFactory;
    protected $table = 'unit';
    static public function getSingle($id){
        return self::find($id);
    }

    //create static getRecord function
    static public function getRecord()
    {
        $return = UnitModel::select('unit.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'unit.created_by');
                    if (!empty(Request::get('name')) )
                    {
                        # code...
                        $return = $return->where('unit.name', 'like','%'. Request::get('name').'%');     

                    }
                    if (!empty(Request::get('type')) )
                    {
                        # code...
                        $return = $return->where('unit.type',  Request::get('type'));     

                    }
                    $return= $return->where('unit.is_delete', '=', 0)
                        ->orderBy('unit.id', 'asc')
                        ->paginate(5); 

        //return the list of classes
        return $return;
    }
    //create the static public function getUnit
    static public function getUnit()
    {
        $return = UnitModel::select('unit.*')
        ->join('users', 'users.id', 'unit.created_by')
        ->where('unit.is_delete', '=', 0)
        ->where('unit.status', '=', 0)
        ->orderBy('unit.name', 'asc')
        ->get(); 

        //return the list of classes
        return $return;
    }
}
