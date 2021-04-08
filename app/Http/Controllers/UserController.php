<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Traits\ImageTrait;
use App\Models\Employee;
use App\Models\User;
use App\Notifications\AddNewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
        $users=User::where('id','!=',1)->get();
        $employees=Employee::all();
        return view('admin.user',compact('users','employees'));
    }
    public function AddNewUser(UserRequest $request){
        $this->authorize('create',User::class);
        $employee=Employee::where('id',$request->input('broker'))->first();
        $imageName=$this->AddSingleImage($request,public_path('images\users\\'));
        $user=User::create([
            'name' => $employee->name,
            'serial' => $employee->serial,
            'phone' => $employee->phone,
            'email' => $employee->email,
            'image' => $imageName,
            'password' => bcrypt($request->input('password')),
        ]);
        $this->sendNotification($user);
        return redirect()->back()->with(['success' => 'Added Successfully']);

    }
    public function EditUser(Request $request,User $user){
        $this->authorize('update',$user);
        $count=0;
        $count=$this->validateIfImageExist($request,$user,$count);
        if ($request->password){
            $request->validate(['password' => 'required|min:8|confirmed']);
            $password=bcrypt($request->password);
            $user->update([
                'password'=>$password
            ]);
            $user->save();
            $count++;
        }
        if ($count != 0 ){
            $this->notifyUpdatedUser($user);
            return redirect()->back()->with(['success' =>'Updated Successfully']);
        }else{
            return redirect()->back();
        }

    }
    public function deleteUser(User $user){
        $this->authorize('delete',$user);
        $user->leads()->update([
            'user_id' => null
        ]);
        $user->properties()->update([
            'user_id' => null
        ]);
        $user->invoices()->update([
            'user_id' => null
        ]);
        $arr = explode('/',$user->image);
        $imageName=end($arr);
        $this->unlinkImage(public_path('images\\users\\'.$imageName));        User::find($user->id)->delete();
        return redirect()->back()->with(['success' =>'Deleted Successfully']);
    }

    public function validateIfImageExist($request,$user,$count){
        if ($request->file('image')){
            $request->validate(['image' => 'required|mimes:jpg,png,jpeg,gif']);
            $arr = explode('/',$user->image);
            $imageName=end($arr);
            $this->unlinkImage(public_path('images\\users\\'.$imageName));
            $newImageName=$this->AddSingleImage($request,public_path('images\\users\\'));
            $user->update(['image'=>$newImageName]);

            $count++;
        }
        return $count;
    }

    public function sendNotification($employee){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new AddNewUser($employee,auth()->user()));
    }

    public function notifyUpdatedUser($employee){
        $user=User::where('id',$employee->id)->first();
        Notification::send($user,new AddNewUser($employee,auth()->user()));
    }
}
