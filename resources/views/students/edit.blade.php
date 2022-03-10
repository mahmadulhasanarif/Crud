@extends('layout.layout')

@section('sidebar')
    <a class="btn btn-success" href="{{ url('students') }}">Back To Home</a>
@endsection


@section('content')
        <div class="container shadow">
            <h2>Edit Student</h2>

            <form action="/students/{{$student->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="float: right">
                    @error('name')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                   </div>
                <div class="mb">
                  <label>Name</label>
                  <input type="text" id="name" class="form-control" value="{{old('name', $student->name)}}" name="name" aria-describedby="Name">
                  <div id="nameHelp" class="form-text">Enter Your Name</div>
                </div>

                <div style="float: right">
                    @error('email')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{old('email', $student->email)}}" name="email" aria-describedby="Email">
                    <div id="emailHelp" class="form-text">Enter Your Email</div>
                </div>
                <div style="float: right">
                    @error('roll')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb">
                    <label>Roll</label>
                    <input type="text" class="form-control" value="{{old('roll', $student->roll)}}" name="roll" aria-describedby="Roll">
                    <div id="rollHelp" class="form-text">Enter Your Roll</div>
                </div>
                <div style="float: right">
                    @error('registation')
                    <small style="color: red">{{ $message}}</small>
                    @enderror
                </div>
                <div class="mb">
                    <label>Registation</label>
                    <input type="text" class="form-control" value="{{old('registation', $student->registation)}}" name="registation" aria-describedby="Registaion">
                    <div id="registationHelp" class="form-text">Enter Your registation</div>
                </div>
                <div style="float: right">
                    @error('password')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="{{old('password', $student->password)}}" aria-describedby="Password">
                    <div id="passwordHelp" class="form-text">Enter Your Password</div>
                </div>

                <div class="mb">
                    <label>Image</label>
                    <input type="file" class="form-control" name="photo" aria-describedby="Photo">
                    <div id="photoHelp" class="form-text">Enter Your Photo</div>
                    @if (!empty($student->photo))
                    <img src="{{asset($student->photo)}}" width="100px">
                @endif
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection
