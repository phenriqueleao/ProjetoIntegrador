<?php

namespace App\Http\Controllers;

use App\LevelOfEducation;
use Illuminate\Http\Request;

class LevelOfEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = LevelOfEducation::all();

        return view('levelofeducation\index', [
            'levels' => $levels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levelofeducation\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->all();

        LevelOfEducation::create($data);

        return redirect()->route('level.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$level = LevelOfEducation::find($id)) {
            return redirect()->back();
        };

        return view('levelofeducation\edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$level = LevelOfEducation::find($id)) {
            return redirect()->back();
        };

        $this->validate($request, [
            'name'   => 'required',
        ]);

        $level->update($request->all());

        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$level = LevelOfEducation::find($id)) {
            return redirect()->back();
        };

        $level->delete();

        return redirect()->route('level.index');
    }
}
