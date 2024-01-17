<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassUnitModel;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
{
    $data['getClass'] = ClassModel::getClass();

    if (!empty($request->class_id)) {
        $data['getUnit'] = ClassUnitModel::MyUnit($request->class_id);
    } else {
        $data['getUnit'] = []; // Empty array if no class selected
    }

    $data['header_title'] = "Class Timetable";
    return view('admin.timetable.list', $data);
}
    //function to add new class timetable
    // public function add()
    // {
    //     $data['header_title'] = "Add Class Timetable";
    //     return view('admin.timetable.add', $data);
    // }

    public function get_unit(Request $request)
    {
        $class_id = $request->input('class_id');

        // Fetch units based on class_id
        $units = ClassUnitModel::MyUnit($class_id);
    
        $options = '<option value="">Select Unit</option>';
        foreach ($units as $unit) {
            $options .= '<option value="' . $unit->unit_id . '">' . $unit->unit_name . '</option>';
        }
    
        return response()->json(['html' => $options]);
         
    }
}
