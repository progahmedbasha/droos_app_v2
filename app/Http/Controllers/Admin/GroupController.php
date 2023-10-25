<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupRequest;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::paginate(config('admin.pagination'));
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::get();
        $courses = Course::get();
        return view('admin.groups.create', compact('levels', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create($request->all());
        return redirect()->route('groups.index')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $students = StudentGroup::where('group_id', $group->id)->paginate(config('admin.pagination'));
        return view('admin.groups.students-show', compact('students', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $levels = Level::get();
        $courses = Course::get();
        return view('admin.groups.edit', compact('group', 'levels', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Deleted Successfully');
    }
    public function createStudent($id)
    {
        $group = Group::find($id);
        return view('admin.groups.create-students', compact('group'));
    }
    public function storeGroupStudent(StoreStudentRequest $request)
    {
        $student = new Student();
        $student->barcode = rand(1000, 100000);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->group_id = $request->group_id;
        if (request()->photo) {
            $student->photo = $this->save_image($request->photo, $student->image);
        }
        $student->save();
        return redirect()->route('groups.show', $request->group_id)->with('success', 'Added Successfully');
    }
    public function save_image($filename ,$path)
    {
        $file = time().'.'.$filename->getClientOriginalExtension();
            request()->photo->move(public_path($path), $file);
        return $file;
    }
    public function printAllBarcode($id){
		$students = StudentGroup::where('group_id', $id)->get();
		return view('admin.students.barcodelist',compact('students'));
	}
}