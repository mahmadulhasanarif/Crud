@extends('layout.layout')
@section('sidebar')
<a class="btn btn-success" href="students/create">Add Student Data</a>
@endsection



@section('content')
    @if (session('message'))
   <div class="alert alert-success"> {{session('message')}}</div>
    @endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       
       @foreach ($students as $student)
       <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->roll}}</td>
        <td>
            <a class="btn btn-success" href="/students/{{$student->id}}">View</a>
            <a class="btn btn-primary" href="/students/{{$student->id}}/edit">Edit</a>
        </td>
    </tr>
       @endforeach
    </tbody>
  </table>
@endsection
