<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\MonthlyLevelPrice;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::count();
        $groups = Group::count();
        $levels = Level::count();
        $courses = Course::count();
        $classes = Classe::count();
        $monthes = MonthlyLevelPrice::where('level_id',1)->get();
        $level_id = $monthes->pluck('level_id');
    //     $zero = [0];
    //    array_push($zero, $monthes);
        // return $zero;
        return view('admin.dashboard', compact('students', 'groups', 'levels', 'courses', 'classes'));
    }
}