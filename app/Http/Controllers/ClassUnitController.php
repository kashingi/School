<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassModel;
use App\Models\UnitModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassUnitModel;

class ClassUnitController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = ClassUnitModel::getRecord();
        $data['header_title'] = "Assign Units List";
        return view('admin.assign_unit.list', $data);
    }
    //create the add assign list function
    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getUnit'] = UnitModel::getUnit();
        $data['header_title'] = "Assign Units Add";
        return view('admin.assign_unit.add', $data);
    }
   
    public function insert(Request $request)
    {
        if (!empty($request->unit_id)) {
            foreach ($request->unit_id as $unit_id) {
                $getAlreadyFirst = ClassUnitModel::getAlreadyFirst($request->class_id, $unit_id);
                if (!empty($getAlreadyFirst)) {
                    # code...getAlreadyFirst
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                $save = new ClassUnitModel;
                $save->class_id = $request->class_id;
                $save->unit_id = $unit_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->user_type;
                $save->save();
            }
            return redirect('admin/assign_unit/list')->with('success', "Unit successfully assigned to added.");
        } 
        else 
        {
            return redirect()->back()->with('error', "System experiencing problem, try again.");
        }
    }

    //create the edit unit function here
    public function edit($id)
    {
        $getRecord = ClassUnitModel::getSingle($id);
        if ($getRecord) {
            # code...
            // $data['$getRecord'] = $getRecord;
            $data['getRecord'] = $getRecord; // Add this line
            $data['getAssignUnitId'] = ClassUnitModel::getAssignUnitId($getRecord->unit_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getUnit'] = UnitModel::getUnit();
            $data['header_title'] = "Edit Assign Units";
            return view('admin.assign_unit.edit', $data);
        } 
        else 
        {
            # code...
            abort(404);
            
        }
        
       
    }
    //create update function here
    public function update(Request $request)
    {
        ClassUnitModel::deleteUnit($request->class_id);
        if (!empty($request->unit_id)) {
            foreach ($request->unit_id as $unit_id) {
                $getAlreadyFirst = ClassUnitModel::getAlreadyFirst($request->class_id, $unit_id);
                if (!empty($getAlreadyFirst)) {
                    # code...getAlreadyFirst
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                $save = new ClassUnitModel;
                $save->class_id = $request->class_id;
                $save->unit_id = $unit_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->user_type;
                $save->save();
            }

           
        } 
        return redirect('admin/assign_unit/list')->with('success', "Unit successfully assigned to added.");

    }
    //create the delete function here
    public function delete($id)
    {
        $save = ClassUnitModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Record successfully deleted.");
    }

}
