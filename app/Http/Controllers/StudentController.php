<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['students'] = student::all();

        return view('students.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentRequest $request)
    {
        $data = $request->all();
        if($request->file('photo')){
            $data['photo'] = Storage::putFile('images', $request->file('photo'));
        }

        student::create($data);
        Session::flash('message', 'Student Data Added Successfully');
        return redirect()->to('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        $this->data['student']=$student;
        if($student->photo){
            $this->data['student']->photo=Storage::url($student->photo);
        }
        return view('students.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $this->data['student']=$student;
        if($student->photo){
            $this->data['student']->photo=Storage::url($student->photo);
        }
        return view('students.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(studentRequest $request, student $student)
    {
       $data = $request->all();

        $student->name =$data['name'];
        $student->email =$data['email'];
        $student->roll =$data['roll'];
        $student->registation = $data['registation'];
        $student->password =$data['password'];
        
        if($request->file('photo')){
            if($student->photo){
                Storage::delete($student->photo);
            }
            $student->photo = Storage::putFile('images', $request->file('photo'));
        }
        
        $student->save();
        
        Session::flash('message', 'Student Data Updated Successfully');

        return redirect()->to('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $student->delete();

        if($student->photo){
            Storage::delete($student->photo);
        }
        Session::flash('message', 'Student Data Deleted Successfully');
       return redirect()->to('students');
    }
}
