<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function viewHumanResource(){
        $employees=Employee::all();
        return view('admin.humanResource',compact('employees'));
    }

    public function addNewEmployee(EmployeeRequest $request){
        Employee::create($request);
        return redirect()->back()->with(['success' => 'Created Successfully']);
    }
}
