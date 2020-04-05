@extends('layouts.app')
    

@section('content')
<div class="content-wrapper">
     <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title font-weight-bold">Areas</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive m-2">
                  <table class="table m-1 ">
                    <thead class="m-3">
                    <a class="btn btn-success font-weight-bold p-2 m-3"
                            href="{{route('areas.create')}}">Add Area</a>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($areas as $area)
                    <tr class="p-2">
                      <td class="p-2">{{ $area->en_name }}</a></td>
                      <td>{{ $area->address }}</td>
                      <td><a class="btn btn-primary font-weight-bold" href="{{route('areas.edit',['areas' => $area->id])}}">Edit</a></td>
                      <td>        
                        <form method="POST" action="{{route('areas.destroy',['areas' => $area->id])}}">
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