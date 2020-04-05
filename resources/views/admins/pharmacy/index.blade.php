@extends('layouts.app')
@section('content')
<div class="content-wrapper">
     <!-- TABLE: LATEST ORDERS -->
     <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pharmacies</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-2 m-2">
                <div class="table-responsive p-2">
                  <table class="table m-0 p-2">
                    <thead>
                    <a class="btn btn-success font-weight-bold p-2 m-3"
                            href="{{route('pharmacy.create')}}">Add Pharmacy</a>
                    <tr>
                      <th>Pharmacy</th>
                      <th> Image</th>
                      <th>Area</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody >
                    @foreach($pharmacies as $pharmacy)
                    <tr class="p-2">
                      <td class="p-2">{{ $pharmacy->ph_name }}</td>
                      <td class="p-2"><img src="{{asset('storage/pharmacies/'.$pharmacy->ph_avatar)}}" width="70px" height="70px"></td>
                      <td>{{ $pharmacy->area->en_name }}</td>
                      <td><a href="{{route('pharmacy.show',['pharmacy' => $pharmacy->id])}}" 
                          class="btn btn-primary btn-sm">View Details</a></td>

                          <td><a href="{{route('pharmacy.edit',['pharmacy' => $pharmacy->id])}}" class="btn btn-warning btn-sm">Update</a></td>
                        <td>        
                        <form method="POST" action="{{route('pharmacy.destroy',['pharmacy' => $pharmacy->id])}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type='submit' class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        </td>
     
                     
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