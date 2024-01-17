<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ClassModel;


use Carbon\Carbon;
class TeacherController extends Controller
{
    
    public function list(){
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teachers List";
        return view('admin.teacher.list', $data);
    }
    //create function to add new teacher
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }
    //create function to insert new added teacher
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'admission_number' => 'required|unique:users',
            'date_of_birth' => 'required|date|before_or_equal:2010-12-31',
            'admision_date' => 'required|date|before:tomorrow',
            'mobile_number' => 'required|max:15',
            'email' => 'required|email|unique:users|min:8|max:50',
            //'password' => 'min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
            'marital' => 'required',
            'experince' => 'required',
            'address' => 'required|min:4|max:50'
            
        ]);
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->admission_number = trim($request->admission_number);
        $teacher->marital = trim($request->marital);
        $teacher->experince = trim($request->experince);
        $teacher->gender = trim($request->gender);
        $teacher->address = trim($request->address);
        if (!empty($request->date_of_birth)) {
            # code...
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admision_date)) {
            # code...
            $teacher->admision_date =$admissionDate = Carbon::parse($request->input('admission_date'))->format('Y-m-d H:i:s');
        }
        if (!empty($request->profile_pic)) {
            # code...
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;

        $teacher->save();
        return redirect('admin/teacher/list')->with('success', "Teacher created successfully.");

    }
    //create public function to deit teacher
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    //create function to update Teacher
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|min:8|max:50'.$id,
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'mobile_number' => 'required|max:15',
            'admission_number' => 'required|max:15',
            'password' => 'max:15',
            'experince' => 'required',
            'status' => 'required',
            'marital' => 'required'
            
        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->marital = trim($request->marital);
        $teacher->gender = trim($request->gender);
        $teacher->address = trim($request->address);
        $teacher->admission_number = trim($request->admission_number);
        $teacher->experince = trim($request->experince);
        if (!empty($request->file('profile_pic'))) {
            # code...
            if (!empty($teacher->getProfile())) {
                # code...
                unlink('upload/profile/'.$teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->email = trim($request->email);
        $teacher->status = trim($request->status);
        if (!empty($request->password)) {
            # code...
            $teacher->password = Hash::make($request->password);
        }
        
        $teacher->save();
        return redirect('admin/teacher/list')->with('success', "Teacher updated successfully.");
    }
     //create function to delete teacher
     public function delete($id)
     {
         $getRecord = User::getSingle($id);
         if (!empty($getRecord)) {
             # code...
             $getRecord->is_delete = 1;
             $getRecord->save();
 
             return redirect()->back()->with('success', "Teacher successfully deleted.");
         } else {
             # code...
         }
         
     }
}
