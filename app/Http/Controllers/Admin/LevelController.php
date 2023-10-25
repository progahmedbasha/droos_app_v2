<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLevelRequest;
use App\Models\Level;
use App\Models\MonthlyLevelPrice;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::paginate(config('admin.pagination'));
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLevelRequest $request)
    {
        Level::create($request->all());
        return redirect()->route('levels.index')->with('success', 'Added Successfully');
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
    public function edit(Level $level)
    {
        // return $level;
        $monthes = MonthlyLevelPrice::where('level_id', $level->id)->get();
        $last_month = MonthlyLevelPrice::where('level_id', $level->id)->latest()->first();
        
        return view('admin.levels.edit', compact('level','monthes', 'last_month'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $level->update($request->all());
        return redirect()->route('levels.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('levels.index')->with('success', 'Deleted Successfully');
    }
    public function storeMonth(Request $request)
    {
        MonthlyLevelPrice::create($request->all());
        return redirect()->route('levels.index')->with('success', 'Added Successfully');
    }
}