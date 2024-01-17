<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = 'class_teachers';

    //create function to edit class teacher
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('class_teachers.*', 'class.name as class_name', 'teacher.name as teacher_name',
                                'teacher.last_name as teacher_last_name', 
                                'users.name as created_by_name')
                                ->join('users as teacher', 'teacher.id', '=', 'class_teachers.teacher_id')
                                ->join('class', 'class.id', '=', 'class_teachers.class_id')
                                ->join('users', 'users.id', '=', 'class_teachers.created_by')
                                ->where('class_teachers.is_delete', '=', 0);
                                if (!empty(Request::get('class_name')) )
                                {
                                    # code...
                                    $return = $return->where('class.name', 'like','%'. Request::get('class_name').'%');     

                                }
                                if (!empty(Request::get('teacher_name')) )
                                {
                                    # code...
                                    $return = $return->where('teacher.name', 'like','%'. Request::get('teacher_name').'%');     

                                }
                                if (!empty(Request::get('status')) )
                                {
                                    # code...
                                    $status = (Request::get('status') == 100) ? 0 : 1;
                                    $return = $return->where('class_teachers.status', '=', $status);     

                                }
        $return = $return->orderBy('class_teachers.id', 'asc')
                                ->paginate(3);
        return $return;             

    }
    static public function getMyClassUnit($teacher_id)
    {
        return self::select('class_teachers.*', 'class.name as class_name', 'unit.name as unit_name', 'unit.type as unit_type')
                                ->join('class', 'class.id', '=', 'class_teachers.class_id')
                                ->join('class_units', 'class_units.class_id', '=', 'class.id')
                                ->join('unit', 'unit.id', '=', 'class_units.unit_id')
                                ->where('class_teachers.is_delete', '=', 0)
                                ->where('class_teachers.status', '=', 0)
                                ->where('unit.status', '=', 0)
                                ->where('unit.is_delete', '=', 0)
                                ->where('class_units.status', '=', 0)
                                ->where('class_units.is_delete', '=', 0)
                                ->where('class_teachers.teacher_id', '=', $teacher_id)
                                ->paginate(5);
    }
    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }
    static public function getAssignTeacherID($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }
    static public function deleteTeacher($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();
    }
    public static function deleteTeacherIDs($class_id, $teacherIDs)
    {
        self::where('class_id', $class_id)
            ->whereIn('teacher_id', $teacherIDs)
            ->delete();
    }
    

}
