@extends('layouts.doctor')
@section('content')

@if (Session::has('sweet_alert.alert'))
<script>
  swal({!! Session::get('sweet_alert.alert') !!});
</script>
@endif

<div class="card">
    <div class="card-header">
      Doctors
    </div>
    <div class="card-body">
        <table class="table table-bordered data-table m-1 " id="medicines_table">
            <thead class="m-3">
            <a class="btn btn-success font-weight-bold p-2 m-3"          
             href="{{route('doctor.create')}}">Add Doctor</a>
                 <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Active</th>
                   <th>Image</th>
                   <th>Edit</th>
                   <th>Delete</th>
                 
                 </tr>
                 </thead>
                 <tbody >
                 @foreach($doctors as $doctor)
                 <tr class="p-2" id="data{{$doctor->id}}">
                 <td class="p-2">{{$doctor->name}}</td>
                 <td class="p-2">{{$doctor->email}}</td>
                 <td class="p-2">
                  <div class="custom-control custom-switch">
                    @if ($doctor->is_active)
                   <input type="checkbox"  onchange="activition({{$doctor->id}})" data-token="{{csrf_token()}}"  class="custom-control-input" checked id="customSwitch{{$doctor->id}}">
                    <label class="custom-control-label" id="active{{$doctor->id}}" for="customSwitch{{$doctor->id}}">Active</label>
                    @else
                    <input type="checkbox"  data-token="{{csrf_token()}}" onchange="activition({{$doctor->id}})" class="custom-control-input"  id="customSwitch{{$doctor->id}}">
                    <label class="custom-control-label" id="active{{$doctor->id}}" for="customSwitch{{$doctor->id}}">Disactive</label>
                    @endif
                  </div>
                  
                </td>
                 <td class="p-2"><img src="{{asset('storage/doctors/'.$doctor->dr_avatar)}}" width="70px" height="70px"</td>
                <td class="p-2"><a class="btn btn-info" href="{{route('doctor.edit',$doctor->id)}}" role="button">Edit</a></td>
                 <td class="p-2">
                     <button class="deleteDoctor btn btn-danger" data-id="{{ $doctor->id }}" data-token="{{csrf_token()}}">Delete</button>
                 </td>
                 </tr>
                 @endforeach
     
                 </tbody>
               </table>
    </div>
  </div>
@endsection

@push('head')
<script>
$('#medicines_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: `{!! route('doctor.index') !!}`,
    columns: [
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'is_active', name: 'is_active'},
              {data: 'id', name: 'id' , orderable: true, searchable: true},
            ]});
    
</script>
@endpush
