<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use ImageTrait;
    public function __construct()
    {
        $this->middleware('can:create,App\Models\User');
    }
    public function ViewUser(Request $request){

        $this->authorize('create',User::class);
        $users=User::where('id','!=',1)/*->when($request->search,function ($q) use($request){
        })->when($request->search,function ($q) use($request){
            return $q->where('name','like','%'.$request->input('search').'%')
                ->orWhere('phone','like','%'.$request->input('search').'%')
                ->orWhere('serial','like','%'.$request->input('search').'%')
                ->orWhere('email','like','%'.$request->input('search').'%');
        })*/->get();
        return view('admin.user',['users'=>$users]);
    }
    public function AddNewUser(UserRequest $request){
        $this->authorize('create',User::class);
        $data=$request->except(['password','image']);
        $imageName=$this->AddSingleImage($request,public_path('images\users\\'));
        $data['password']=bcrypt($request->input('password'));
        $data['image']=$imageName;
        $employee=Employee::where('email',$request->input('email'))->first();
        if ($employee->name == $request->name
            && $employee->phone == $request->phone
            && $employee->serial == $request->serial){
            $user=User::create($data);
            return redirect()->back()->with(['success' => 'Added Successfully']);
        }else{
            return redirect()->back()->with(['danger' => 'data does not match any record']);
        }
    }
    public function EditUser(Request $request,User $user){
        $this->authorize('update',$user);
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> ['required','email',Rule::unique('users')->ignore($user->id)],
            'phone'=> ['required','string',Rule::unique('users')->ignore($user->id)],
            'serial'=> ['required','integer','digits:4',Rule::unique('users')->ignore($user->id)],
        ]);
        $this->validateIfImageExist($request,$user);
        if ($request->password){
            $request->validate(['password' => 'required|min:8']);
            $data=$request->except('password');
            $data['password']=bcrypt($request->password);
            $user->update([$request])->save();

        }else{
            $user->update([$request->except('password')])->save();
        }
        return redirect()->back()->with(['success' =>'Updated Successfully']);
    }
    public function deleteUser(User $user){
        $this->authorize('delete',$user);
        $this->unlinkImage($user->image);
        User::find($user->id)->delete();
        return redirect()->back()->with(['success' =>'Deleted Successfully']);
    }

    public function validateIfImageExist($request,$user){
        if ($request->image){
            $request->validate(['image' => 'required|mimes:jpg,png,jpeg,gif']);
            $this->unlinkImage($user->image);
            $newImageName=$this->AddSingleImage($request);
            $user->update(['image'=>$newImageName]);
        }

    }
}
