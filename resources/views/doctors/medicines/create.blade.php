@extends('admins.sidebar')
@section('content')
<div class="content-wrapper">
    <div class="card m-3 p-2">
          <div class="card-header border-transparent">
                <h3 class="card-title font-weight-bold">Medicines</h3>
          </div>
            <div class="card-body">
                <div class="table-responsive m-2">
                  <form method="POST" action="{{route('medicines.store')}}">  
                    @csrf
                  <table class="table table-bordered data-table m-1 " id="medicines_table">
                    <thead class="m-3">
                    <tr>
                      <th>Medicine Name</th>
                      <th>Quantity</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Required</th>
                    </tr>
                    </thead>
                    <tbody >
                
                    @foreach($medicines as $medicine)
                    <tr class="p-2">
                      <td class="p-2">{{ $medicine->medicine_name }}</a></td>
                      <td>  <input type="text" name="quantity{{$medicine->id}}"></td>
                      <td><span class="badge badge-success">
                        {{ $medicine->medicine_type }}</span></td>
                      <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">
                      @money($medicine->medicine_price, 'USD')
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input type="checkbox" name="check[]" class="form-check-input" value="{{$medicine->id}}">
                          <label class="form-check-label" for="exampleCheck1"></label>
                        </div>
                          </td>
                    </tr>
                    @endforeach
                  
                </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>   
                </form>
                </div>  <!-- /.table-responsive -->
              </div>    
    </div>           
</div>

@endsection
@push('head')

<script>
$('#medicines_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: `{!! route('medicines.index') !!}`,
    columns: [
              {data: 'id', name: 'id'},
              {data: 'medicine_name', name: 'medicine_name'},
              {data: 'medicine_quantity', name: 'medicine_quantity'},
              {data: 'medicine_type', name: 'medicine_type'},
              {data: 'medicine_price', name: 'medicine_price'},
              {data: 'id', name: 'id' , orderable: true, searchable: true},
            ]});
    
</script>

@endpush

