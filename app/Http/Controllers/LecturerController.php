<?php

namespace App\Http\Controllers;

use App\Lecturers;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturers::paginate(10);
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
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
            'address' => 'required',
        ]);

        Lecturers::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect()->route('lect.index')->with('success','Data Lecturer Saved');
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
        $lecturers = Lecturers::findorfail($id);
        return view('lecturers.edit', compact('lecturers'));
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
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ]);

        $lecturer_data = [
            'name' => $request->name,
            'address' => $request->address,
        ];

        Lecturers::whereId($id)->update($lecturer_data);

        return redirect()->route('lect.index')->with('success','Data Lecturer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturers = Lecturers::findorfail($id);
        $lecturers->delete();

        return redirect()->back()->with('success','Data Lecturer Deleted');
    }
}
