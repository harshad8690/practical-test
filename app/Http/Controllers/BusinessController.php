<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Business;
use App\Models\Branch;
use App\Models\Image;
use App\Models\BranchTime;
use DataTables;

class BusinessController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            $data = Business::select(['id', 'name', 'logo']);
            
            return DataTables::of($data)
                ->addColumn('action', function ($business) {
                    $showUrl = url("business/" . $business->id);
                    $deleteUrl = url("business/" . $business->id);
                    
                    return '<a class="btn btn-primary" href="' . $showUrl . '">Show</a>' .
                           '<form action="' . $deleteUrl . '" method="post" style="display: inline-block;">' . 
                           csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger">Delete</button></form>';
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

        if ($request->hasFile('logo')) {
            $image = $request->logo;
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('logos'), $imageName);
        }

        $business = new Business();
        $business->name = $request->name;
        $business->email = $request->email;
        $business->phone_number = $request->phone;
        $business->logo = $imageName;
        $business->save();
    
        return redirect()->route('business.index')->with('success', 'Business registered successfully.');
    }

    public function show($id){
        $datas = Branch::with('images')->where('business_id',$id)->get(['id', 'name']);
        return view('business.show',compact('datas'));
    }

    public function destroy($id){
        $branches = Branch::where('business_id',$id)->get();

        foreach($branches as $branch){
            BranchTime::where('branch_id', $branch->id)->delete();
            $images = Image::where('branch_id', $branch->id)->get();
            foreach ($images as $image) {
                $imagePath = public_path('multiple/' . $image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        Branch::where('business_id',$id)->delete();
        $business = Business::find($id);
        if(isset($business->logo)){
            $logos = public_path('logos/' . $business->logo);
            if (file_exists($logos)) {
                unlink($logos);
            }
        }
        $business->delete();

        return redirect()->back()->with('success', 'Business and related records deleted successfully.');
    }
}
