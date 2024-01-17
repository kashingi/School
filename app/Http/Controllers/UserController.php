<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ClassModel;


class UserController extends Controller
{
    //create public function to show users account
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        
        if (Auth::user()->user_type == 1) {
            # code...
            return view('admin.admin.my_account', $data);
        }
        if (Auth::user()->user_type == 2) {
            # code...
            return view('teacher.my_account', $data);
        }
        else if (Auth::user()->user_type == 3) {
            # code...
            $data['getClass'] = ClassModel::getClass();
            return view('student.my_account', $data);
        }
        else if (Auth::user()->user_type == 4) {
            # code...
            $data['getClass'] = ClassModel::getClass();
            return view('parent.my_account', $data);
        }
        
    }
    //create function to enable admin update details
    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|min:4|max:50|unique:users,email,' . $id,
            'name' => 'required|min:4|max:255',
            // 'last_name' => 'required|min:4|max:255',
            // 'mobile_number' => 'required|max:15',
            // 'admission_number' => 'required|max:15',
            // 'experince' => 'required',
            // 'gender' => 'required',
            // 'address' => 'required',
            // 'date_of_birth' => 'required|date|before_or_equal:2010-12-31',
            // 'admision_date' => 'required|date|before:tomorrow',
            // 'marital' => 'required'
            
        ]);
        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->save();


        return redirect()->back()->with('success', "Account updated successfull.");
    }
    //create function to update user account
    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|min:4|max:50|unique:users,email,' . $id,
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'mobile_number' => 'required|max:15',
            'admission_number' => 'required|max:15',
            'experince' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date|before_or_equal:2010-12-31',
            'admision_date' => 'required|date|before:tomorrow',
            //'marital' => 'required'
            
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
        if (!empty($request->date_of_birth)) {
            # code...
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admision_date)) {
            # code...
            $teacher->admision_date = trim($request->admision_date);
        }
        
        $teacher->save();
        return redirect()->back()->with('success', "Account updated successfully.");
    }
    //create function to enable student update details
    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'admission_number' => 'required|max:15',
            'religion' => 'required',
            'weight' => 'required',
            'gender' => 'required',
            'mobile_number' => 'required|regex:/^[0-9]+$/',
            'height' => 'required',
            //'address' => 'required',
            'date_of_birth' => 'required|date|before_or_equal:2010-12-31',
            'admision_date' => 'required|date|before:tomorrow',
            'email' => 'required|email|min:4|max:50|unique:users,email,' . $id,

            
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->religion = trim($request->religion);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->weight = trim($request->weight);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->file('profile_pic'))) {
            # code...
            if (!empty($student->getProfile())) {
                # code...
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->blood_group = trim($request->blood_group);
        $student->email = trim($request->email);
        $student->height = trim($request->height);
        $student->email = trim($request->email);
        if (!empty($request->date_of_birth)) {
            # code...
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admision_date)) {
            # code...
            $student->admision_date = trim($request->admision_date);
        }
        
        $student->save();
        return redirect()->back()->with('success', "Account updated successfully.");
    }
    //create function to enable parent update details
    public function UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|min:4|max:50|unique:users,email,' . $id,
            'name' => 'required|min:4|max:255',
            'last_name' => 'required|min:4|max:255',
            'admission_number' => 'required|regex:/^[0-9]+$/',
            'gender' => 'required',
            'experince' => 'required',
            'status' => 'required',
            'address' => 'required|min:8|max:50',
            'occupation' => 'required|regex:/^[A-Za-z\s]+$/',
            'relationship' => 'required',
            'mobile_number' => 'required|max:15',
            'profile_pic' => 'mimes:jpeg,png,jpg',

            
        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->admission_number = trim($request->admission_number);
        $parent->gender = trim($request->gender);
        $parent->experince = trim($request->experince);
        $parent->status = trim($request->status);
        $parent->address = trim($request->address);
        $parent->occupation = trim($request->occupation);
        $parent->relationship = trim($request->relationship);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
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
       
        
        
        $parent->save();
        return redirect()->back()->with('success', "Account Updated successfully.");
    }
    //public function to change password
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    // Create the function to pudate change password here
       public function update_change_password(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            if ($request->old_password !== $request->password) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success', "Password successfully updated.");
            } else {
                return redirect()->back()->with('error', "New password must be different from the old password.");
            }
        } else {
            return redirect()->back()->with('error', "Old Password is not Correct.");
        }
    }

    
}
