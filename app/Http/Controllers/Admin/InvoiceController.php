<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\SaveInvoice;
use App\Models\Course;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\MonthlyLevelPrice;
use App\Models\Student;
use App\Models\StudentGroup;
use DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use SaveInvoice;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $levels = Level::get();
        $courses = Course::get();
        $groups = Group::get();
        $invoices = Invoice::with('student');
        if (isset($request->from) && isset($request->to))
            $invoices = $invoices->whereBetween(DB::raw('DATE(created_at)'), [$request->from, $request->to]);
        if(isset($request->level_id))
            $invoices = $invoices->whereHas('student', function($query) use($request){
                    $query->where('level_id', $request->level_id);
                });
        if(isset($request->course_id))
            $invoices = $invoices->whereHas('group', function($query) use($request){
                    $query->where('course_id', $request->course_id);
                });
        if (isset($request->group_id))
            $invoices->where('group_id', $request->group_id);
        $invoices = $invoices->paginate(config('admin.pagination'));
        $sum = $invoices->sum('price');
        return view('admin.invoices.index', compact('invoices', 'sum', 'levels', 'courses','groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $search = $request->search;
         $students = Student::whenSearch($request->search)->orWhereHas('level', function ($q) use ($search) {
                $q->where('name', $search)->orWhere('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('groups' , function($q) use($search) {
                $q->where('name', 'like', '%' .$search. '%');})
                ->paginate(config('admin.pagination'));
        return view('admin.invoices.create', compact('students', 'search'));
    }
    public function payCreate($id)
    {
        $student_groups = StudentGroup::where('student_id', $id)->get();
        // $invoices = Invoice::where('student_id', $id)->get();
        return view('admin.invoices.pay-create', compact('student_groups'));
    }
    public function studentPay($student_id, $group_id)
    {
        //save invoice
         $student_group = StudentGroup::where('student_id', $student_id)->with('group')->first();
        $level = $student_group->group->level->id;
        $month_level = MonthlyLevelPrice::where('level_id', $level)->latest('id')->first();
        $month_price = $month_level->price;
        $this->saveInvoice($student_id, $group_id, config('invoice.type.monthely'), $month_level->id, $month_price);
        // update end date 
        $student_group = StudentGroup::where('student_id', $student_id)->where('group_id', $group_id)->update(['end_date' => $month_level->end_date, 'dept_class_no' => 0]);
        return redirect()->back()->with('success', 'Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}