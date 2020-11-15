@extends('layouts.app')
@section('content')
<div class ="container">
<h1 class = "text-center">Update Student Details</h1>
<form action="{{ url('edit/'.$studentDetail->id) }}" method = "post" enctype="multipart/form-data">
@csrf
<div class = "form-group">
    <label>Student Name:</label>
    <input type="text" name = "name" class = "form-control" value = "{{ $studentDetail->name }}">  
</div>
<div class = "form-group">
    <label>Student Roll #:</label>
    <input type="text" name = "rollno" class = "form-control"value = "{{ $studentDetail->rollno }}">  
</div>
<div class = "form-group">
    <label>Student Email:</label>
    <input type="text" name = "email" class = "form-control" value = "{{ $studentDetail->email }}">  
</div>
<div class = "form-group">
    <label>Student Phone:</label>
    <input type="text" name = "phone" class = "form-control" value = "{{ $studentDetail->phone }}">  
</div>
<div class = "form-group">
    <label>Student Picture:</label>
    <input type="file" name = "image" class = "form-control">   
    <!-- Holding the current image if user didnot update the image -->
    <input type="hidden" name="current_image" value ="{{$studentDetail->image}}">
    <img src="{{ asset('/uploads/studentspics/'.$studentDetail->image) }}" style = "height:150px; width:150px;">
</div>
<div class = "form-group">   
    <input type="submit" name = "submit" class = "btn btn-primary" value = "Update Record">  
</div>
</form>
</div>
@endsection