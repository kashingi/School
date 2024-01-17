<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class ClassUnitModel extends Model
{
    use HasFactory;

    protected $table = 'class_units';
    //create the static function getSingle here
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        $return = self::select('class_units.*', 'class.name as class_name', 'unit.name as unit_name', 'users.name as created_by_name')
                    ->join('unit', 'unit.id', '=', 'class_units.unit_id')
                    ->join('class', 'class.id', '=', 'class_units.class_id')
                    ->join('users', 'users.id', '=', 'class_units.created_by')
                    ->where('class_units.is_delete', '=', 0);
                   
                    if (!empty(Request::get('class_name')) )
                    {
                        # code...
                        $return = $return->where('class.name', 'like','%'. Request::get('class_name').'%');     

                    }
                    if (!empty(Request::get('unit_name')) )
                    {
                        # code...
                        $return = $return->where('unit.name', 'like','%'. Request::get('unit_name').'%');     

                    }
                    $return = $return->orderBy('class_units.id', 'asc')
                    ->paginate(5);

        return $return;
    }
    static public function MyUnit ($class_id)
    {
        $return = self::select('class_units.*', 'unit.name as unit_name', 'unit.type as unit_type', 'unit.created_at as date_created')
                    ->join('unit', 'unit.id', '=', 'class_units.unit_id')
                    ->join('class', 'class.id', '=', 'class_units.class_id')
                    ->join('users', 'users.id', '=', 'class_units.created_by')
                    ->where('class_units.class_id', '=', $class_id)
                    ->where('class_units.is_delete', '=', 0)
                    ->where('class_units.status', '=', 0);
                      $return = $return->orderBy('class_units.id', 'asc')
                    ->get(); 
        return $return;
     
    
    }
    //create static function countAlready
    static public function getAlreadyFirst($class_id, $unit_id)
    {
        return self::where('class_id', '=', $class_id)->where('unit_id', '=', $unit_id)->first();
    }
    //create the static getAssignUnitId here
    static public function getAssignUnitId($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }
    static public function deleteUnit($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();

        
    }
    
}
