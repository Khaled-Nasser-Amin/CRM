<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create,App\Models\Employee');
    }

    public function viewHumanResource(Request $request)
    {

        $employees = Employee::when($request->position, function ($q) use ($request) {
            return $q->where('position', $request->position);
        })->when($request->area, function ($q) use ($request) {
            return $q->where('area', $request->area);
        })->when($request->experience, function ($q) use ($request) {
            return $q->where('experience', $request->experience);
        })->when($request->date, function ($q) use ($request) {
            $year = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y');
            $month = Carbon::createFromFormat('m/d/Y', $request->date)->format('m');
            $day = Carbon::createFromFormat('m/d/Y', $request->date)->format('d');
            return $q->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->whereDay('created_at', $day);
        })->latest()->get();
        return view('admin.humanResource',compact('employees'));


    }
    public function addNewEmployee(EmployeeRequest $request){
        $data=$request->except(['_token','documentation']);
        $file=$request->file('documentation');
        $fileName=time().'_'.$file->getClientOriginalName();
        $file->move(public_path('documentation'),$fileName);
        $data['documentation']=$fileName;
        Employee::create($data);
        return redirect()->back()->with(['success' => 'Created Successfully']);
    }

    public function updateEmployee(Request $request,Employee $employee){
        $request->validate([
            "name" => "required|string|max:255",
            "phone" => "required|string|unique:leads,firstPhone|unique:leads,secondPhone|unique:users,phone|unique:employees,phone,".$employee->id,
            "address" => "required|string",
            "city" => "required|string",
            "country" => "required|string",
            "experience" => "required|integer",
            "zip" => "required|integer",
            "comment" => "required|string",
            "position" => "required|string|",
            "area" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users|unique:employees,email,".$employee->id,
            "academicStudy" => "required|string|max:255",
            'serial'=> 'required|digits:4|integer|unique:employees,serial,'.$employee->id,
        ]);
        $data=$request->except(['documentation']);
        if ($request->documentation){
            $request->validate([
                'documentation'=> 'required|mimes:pdf,docx,doc',
            ]);
            $file=$request->file('documentation');
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('documentation'),$fileName);
            $data['documentation']=$fileName;
            unlink($employee->documentation);
        }

        $employee->update($data);
        return redirect()->back()->with(['success' => 'Updated Successfully']);

    }
    public function deleteEmployee(Employee $employee){
        unlink($employee->documentation);
        Employee::find($employee->id)->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);

    }
    public function downloadDocumentation(Employee $employee){

        $headers = array(
            'Content-Type: application/pdf',
        );
        $array=explode('.',$employee->documentation);
        $extension=end($array);
        return response()->download($employee->documentation, $employee->name.'.'.$extension , $headers);

    }
}
