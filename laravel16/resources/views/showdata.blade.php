        @extends('layouts.app')
	    @section('content')
        <div class = "container">
        <h1 class = "text-center">List of All Students</h1>
        @if(Session::has('data1'))
        <div class = "alert alert-info"> {{ Session::get('data1') }}</div>
        @endif
        <table class = "table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student Roll#</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Phone</th>
            <th>Student Image</th>
            <th>Date of Registration</th>        
            <th class = "text-center" colspan = "2">Action</th>
        </tr>
            @foreach($student as $stud)
                <td>{{ $stud->id }}</td>
                <td>{{ $stud->rollno }}</td>
                <td>{{ $stud->name }}</td>
                <td>{{ $stud->email }}</td>
                <td>{{ $stud->phone }}</td>
                <td>
                @if(!empty($stud->image))                   
                <img src="{{ asset('/uploads/studentspics/'.$stud->image) }}" width ="100" height ="100" />                
                @endif
              </td>
              <td>{{ $stud->created_at->diffForHumans() }}</td>
                 <td class = "btn btn-info btn-sm"><a href="{{ url('/edit/'.$stud->id) }}">Edit</a></td> 
                 <td class = "btn btn-danger btn-sm"><a href="{{ url('/delete/'.$stud->id) }}">Delete</a></td>         
            <tr>            
            </tr>
            @endforeach
        </table>
        </div>
    @endsection
