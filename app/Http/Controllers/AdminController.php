<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }
    
    public function add(){
       
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }
    public function insert(Request $request){

        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:15|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/|confirmed',
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin successfully added.");
    }
    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            # code...
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
        }
        else{
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        // $user = User::getSingle($id);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|min:4|max:255',
        //     'email' => 'required|email|unique:users',
        // ]);
        // if ($validator->fails()) {
        //     # code...
        //     return redirect('admin/admin/list')->withErrors($validator)->withInput();

        // }
        // if ($request->email !=$user->email) {
        //     # code...
        //     $uniqueValidator = Validator::make(['email' =>$request->email], ['email' => 'unique:users']);
        //     if ($uniqueValidator->fails()) {
        //         # code...
        //         return redirect('admin/admin/edit/'. $id)->with('error', "Update failed, email is already taken.");
        //     }
        // }
        
        // $user->name = trim($request->name);
        // $user->email = trim($request->email);
        // if (!empty($request->password)) {
        //     # code...
        //     $user->password = Hash::make($request->password);
        // }

        // $user->save();

        // return redirect('admin/admin/list')->with('success', "Admin successfully updated.");
        $user = User::getSingle($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

            if ($validator->fails()) {
                return redirect('admin/admin/list')->withErrors($validator)->withInput();
            }

            $user->name = trim($request->name);
            $user->email = trim($request->email);

            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            try {
                $user->save();
                return redirect('admin/admin/list')->with('success', "Admin successfully updated.");
            } catch (\Exception $e) {
                return redirect('admin/admin/edit/'. $id)->with('error', "Update failed: ".$e->getMessage());
            }

    }
    public function delete($id){
       
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save(); 

        return redirect('admin/admin/list')->with('success', "Admin successfully deleted.");
    }
}
