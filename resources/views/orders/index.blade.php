

@extends('admins.sidebar')

@section('content')
<div class="content-wrapper">
        <h1> Here we gonna make a table </h1>
        <h2> Do you want to add a new order? </h2>
        <div class="container m-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Order Name</th> 
                    <th scope="col">Deliver Address</th>
                    <th scope="col">Creation time</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">is_insured</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Actions</th>
                    
                    
                    
                </tr>
            </thead>
                <button class="btn btn-success mb-5"><a href="<button class="btn btn-success mb-5"><a href="/admins/doctors/orders/create"><h3>Add order</h3></a></button>
                <tbody>
              
                  <tr>
                    <th scope="row">1</th>
                    <th scope="row">first order</th>
                    <th scope="row">first address</th>
                    <th scope="row">Now</th>
                    <th scope="row">Ahmed</th>
                    <th scope="row">true</th>
                    <th scope="row">New</th>
                    <th scope="row">500</th>
                    <td><button type="button" class="btn btn-dark"><a href="#"> view details </a> </button>
                    <button type="button" class="btn btn-warning"><a href="#">Update info</a></button>
                    
                        <form method="POST" action="#">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type='submit' class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this order?')">Delete</button>
                        </form>
                    </td> 
    
                </tbody>
           
        </table>
        </div>
    </div>    
@endsection
