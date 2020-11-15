@extends('layouts.app')
@section('content')
<div class ="container">
<h1 class = "text-center">Add Student Details</h1>
<form action="{{ url('/add') }}" method = "post" enctype="multipart/form-data">
@csrf
<div class = "form-group">
    <label>Student Name:</label>
    <input type="text" name = "name" class = "form-control">  
</div>
<div class = "form-group">
    <label>Student Roll #:</label>
    <input type="text" name = "rollno" class = "form-control">  
</div>
<div class = "form-group">
    <label>Student Email:</label>
    <input type="text" name = "email" class = "form-control">  
</div>
<div class = "form-group">
    <label>Student Phone:</label>
    <input type="text" name = "phone" class = "form-control">  
</div>
<div class = "form-group">
    <label>Student Picture:</label>
    <input type="file" name = "image" class = "form-control">  
</div>
<div class = "form-group">   
    <input type="submit" name = "submit" class = "btn btn-primary" value = "Add Record">  
</div>
</form>
</div>
@endsection