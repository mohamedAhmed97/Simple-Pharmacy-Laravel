@extends('layouts.app')

@section('content')
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="POST"class="m-5 border border-dark p-2 bg-info" 
    action="{{route('areas.update',['areas' => $areas->id])}}">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
      Area Name</label>
      <input name="name" type="text"  value="{{$areas->en_name}}"
      class="form-control" aria-describedby="emailHelp">
     
   
      <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
      Area Address</label>
      <input name="address" type="text" value="{{$areas->address}}"
      class="form-control" aria-describedby="emailHelp">
    
     


    <button type="submit" class="btn btn-success border border-dark font-weight-bold 
            rounded-pill p-3 m-2">
      Update</button>
  </form>

  
  
@endsection