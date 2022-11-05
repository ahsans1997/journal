<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.department.index',[
            'departments' => Department::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'department_name' =>  'required|unique:departments,department_name',
            'department_info' => 'required'
        ]);
        $department_id = Department::insertGetId([
            'department_name' => $request->department_name,
            'department_info' => $request->department_info,
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('department_image')) {
            $upload_image = $request->file('department_image');
            $image_name = $department_id.".".$request->file('department_image')->getClientOriginalExtension();
            $image_location = 'public/uploads/departments/'.$image_name;
            Image::make($upload_image)->save(base_path($image_location));
            Department::findOrFail($department_id)->update([
                'department_image' => $image_name,
            ]);
        }
        return back()->with('success', "Department added Successfuly.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit',[
            'department_info' => Department::findOrFail($department->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validation = $request->validate([
            'department_name' =>  'required|unique:departments,department_name,'.$department->id,
            'department_info' => 'required'
        ]);
        Department::findOrFail($department->id)->update([
            'department_name' => $request->department_name,
            'department_info' => $request->department_info,
        ]);

        if ($request->hasFile('department_image')) {
            if ($department->department_image != "default.png") {
                $old_location = 'public/uploads/departments/'.$department->department_image;
                unlink(base_path($old_location));
            }
            $upload_image = $request->file('department_image');
            $image_name = $department->id.".".$request->file('department_image')->getClientOriginalExtension();
            $image_location = 'public/uploads/departments/'.$image_name;
            Image::make($upload_image)->save(base_path($image_location));
            Department::findOrFail($department->id)->update([
                'department_image' => $image_name,
            ]);
        }
        return Redirect()->route('department.index')->with('edit', "Department Edit Successfuly.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Department::findOrFail($department->id)->delete();
        return back()->with('delete', 'Department Delete Successfuly.');
    }
}
