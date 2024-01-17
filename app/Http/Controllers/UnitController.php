<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnitModel;
use App\Models\ClassUnitModel;
use App\Models\User;


class UnitController extends Controller
{
    public function list()
    {
        //Display the list of classes.
        $data['getRecord'] = UnitModel::getRecord();
        $data ['header_title'] = "Units List";
        return view('admin.unit.list', $data);
    }
    //create the add function for adding units
    public function add()
    {
        $data ['header_title'] = "Add Units";
        return view('admin.unit.add', $data);
    }
    //create inert function to inert unit int the database
    public function insert(Request $request)
    {
        $save = new UnitModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->user_type;
        $save->save();

        return redirect('admin/unit/list')->with('success','Unit Successfully created.');
    }

     //create the class edit function
     public function edit($id)
     {
         $data['getRecord'] = UnitModel::getSingle($id);
         if (!empty($data['getRecord'])) {
             # code...
             $data ['header_title'] = "Edit Unit";
             return view('admin.unit.edit', $data);
         } 
         else 
         {
             # code...
             abort(404);
         }
    }
    //create the update function
    public function update(Request $request, $id)
    {
        $save = UnitModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/unit/list')->with('success','Unit Successfully Updated.');
    }
    //create delete function for deleting unit
    public function delete($id)
    {
        $save = UnitModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Unit Successfully Deleted.');
    }

    //Student side
    public function MyUnit()
    {
        
       $data['MyUnit'] = ClassUnitModel::MyUnit(Auth::user()->class_id);
        $data ['header_title'] = "My Units";
        return view('student.my_unit', $data);
    }
    //create function to enable parent check student's units
    public function ParentStudentUnit($student_id)
    {
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;
        $data['header_title'] = "Parent Students Units";
        $data['MyUnit']  = ClassUnitModel::MyUnit($user->class_id);;
        $data ['header_title'] = "Sudent Units";
        
             return view('parent.my_student_unit', $data);
    }

}
