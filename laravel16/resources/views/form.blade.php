@extends('layouts.app')
@section('content')
<div class = "container">
<h1 class =  "text-center">Student Registration Form</h1>
<form action = "{{ url('show') }}" method = "post">
@csrf
    <div class = "form-group">
        <label>Name:</label>
        <input type="text" name = "fname" class = "form-control">
    </div>
        <div class = "form-group">
        <label>Email:</label>
        <input type="text" name="email" class ="form-control">
        </div>
        <div class = "form-group">
        <label>Password</label>
        <input type="password" name = "password" class = "form-control">        
        </div>
       <div class = "form-group">
        <input type="submit" class = "btn btn-primary" value = "Save">       
        </div>
</form>
</div>
@endsection
