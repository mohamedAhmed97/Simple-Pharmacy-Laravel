@extends('layouts.app')
    

@section('content')
<div class="content-wrapper">
     <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title font-weight-bold">Medicines</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive m-2">
                  <table class="table m-1 ">
                    <thead class="m-3">
                    <a class="btn btn-success font-weight-bold p-2 m-3"
                            href="{{route('medicines.create')}}">Add Medicine</a>
                    <tr>
                      <th>Medicine Name</th>
                      <th>Quantity</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($medicines as $medicine)
                    <tr class="p-2">
                      <td class="p-2">{{ $medicine->medicine_name }}</a></td>
                      <td>{{ $medicine->medicine_quantity }}</td>
                      <td><span class="badge badge-success">
                        {{ $medicine->medicine_type }}</span></td>
                      <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">
                      @money($medicine->medicine_price, 'USD')
                        </div>
                      </td>
                      <td><a class="btn btn-info font-weight-bold">View</a></td>
                      <td><a class="btn btn-primary font-weight-bold">Edit</a></td>
                      <td><a class="btn btn-danger font-weight-bold">Delete</a></td>  
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
              </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
             
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
@endsection