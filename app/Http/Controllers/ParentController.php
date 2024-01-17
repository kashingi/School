<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "Parent List";
        return view('admin.parent.list', $data);
    }
    //create public function to add new parent
    public function add()
    {
        $data['header_title'] = "Add New Parent";
        return view('admin.parent.add', $data);
    }
    //create public function to insert a new parent
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'relationship' => 'required',
            'status' => 'required',
            'admission_number' => 'required|regex:/^[0-9]+$/',
            'experince' => 'required|regex:/^[0-9]+$/',
            'occupation' => 'required',
            'mobile_number' => 'required|min:8|max:15',
            'email' => 'required|email|unique:users|min:8|max:50',
            'profile_pic' => 'required',
            //'profile_pic' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'password' => 'required|min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
            
        ]);
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->relationship = trim($request->relationship);
        $parent->address = trim($request->address);
        $parent->gender = trim($request->gender);
        $parent->experince = trim($request->experince);
        $parent->admission_number = trim($request->admission_number);
        if (!empty($request->profile_pic)) {
            # code...
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password = Hash::make($request->password);
        $parent->occupation = trim($request->occupation);
        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success', "Parent created successfully.");

    }
//create the edit parent function
public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Parent";
            return view('admin.parent.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    //create function to update parent
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|min:8|max:50'.$id,
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'mobile_number' => 'required|max:15',
            'password' => 'max:15',
            'relationship' => 'required',
            'occupation' => 'required',
            'status' => 'required',
            'address' => 'required',
            'admission_number' => 'required|regex:/^[0-9]+$/'
            
        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        if (!empty($request->file('profile_pic'))) {
            # code...
            if (!empty($parent->getProfile())) {
                # code...
                unlink('upload/profile/'.$parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->relationship = trim($request->relationship);
        //$parent->religion = trim($request->religion);
        if (!empty($request->password)) {
            # code...
            $parent->password = Hash::make($request->password);
        }
        
        $parent->save();
        return redirect('admin/parent/list')->with('success', "Parent created successfully.");
    }

    //create function to delete parent
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            # code...
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Parent successfully deleted.");
        } else {
            # code...
        }
        
    }
    //create public function for my students
    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['getRecord'] = User::getMyStudent($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['header_title'] = "Parent Student List";
        return view('admin.parent.my_student', $data);
    }
    //create public function to assign parent to student
    public function assignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success', "Student successfully assigned to parent");
    }
    //create public function to delete assigned student to a parent
    public function assignStudentParentDelete($student_id)
    {
        //$data['getRecord'] = $getRecord;
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();

        return redirect()->back()->with('success', "Student successfully deleted from the parent");
    }

    //parent side
    public function myStudentParent()
    {
        $id = Auth::user()->id;
        //$data['getParent'] = User::getSingle($id);
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "My Students";
        return view('parent.my_student', $data);
    }
}
