<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function ViewUser(){

        $this->authorize('create',User::class);
        $users=User::where('id','!=',1)->get();
        return view('admin.user',['users'=>$users]);
    }

    public function AddNewUser(UserRequest $request){
        $this->authorize('create',User::class);
        $data=$request->except('password');
        $data['password']=bcrypt($request->input('password'));
        $user=User::create($data);
        return redirect()->back()->with(['success' => 'Added Successfully']);
    }
    public function EditUser(Request $request,User $user){
        $this->authorize('update',$user);

        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> ['required','email',Rule::unique('users')->ignore($user->id)],
            'phone'=> ['required','string',Rule::unique('users')->ignore($user->id)],
            'serial'=> ['required','integer','digits:4',Rule::unique('users')->ignore($user->id)],


        ]);
        if ($request->password){
            $request->validate(['password' => 'required|min:8']);
            $data=$request->except('password');
            $data['password']=bcrypt($request->password);
            User::find($user->id)->update($request);

        }else{
            User::find($user->id)->update($request->except('password'));
        }
        return redirect()->back()->with(['success' =>'Updated Successfully']);
    }
    public function deleteUser(User $user){
        $this->authorize('delete',$user);
        User::find($user->id)->delete();
        return redirect()->back()->with(['success' =>'Deleted Successfully']);
    }
}
