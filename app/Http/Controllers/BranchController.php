<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Business;
use App\Models\WeekDay;
use App\Models\BranchTime;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BranchController extends Controller
{
    public function create(){
        $business = Business::get(['id','name']);
        $weekdays = WeekDay::get(['id','day_name']);
        return view('branch.create',compact('business','weekdays'));
    }

    public function store(Request $request){
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->business_id = $request->business;
        $branch->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('multiple'), $imageName);

                $images = new Image();
                $images->branch_id = $branch->id;
                $images->image = $imageName;
                $images->save();
            }
        }
        
        if(isset($request->start_time)){
            foreach($request->start_time as $key => $time){
                if($time != null){
                    foreach($time as $tkey => $fTime){
                        $branchTime = new BranchTime();
                        $branchTime->branch_id = $branch->id;
                        $branchTime->week_day_id = $key;
                        $branchTime->start_time = $fTime;
                        $branchTime->end_time = $request->end_time[$key][$tkey];
                        $branchTime->save();
                    }
                }
            }
        }

        return redirect()->route('business.index')->with('success', 'Branch registered successfully.');
    }

    public function show($id){
        $data = WeekDay::with(['branch_time' => function ($query) use ($id) {
            $query->where('branch_id', $id);
        }])->get();
        
        $branch_data = Branch::find($id);      
        return view('branch.show', compact('data','branch_data'));        
    }

    public function destroy($id){
        BranchTime::where('branch_id', $id)->delete();
        $images = Image::where('branch_id', $id)->get();
        foreach ($images as $image) {
            $imagePath = public_path('multiple/' . $image->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }
        $branch = Branch::find($id);
        $branch->delete();

        return redirect()->back()->with('success', 'Branch and related records deleted successfully.');

    }
}
