<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create,App\Models\User');
    }

    public function index(){
        $invoices=Invoice::all();
        $leads=Lead::all();
        $properties=Properties::all();
        $users=User::where('id','!=',1)->get();
        return view('admin.invoices',compact('invoices','leads','users','properties'));
    }
    public function store(InvoicesRequest $request){
        $request->validate(['invoiceSerial'=>'required|numeric|unique:invoices']);
        $property=Properties::find($request->propertyName);
        if ($property->price == $request->cost){
            $data=$request->except(['lead','broker','start','end','propertyName']);
            $data=$this->convertDateFormat($request,$data);
            $data=$this->total($request,$data);
            $invoice=Invoice::create($data);
            $property->invoices()->save($invoice);
            $invoice->lead()->associate($request->lead)->save();
            $invoice->user()->associate($request->broker)->save();
            return redirect()->back()->with(['success' => 'Invoice Created Successfully']);

        }else{
            return redirect()->back()->withErrors('cost does not match the property');
        }
    }
    public function update(Request $request,Invoice $Invoice){
        $request->validate(['invoiceSerial'=>['required' , Rule::unique('invoices')->ignore($Invoice->id)]]);
        $property=Properties::find($request->propertyName);
        if ($property->price == $request->cost){
            $data=$request->except(['lead','broker','start','end','propertyName']);
            $data=$this->convertDateFormat($request,$data);
            $data=$this->total($request,$data);
            $Invoice->update($data);
            $Invoice->save();
            $Invoice->lead()->associate($request->lead)->save();
            $Invoice->user()->associate($request->broker)->save();
        return redirect()->back()->with(['success' => 'Invoice Updated Successfully']);
        }else{
            return redirect()->back()->withErrors('cost does not match the property');
        }
    }
    public function delete(Invoice $Invoice){
        $Invoice->delete();
        return redirect()->back()->with(['success' => 'Invoice Deleted Successfully']);
    }
    public function convertDateFormat($request,$data){
        $data['start']=date('Y:m:d',strtotime($request->start));
        $data['end']=date('Y:m:d',strtotime($request->end));
        return $data;
    }

    public function total($request,$data){
        $data['total']=$request->quantity*$request->cost;
        return $data;
    }

}
