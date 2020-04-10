

@extends('admins.sidebar')

@section('content')
<div class="content-wrapper">
        <h1> Here we gonna make a table </h1>
        <h2> Do you want to add a new order? </h2>
        <div class="container m-3">
        <table class="table">
            <thead>
            <a class="btn btn-success font-weight-bold p-2 m-3"
                            href="{{route('orders.create')}}">New order</a>
                    <tr>
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
                @foreach($orders as $order)
                  <tr>
                    <th scope="row">{{$order->id}}</th>
                    <th scope="row">{{$order->order_name}}</th>
                    <th scope="row">{{$order->Deliver_Address}}</th>
                    <th scope="row">{{$order->created_at}}</th>
                    <th scope="row">{{$doctor->name}}</th>
                    <th scope="row">{{$order->isinsured}}</th>
                    <th scope="row">{{$order->status}}</th>
                    <th scope="row">{{$order->price}}</th>
                    <button type="button" class="btn btn-warning"><a href="{{route('orders.edit',['orders' => $order->id])}}">Update info</a></button>
                    
                        <form method="POST" action="{{route('orders.destroy',['orders' => $order->id])}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type='submit' class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this order?')">Delete</button>
                        </form>
                    </td> 
                    @endforeach
                </tbody>
           
        </table>
        </div>
    </div>    
@endsection
