@extends('layouts.doctor')
@section('content')


<div class="card">
    <div class="card-header">
      Doctors
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control"  value="{{old('email')}}"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!--password-->
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <!--confirm password-->
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Password">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!--national id-->
            <div class="form-group">
                <label for="exampleInputPassword1">National ID</label>
                <input type="password" class="form-control" value="{{old('nationalID')}}"  name="nationalID" id="exampleInputPassword1" placeholder="Password">
            </div>
            @error('nationalID')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             <!--avatar-->
             <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="avatar" value="{{old('avatar')}}" class="form-control-file" id="exampleFormControlFile1">
            </div>
            @error('avatar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
              
        
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection            