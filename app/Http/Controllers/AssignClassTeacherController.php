<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = "Assign Class teacher";
        return view('admin.ClassTeacher.list', $data);
    }
    // create function to add new class teacer
    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getClassTeacher();
        $data['header_title'] = "Add Assign Class Teacher";
        return view('admin.ClassTeacher.add', $data);
    }
    public function insert(Request $request)
    {
        if(!empty($request->teacher_id))
        {
            foreach ($request->teacher_id as $teacher_id)
            {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    # code...
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save;
                } else {
                    # code...
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/ClassTeacher/list')->with('success', "Class teacher assigned successfully.");
        }
        else {
            # code...
            return redirect()->back()->with('error', "System is busy try again latter");
        }
    }
    //create the delete function
    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            # code...
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getClassTeacher();
            $data['header_title'] = "Edit Class Teacher";
            return view('admin.ClassTeacher.edit', $data);
        } else {
            # code...
        }
       
        
    }
     
    
    // public function update(Request $request, $id)
    // {
    //     if (!empty($request->teacher_id)) {
    //         $assignedTeacherIDs = $request->teacher_id;
    
    //         // Get existing teacher IDs for the class
    //         $existingTeacherIDs = AssignClassTeacherModel::where('class_id', $request->class_id)
    //             ->pluck('teacher_id')
    //             ->toArray();
    
    //         // Delete records for unchecked teacher IDs
    //         $uncheckedTeacherIDs = array_diff($existingTeacherIDs, $assignedTeacherIDs);
    //         if (!empty($uncheckedTeacherIDs)) {
    //             AssignClassTeacherModel::deleteTeacherIDs($request->class_id, $uncheckedTeacherIDs);
    //         }
    
    //         // Update or create records for checked teacher IDs
    //         foreach ($assignedTeacherIDs as $teacher_id) {
    //             $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
    //             if (!empty($getAlreadyFirst)) {
    //                 $getAlreadyFirst->status = $request->status;
    //                 $getAlreadyFirst->save();
    //             } else {
    //                 $save = new AssignClassTeacherModel;
    //                 $save->class_id = $request->class_id;
    //                 $save->teacher_id = $teacher_id;
    //                 $save->created_by = Auth::user()->id;
    //                 $save->save();
    //             }
    //         }
    //         return redirect('admin/ClassTeacher/list')->with('success', "Class teacher edited successfully.");
    //     } else {
    //         // Handle the case where no checkboxes are selected
    //         // For example, you might want to delete all records for this class_id
    //         AssignClassTeacherModel::deleteTeacher($request->class_id);
    //         return redirect('admin/ClassTeacher/list')->with('info', "No teachers assigned to this class.");
    //     }
    // }
    public function update(Request $request, $id)
    {
        if (!empty($request->teacher_id)) {
            $assignedTeacherIDs = $request->teacher_id;

            // Get existing teacher IDs for the class
            $existingTeacherIDs = AssignClassTeacherModel::where('class_id', $request->class_id)
                ->pluck('teacher_id')
                ->toArray();

                // Delete records for unchecked teacher IDs
            $uncheckedTeacherIDs = array_diff($existingTeacherIDs, $assignedTeacherIDs);
            if (!empty($uncheckedTeacherIDs)) {
                AssignClassTeacherModel::deleteTeacherIDs($request->class_id, $uncheckedTeacherIDs);
            }

            // Update or create records for checked teacher IDs
            foreach ($assignedTeacherIDs as $teacher_id) 
            {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                
                    //return redirect('admin/ClassTeacher/list')->with('success', "Status unpdated successfully");
                    //return redirect('admin/ClassTeacher/list')->with('success', "Status updated successfully.");

                } 
                else 
                {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }

            return redirect('admin/ClassTeacher/list')->with('success', "Class teacher edited successfully.");
        } 
        else 
        {
            // Handle the case where no checkboxes are selected
            AssignClassTeacherModel::deleteTeacher($request->class_id);
            return redirect('admin/ClassTeacher/list')->with('info', "No teachers assigned to this class.");
        }
    }

    
    //create the delete function
    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->delete();

        return redirect()->back()->with('success', "Class teacher successfully deleted.");
    }

    //Teacher side functions
    public function MyClassUnit()
    {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassUnit(Auth::user()->id);
        $data['header_title'] = "My Class Units";
        return view('teacher.class_units', $data);
    }
}


