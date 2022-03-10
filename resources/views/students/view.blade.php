@extends('layout.layout')

@section('sidebar')
    <a class="btn btn-primary" href="/students">
        <small>Back To Home</small>
    </a>
@endsection

@section('content')
    <table class="table table-striped table-hover">
        <tr>
            <th>Name:</th>
            <td>{{$student->name}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$student->email}}</td>
        </tr>
        <tr>
            <th>Roll:</th>
            <td>{{$student->roll}}</td>
        </tr>
        <tr>
            <th>Registaion</th>
            <td>{{$student->registation}}</td>
        </tr>
        <tr>
            <th>Password:</th>
            <td>{{$student->password}}</td>
        </tr>
        <tr>
            <th>Photo</th>
            <td>@if (!empty($student->photo))
                <img src="{{$student->photo}}" width="100px">
            @endif</td>
        </tr>


    </table>

    <form action="/students/{{$student->id}}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</button>
    </form>

@endsection
