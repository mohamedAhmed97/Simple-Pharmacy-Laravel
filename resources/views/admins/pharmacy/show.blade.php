@extends('layouts.app')
@section('content')
<div class="card">
        <div class="card-body">
        <h1 class="card-title">{{$pharmacy->ph_name}}</h1>
          <p class="card-text">Area: {{$pharmacy->area->en_name}}</p>
          <p class="card-text">Owner: Dr.{{$owner->name}}</p>
          <p class="card-text">Email: {{$owner->email}}</p>
          <p class="card-text">National ID: {{$owner->dr_national_id}}</p>

        </div>
      </div>
@endsection