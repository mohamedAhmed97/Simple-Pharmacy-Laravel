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
<form method="POST" class="m-5 border border-dark p-2 bg-info"
    action="{{route('medicines.update',['medicine' => $medicine->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="m-2 bg-dark text-light rounded-pill p-2 font-weight-bold">
      Medicine Name</label>
      <input name="medicine_name" type="text" value="{{$medicine->medicine_name}}"
      class="form-control" aria-describedby="emailHelp">
    <div class="form-group">
      <label class="m-2 bg-primary bg-dark text-light rounded-pill p-2 font-weight-bold" 
      for="exampleInputPassword1">Quantity</label>
      <input name="medicine_quantity" type="number" class="form-control"
       value="{{$medicine->medicine_quantity}}" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label class="m-2 bg-primary bg-dark text-light rounded-pill p-2 font-weight-bold"
       for="exampleInputPassword1">Type</label>
       <input name="medicine_type" type="text" class="form-control" 
        value="{{$medicine->medicine_type}}" aria-describedby="emailHelp">    
    <div class="form-group">
      <label class="m-2 bg-primary bg-dark text-light rounded-pill p-2 font-weight-bold" 
      for="exampleInputPassword1">Price</label>
      <input name="medicine_price"  class="form-control" 
      value="{{$medicine->medicine_price}}" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-success border border-dark font-weight-bold 
            rounded-pill p-3 m-2">Update</button>
  </form>

  
  
@endsection