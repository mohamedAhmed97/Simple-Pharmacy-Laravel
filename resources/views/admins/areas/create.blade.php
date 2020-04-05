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
    action="{{route('areas.store')}}">
    @csrf
    <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
      Area Name</label>
      <input name="en_name" type="text" 
      class="form-control" aria-describedby="emailHelp">
      @error('en_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
     
   
      <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
      Area Address</label>
      <input name="address" type="text" 
      class="form-control" aria-describedby="emailHelp">
      @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
     


    <button type="submit" class="btn btn-success border border-dark font-weight-bold 
            rounded-pill p-3 m-2">
      Create</button>
  </form>

  
  
@endsection