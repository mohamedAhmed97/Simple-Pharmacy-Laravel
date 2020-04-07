@extends('admins.sidebar')

@section('content')
<div class="content-wrapper">
        <h1> Here we gonna make a table </h1>
        <h2> Do you want to add a new Doctor to your pharmacy? </h2>
        <div class="container m-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">View details</th> 
                    <th scope="col">Update doctor data</th>
                    <th scope="col">Delete a doctor</th>
                </tr>
            </thead>
                <button class="btn btn-success mb-5"><a href="/admins/doctors/create"><h3>Add Doctor</h3></a></button>
                <tbody>
                @foreach ($doctors as $doctor)
                  <tr>
                    <th scope="row">{{$doctor->name}}</th>
                    <td><button type="button" class="btn btn-dark"><a href="{{route('doctors.show', ['doctor'=>$doctor->id])}}"> view details </a> </button> </td>
                    <td><button type="button" class="btn btn-warning"><a href="{{route('doctors.edit', ['doctor'=>$doctor->id])}}">Update info</a></button></td>
                    <td> 
                        <form method="POST" action="{{route('doctors.destroy',['doctor' => $doctor->id])}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type='submit' class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this doctor?')">Delete</button>
                        </form>
                    </td> 
    
                </tbody>
             @endforeach
        </table>
        </div>
    </div>    
@endsection
