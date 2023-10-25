<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Models\Attendance;
use App\Models\Classe;
use App\Models\Group;
use App\Models\OtherClasse;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::paginate(config('admin.pagination'));
        $class = Classe::whereNull('closed_at')->first();
        if($class != '')
            return redirect()->route('classes.show', $class->id);
        return view('admin.classes.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'group_id'=> 'required',
        ]);
        if($request->type ==1)
        {
            $class = new Classe();
            $class->group_id = $request->group_id;
            $class->type = $request->type;
            $class->save();
            return redirect()->route('classes.show', $class->id);
        }elseif($request->type ==2)
        {
            $class = new Classe();
            $class->group_id = $request->group_id;
            $class->type = $request->type;
            $class->save();
            $other_class = new OtherClasse();
            $other_class->class_id = $class->id;
            $other_class->price = $request->price;
            $other_class->save();
            return redirect()->route('classes.show', $class->id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return 1;
        $class = Classe::find($id);
        $students = Attendance::where('class_id', $id)->get();
        return view('admin.classes.attendance-create', compact('id', 'class','students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
    public function endClass($id)
    {
        $class = Classe::find($id);
        $class->update(['closed_at' => now()]);
        return redirect()->route('classes.index')->with('success', 'تم غلق الحصة بنجاح');
    }
}