<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Business;
use App\Models\Branch;
use DataTables;

class BusinessController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            $data = Business::select(['id', 'name']);
    
            return DataTables::of($data)
            ->addColumn('action', function ($business) {
                return '<a href="' . url("business/" . $business->id) . '">Show</a>';
            })
            ->make(true);
        }    
        return view('business.index');
    }

    public function create(){
        return view('business.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:businesses,email|max:255',
            'phone' => 'required|digits:10',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logoPath = $request->file('logo')->store('public/logos');
        $logoFilename = pathinfo($logoPath, PATHINFO_FILENAME);
        $business = new Business();
        $business->name = $request->name;
        $business->email = $request->email;
        $business->phone_number = $request->phone;
        $business->logo = $logoFilename;
        $business->save();
    
        return redirect()->route('business.index')->with('success', 'Business registered successfully.');
    }

    public function show($id){
        $datas = Branch::where('business_id',$id)->get(['id', 'name']);    
        return view('business.show',compact('datas'));
    }
}
