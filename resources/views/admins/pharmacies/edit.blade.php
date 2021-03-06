@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admins</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
<div class="container">
  <h2>Enter Pharmacy New Data</h2>
  <form method="POST" action="{{route('pharmacies.update',['pharmacy' => $pharmacy->id])}}">
  @csrf
  {{method_field('PUT')}}
  <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" id="ph_name" value="{{$pharmacy->ph_name}}" name="ph_name">
    </div>
    <!--pharmacy image-->
    <div class="form-group">
      <label>image:</label>
      <input type="file" class="form-control" id="ph_image" placeholder="Enter pharmacy area" name="ph_avatar">
    </div>
    <!-- pharamacy Area-->
    <div class="form-group">
      <label>Areas:</label>
          <select class="custom-select" name="ph_area" required>
            <!--loop for areas-->
            @foreach ($areas as $area)
              <option value="{{$area->id}}">{{$area->en_name}}</option>
            @endforeach
          </select>
      </div>

    <h2>Enter Pharmacy Owner New Data</h2>
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" id="name" value="{{$owner->name}}" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="{{$owner->email}}" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label>National ID:</label>
      <input type="number" class="form-control" id="nationalID" value="{{$owner->dr_national_id}}" name="nationalID">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection