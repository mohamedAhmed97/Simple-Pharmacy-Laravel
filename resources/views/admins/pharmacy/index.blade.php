
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
                    <tr>
                      <th>Pharmacy</th>
                      <th>Area</th>

                    </tr>
                    </thead>
                    <tbody >
                    @foreach($pharmacies as $pharmacy)
                    <tr class="p-2">
                      <td class="p-2">{{ $pharmacy->ph_name }}</td>
                      <td>{{ $pharmacy->ph_area }}</td>
                     
                     
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